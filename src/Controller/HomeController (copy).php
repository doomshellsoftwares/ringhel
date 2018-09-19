<?php

namespace App\Controller;
use App\Controller;
use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;
use Cake\Datasource\ConnectionManager;
use Cake\Routing\Router;
class HomeController extends AppController
{
	
	public function initialize(){	
	parent::initialize();
    $this->Auth->allow(['home','article']);
	}
   public function beforeFilter(Event $event)
    {    
		//pr($this->request->params);
		$this->loadModel('Users');
        parent::beforeFilter($event);
		$this->loadComponent('Cookie');
       
    }

public function home()
    {

		$this->loadModel('Articles');
		$this->loadModel('Category');
		$this->loadModel('Language'); 
		$this->loadModel('Catelang'); 
		$article= $this->Articles->find('all')->contain(['Language','Catelang'=> ['Category']])->toarray();
	    $this->set(compact('article'));
	     if ($this->request->is(['post', 'put'])) {
			$name =  $this->request->data['articlesearch'];
		if(!empty($name))
	    {
		$res	= "p.name LIKE '%$name%'";
	    }	
    	$conn = ConnectionManager::get('default');
	    $frnds = "SELECT c.*, p.user_id, p.name, p.profile_image, p.location FROM `contactrequest` c inner join users u on c.to_id = u.id inner join personal_profile p on p.user_id=u.id WHERE c.from_id='".$current_user_id."' and c.accepted_status='Y' and $res UNION SELECT c.*, p.user_id, p.name, p.profile_image, p.location FROM `contactrequest` c inner join users u on c.from_id = u.id inner join personal_profile p on p.user_id=u.id WHERE c.to_id='".$current_user_id."' and c.accepted_status='Y' and $res and p.user_id IN (SELECT p.user_id FROM `contactrequest` c inner join users u on c.to_id = u.id inner join personal_profile p on p.user_id=u.id WHERE c.from_id='".$id."' and c.accepted_status='Y' UNION SELECT p.user_id FROM `contactrequest` c inner join users u on c.from_id = u.id inner join personal_profile p on p.user_id=u.id WHERE c.to_id='".$id."' and c.accepted_status='Y')";
	    $friends = $conn->execute($frnds);
	    $this->set('article', $friends);
		 }
	    
	}
	
	
	 public function article($id)
    {
		 $this->set('article_id', $id);
    $this->loadModel('Articles');
    $this->loadModel('Users');
		$this->loadModel('Category');
		$this->loadModel('Language'); 
		$this->loadModel('Catelang'); 
$article= $this->Articles->find('all')->contain(['Comment'=>['Users'],'Language','Catelang'=> ['Category']])->where(['Articles.id' =>$id])->first();
$this->set(compact('article'));
    }
    
     public function comment()
    {
		$this->autoRender=false;
		$this->loadModel('Comment');
		    $comment = $this->Comment->newEntity();
		$id=$this->request->session()->read('Auth.User.id'); 
      if ($this->request->is(['post', 'put'])) {

        try {   
                $this->request->data['user_id']=$id;
                $commentuser = $this->Comment->patchEntity($comment, $this->request->data);
                //pr($transports); die;
                if ($resu=$this->Comment->save($commentuser)) {
                $this->Flash->success(__('Comment post Successfully'));
               $this->redirect( Router::url( $this->referer(), true ));
                }
            }
            catch (\PDOException $e) {

            $this->Flash->error(__('login'));
            $this->set('error', $error);
            $this->redirect( Router::url( $this->referer(), true ));
            }


        
        }
    }
    
		
}
