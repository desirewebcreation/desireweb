<?php
App::uses('AppModel', 'Model');
/**
 * PortfolioLink Model
 *
 * @property Currencies $Currencies
 * @property Countries $Countries
 * @property Clients $Clients
 */
class PortfolioLink extends AppModel {

/**
 * Display field
 *
 * @var string
 */
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
		'Country' => array(
			'className' => 'Countries',
			'foreignKey' => 'countries_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Client' => array(
			'className' => 'Clients',
			'foreignKey' => 'clients_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),'Createdby' => array(
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
