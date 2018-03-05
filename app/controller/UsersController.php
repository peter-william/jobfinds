
<?php 
	
	 //App::uses('AppController', 'Controller');
//App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class UsersController extends AppController{

 var $components=array("Email","Session");
var $helpers=array("Html","Form","Session");  


	
	public function register(){
		
		if($this->request->is('post')){
			
			$this->User->create();
			
			if($this->User->save($this->request->data)){
				$this->Session->setFlash(__('You are now registered and may login'));
				return $this->redirect(array('controller'=>'jobs','action'=>'index'));
			}
			
			$this->Session->setFlash(
			__('There was a problem creating your account')
			);
			
		}
	}
	
	
		
	
	// login user_error
	
	public function login(){
		if($this->request->is('post')){
			
			if($this->Auth->login()){
				return $this->redirect($this->Auth->redirect());
				
			}
			
			
			$this->Session->setFlash(__('Invalid username or password, try again'));
			
			
		}
		
		
	}
	

	 
	 function forgetpwd(){
		//$this->layout="signup";
		$this->User->recursive=-1;
		
		 
		if(!empty($this->data))
		{
			if(empty($this->data['User']['email']))
			{
				$this->Session->setFlash('Please Provide Your Email Adress that You used to Register with Us');
			}
			else
			{
				$email=$this->data['User']['email'];
				$fu=$this->User->find('first',array('conditions'=>array('User.email'=>$email)));
				if($fu)
				{
					//debug($fu);
					
					
						$key = Security::hash(String::uuid(),'sha512',true);
						$hash=sha1($fu['User']['username'].rand(0,100));
						$url = Router::url( array('controller'=>'users','action'=>'reset'), true ).'/'.$key.'#'.$hash;
						$ms=$url;
						$ms=wordwrap($ms,1000);
						//debug($url);
						$fu['User']['tokenhash']=$key;
						$this->User->id=$fu['User']['id'];
						if($this->User->saveField('tokenhash',$fu['User']['tokenhash'])){
 

							  $this->Email->smtpOptions = array(
							  'host' => 'ssl://smtp.gmail.com',
  'port' => 465,
  'username' => 'ajithkumar201114@gmail.com',
  'password' => 'shanthisuresh',
   'transport' => 'Smtp',
  'timeout' => 30,
 'context' => [
'ssl' => [
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed '=> true
]]

  );  

							 $this->Email->template = 'resetpw';
							$this->Email->from    = 'william@ktu.edu';
							$this->Email->to      = $fu['User']['email'];
							$this->Email->subject = 'Reset Your jobfinds Password';
							$this->Email->sendAs = 'both';
 
								$this->Email->delivery = 'smtp';
								$this->set('ms', $ms);
								$this->Email->send('hello');
								$this->set('smtp_errors', $this->Email->smtpError);
							$this->Session->setFlash(__('Check Your Email To Reset your password', true));  
 
							//============EndEmail=============//
						}
						else{
							$this->Session->setFlash("Error Generating Reset link");
						}
					
				}
				else
				{
					$this->Session->setFlash('Email does Not Exist');
				}
			}
		} 
	}
	
	
	
function reset($token=null){
		//$this->layout="Login";
		$this->User->recursive=-1;
		if(!empty($token)){
			$u=$this->User->findBytokenhash($token);
			if($u){
				$this->User->id=$u['User']['id'];
				if(!empty($this->data)){
					$this->User->data=$this->data;
					$this->User->data['User']['username']=$u['User']['username'];
					$new_hash=sha1($u['User']['username'].rand(0,100));//created token
					$this->User->data['User']['tokenhash']=$new_hash;
					if($this->User->validates(array('fieldList'=>array('password','password_confirm')))){
						if($this->User->save($this->User->data,false))
						{
							$this->Session->setFlash(__('Password has been updated.'), 'default', array('class' => 'alert alert-success'));
                        
							//$this->Session->setFlash('Password Has been Updated');
							$this->redirect(array('controller'=>'users','action'=>'login'));
						}
 
					}
					else{
 
						$this->set('errors',$this->User->invalidFields());
					}
				}
			}
			else
			{
				$this->Session->setFlash('Token Corrupted,,Please Retry.the reset link work only for once.');
			}
		}
 
		else{
			$this->redirect('/');
		}
		
}
		
	


	
	

	public function logout(){
		
		return $this->redirect($this->Auth->logout());
		
	}
	
}
	
	
	
	


	
	

