<?php

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;


class LanguageController extends AppController
{
	//$this->loadcomponent('Session');
	public function initialize(){	
		//load all models
		parent::initialize();
	}
	public function index(){ 
        $this->loadModel('Language');
        $this->paginate = ['order' => ['Language.id' => 'desc']];
        $users = $this->paginate($this->Language);

        $this->set(compact('users'));

	}
	public function add($id=null){

        $this->loadModel('Language');
        
        if(isset($id) && !empty($id)){
            $City = $this->Language->get($id);
            }else{
            $City = $this->Language->newEntity();
            }
         if ($this->request->is(['post', 'put'])) {

        try {   
                $this->request->data['role_id']=2;
                $transports = $this->Language->patchEntity($City, $this->request->data);
                //pr($transports); die;
                if ($resu=$this->Language->save($transports)) {
                $this->Flash->success(__('Internal User  has been saved.'));
                return $this->redirect(['action' => 'index']);
                }
            }
            catch (\PDOException $e) {

            $this->Flash->error(__('Language Already Exits'));
            $this->set('error', $error);
            return $this->redirect(['action' => 'add']);
            }


        
        }
        $this->set('language', $City);
            
        }
	public function status($id,$status){ 
    
        $this->loadModel('Language');
        if(isset($id) && !empty($id)){
            if($status =='Y' ){

                $status = 'Y';
                $user = $this->Language->get($id);
                $user->status = $status;
                if ($this->Language->save($user)) {
                    $this->Flash->success(__('Language status has been updated.'));
                    return $this->redirect(['action' => 'index']);  
                }

            }else{
                $status = 'N';
                $user = $this->Language->get($id);
                $user->status = $status;
                if ($this->Language->save($user)) {
                $this->Flash->success(__('Language status has been updated.'));
                return $this->redirect(['action' => 'index']);  

                }
            }
        }
        }	

           public function delete($id){ 
                    $this->loadModel('Language');
                   // pr($this->Users->get($id)); die;
                    $user = $this->Language->get($id);
                 
                    if ($this->Language->delete($user)) {
                    $this->Flash->success(__('The Language with id: {0} has been deleted.', h($id)));
                    return $this->redirect(['action' => 'index']);
                    }
          }
		
}
