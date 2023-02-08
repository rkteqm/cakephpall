<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

use App\Controller\AppController;

class StudentsController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        // $this->loadModel("Students");
        $this->loadComponent('Flash');

        // Created app.php file inside /templates/layout/app.php
        $this->viewBuilder()->setLayout("app");
    }

    public function addStudent()
    {
        $student = $this->Students->newEmptyEntity();
        if ($this->request->is('ajax')) {
            $email = $this->request->getData('email');
            $data = $this->request->getData();
            $result = $this->Students->find('all')->where(['email' => $email])->first();
            if (!$result) {
                $student = $this->Students->patchEntity($student, $data);
                if ($this->Students->save($student)) {
                    echo json_encode(array(
                        "status" => 1,
                        "message" => "Student has been created"
                    ));
                    exit;
                }
            }

            echo json_encode(array(
                "status" => 0,
                "message" => "Email already exist please enter another email"
            ));

            exit;
        }
        $this->set(compact('student'));
    }

    public function listStudents()
    {
        if ($this->request->is('ajax')) {
            $status = $_POST['status'];
            if ($status == 'empty') {
                $students = $this->Students->find()->toList();
                echo json_encode(array(
                    "students" => $students,
                ));
                exit;
            } else {
                $students = $this->Students->find('all')->where(['status' => $status])->toList();
                echo json_encode(array(
                    "students" => $students,
                ));
                exit;
            }
        } else {
            $students = $this->Students->find()->toList();
        }

        $this->set("title", "List Student");
        $this->set(compact("students"));
    }

    public function lists()
    {
        $students = $this->Students->find('all');
        $this->set(compact('students'));
        $status = $this->request->getQuery('status');
        if ($status == null || $status == 'null') {
            $students = $this->Students->find('all');
        } else {
            $students = $this->Students->find('all')->where(['status' => $status]);
        }
        $this->set(compact("students"));
        if ($this->request->is('ajax')) {
            $this->autoRender = false;
            //$this->layout = false;

            $this->viewBuilder()->setLayout(null);


            $this->render('/element/flash/userlist');
        }
    }

    public function listjquery()
    {
        $students = $this->Students->find('all');
        $this->set(compact('students'));
    }

    public function editStudent($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('student'));
        $this->set("title", "Edit Student");
    }

    public function status($id = null, $status = null)
    {
        $this->request->allowMethod(['post']);
        $id = $_POST['id'];
        $status = $_POST['status'];

        $student = $this->Students->get($id);
        if ($status == 1) {
            $student->status = 0;
        } else {
            $student->status = 1;
        }
        if ($this->Students->save($student)) {
            echo json_encode(array(
                "status" => $status,
                "id" => $id,
            ));
            exit;
        }
    }
}
