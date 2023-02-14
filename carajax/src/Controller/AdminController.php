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

                return $this->redirect(['action' => 'tables']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $brands = $this->Users->Brands->find('list', ['limit' => 200])->all()->toArray();
        $this->set(compact('car', 'brands'));
    }


    public function editcar($id = null)
    {
        $car = $this->Cars->get($id, [
            'contain' => [],
        ]);
        $fileName2 = $car['image'];

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("image");
            $fileName = $productImage->getClientFilename();
            if ($fileName == '') {
                $fileName = $fileName2;
            }
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
                // $this->Flash->success(__('The car has been saved.'));

                return $this->redirect(['action' => 'tables']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $brands = $this->Users->Brands->find('list', ['limit' => 200])->all()->toArray();
        $this->set(compact('car', 'brands'));
    }

    public function viewcar($id = null)
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

        $avg = 0;
        $count = 0;
        $ratings = $this->Ratings->find('all')->where(['car_id' => $id])->order(['id' => 'DESC'])->all();
        if (!empty($car->ratings)) {
            $array = json_decode(json_encode($ratings), true);

            $sum = 0;
            foreach ($array as $arr) {
                $sum += $arr['star'];
                $count++;
            }
            $avg = intval(($sum / $count)*20);
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

        $this->set(compact('car', 'role', 'rating', 'ratings', 'avg', 'count'));
    }

    public function deleteuser($id = null)
    {
        $id = $_REQUEST['id'];
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            echo json_encode(array(
                "status" => 1,
            ));
            exit;
        } else {
            echo json_encode(array(
                "status" => 0,
            ));
            exit;
        }
    }

    public function deletecar($id = null)
    {
        $id = $_REQUEST['id'];
        $car = $this->Cars->get($id);
        if ($this->Cars->delete($car)) {
            echo json_encode(array(
                "status" => 1,
            ));
            exit;
        } else {
            echo json_encode(array(
                "status" => 0,
            ));
            exit;
        }
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
        $this->paginate = [
            'contain' => ['Ratings'],
            'order' => ['id' => 'desc'],
        ];
        $cars = $this->paginate($this->Cars);

        $this->set(compact('users', 'cars'));
    }

    public function status($id = null, $status = null)
    {
        $this->request->allowMethod(['GET']);
        $id = $_REQUEST['id'];
        $status = $_REQUEST['status'];
        $car = $this->Cars->get($id);
        if ($status == 1) {
            $car->status = 0;
        } else {
            $car->status = 1;
        }
        if ($this->Cars->save($car)) {
            exit;
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
