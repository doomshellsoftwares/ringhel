<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Event\Event;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
use Cake\Network\Email\Email;
use Cake\Datasource\ConnectionManager;


class ProfileController extends AppController
{
 public function beforeFilter(Event $event)
 {    
		//pr($this->request->params);
  $this->loadModel('Users');

  parent::beforeFilter($event);

  $this->Auth->allow(['langselect']);
}


public function langselect($lang,$id )
{

  $invited['langname']= $lang;
  $invited['langid']= $id;


  $session = $this->request->session();
  $session->write('langselect',$invited);
  return $this->redirect(['controller' => 'home','action'=>'home']);

}

public function profile()
{
 $this->loadModel('Users');
 $this->loadModel('Profile');
 $id=$this->request->session()->read('Auth.User.id');
 $profile = $this->Users->find('all')->where(['Users.id' =>$id])->first();
 $this->set('profile', $profile);

 if ($this->request->is(['post'])) {
	
	 if($this->request->data['password']!=''){
   $user = $this->Auth->identify();
   
    if ($user) {
		  $this->request->data['password'] = $this->request->data['newpassword'];
          $transports = $this->Users->patchEntity($profile, $this->request->data);
          $resu=$this->Users->save($transports);
          $this->Flash->success(__('Profile has been updated successfully.'));
			return $this->redirect(['action' => 'index']);
	}
	
	}else{
	  $this->Flash->error(__('Old Password Wrong, try again'));
}
    


}
 
}		

}



