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
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        $this->Model = $this->loadModel('Cars');
        $this->Model = $this->loadModel('Ratings');
        $this->Model = $this->loadModel('Brands');
        if ($this->Authentication->getIdentity()) {
            $auth = true;
        } else {
            $auth = false;
        }
        $this->set(compact('auth'));
    }

    public function home()
    {
        if ($this->Authentication->getIdentity()) {
            $user = $this->Authentication->getIdentity();
            if ($user->role == 0) {
                return $this->redirect(['controller' => 'Admin', 'action' => 'index']);
            } else {
                $key = $this->request->getQuery('key');
                if ($key) {
                    $query = $this->Cars->find('all')
                        ->where(['Or' => ['company like' => '%' . $key . '%', 'brand like' => '%' . $key . '%', 'model like' => '%' . $key . '%', 'make like' => '%' . $key . '%', 'color like' => '%' . $key . '%']]);
                } else {
                    $query = $this->Cars;
                }
                $cars = $this->paginate($query);
            }
        } else {
            $key = $this->request->getQuery('key');
            if ($key) {
                $query = $this->Cars->find('all')
                    ->where(['Or' => ['company like' => '%' . $key . '%', 'brand like' => '%' . $key . '%', 'model like' => '%' . $key . '%', 'make like' => '%' . $key . '%', 'color like' => '%' . $key . '%']]);
            } else {
                $query = $this->Cars;
            }
            $cars = $this->paginate($query);
        }
        $this->set(compact('cars'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            // die('fghdjdhkjsldhfjk');
            $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'userindex']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        $this->Authentication->addUnauthenticatedActions(['login', 'register', 'home', 'view', 'redirectLogin', 'test']);
    }

    public function login()
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
                    'action' => 'index',
                ]);
            }


            return $this->redirect($redirect);
        }
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function view($id = null)
    {
        if ($this->Authentication->getIdentity()) {
            $user = $this->Authentication->getIdentity();
            $role = $user->role;
            $user_id = $user->id;
            $name = $user->name;
        } else {
            $role = 1;
        }
        $car = $this->Cars->get($id, [
            'contain' => ['Ratings'],
        ]);

        $overallstar = 0;
        $count = 0;
        $ratings = $this->Ratings->find('all')->where(['car_id' => $id])->order(['id' => 'DESC'])->all();
        if (!empty($car->ratings)) {
            $array = json_decode(json_encode($ratings), true);

            $sum = 0;
            foreach ($array as $arr) {
                $sum += $arr['star'];
                $count++;
            }
            $overallstar = $sum / $count;
        }
        $rating = $this->Ratings->newEmptyEntity();
        if ($this->request->is('post')) {

            $result = $this->Ratings->find('all')->where(['car_id' => $id, 'user_id' => $user_id])->first();
            if ($result) {
                $stars = $this->request->getData('star');
                $review = $this->request->getData('review');
                $result->star = $stars;
                $result->review = $review;
                if ($this->Ratings->save($result)) {
                    return $this->redirect(['action' => 'view', $id]);
                }
            } else {
                $rating = $this->Ratings->patchEntity($rating, $this->request->getData());
                $rating['user_id'] = $user_id;
                $rating['car_id'] = $id;
                $rating['user_name'] = $name;
                if ($this->Ratings->save($rating)) {

                    return $this->redirect(['action' => 'view', $id]);
                }
            }
        }

        $this->set(compact('car', 'role', 'rating', 'ratings', 'overallstar', 'count'));
    }

    public function redirectLogin()
    {
        $this->Flash->error(__('Please login here for rate this car'));
        return $this->redirect(['action' => 'login']);
    }

    public $paginate = [
        'limit' => 5
    ];

    public function test($id = null)
    {
        $this->autoRender = false;
        // $id = $this->Messages->get($id);
        $id = $_REQUEST['id'];
        $status = $_REQUEST['status'];
        $car = $this->Cars->get($id);
        echo json_encode(array(
            // "status" => 0,
            "status" => $status,
            "id" => $id,
            "message" => "Some message",
            "car" => $car,
        ));
        exit;
    }
}
