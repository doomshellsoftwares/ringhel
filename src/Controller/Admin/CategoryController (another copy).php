<?php

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;


class CategoryController extends AppController
{
	//$this->loadcomponent('Session');
	public function initialize(){	
		//load all models
		parent::initialize();
	}
	public function index(){ 
     $this->loadModel('Category');
      //  $this->paginate = ['order' => ['Category.id' => 'asc']];
     $users = $this->paginate($this->Category);
     $this->set(compact('users'));
 }

 public function add($id=null){

    $this->loadModel('Category');

    if(isset($id) && !empty($id)){
        $cat = $this->Category->get($id);
    }else{
        $cat = $this->Category->newEntity();
    }
    if ($this->request->is(['post', 'put'])) {

        $re = count($this->request->data['name']); 
        $this->request->data['parent_id']=0;
        $this->request->data['subcat']= $this->request->data['name'];
        $this->request->data['name']=$this->request->data['parint'];
        $transports = $this->Category->patchEntity($cat, $this->request->data);

        if ($resu=$this->Category->save($transports)) {

            for($i=0; $i<$re; $i++){

                //    print_r($this->request->data); die;
             $cat = $this->Category->newEntity();
             $this->request->data['name']=$this->request->data['subcat'][$i];
             $this->request->data['parent_id']=$resu->id;
             $cate = $this->Category->patchEntity($cat, $this->request->data);
             $resust=$this->Category->save($cate);

         }

         $this->Flash->success(__('Category has been saved.'));
         return $this->redirect(['action' => 'index']);
     }

 }


}

public function edit($id=null){ 
    $this->loadModel('Category');

    $cat = $this->Category->get($id);
    pr($cat);
    if ($this->request->is(['post', 'put'])) {
        $this->request->data['parent_id']=0;
        $this->request->data['parint']=$this->request->data['name'];
    }
    $transport = $this->Category->patchEntity($cat, $this->request->data);
    pr($transport); die;

    $this->set('category', $cat);
}	

public function status($id,$status){ 

    $this->loadModel('Category');
    if(isset($id) && !empty($id)){
        if($status =='Y' ){

            $status = 'Y';
            $user = $this->Category->get($id);
            $user->status = $status;
            if ($this->Category->save($user)) {
                $this->Flash->success(__('Category status has been updated.'));
                return $this->redirect(['action' => 'index']);  
            }

        }else{
            $status = 'N';
            $user = $this->Category->get($id);
            $user->status = $status;
            if ($this->Category->save($user)) {
                $this->Flash->success(__('Category status has been updated.'));
                return $this->redirect(['action' => 'index']);  

            }
        }
    }
}

public function delete($id){ 
    $this->loadModel('Category');
                   // pr($this->Users->get($id)); die;
    $user = $this->Category->get($id);

    if ($this->Category->delete($user)) {
        $this->Flash->success(__('The Category with id: {0} has been deleted.', h($id)));
        return $this->redirect(['action' => 'index']);
    }
}
}
