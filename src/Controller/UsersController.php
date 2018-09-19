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
class UsersController extends AppController
{
	
	public function initialize()
	{
        parent::initialize();
       	$this->loadModel('Users');
        $this->Auth->allow(['login','forgotpassword','forgetcpass','_setPassword']);
    }
  // function used for set password in users table    
		 public  function _setPassword($password)
		{
			return (new DefaultPasswordHasher)->hash($password);
		}
	// function used for dupicate users login:
	public function login()
	{
		
		$redi= $this->Auth->redirectUrl();
		$this->set('redirecturl', $redi);
		if($this->request->data!=''){
		}else{
			session_start();
		}	
		if ($this->request->is('post')) 
		{
				
			$this->request->data['email']=$this->request->data['email']; 
			$user = $this->Auth->identify();
					if ($user) 
					{
						$this->Auth->setUser($user);
						$this->Flash->success(__('Login Successfully'));
					 return $this->redirect($this->request->data['redirecturl']);
					}
					else
					{
						$this->Flash->error(__('Invalid email or password, try again'));
						return $this->redirect(['controller' => 'users','action'=>'login']);
					}
		}
	}

    
    
    
    
// function for user logout    
public function logout()
	{
		if($this->Auth->logout())
		{
			return $this->redirect(['controller' => 'home','action'=>'home']);
		}

	}
    
    
    
    
    
    
    
    
    // function used for dupicate email check:
	public function findUsername($username = null)
	{
		$username=$this->request->data['username'];
		$user = $this->Users->find('all')->where(['Users.email' =>$username])->toArray();
		echo $user[0]['id'];
		die;
	}
    
    
    public function forgotpassword(){
		 $this->loadModel('Users');
if($this->request->is('post')) {

$email=$this->request->data['email'];
$to=$email;
$useremail=$this->Users->find('all')->where(['Users.email' =>$email])->first(); 
if(count($useremail)==0){
$this->Flash->error(__('Invalid email or password, try again'));
		    return $this->redirect(['controller' => 'users','action'=>'forgotpassword']);
}else{
    $userid=$useremail['id'];
    $name=$useremail['name'];
    $site_url=SITE_URL;
    $fkey=rand(1,10000);
 
    $Pack = $this->Users->get($userid);
    $Pack->fkey = $fkey;
    $this->Users->save($Pack);
    $mid=base64_encode(base64_encode($userid.'/'.$fkey));
    $url=SITE_URL."users/forget_cpass/".$mid;
    $this->loadmodel('Templates');
    $profile = $this->Templates->find('all')->where(['Templates.id' =>FORGOTPASSWORD])->first();
    $subject = $profile['subject'];
   
    $from= $profile['from'];
    $fromname = $profile['fromname'];
    $to  = $email;
    $formats=$profile['description'];
    $site_url=SITE_URL;

    $message1 = str_replace(array('{Name}','{site_url}','{url}'), array($name,$site_url,$url), $formats);
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
    $this->Flash->success(__('Forgot passowrd link sent to Your Email'));
}
	
}}
    
    
     public function forgetcpass($mid='',$userid='')
    {
	// pr($userid); 
	if(!empty($userid))
	{
	    $id=$userid;   
	}
	else
	{    
	    $mix=explode("/",base64_decode(base64_decode($mid)));
	    $id=$mix[0];
	    $fkey=$mix[1];
	    $user=$this->Users->find('all')->select(['id', 'fkey'])->where(['Users.id' =>$id])->first(); 
	    $usrfkey=$user['fkey'];
	    if($usrfkey==$fkey)
	    {
		$ftyp=1;
	    }
	    else
	    {
		$ftyp=0;
	    }
	    $this->set('ftyp',$ftyp);
	    $this->set('usrid',$id);
	}     
	if($this->request->is('post')) {
	    //	pr($this->request->data); die;
	    $Pack = $this->Users->get($id);
	    $updpass = $this->_setPassword($this->request->data['password']);
	    $Pack->password = $updpass;
	    if ($this->Users->save($Pack)) {
		$Pack = $this->Users->get($id);
		$Pack->fkey =0;
		$this->Users->save($Pack);
		$useremail= $this->Users->find('all')->where(['Users.id' =>$id])->first(); 
		//pr($useremail); die;
		//$this->User->find('first',array('fields'=>array('username','name','sname'),'recursive'=>-1,'conditions'=>array('User.id'=>$id)));
		$email=$useremail['email'];
		 $name=$useremail['name'];
		$password=$this->request->data['password'];
		$this->loadmodel('Templates');
		$profile = $this->Templates->find('all')->where(['Templates.id' =>FORGOTPASSWORDCHANGED])->first();
		$subject = $useremail['subject'];
		$from= $useremail['from'];
		$fromname = $useremail['fromname'];
		$to  = $email;
		$formats=$profile['description'];
		$site_url=SITE_URL;
		$message1 = str_replace(array('{Name}','{Email}','{Password}','{site_url}'), array($name,$email,$password,$site_url), $formats);
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
		pr($message); die;
		$headers = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		//$headers .= 'To: <'.$to.'>' . "\r\n";
		$headers .= 'From: '.$fromname.' <'.$from.'>' . "\r\n";
		$emailcheck= mail($to, $subject, $message, $headers);
		$this->redirect(array('action'=>'logindemo/'.$email.'/'.$pass));
	    }
	}
    }
    
    
    
}
