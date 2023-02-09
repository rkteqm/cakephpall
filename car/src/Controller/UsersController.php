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
    }

    // public function userindex()
    // {
    //     $user = $this->Authentication->getIdentity();
    //     if ($user->role == 0) {
    //         $users = $this->paginate($this->Users->find('all')->where(['role' => 1])->order(['id' => 'desc']));

    //         $this->set(compact('users'));
    //     } else {
    //         return $this->redirect(['action' => 'home']);
    //     }
    // }

    public function signup()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            // $data = $this->request->getData();
            $user = $this->Users->patchEntity($user, $this->request->getData());
            // echo '<pre>';
            // print_r($user);
            // die;
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'signup']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    public function signin()
    {
        // $this->request->allowMethod(['get', 'post']);
        // $result = $this->Authentication->getResult();
        // if ($result && $result->isValid()) {

        //     $user = $this->Authentication->getIdentity();
        //     if ($user->role == 1) {
        //         $redirect = $this->request->getQuery('redirect', [
        //             'controller' => 'Users',
        //             'action' => 'home',
        //         ]);
        //     } elseif ($user->role == 0) {
        //         $redirect = $this->request->getQuery('redirect', [
        //             'controller' => 'Users',
        //             'action' => 'index',
        //         ]);
        //     }
        //     return $this->redirect($redirect);
        // }
        // if ($this->request->is('post') && !$result->isValid()) {
        //     $this->Flash->error(__('Invalid username or password'));
        // }
    }
}
