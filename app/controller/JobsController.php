<?php 

class JobsController extends AppController{
	public $name = 'Jobs';
	
public $helpers = array('Html','Form');




	
	
	// Default Index Method
	public function index(){
		
		
		
		//set Category query options
		$options =array(
		'order' =>array('Category.name' =>'asc'),
		
		);
		
		//Get categories
		$categories = $this->Job->Category->find('all',$options);
		
		//Set Categories
		$this->set('categories', $categories);
		
		//set query options
		$options =array(
		'order' =>array('Job.created' =>'DESC'),
		'limit'=>10
		);
		
		
		//Get job info 
		
	$jobs=$this->Job->find('all',$options);
	$this->set('jobs',$jobs);
	
	//set title
	
	$this->set('title_for_layout','JobFinds | Welcome');
	
	}
	
	
	
	function sanitize($string, $force_lowercase = true, $anal = false) {
    $strip = array("~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "(", ")", "_", "=", "+", "[", "{", "]","}", "\\", "|", ";", ":", "\"", "'", "&#8216;", "&#8217;", "&#8220;", "&#8221;", "&#8211;", "&#8212;","â€”", "â€“", ",", "<",">", "/", "?");
    $clean = trim(str_replace($strip, "", strip_tags($string)));
    $clean = preg_replace('/\s+/', "-", $clean);
    $clean = ($anal) ? preg_replace("/[^a-zA-Z0-9]/", "", $clean) : $clean ;
    return ($force_lowercase) ?
        (function_exists('mb_strtolower')) ?
            mb_strtolower($clean, 'UTF-8') :
            strtolower($clean) :
        $clean;
}
	
	
	  
	

 

	  
   
	
	
	public function browse($category = null){
		
		// Initial condition array
		$conditions = array();
		
		//check keyword filter
		if($this->request->is('post')){
			if(!empty($this->request->data('keywords'))){
				$conditions[] = array('OR' =>array(
				'Job.title LIKE' => "%" . $this->request->data('keywords') . "%" ,
				'Job.description LIKE' => "%" . $this->request->data('keywords') . "%"  
				
				));
			}
			
		}
		// state filter
		if(!empty($this->request->data('state')) &&($this->request->data('state') != 'Select State')){
				$conditions[] = array('OR' =>array(
				'Job.state LIKE' => "%" . $this->request->data('state') . "%" 
				
				
				));
			}
		// category filter
		if(!empty($this->request->data('category')) &&($this->request->data('category') != 'Select Category')){
				$conditions[] = array('OR' =>array(
				'Job.category_id LIKE' => "%" . $this->request->data('category') . "%" ,
				
				
				));
			}
		
		
		//set Category query options
		$options =array(
		'order' =>array('Category.name' =>'asc'),
		
		);
		
		//Get categories
		$categories = $this->Job->Category->find('all',$options);
		
		//Set Categories
		$this->set('categories', $categories);
		
		
		
		if($category !=null){
			
		//match Category
      $conditions[] =array(
	  'Job.category_id LIKE' => "%" . $category . "%"
	  );
	  }
	  
	  //set query options
		$options =array(
		'order' =>array('Job.created' =>'desc'),
		'conditions' =>$conditions,
		'limit'=>8
		);
		
		//getjob info
	$jobs=$this->Job->find('all',$options);
	//set title
	
	$this->set('title_for_layout','JobfFinds | Browse for a Job');
	
	  $this->set('jobs',$jobs);
		
	}
	
	// view single jobs
	
	public function view($id){
		if(!id){
			throw new NotFoundException(_('Invalid job listing'));
		}
		$job =$this->Job->findById($id);
		if(!job){
			throw new NotFoundException(_('Invalid job listing'));
		}
		
		//set title
		$this->set('title_for_layout',$job['Job']['title']);
		$this->set('job',$job);
		
	}
	
	
	public function add(){
		//get Category for selected list
		$options =array(
		'order' =>array('Category.name' =>'asc')
		
		);
		//Get categories
		$categories = $this->Job->Category->find('list',$options);
		
		// set categories
		$this->set('categories',$categories);
		
		//Ger types for select list
		$types = $this->Job->Type->find('list');
		//set types
		
		$this->set('types',$types) ;
		
		if($this->request->is('post')){
			
			$this->Job->create();
			
			//Save Logged User Id
			$this->request->data['Job']['user_id']=$this->Auth->user('id');
			
			if($this->Job->save($this->request->data)){
				$this->Session->setFlash(__('Your job has been listed'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to add your jobs'));
		}
		
	}
	// edit a job
	
	public function edit($id){
		//get Category for selected list
		$options =array(
		'order' =>array('Category.name' =>'asc')
		
		);
		//Get categories
		$categories = $this->Job->Category->find('list',$options);
		
		// set categories
		$this->set('categories',$categories);
		
		//Ger types for select list
		$types = $this->Job->Type->find('list');
		//set types
		
		$this->set('types',$types) ;
		
		if(!$id){
			throw new NotFoundException(__('Invalid job listing'));
		}
		$job =$this->Job->findById($id);
		
		if(!$job){
			throw new NotFoundException(__('Invalid job listing'));
		}
		
		if($this->request->is(array('job','put'))){
			
			$this->Job->id=$id;
			
			
			if($this->Job->save($this->request->data)){
				$this->Session->setFlash(__('Your job has been updated'));
				return $this->redirect(array('action'=>'index'));
			}
			$this->Session->setFlash(__('Unable to updated your jobs'));
		}
		if(!$this->request->data){
			$this->request->data=$job;
		}
		
	}
	
// delete a job
public function delete($id){
	if($this->request->is('get')){
		throw new MethodNotAllowedException();
	}
	
	if($this->Job->delete($id)){
		
		$this->Session->setFlash(
		__('The job with id: %s has been deleted. ',h($id))
		
		);
		return $this->redirect(array('action'=>'index'));
	}
}
	
	
	
}
