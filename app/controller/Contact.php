		
		<?php 

class ContactsController extends AppController{
	
public $helpers = array('Html','Form');


//controller for contact
		
		public function contact(){
			
			if($this->request->is('post')){
			
			$this->Contact->number($this->request->data['Contact']);
			
		}
		}
	
	
	
}
