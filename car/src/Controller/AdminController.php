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
        $this->Model = $this->loadModel('Users');
        $this->Model = $this->loadModel('Cars');
        $this->Model = $this->loadModel('Brands');
        $this->Model = $this->loadModel('Ratings');
        if ($this->Authentication->getIdentity()) {
            $auth = true;
            $user = $this->Authentication->getIdentity();
            if ($user->role == 1) {
                $this->redirect(['controller' => 'Users', 'action' => 'signin']);
            }
            $this->set(compact('user'));
        } else {
            $auth = false;
        }
        $this->set(compact('auth'));
    }

    public function edituser($id = null)
    {
        $user = $this->Users->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                return $this->redirect(['action' => 'tables']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $this->set(compact('user'));
    }

    public function addcar()
    {
        $car = $this->Cars->newEmptyEntity();
        if ($this->request->is('post')) {

            $data = $this->request->getData();

            $productImage = $this->request->getData("image");
            $fileName = $productImage->getClientFilename();
            $fileSize = $productImage->getSize();
            $data["image"] = $fileName;

            $car = $this->Cars->patchEntity($car, $data);
            if ($this->Cars->save($car)) {
                $hasFileError = $productImage->getError();

                if ($hasFileError > 0) {
                    $data["image"] = "";
                } else {
                    $fileType = $productImage->getClientMediaType();

                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["image"] = $fileName;
                    }
                }

                $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $brands = $this->Users->Brands->find('list', ['limit' => 200])->all()->toArray();
        $this->set(compact('car', 'brands'));
    }

    public function dashboard()
    {
    }

    public function profile()
    {
    }

    public function tables()
    {
        $users = $this->paginate($this->Users->find('all')->where(['role' => 1])->order(['id' => 'desc']));
        $this->set(compact('users'));
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
