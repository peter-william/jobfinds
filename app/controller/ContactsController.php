
		<?php 

class ContactsController extends AppController{
	

public $helpers = array('GoogleMap');
//controller for contact
		
		public function contact(){
			
			if($this->request->is('post')){
			$data =$this->Contact->save($this->request->data);
				print_r($data);
			if($this->Contact->save($this->request->data)){
				
				$this->Session->setFlash(__('Your Message has been received. We will contact you shortly!!'));
				return $this->redirect(array('controller'=>'jobs','action'=>'index'));
			}
			
			$this->Session->setFlash(
			__('There was a problem creating your account')
			);
			
		}
			
		}
		}
	
