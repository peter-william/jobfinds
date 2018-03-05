<?php 

App::uses('AppModel', 'Model');

class Contact extends AppModel {
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A name is required'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A email is required'
            )
        ),
		'subject' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A subject is required'
            )
        ),
		'message' => array(
            'required' => array(
                'rule' => 'notEmpty',
                'message' => 'A message is required'
            )
        )
    );
}
	



