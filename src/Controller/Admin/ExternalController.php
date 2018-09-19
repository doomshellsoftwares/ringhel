<?php

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\DefaultPasswordHasher;


class ExternalController extends AppController
{
	//$this->loadcomponent('Session');
	public $paginate = ['where'=>['Users.role_id'=>3],'limit' => 50,'order' => ['Users.id' => 'asc']];
	public function initialize(){	
		//load all models
		parent::initialize();
	}
	public  function _setPassword($password)
	{
		return (new DefaultPasswordHasher)->hash($password);
	}

	public function index(){ 
		$this->loadModel('Users');
		$this->loadModel('Language'); 

		$this->paginate = ['contain' => ['Language'],'order' => ['Users.id' => 'desc']];
		$query = $this->Users->find()->where(['role_id' => 3,'']);
		$users = $this->paginate($query);
		$this->set(compact('users'));
	}

	public function add($id=null){ 

		$this->loadModel('Users');
		//$this->loadModel('Internal'); 
		$this->loadModel('Language'); 
		$language= $this->Language->find('list')->where(['Language.status' => 'Y'])->order(['created' => 'DESC'])->toarray();
		$this->set(compact('language'));
		       
		if(isset($id) && !empty($id)){
			$external = $this->Users->get($id);
		}else{
			$external = $this->Users->newEntity();
		}

		if ($this->request->is(['post', 'put'])) {

			try { 	
				$this->request->data['role_id']=3;
				$ranpassword=$this->randomPassword();
				$this->request->data['cpassword']=$ranpassword;
				$this->request->data['password']= $this->_setPassword($ranpassword);
				$transports = $this->Users->patchEntity($external, $this->request->data);
				//pr($transports); die;
				if ($resu=$this->Users->save($transports)) {
					$this->Flash->success(__('External User  has been saved.'));
					return $this->redirect(['action' => 'index']);
				}
			}
			catch (\PDOException $e) {

				$this->Flash->error(__('User Name Already Exits'));
				$this->set('error', $error);
				return $this->redirect(['action' => 'add']);
			}



		}
		$this->set('external', $external);
	} 



	public function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	    	$n = rand(0, $alphaLength);
	    	$pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	} 	


	

	public function status($id,$status){ 

		$this->loadModel('Users');
		if(isset($id) && !empty($id)){
			if($status =='Y' ){

				$status = 'Y';
				$user = $this->Users->get($id);
				$user->status = $status;
				if ($this->Users->save($user)) {
					$this->Flash->success(__('External status has been updated.'));
					return $this->redirect(['action' => 'index']);  
				}

			}else{
				$status = 'N';
				$user = $this->Users->get($id);
				$user->status = $status;
				if ($this->Users->save($user)) {
					$this->Flash->success(__('External status has been updated.'));
					return $this->redirect(['action' => 'index']);  

				}
			}
		}
	}

	public function delete($id){ 
		$this->loadModel('Users');
                   // pr($this->Users->get($id)); die;
		$user = $this->Users->get($id);

		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The External user with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}

}
