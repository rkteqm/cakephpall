<?php
// src/Controller/ArticlesController.php
namespace App\Controller;

use App\Controller\AppController;

class FormController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        
        $this->loadComponent('Paginator');
        $this->loadComponent('Flash'); // Include the FlashComponent
    }
    
    public function index()
    {
        // $form = $this->Paginator->paginate($this->form->find());
        // $this->set(compact('form'));
    }
    
    // public function view($slug)
    // {
    //     // $article = $this->Articles->findBySlug($slug)->firstOrFail();
    //     // $this->set(compact('article'));
    // }
}

// echo "<pre>";
// print_r($article);
// die;