<?php

class UsersubscriptionController extends AppController {
	


	public $name = 'Usersubscription';
	
	var $uses = array('Usersubscription','User','Property','Subscription','Role','Project');

	public function beforeFilter() {

		parent::beforeFilter();

		$this->Auth->allow('');

	}

	


		public function admin_index(){
			
			
   $currency = $this->User->find('list',array('conditions'=>array('User.status'=>'Y','User.role_id'=>'1'),'fields' => array('currency')));
  $this->set('currency', $currency);		
			
  $customer_pack = $this->Subscription->find('list',array('conditions'=>array('Subscription.status'=>'Y','Subscription.type'=>'2'),'fields'=>array('title')));
  $this->set('customer_pack', $customer_pack);			
	
$this->paginate = array('order'=>array('Usersubscription.id'=>'Desc'),'conditions'=>array('Usersubscription.role_id'=>
'2'),'limit' =>50,'recursive'=>'0');
$this->set('destination', $this->paginate('Usersubscription'));	

}


		public function admin_index_agent(){
			
 $currency = $this->User->find('list',array('conditions'=>array('User.status'=>'Y','User.role_id'=>'1'),'fields' => array('currency')));
  $this->set('currency', $currency);			
			
  $agent_pack = $this->Subscription->find('list',array('conditions'=>array('Subscription.status'=>'Y','Subscription.type'=>'3'),'fields'=>array('title')));
  $this->set('agent_pack', $agent_pack);				
			
					
$this->paginate = array('order'=>array('Usersubscription.id'=>'Desc'),'conditions'=>array('Usersubscription.role_id'=>
'3'),'limit' =>50,'recursive'=>'0');
$this->set('destination', $this->paginate('Usersubscription'));	

}


public function admin_index_buider() {
	
 $currency = $this->User->find('list',array('conditions'=>array('User.status'=>'Y','User.role_id'=>'1'),'fields' => array('currency')));
  $this->set('currency', $currency);	
	
  $builder_pack = $this->Subscription->find('list',array('conditions'=>array('Subscription.status'=>'Y','Subscription.type'=>'4'),'fields'=>array('title')));
  $this->set('builder_pack', $builder_pack);				
						
$this->paginate = array('order'=>array('Usersubscription.id'=>'Desc'),'conditions'=>array('Usersubscription.role_id'=>
'4'),'limit' =>50,'recursive'=>'0');
$this->set('destination', $this->paginate('Usersubscription'));		

}


	public function admin_delete($id = null) {

		$this->Subscription->id = $id;
		if ($this->Subscription->delete()) {
			$this->User->query("update cms_users set subscription_status='0' where id=".$id);

			$this->Session->setFlash(__('Subscription is deleted successfully'), 'flash/sucess');

			$this->redirect(array('action' => 'index'));

		}

		$this->Subscription->setFlash(__(' Subscription is not deleted successfully'), 'flash/error');

		$this->redirect(array('action' => 'index'));

	}



public function admin_make_supportiv() {

		if(!empty($this->request->data['multipledelete'])){
			$atp = NULL;

			//pr($this->request->data); die;

			if($this->request->data['supportive'] == 'Activate') 

			{ 

				

				$atp='Y';	


			}
			
		if($this->request->data['supportive'] == 'Delete')
{ 
			foreach($this->request->data['multipledelete'] as $user){ 
				
                              
				 $this->Usersubscription->query("delete from cms_usersubscriptions where id=".$user);
                              
                                
			$this->Session->setFlash('User Subscription is deleted successfully', 'flash/sucess');
			}



}

			if($this->request->data['supportive'] == 'Deactivate')

			{

					$atp='N';	

		

			}


			foreach($this->request->data['multipledelete'] as $pid){ 

				$this->Usersubscription->create();

				$this->Usersubscription->id	= $pid;

			

			//	$this->User->save($udateData['User']['status']); 

				$this->Usersubscription->query("update cms_usersubscriptions set status='".$atp."' where id=".$pid);

				//$this->Session->setFlash('Users information udated successfully', 'flash/sucess');

				//$this->redirect(array('action' => 'index'));

			

						

			}

			$this->Session->setFlash('User Subscription is udated successfully', 'flash/sucess');

		}

		else $this->Session->setFlash('User Subscription is not udated successfully', 'flash/error');

		

		$this->redirect($this->referer());

	}	

	
	public function admin_pro_srrc(){
		
		//pr($this->request->data); die;
		
	 $currency = $this->User->find('list',array('conditions'=>array('User.status'=>'Y','User.role_id'=>'1'),'fields' => array('currency')));
  $this->set('currency', $currency);	
		
		
$type=$this->request->data['Searchpro']['type'];
$duration=$this->request->data['Searchpro']['duration'];
$pack=$this->request->data['Searchpro']['pack'];

$prr=array();

if(!empty($duration)){

$use=array('Subscription.duration'=>$duration);
$prr[]=$use;

}
if(!empty($pack)){
$use=array('Subscription.title LIKE'=>'%'.$pack.'%');
$prr[]=$use;
}


$prr[]=array('Subscription.type'=>$type);


	$this->paginate = array('order'=>array('Usersubscription.id'=>'Desc'),'limit' =>50,'recursive'=>'0','conditions'=>$prr);
	$this->set('destination', $this->paginate('Usersubscription'));	
}

public function admin_propertydetail($id=null) {
	
	
	 $currency = $this->User->find('list',array('conditions'=>array('User.status'=>'Y','User.role_id'=>'1'),'fields' => array('currency')));
  $this->set('currency', $currency);
	
	       $agent_property = $this->Property->find('all',array('conditions'=>array('Property.cus_id'=>$id),'order'=>array('Property.id'=>'DESC')));
		  
	//	  pr($agent_property); die;
		  
		  
		   $this->set('agent_property', $agent_property);
}

public function admin_projectdetail($id=null) {
	
	
	 $currency = $this->User->find('list',array('conditions'=>array('User.status'=>'Y','User.role_id'=>'1'),'fields' => array('currency')));
  $this->set('currency', $currency);
	
	       $builder_project = $this->Project->find('all',array('conditions'=>array('Project.cus_id'=>$id),'order'=>array('Project.id'=>'DESC')));
		  
		//  pr($builder_project); die;
		   $this->set('destination', $builder_project);
}




 }
