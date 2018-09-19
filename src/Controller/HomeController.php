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
   use Cake\I18n\I18n;

class HomeController extends AppController
{
	
	public function initialize(){	
	parent::initialize();
	$this->Auth->allow(['home','article','search']);
	}
   public function beforeFilter(Event $event)
    {    
		//pr($this->request->params);
		$this->loadModel('Users');
        parent::beforeFilter($event);
		//$this->loadComponent('Cookie');

    }

	public function home($lang_id)
	{

		$id = $this->request->session()->read('Auth.User.id');
		if($id==''){
		session_start();
		
		}
		$this->loadModel('Articles');
		$this->loadModel('Category');
		$this->loadModel('Language'); 
		$this->loadModel('Catelang'); 

		if($_SESSION['langselect']!=''){
		$language = $_SESSION['langselect']['langid'];
		}else{
		$language ='10';
		}
		if ($this->request->is(['post', 'put'])) 
		{
			$name =  $this->request->data['articlesearch'];
			
			// Same langauge
			if(!empty($name))
			{
				$jobapplicationdata = array();
				//keyword record data Get
				$conn = ConnectionManager::get('default');
				$keywordqry =  "SELECT `id`,`title`,`description` FROM tblarticle  WHERE `keyword` LIKE '%".$name."%' And lang_id='$language'";
				$keyid = $conn->execute($keywordqry)->fetchAll('assoc');
				if(count($keyid)>0){
					foreach($keyid as $key=>$value){
						$keywordid= $value['id'];
						if (in_array($keywordid,$jobapplicationdata))
						{
							//$removekeywordsid= $this->request->data['data'];
						}
						else
						{
							array_push($jobapplicationdata, $keywordid);
						}
					}
				}

				//title record data Get

				$keysesid=implode(",", $jobapplicationdata);
					if($keysesid){
					$titleqry =  "SELECT `id`,`title`,`description` FROM tblarticle  WHERE `title` LIKE '%".$name."%' And id NOT IN (".$keysesid.")  And lang_id='$language'";
					}else{
					$titleqry =  "SELECT `id`,`title`,`description` FROM tblarticle  WHERE `title` LIKE '%".$name."%'";

					}
				$titleid = $conn->execute( $titleqry )->fetchAll('assoc');
					if(count($titleid)>0)
					{
					foreach($titleid as $key=>$value)
					{
						$titleid= $value['id'];
						if (in_array($titleid,$jobapplicationdata))
						{
							//$removetitlesid= $this->request->data['data'];
						}
						else
						{
							array_push($jobapplicationdata, $titleid);
						}	
					}
					}
					
				//descripition record data Get
				$keysesid=implode(",", $jobapplicationdata);
				if($keysesid){
				$descqry =  "SELECT `id`,`title`,`description` FROM tblarticle  WHERE `description` LIKE '%".$name."%' And id NOT IN (".$keysesid.")  And lang_id='$language'";
				} else{
				$descqry =  "SELECT `id`,`title`,`description` FROM tblarticle  WHERE `description` LIKE '%".$name."%'";
				}
				$descid = $conn->execute( $descqry )->fetchAll('assoc');
				if(count($descid)>0)
				{
					foreach($descid as $key=>$value)
					{
							$descid= $value['id'];
						if (in_array($descid,$jobapplicationdata))
						{
							//$removedescsid= $this->request->data['data'];
						}
						else
						{
							array_push($jobapplicationdata, $descid);
						}	
					}
				}		
			}
		
		}	
			
		if($jobapplicationdata){
		$article= $this->Articles->find('all')->where(['Articles.id IN'=>$jobapplicationdata])->contain(['Language','Catelang'=> ['Category']])->toarray();
		$this->set(compact('article'));
		$searchname =  $this->request->data['articlesearch'];
		$this->set('searchname', $searchname);

		}else{
			if($lang_id){
		$article= $this->Articles->find('all')->where(['Articles.subcat_id'=>$lang_id])->contain(['Language','Catelang'=> ['Category']])->toarray();
		$this->set(compact('article'));	
			}else{
		$article= $this->Articles->find('all')->contain(['Language','Catelang'=> ['Category']])->toarray();
		$this->set(compact('article'));
	}
		if( $this->request->data['articlesearch']!=''){
			$article=array();
			$this->set(compact('article'));
		}
		
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
