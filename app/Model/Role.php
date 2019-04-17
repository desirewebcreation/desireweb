<?php
App::uses('AppModel', 'Model');
/**
 * Status Model
 *
 */
class Role extends AppModel {

	public $actsAs = array('Acl' => array('type' => 'requester'));
	
	public function parentNode() {
		return null;
	}
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'description' => array(
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
}
