<?php

namespace App\Controller\Admin;
use App\Controller\AppController;
use Cake\Core\Configure; 
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\Auth\DefaultPasswordHasher;


class InternalController extends AppController
{
	//$this->loadcomponent('Session');
//	public $paginate = ['where'=>['Users.role_id'=>2],'limit' => 50,'order' => ['Users.id' => 'asc']];
	public function initialize(){	
		//load all models
		parent::initialize();
	}
	public  function _setPassword($password)
	{
		return (new DefaultPasswordHasher)->hash($password);
	}

	public function index(){ 
		$this->loadModel('Users');

		$this->loadModel('Language'); 

		$users= $this->Users->find('all')->where(['Users.status' => 'Y','Users.role_id'=>2])->order(['created' => 'DESC'])->toarray();
		//$this->paginate = ['contain' => ['Language'],'order' => ['Users.id' => 'desc']];
		//$users = $this->paginate($this->Users);
//pr($users); die;
		$this->set("users",$users);
	}

	public function add($id=null){ 

		$this->loadModel('Users');
		//$this->loadModel('Internal'); 
		$this->loadModel('Language'); 
		
		$language= $this->Language->find('list')->where(['Language.status' => 'Y'])->order(['created' => 'DESC'])->toarray();
		$this->set(compact('language'));

		if(isset($id) && !empty($id)){
			$internal = $this->Users->get($id);
		}else{
			$internal = $this->Users->newEntity();
		}

		if ($this->request->is(['post', 'put'])) {

			try { 	
				$this->request->data['role_id']=2;
				$ranpassword=$this->randomPassword();
				$this->request->data['cpassword']=$ranpassword;
				$this->request->data['password']= $this->_setPassword($ranpassword);
				$transports = $this->Users->patchEntity($internal, $this->request->data);
				//pr($transports); die;

				if ($res=$this->Users->save($transports)) {
					  /*sending email start */
	    $this->loadmodel('Templates');
	    $profile = $this->Templates->find('all')->where(['Templates.id' =>SUBSCRIPATION])->first();
	 
	    $subject = $profile['subject'];
	    $from= $profile['from'];
	    $fromname = $profile['fromname'];
	    $name = $res['name'];
	    $email = $res['email'];
	    $password = $res['cpassword'];
	    $to  = $email;
	    $formats=$profile['description'];
	    $site_url=SITE_URL;
	    $message1 = str_replace(array('{Name}','{Email}','{Password}','{site_url}','{Useractivation}'), array($name,$email,$password,$site_url), $formats);
	    $message = stripslashes($message1);
	    $message='
	    <!DOCTYPE HTML>
	    <html>
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Mail</title>
        </head>
<body style="padding:0px; margin:0px;font-family:Arial,Helvetica,sans-serif; font-size:13px;">
        '.$message1.'
        </body>
</html>
	    ';	
	    $headers = 'MIME-Version: 1.0' . "\r\n";
	    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	    //$headers .= 'To: <'.$to.'>' . "\r\n";
	    $headers .= 'From: '.$fromname.' <'.$from.'>' . "\r\n";
	    $emailcheck= mail($to, $subject, $message, $headers);



	 /*   sending email end */
					
					
					
					
					$this->Flash->success(__('Internal User  has been saved.'));
					return $this->redirect(['action' => 'index']);
				}
			}
			catch (\PDOException $e) {

				$this->Flash->error(__('User Name Already Exits'));
				$this->set('error', $error);
				return $this->redirect(['action' => 'add']);
			}
		}
		$this->set('internal', $internal);
	} 



	public function randomPassword() {
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
	    $pass = array(); //remember to declare $pass as an array
	    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
	    for ($i = 0; $i < 8; $i++) {
	    	$n = rand(0, $alphaLength);
	    	$pass[] = $alphabet[$n];
	    }
	    return implode($pass); //turn the array into a string
	} 	


	

	public function status($id,$status){ 

		$this->loadModel('Users');
		if(isset($id) && !empty($id)){
			if($status =='Y' ){

				$status = 'Y';
				$user = $this->Users->get($id);
				$user->status = $status;
				if ($this->Users->save($user)) {
					$this->Flash->success(__('Internal status has been updated.'));
					return $this->redirect(['action' => 'index']);  
				}

			}else{
				$status = 'N';
				$user = $this->Users->get($id);
				$user->status = $status;
				if ($this->Users->save($user)) {
					$this->Flash->success(__('Internal status has been updated.'));
					return $this->redirect(['action' => 'index']);  

				}
			}
		}
	}

	public function delete($id){ 
		$this->loadModel('Users');
                   // pr($this->Users->get($id)); die;
		$user = $this->Users->get($id);

		if ($this->Users->delete($user)) {
			$this->Flash->success(__('The Internal user with id: {0} has been deleted.', h($id)));
			return $this->redirect(['action' => 'index']);
		}
	}


public function bookmail($name,$email,$mobile){

echo $html='<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Mail</title>
</head>

<body style="padding:0px; margin:0px;text-align:center;background-color:#ffffff;">

<div style="width:600px; text-align:center;margin:auto;border:5px solid #d23c43;">
<div style=" padding-left:11px; padding-right:11px;">
<div style=" padding-top:11px;"><a href="javascript:void(0);"><img src="images/mail-to-logo.png"></a></div>

<div style=""><h6 style=" color:#686767; text-align:left; font-size:18px; font-family:Arial, Helvetica, sans-serif;">Hi<span style="color:#c2bebd;"> Nvouge</span>,</h6>
</div>


<div style="background:#f6f6f6; padding-top:01px; padding-left:10px; padding-right:10px;">
<div style=" padding-bottom:15px;"><h5 style="font-family:Arial, Helvetica, sans-serif; color:#686767; text-align:left; font-size:16px;border-bottom:2px solid #ececec;padding-bottom:10px; ">User Details:-</h5>

<table>
<tr>
<td style=" text-align:left;color:#01000d; line-height:28px;font-family:Arial, Helvetica, sans-serif;font-size:18px;">Name:-</td>
<td style=" color:#686767;line-height:28px;font-family:Arial, Helvetica, sans-serif;font-size:15px;text-align:justify;padding-left:35px;">'.$name.'</td>
</tr>

<tr>
<td style="text-align:left;line-height:28px;color:#01000d;font-family:Arial, Helvetica, sans-serif;font-size:18px;">Email Address:-</td>
<td style=" color:#686767;font-family:Arial, Helvetica, sans-serif;font-size:15px;text-align:justify;padding-left:35px;line-height:28px;">'.$email.'</td>
</tr>


<tr>
<td style="text-align:left;color:#01000d;line-height:28px;font-family:Arial, Helvetica, sans-serif;font-size:18px;">Phone no. :-</td>
<td style="font-size:15px; color:#686767;font-family:Arial, Helvetica, sans-serif;text-align:justify;padding-left:35px;line-height:28px;">'.$mobile.'</td>
</tr>

</table>
</div>
</div>


</body>
</html>
';


}


}
