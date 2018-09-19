<?php 
namespace App\Controller\Admin;
use App\Controller\AppController;

use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
class UsersController extends AppController
{
	
	public function initialize()
	{
        parent::initialize();
       	$this->loadModel('Users');
        $this->Auth->allow(['_setPassword','signup','findUsername','login','logout','verify','getphonecode','forgotpassword','forgetCpass','sociallogin']);
    }
public function index($id)
    {

    	$this->loadModel('Users');
   
		$user =$this->Users->get($this->Auth->user('id')); 
		if(isset($id) && !empty($id)){
			//using for edit
			
			$Users = $this->Users->get($id);
		}
		//echo "test"; die;
		if ($this->request->is(['post', 'put'])) {

		$this->request->data['cpassword'] =$this->request->data['cpassword'];
					$this->request->data['password'] = (new DefaultPasswordHasher)->hash($this->request->data['cpassword']);			//change password
					$user = $this->Users->patchEntity($user, $this->request->data); 
		
				// edit site setting
				$Users = $this->Users->patchEntity($Users, $this->request->data);
				if ($this->Users->save($Users)) {
					$this->Flash->success(__('Your site setting has been updated.'));
					return $this->redirect(['controller'=>'users','action' => 'index/'.$id]);	
				  }
                     }
		$this->set('Users', $Users);
	}

	 public function login($value='')
	{
		$this->redirect(SITE_URL.'admin');
	}


}