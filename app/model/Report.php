<?php 
class Report extends AppModel{
public $validate = array(
    'report' => array(
        'rule1' => array(
            'rule'    => array(
            'extension',array('pdf')),
            'message' => 'Please upload pdf file only'
         ),
        'rule2' => array(
            'rule'    => array('fileSize', '<=', '1MB'),
            'message' => 'File must be less than 1MB'
        )
    )
);
}
?>
