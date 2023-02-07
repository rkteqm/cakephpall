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
        $students = $this->Students->find()->toList();
        $this->set("title", "List Student");
        $this->set(compact("students"));
    }

    public function editStudent($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => [],
        ]);
        $this->set(compact('student'));
        $this->set("title", "Edit Student");
    }
}
