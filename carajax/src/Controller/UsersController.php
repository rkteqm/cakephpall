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
        if ($this->request->is('ajax') && $this->request->is('get')) {
            $user = $this->Users->newEmptyEntity();
            $this->set(compact('user'));
            $this->render('/element/flash/signup');
        }
        $this->viewBuilder()->setLayout('signlayout');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $created_at = date('Y-m-d H:i:s');
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->created_at = $created_at;
            if ($this->Users->save($user)) {
                echo json_encode(array(
                    "status" => 1,
                    "message" => "The user has been saved.",
                ));
                exit;
            } else {
                echo json_encode(array(
                    "status" => 0,
                    "message" => "Email already exist.",
                    // "message" => "The user could not be saved. Please, try again.",
                ));
                exit;
            }
        }
        $this->set(compact('user'));
    }

    public function signin()
    {
        if ($this->request->is('ajax') && $_REQUEST['status'] == true) {
            $this->render('/element/flash/signin');
        }
        $this->viewBuilder()->setLayout('signlayout');
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

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['signin', 'signup', 'home', 'viewtest', 'dashtest', 'signintest', 'signuptest', 'view']);
    }

    public function profile()
    {
        if ($this->request->is('ajax') && $_REQUEST['status'] == true) {
            $this->render('/element/flash/profile');
        }
    }

    public function home()
    {
        $key = $this->request->getQuery('key');
        if ($key) {
            $query = $this->Cars->find('all')
                ->where(['Or' => ['company like' => '%' . $key . '%', 'brand like' => '%' . $key . '%', 'model like' => '%' . $key . '%', 'make like' => '%' . $key . '%', 'color like' => '%' . $key . '%']]);
        } else {
            $query = $this->Cars->find('all')->where(['status' => 1]);
        }
        $cars = $this->paginate($query->order(['id' => 'desc']));
        $this->set(compact('cars'));
        if ($this->request->is('ajax') && $_REQUEST['status'] == true) {
            $this->render('/element/flash/home');
        }
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
                    $this->set(compact('ratings'));
                    $this->render('/element/flash/rating');
                }
            } else {
                $rating = $this->Ratings->patchEntity($rating, $this->request->getData());
                $rating['car_id'] = $id;
                if ($this->Ratings->save($rating)) {
                    $ratings = $this->Ratings->find('all')->where(['car_id' => $id])->order(['id' => 'desc']);
                    $this->set(compact('ratings'));
                    $this->render('/element/flash/rating');
                } else {
                    echo json_encode(array(
                        "status" => 0,
                        "message" => "error",
                        "ratings" => null,
                    ));
                    exit;
                }
            }
        } elseif ($this->request->is('get')) {
            $id = $_REQUEST['id'];
            $car = $this->Cars->get($id);
            $ratings = $this->Ratings->find('all')->where(['car_id' => $id])->order(['id' => 'desc']);
            $this->set(compact('car', 'ratings'));
            $this->render('/element/flash/view');
        }
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
