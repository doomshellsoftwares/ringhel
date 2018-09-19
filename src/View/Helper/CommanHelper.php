<?php 
namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use Cake\ORM\TableRegistry;
class CommanHelper extends Helper
{

    // initialize() hook is available since 3.2. For prior versions you can
    // override the constructor if required.
    public function initialize(array $config)
    {

     
    }
     public function getCategorydetail($id)
    {
	
	$articles = TableRegistry::get('Category');
	
	return $articles->find('all')->where(['Category.status' => 'Y','Category.id' => $id])->first();
    }
  public function getsubcat($id)
    {
	
	$articles = TableRegistry::get('Catelang');
	
	return $articles->find('all')->where(['Catelang.id' => $id])->first();
    }
   
    public function meta($url){
      
$articles = TableRegistry::get('Seo');
    return $articles->find('all')->where(['Seo.pagelocation' => $url])->first();
    
    //return $articles->find('all')->where(['Seo.pagelocation' =>$url])->first()->toArray();

    }


 public function admindetail()
    {
    
    $articles = TableRegistry::get('Users'); 
    return $articles->find('all')->where(['Users.id' => 1])->first()->toArray();
    }
public function getlang()
    {
    
    $articles = TableRegistry::get('Language'); 
    return $articles->find('all')->toArray();
    }
    
    public function getsubcathome($langid,$catid)
    {
  
    $articles = TableRegistry::get('Catelang'); 
     if($_SESSION['langselect']['langid']!=''){
    return $articles->find('all')->where(['Catelang.lang_id' => $langid,'Catelang.langselect' => $catid])->toarray();
}else{
	
	    return $articles->find('all')->where(['Catelang.lang_id' =>10,'Catelang.langselect' => $catid])->toarray();

}
    }
    public function getcathome()
    {
    
    $articles = TableRegistry::get('Catelang'); 
    if($_SESSION['langselect']['langid']!=''){
	return $articles->find('all')->where(['Catelang.lang_id' =>$_SESSION['langselect']['langid'],'Catelang.langselect'=>0])->toarray();
    }else{
	return $articles->find('all')->where(['Catelang.lang_id' =>10,'Catelang.langselect'=>0])->toarray();
	}
    
    
    }
    
   
}
?>
