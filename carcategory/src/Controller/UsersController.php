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
        $this->Model = $this->loadModel('Cats');
        $this->Model = $this->loadModel('Transactions');
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
                    'action' => 'tables',
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
            $query = $this->Cars->find('all')->where(['status' => 1, 'car_delete' => 1]);
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

    public function payment()
    {
        if ($_POST['tokenId']) {
            require_once('vendor/autoload.php');
            //stripe secret key or revoke key
            $stripeSecret = 'sk_test_j5k0976GOLSOtiRzbDLpKqat00og5iM3cY';
            // See your keys here: https://dashboard.stripe.com/account/apikeys
            \Stripe\Stripe::setApiKey($stripeSecret);
            // Get the payment token ID submitted by the form:
            $token = $_POST['tokenId'];
            // Charge the user's card:
            $charge = \Stripe\Charge::create(array(
                "amount" => $_POST['amount'],
                "currency" => "usd",
                "description" => "stripe integration in PHP with source code - Rahul_Kumar.com",
                "source" => $token,
            ));
            // after successfull payment, you can store payment related information into your database
            $data = array('success' => true, 'data' => $charge);
            $my = array();
            $my['currency'] = $data['data']['currency'];
            $my['amount'] = $data['data']['amount'];
            $my['amount_captured'] = $data['data']['amount_captured'];
            $my['status'] = $data['data']['status'];
            $my['car_id'] = $_POST['carId'];
            $my['user_id'] = $_POST['userId'];
            $my['transaction_id'] = $data['data']['id'];
            $transaction = $this->Transactions->newEmptyEntity();
            $transaction = $this->Transactions->patchEntity($transaction, $my);
            if ($this->Transactions->save($transaction)) {
                echo json_encode($data);
                exit;
            }
            echo json_encode($data);
            exit;
        }
    }

    public function orders($id)
    {
        $transactions = $this->paginate($this->Transactions->find('all')->where(['user_id' => $id])->order(['Transactions.id' => 'desc']));
        // $cars = $this->paginate($this->Cars->find('all')->order(['Cars.id' => 'desc']));

        // $cars = $this->Cars->find('all');
        $cars = $this->Transactions->Cars->find('list', ['limit' => 200])->all()->toArray();

        // echo '<pre>';
        // print_r($cars);
        // die;
        $this->set(compact('transactions', 'cars'));
    }
}
