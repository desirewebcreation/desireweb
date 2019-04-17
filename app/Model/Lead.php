<?php
App::uses('AppModel', 'Model');
/**
 * Lead Model
 *
 * @property Sources $Sources
 * @property Users $Users
 * @property Countries $Countries
 * @property Currencies $Currencies
 * @property Clients $Clients
 * @property Campaigns $Campaigns
 * @property Statuses $Statuses
 */
class Lead extends AppModel {
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
		'Req' => array(
			'multiple' => array(
				'rule' => array('multiple', array('min' => 1)),
				'message' => 'You need to select at least one req',
				'required' => true,
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
		'Source' => array(
			'className' => 'Sources',
			'foreignKey' => 'sources_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'Users',
			'foreignKey' => 'users_id',
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
		'Currency' => array(
			'className' => 'Currencies',
			'foreignKey' => 'currencies_id',
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
		
		
		'Campaign' => array(
			'className' => 'Campaigns',
			'foreignKey' => 'campaigns_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Status' => array(
			'className' => 'Statuses',
			'foreignKey' => 'statuses_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Region' => array(
			'className' => 'Regions',
			'foreignKey' => 'region_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'LeadGroup' => array(
			'className' => 'LeadGroup',
			'foreignKey' => 'lead_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
		
		
		
		
	);
	
	
	/**
	 * hasMany associations
	 *
	 * @var array
	 * AA - LeadAction- Action Likn breaks if enable it
	public $hasMany = array(
			'LeadAction' => array(
					'className' => 'LeadActions',
					'foreignKey' => 'lead_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);*/
        
/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	public $hasAndBelongsToMany = array(
		'Req' => array(
			'className' => 'Req',
			'joinTable' => 'leads_reqs',
			'foreignKey' => 'lead_id',
			'associationForeignKey' => 'req_id',
			'unique' => 'keepExisting',
		),
             'ProjectType' => array(
			'className' => 'ProjectType',
			'joinTable' => 'lead_project_types',
			'foreignKey' => 'leads_id',
			'associationForeignKey' => 'project_types_id',
			'unique' => 'keepExisting',
		)
	);
	
      
/**
 * Transforms the data array to save the HABTM relation
 */
	public function beforeSave($options = array()){
		foreach (array_keys($this->hasAndBelongsToMany) as $model){
			if(isset($this->data[$this->name][$model])){
				$this->data[$model][$model] = $this->data[$this->name][$model];
				unset($this->data[$this->name][$model]);
			}
		}
		return true;
	}
        
public function getClientNameByLeadId($lead_id){
	$query = $this->query("SELECT clients.company_name FROM leads,clients WHERE leads.clients_id = clients.id and leads.id=".$lead_id."");
	$clientName = $query[0]['clients']['company_name'];
	return $clientName;
}

public function doneTodayFUEandFUC($actionOwnerId, $currentDate){  
    $query = $this->query("SELECT `LeadAction`.*,`Action`.`title` as actionTitle,`Client`.`company_name` as clientCompany,`Statuse`.`description` as statusTitle, CONCAT(`User`.`first_name`, ' ' ,`User`.`last_name`) as userFullName FROM `lead_actions` AS `LeadAction` 
    LEFT JOIN `actions` AS `Action` ON (`LeadAction`.`lead_action_id` = `Action`.`id`)
    LEFT JOIN `leads` AS `Lead` ON (`LeadAction`.`lead_id` = `Lead`.`id`) 
    LEFT JOIN `clients` AS `Client` ON (`Lead`.`clients_id` = `Client`.`id`)
    LEFT JOIN `statuses` AS `Statuse` ON (`Lead`.`statuses_id` = `Statuse`.`id`)
    LEFT JOIN `users` AS `User` ON (`Lead`.`users_id` = `User`.`id`)
    WHERE `LeadAction`.`lead_action_id` IN(9,10) AND `LeadAction`.`owner_id`= ".$actionOwnerId." AND `LeadAction`.`status` IN('Completed','Open') AND `LeadAction`.`created` != `LeadAction`.`modified` AND date(`LeadAction`.`modified`)= '".$currentDate."'
    ORDER BY `LeadAction`.`modified` DESC");  
 return $query;   
}
public function doneTodayOthers($actionOwnerId, $currentDate){  
    $query = $this->query("SELECT `LeadAction`.*,`Action`.`title` as actionTitle,`Client`.`company_name` as clientCompany,`Statuse`.`description` as statusTitle, CONCAT(`User`.`first_name`, ' ' ,`User`.`last_name`) as userFullName FROM `lead_actions` AS `LeadAction` 
    LEFT JOIN `actions` AS `Action` ON (`LeadAction`.`lead_action_id` = `Action`.`id`)
    LEFT JOIN `leads` AS `Lead` ON (`LeadAction`.`lead_id` = `Lead`.`id`) 
    LEFT JOIN `clients` AS `Client` ON (`Lead`.`clients_id` = `Client`.`id`)
    LEFT JOIN `statuses` AS `Statuse` ON (`Lead`.`statuses_id` = `Statuse`.`id`)
    LEFT JOIN `users` AS `User` ON (`Lead`.`users_id` = `User`.`id`)
    WHERE `LeadAction`.`lead_action_id` NOT IN(9,10) AND `LeadAction`.`owner_id`= ".$actionOwnerId." AND `LeadAction`.`status` IN('Completed','Open') AND `LeadAction`.`created` != `LeadAction`.`modified` AND date(`LeadAction`.`modified`)= '".$currentDate."'
    ORDER BY `LeadAction`.`modified` DESC");  
 return $query;   
}	
	
}