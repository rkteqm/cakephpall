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
        $this->viewBuilder()->setLayout('treelayout');
        $this->loadComponent('Flash');
        $this->loadComponent('Authentication.Authentication');
        // $this->Model = $this->loadModel('Cars');
        // $this->Model = $this->loadModel('Cats');
        // $this->Model = $this->loadModel('Transactions');
        // $this->Model = $this->loadModel('Ratings');
        // if ($this->Authentication->getIdentity()) {
        //     $auth = true;
        //     $user = $this->Authentication->getIdentity();
        //     $this->set(compact('user'));
        // } else {
        //     $auth = false;
        // }
        // $this->set(compact('auth'));
    }

    public function index()
    {
    }

    public function register()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $created_at = date('Y-m-d H:i:s');
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->created_at = $created_at;
            // echo '<pre>';print_r($user);die;
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
                ));
                exit;
            }
        }
        $this->set(compact('user'));
    }

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);
        // Configure the login action to not require authentication, preventing
        // the infinite redirect loop issue
        $this->Authentication->addUnauthenticatedActions(['login', 'register']);
    }

    public function login()
    {
        $this->request->allowMethod(['get', 'post']);
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            // redirect to /articles after login success
            $redirect = $this->request->getQuery('redirect', [
                'controller' => 'Users',
                'action' => 'index',
            ]);

            return $this->redirect($redirect);
        }
        // display error if user submitted and authentication failed
        if ($this->request->is('post') && !$result->isValid()) {
            $this->Flash->error(__('Invalid username or password'));
        }
    }

    public function logout()
    {
        $result = $this->Authentication->getResult();
        // regardless of POST or GET, redirect if user is logged in
        if ($result && $result->isValid()) {
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
    }
}
