<?php
App::uses('AppModel', 'Model');
/**
 * Campaign Model
 *
 * @property CampaignTypes $CampaignTypes
 */
class LeadAction extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
		'owner_id' => array(
			'notEmpty' => array(
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

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		 
			'Action' => array(
					'className' => 'Actions',
					'foreignKey' => 'lead_action_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			),
				
			'Owner' => array(
					'className' => 'Users',
					'foreignKey' => 'owner_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			) 
	); 
	
	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	/* public $hasOne = array(
			'Action' => array(
					'className' => 'Actions',
					'foreignKey' => 'lead_action_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			), 
			
			'Owner' => array(
					'className' => 'Users',
					'foreignKey' => 'owner_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);
	 */
	
}
