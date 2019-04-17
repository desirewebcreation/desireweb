<?php
App::uses('AppModel', 'Model');
/**
 * SalesDoc Model
 *
 * @property Currencies $Currencies
 * @property MasterDocs $MasterDocs
 */
class SalesDoc extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';
var $actsAs = array(
    'MeioUpload' => array(
        
        /*'picture' => array(
            'dir' => 'img{DS}{model}{DS}{field}',
            'create_directory' => true,
            'allowed_mime' => array('image/jpeg','image/pjpeg', 'image/png'),
            'allowed_ext' => array('.jpg', '.jpeg', '.png'),
            'thumbsizes' => array(
            'normal' => array('width'=>200, 'height'=>200),
            ),
            'default' => 'default.jpg',
			'max_size' => '1 Mb',
        ),*/
	    'url' => array(
            'dir' => 'uploads{DS}{model}{DS}{field}',
            'create_directory' => true,
            'allowed_mime' => array('text/plain','application/pdf','application/msword','application/vnd.ms-excel','application/vnd.ms-powerpoint'),
            'allowed_ext' => array('.txt', '.pdf', '.doc','.docx','.xls','.xlsx','.ppt','.pptx'),
            'default' => '',
	    'max_size' => '100 Mb',
        )
    )
);
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Currency' => array(
			'className' => 'Currencies',
			'foreignKey' => 'currencies_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MasterDoc' => array(
			'className' => 'MasterDocs',
			'foreignKey' => 'master_docs_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
                'Createdby' => array(
			'className' => 'User',
			'foreignKey' => 'created_by',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'dependent'=>false
		),
		'Modifiedby' => array(
			'className' => 'User',
			'foreignKey' => 'modified_by',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'dependent'=>false
		),
	);
}
