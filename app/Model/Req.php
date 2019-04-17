<?php
App::uses('AppModel', 'Model');
/**
 * ReqModel
 *
 */
class Req extends AppModel {
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'description';

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
	
	/* public $belongsTo = array(
			'Lead' => array(
					'className' => 'Leads',
					'foreignKey' => 'sources_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	); */
}
