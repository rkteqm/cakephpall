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
class AdminController extends AppController
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
        if ($this->Authentication->getIdentity()) {
            $auth = true;
            $user = $this->Authentication->getIdentity();
            $this->set(compact('user'));
        } else {
            $auth = false;
        }
        $this->set(compact('auth'));
    }

    public function dashboard()
    {
        // die('work pending on dashboard page');
    }

    public function profile()
    {
    }

    public function tables()
    {
        // die('work pending on profile page');
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
