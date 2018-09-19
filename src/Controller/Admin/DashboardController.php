<?php

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;


class DashboardController extends AppController
{
	//$this->loadcomponent('Session');
	public function initialize(){	
		//load all models
		parent::initialize();
	}
	public function index(){ 
		//articles data show in dashboard 
		$this->loadModel('Articles');
		$this->loadModel('Category');
		$this->loadModel('Language'); 
		$this->loadModel('Catelang'); 
		
		$this->loadModel('Users');

		$totalcat= $this->Category->find('all')->order(['Category.created' => 'DESC'])->count();

		$this->set(compact('totalcat'));




	// article data show
		$article= $this->Articles->find('all')->order(['Articles.created' => 'DESC'])->contain(['Language','Catelang'=> ['Category']])->limit('2')->toarray();

		$this->set(compact('article'));

		$totalarticle= $this->Articles->find('all')->order(['Articles.created' => 'DESC'])->contain(['Language','Catelang'=> ['Category']])->count();

		$this->set(compact('totalarticle'));

		
		
	// External data show	

		
		$usersexcount= $this->Users->find('all')->where(['Users.status' => 'Y','Users.role_id'=>3])->contain(['Language'])->order(['Users.created' => 'DESC'])->count();

		$this->set("usersexcount",$usersexcount); 	

		
		$usersex= $this->Users->find('all')->where(['Users.status' => 'Y','Users.role_id'=>3])->contain(['Language'])->order(['Users.created' => 'DESC'])->limit('2')->toarray();
		$this->set("usersex",$usersex); 


//internal data show


		$id=$this->request->session()->read('Auth.User.id');

		$usersitcount= $this->Users->find('all')->where(['Users.status' => 'Y','Users.role_id'=>2, 'Users.id !='=>$id])->contain(['Language'])->order(['Users.created' => 'DESC'])->count();
		$this->set("usersitcount",$usersitcount);

		$users= $this->Users->find('all')->where(['Users.status' => 'Y','Users.role_id'=>2, 'Users.id !='=>$id])->contain(['Language'])->order(['Users.created' => 'DESC'])->limit('2')->toarray();
		$this->set("users",$users);
		
		

		
		
	}

}
