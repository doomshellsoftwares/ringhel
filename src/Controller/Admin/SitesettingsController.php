<?php

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\DefaultPasswordHasher;


class SitesettingsController extends AppController
{
	public  function _setPassword($password)
  {
    return (new DefaultPasswordHasher)->hash($password);
  }
	
	public function add($id=1)
	{
 $this->loadModel('Users');
 $this->loadModel('Sitesettings');
 $id=$this->request->session()->read('Auth.User.id');
 $profile = $this->Users->find('all')->where(['Users.id' =>$id])->first();
 $this->set('profile', $profile);

 if ($this->request->is(['post'])) {
	
	 if($this->request->data['password']!=''){
   $user = $this->Auth->identify();
   
    if ($user) {
		$this->request->data['password']= $this->_setPassword($this->request->data['newpassword']);
	
          $transports = $this->Users->patchEntity($profile, $this->request->data);
          $resu=$this->Users->save($transports);
          $this->Flash->success(__('Profile has been updated successfully.'));
			return $this->redirect(['action' => 'add']);
	}else{
		  $this->Flash->error(__('Old Password Wrong, try again'));
	
	}
	
	}else{
	$userdetail['name']= $this->request->data['name'];
	$userdetail['comp_name']= $this->request->data['comp_name'];
    $transports = $this->Users->patchEntity($profile, $userdetail);
	$resu=$this->Users->save($transports);
    $this->Flash->success(__('User has been updated successfully.'));	
	  
}
    


}
 
}
}
