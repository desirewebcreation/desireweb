<?php
App::uses('AppModel', 'Model');
/**
 * Campaign Model
 *
 * @property CampaignTypes $CampaignTypes
 */
class Action extends AppModel {
	
	public $displayField = 'title';

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
		'type' => array(
			'notEmptyType' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'closing_action' => array(
			'notEmptyAction' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

	/* public $belongsTo = array(
			'LeadAction' => array(
					'className' => 'LeadActions',
					'foreignKey' => 'lead_action_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	); */
}
