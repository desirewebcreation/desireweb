<?php
App::uses('AppModel', 'Model');
/**
 * LeadProjectType Model
 *
 * @property Leads $Leads
 * @property ProjectTypes $ProjectTypes
 */
class LeadProjectType extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'leads_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'project_types_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
	'Lead' => array(
			'className' => 'Leads',
			'foreignKey' => 'leads_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'dependent'=>false
		),
		'ProjectType' => array(
			'className' => 'ProjectTypes',
			'foreignKey' => 'project_types_id',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'dependent'=>false
		)
	);
}
