<?php

declare(strict_types=1);

namespace App\Controller;

use Cake\Http\FlashMessage;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */

    public function initialize(): void
    {
        $this->viewBuilder()->setLayout('userlayout');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->Model = $this->loadModel('Cars');
        $this->Model = $this->loadModel('Ratings');
        if ($this->Authentication->getIdentity()) {
            $auth = true;
            $user = $this->Authentication->getIdentity();
            $this->set(compact('user'));
        } else {
            $auth = false;
        }
        $this->set(compact('auth'));
    }

    public function signup()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'signup']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['signin', 'signup', 'home', 'view']);
    }

    public function signin()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {

            $user = $this->Authentication->getIdentity();
            if ($user->role == 1) {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Users',
                    'action' => 'home',
                ]);
            } elseif ($user->role == 0) {
                $redirect = $this->request->getQuery('redirect', [
                    'controller' => 'Admin',
                    'action' => 'dashboard',
                ]);
            }
            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function profile()
    {
    }

    public function home()
    {
        $cars = $this->paginate($this->Cars->find('all')->where(['status' => 1])->order(['id' => 'desc']));
        $this->set(compact('cars'));
    }

    public function view($id = null)
    {
        if ($this->request->is('post')) {
            $rating = $this->Ratings->newEmptyEntity();
            $user_id = $this->request->getData('user_id');
            $id = $this->request->getData('car_id');
            $result = $this->Ratings->find('all')->where(['car_id' => $id, 'user_id' => $user_id])->first();
            if ($result) {
                $stars = $this->request->getData('star');
                $review = $this->request->getData('review');
                $result->star = $stars;
                $result->review = $review;
                if ($this->Ratings->save($result)) {
                    $ratings = $this->Ratings->find('all')->where(['car_id' => $id])->order(['id' => 'desc']);
                    echo json_encode(array(
                        "status" => 1,
                        "message" => "success",
                        "ratings" => $ratings,
                    ));
                    exit;
                }
            } else {
                $rating = $this->Ratings->patchEntity($rating, $this->request->getData());
                $rating['car_id'] = $id;
                if ($this->Ratings->save($rating)) {
                    $ratings = $this->Ratings->find('all')->where(['car_id' => $id])->order(['id' => 'desc']);
                    echo json_encode(array(
                        "status" => 1,
                        "message" => "success",
                        "ratings" => $ratings,
                    ));
                    exit;
                } else {
                    echo json_encode(array(
                        "status" => 0,
                        "message" => "error",
                        "ratings" => null,
                    ));
                    exit;
                }
            }
        }
        $car = $this->Cars->get($id);
        $ratings = $this->Ratings->find('all')->where(['car_id' => $id])->order(['id' => 'desc']);
        $this->set(compact('car', 'ratings'));
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'signin']);
        }
    }
}
