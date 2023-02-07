<?php

declare(strict_types=1);

namespace App\Controller;


/**
 * Details Controller
 *
 * @property \App\Model\Table\DetailsTable $Details
 * @method \App\Model\Entity\Detail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DetailsController extends AppController
{

    private function getFileExt($mime_type){
        $mimetypeArr = [
            'image/bmp' => '.bmp',
            'image/gif' => '.gif',
            'image/png' => '.png',
            'image/x-citrix-png' => '.png',
            'image/x-png' => '.png',
            'image/jpeg' => '.jpg',
            'image/x-citrix-jpeg' => '.jpg'
        ];

        return $mimetypeArr[$mime_type];
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $details = $this->paginate($this->Details);

        $this->set(compact('details'));
    }

    /**
     * View method
     *
     * @param string|null $id Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $detail = $this->Details->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('detail'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $details = $this->Details->newEmptyEntity();
        if ($this->request->is('post')) {
            $details = $this->Details->patchEntity($details, $this->request->getData());
            if (!$details->getErrors) {
                $image = $this->request->getData('image');
                $name = $image->getClientFilename();
                $type = $image->getClientMediaType();
                $size = $image->getSize();
                $tmpName = $image->getStream()->getMetadata('uri');
                $error = $image->getError();
                $targetPath = WWW_ROOT . 'img' . DS . $name;
                $image->moveTo($targetPath);
                $details->image = $name;
            }
            if ($this->Details->save($details)) {
                $this->Flash->success(__('The details has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The details could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('details'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Detail id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $detail = $this->Details->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $detail = $this->Details->patchEntity($detail, $this->request->getData());
            if ($this->Details->save($detail)) {
                $this->Flash->success(__('The detail has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The detail could not be saved. Please, try again.'));
        }
        $this->set(compact('detail'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Detail id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $detail = $this->Details->get($id);
        if ($this->Details->delete($detail)) {
            $this->Flash->success(__('The detail has been deleted.'));
        } else {
            $this->Flash->error(__('The detail could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function saveUserAjax()
    {
        /** FILE CREATE */
        $image_data = $this->request->getData('image_data');

        $contents = $image_data;
        $contents = explode('base64,', $contents);
        $contents = base64_decode(str_replace(' ', '+', $contents[1]));
        
        
        $f = finfo_open();
        $mime_type = finfo_buffer($f, $contents, FILEINFO_MIME_TYPE);
        $ext = $this->getFileExt($mime_type);
        $unique = rand(9999, 99999).microtime();
        $filename = $unique . $ext;
        $path = WWW_ROOT . 'img' . DS. $filename;


        $path = str_replace(" ", "", $path);
        file_put_contents($path, $contents);

        /** FILE CREATE END */
        
        $name = $this->request->getData('name');
        $email = $this->request->getData('email');
        $image = $filename;
        //save these field into database using patchEntity
        echo json_encode(array(
            "status" => 200,
            "message" => "Data Submitted Successfully",
            "name" => $name,
            "email" => $email,
            "image" => $image,
        ));
        die;
    }
     
}
