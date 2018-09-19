<?php

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Datasource\ConnectionManager;
use Cake\View\Helper\PaginatorHelper;


class CategoryController extends AppController
{
	//$this->loadcomponent('Session');
	public function initialize(){	
		//load all models
		parent::initialize();
	}
	public function index(){ 

       $this->loadModel('Category');
      //  $this->paginate = ['order' => ['Category.id' => 'asc']];
       $users = $this->paginate($this->Category);
       $this->set(compact('users'));
   }

   public function add($id=null){

    $this->loadModel('Category');
//add select type
    $useid=$this->Category->find('list')->where(['parent_id'=>'0'])->order(['Category.id' => 'asc'])->toarray();
    $this->set('names', $useid);
    $this->set(compact('names'));


    $cat = $this->Category->newEntity();
    if ($this->request->is(['post'])) {
// show flash error msg for 
        try { 
           if (empty($this->request->data['parent_id'])) {

            $this->request->data['parent_id']=0;
            $this->request->data['parint']=$this->request->data['name'];
            $transports = $this->Category->patchEntity($cat, $this->request->data);
            $resu=$this->Category->save($transports);
            
        }else{
            $this->request->data['parent_id']=$this->request->data['parent_id'];
            $this->request->data['parint']=$this->request->data['name'];
            $transports = $this->Category->patchEntity($cat, $this->request->data);
            $resu=$this->Category->save($transports);

        }
        $this->Flash->success(__('Category has been saved.'));
        return $this->redirect(['action' => 'index']);
    } 
    catch (\PDOException $e) {

        $this->Flash->error(__('Category Already Exits'));
        $this->set('error', $error);
        return $this->redirect(['action' => 'add']);
    }
}


}

public function edit($id=null){ 
    $this->loadModel('Category');
//edit parent category..
    $useid=$this->Category->find('list')->where(['parent_id'=>'0'])->order(['Category.id' => 'asc'])->toarray();
    $this->set('names', $useid);
    $this->set(compact('names'));

//edit sub category ..
    $cat = $this->Category->get($id);
    if ($this->request->is(['put'])) {

       if (empty($this->request->data['parent_id'])) {

        $this->request->data['parent_id']=0;
        $this->request->data['parint']=$this->request->data['name'];
        $transports = $this->Category->patchEntity($cat, $this->request->data);
        $resu=$this->Category->save($transports);
       
    }else{
        $this->request->data['parent_id']=$this->request->data['parent_id'];
        $this->request->data['parint']=$this->request->data['name'];
        $transports = $this->Category->patchEntity($cat, $this->request->data);
        $resu=$this->Category->save($transports);

    }

    
    $this->Flash->success(__('Category has been saved.'));
    return $this->redirect(['action' => 'index']);


}

$this->set('category', $cat);
}	

public function status($id,$status){ 

    $this->loadModel('Category');
    if(isset($id) && !empty($id)){
        if($status =='Y' ){

            $status = 'Y';
            $user = $this->Category->get($id);
            $user->status = $status;
            if ($this->Category->save($user)) {
                $this->Flash->success(__('Category status has been updated.'));
                return $this->redirect(['action' => 'index']);  
            }

        }else{
            $status = 'N';
            $user = $this->Category->get($id);
            $user->status = $status;
            if ($this->Category->save($user)) {
                $this->Flash->success(__('Category status has been updated.'));
                return $this->redirect(['action' => 'index']);  

            }
        }
    }
}

public function delete($id, $parent_id){ 
    $this->loadModel('Category');
    $this->loadModel('Articles');
    
    $user = $this->Category->get($id);

      $articles = $this->Articles->find('all')->where(['cat_id'=>$id])->count();
            $test = $this->Articles->find('all')->where(['subcat_id'=>$id])->count();

if ($articles>0 || $test>0) {

        $this->Flash->success(__('The Category with id: {0} has been not delete able. Because category included in article', h($id)));
        return $this->redirect(['action' => 'index']);

     }else{

       if($user['parent_id']==0){
        $conn = ConnectionManager::get('default');
        $frnds = "DELETE FROM `tbl_categories` WHERE  parent_id =".$user['id'];
        
        $friends = $conn->execute($frnds);
    }
 
    if ($this->Category->delete($user)) {
        $this->Flash->success(__('The Category with id: {0} has been deleted.', h($id)));
        return $this->redirect(['action' => 'index']);
    }
     }
}

//add caterogry language typs...
public function title_cat($id=null){
  $this->set('cat_id', $id);
  $this->loadModel('Category');
  $this->loadModel('Language');
  $this->loadModel('Catelang');

  $useid=$this->Category->find('all')->where(['id'=>$id])->first();
  $this->set('names', $useid);
  $this->set(compact('names'));

  $uselan=$this->Language->find('list')->where(['Language.status'=>'Y'])->order(['Language.id' => 'asc'])->toarray();
  $this->set('language', $uselan);
  $this->set(compact('language'));


  $articles = $this->Catelang->newEntity();

  if ($this->request->is(['post', 'put'])) {
try { 
if($useid['parent_id']==0){
	$this->request->data['langselect']=0;
}else{
		$this->request->data['langselect']=$useid['parent_id'];
//multipal relation with lanuage category and sub-category in article manager....
}

    $transports = $this->Catelang->patchEntity($articles, $this->request->data);
                //pr($transports); die;
    if ($resu=$this->Catelang->save($transports)) {
        $this->Flash->success(__('Catelang  has been saved.'));
        return $this->redirect(['action' => 'index']);
    }
}
catch (\PDOException $e) {

        $this->Flash->error(__('Category language  Already Exits'));
        $this->set('error', $error);
        return $this->redirect(['action' => 'index']);
      }
}

}
//Category languages info... 
public function info_cat($id=null){
  $this->set('cat_id', $id);
  $this->loadModel('Category');
  $this->loadModel('Language');
  $this->loadModel('Catelang');

  $catelang = $this->Catelang->find('all')->where(['cat_id'=>$id])->contain(['Category','Language'])->order(['Catelang.id' => 'DESC'])->toarray();
  $this->set('catelang', $catelang);

}

//delete Category langunage info....
public function delete_catinfo($id){ 
    $this->loadModel('Catelang');
    $userr = $this->Catelang->get($id);

    if ($this->Catelang->delete($userr)) {
        $this->Flash->success(__('The Language with id: {0} has been deleted.', h($id)));
        return $this->redirect(['action' => 'index']);
    }
}


}
