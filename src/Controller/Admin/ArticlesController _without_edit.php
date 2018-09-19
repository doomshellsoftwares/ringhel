<?php

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\DefaultPasswordHasher;


class ArticlesController extends AppController
{
	//$this->loadcomponent('Session');
	public function initialize(){	
		parent::initialize();
	}
	public function index(){ 
		$this->loadModel('Articles');
		$this->loadModel('Category');
		$this->loadModel('Language'); 
		$this->loadModel('Catelang'); 
$article= $this->Category->find('all')->toarray();
//pr($article); die;
		$article= $this->Articles->find('all')->contain(['Language','Catelang'=> ['Category']])->toarray();

		$this->set(compact('article'));

	}
	public function add($id=null){ 

		$this->loadModel('Articles');
		$this->loadModel('Category');
		$this->loadModel('Language');

		$category= $this->Category->find('list')->where(['Category.parent_id' =>0])->toarray();
		$this->set(compact('category'));

		$language= $this->Language->find('list')->where(['Language.status' => 'Y'])->order(['created' => 'DESC'])->toarray();
		$this->set(compact('language'));
		/*
		$articlesres = $this->Articles->get($id);

$this->loadModel('Catelang'); 

		$category= $this->Catelang->find('list')->where(['Catelang.id' =>$articlesres['cat_id']])->toarray();
		$this->set('category', $category);
		
		$state= $this->Catelang->find('list')->where(['Catelang.id' =>$articlesres['subcat_id']])->toarray();
		$this->set('state', $state);*/

		if(isset($id) && !empty($id)){
			$articles = $this->Articles->get($id);
		}else{
			$articles = $this->Articles->newEntity();
		}

		if ($this->request->is(['post', 'put'])) {
			try { 
//pr($articles); die;
				$this->request->data['role_id']=2;
				$transports = $this->Articles->patchEntity($articles, $this->request->data);
				//pr($transports); die;
				if ($resu=$this->Articles->save($transports)) {
					$this->Flash->success(__('Articles  has been saved.'));
					return $this->redirect(['action' => 'index']);
				}
			}
			catch (\PDOException $e) {

				$this->Flash->error(__('Articles  Already Exits'));
				$this->set('error', $error);
				return $this->redirect(['action' => 'add']);
			}
		}
		$this->set('articles', $articles);
	}


	public function status($id,$status){ 

		$this->loadModel('Articles');
		if(isset($id) && !empty($id)){
			if($status =='Y' ){

				$status = 'Y';
				$user = $this->Articles->get($id);
				$user->status = $status;
				if ($this->Articles->save($user)) {
					$this->Flash->success(__('Articles status has been updated.'));
					return $this->redirect(['action' => 'index']);  
				}

			}else{
				$status = 'N';
				$user = $this->Articles->get($id);
				$user->status = $status;
				if ($this->Articles->save($user)) {
					$this->Flash->success(__('Articles status has been updated.'));
					return $this->redirect(['action' => 'index']);  

				}
			}
		}
	}

	public function delete($id){ 
		$this->loadModel('Articles');
                   // pr($this->Users->get($id)); die;
		$user = $this->Articles->get($id);

		if ($this->Articles->delete($user)) {
			$this->Flash->success(__('The Articles with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	} 



	public function get_subcat(){
		
		$this->loadModel('Catelang');
		$id=$this->request->data['cat_id'];
		$ab=$this->Catelang->find('all')->where(['Catelang.id'=>$id])->first();

		$ab=$this->Catelang->find('list')->where(['Catelang.langselect'=> $ab['cat_id']])->toarray();
		header('Content-Type: application/json');
		echo json_encode($ab);
		die;
	}


	public function get_langcat(){

		$this->loadModel('Catelang');
		$ids=$this->request->data['lang_id'];
		
		$abs=$this->Catelang->find('list')->where(['Catelang.lang_id'=>$ids,'Catelang.langselect'=>0])->toarray(); 
		header('Content-Type: application/json');
		echo json_encode($abs);
		die;
	}


}