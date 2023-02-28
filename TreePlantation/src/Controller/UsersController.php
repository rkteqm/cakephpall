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
        // $this->loadComponent('Flash');
        // $this->loadComponent('Authentication.Authentication');
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

    public function login()
    {
    }
}
