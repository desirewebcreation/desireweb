<?php
App::uses('AppModel', 'Model');
/**
 * StatusProjectType Model
 *
 * @property Lead $Lead
 * @property Status $Status
 */
class StatusProjectType extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Lead' => array(
			'className' => 'Lead',
			'foreignKey' => 'lead_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Status' => array(
			'className' => 'Status',
			'foreignKey' => 'status_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
