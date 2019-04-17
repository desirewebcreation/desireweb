<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property UserGroup $UserGroup
 * @property LoginToken $LoginToken
 */
class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */     public $displayField = 'first_name';
	public $validate = array(
		'active' => array(
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
		'UserGroup' => array(
			'className' => 'UserGroup',
			'foreignKey' => 'user_group_id',
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
	public $hasMany = array(
		'LoginToken' => array(
			'className' => 'LoginToken',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

  public function fetchdata($loginid,$hotlead)
    {
    
     $q= $this->query("select *from leads where id in 
(select  id from status_project_types where lead_id in
(select id from leads where users_id='".$loginid."') and status_id='".$hotlead."') ORDER by created DESC LIMIT 5");

    
    return $q;
    
  
    }
 public function getUserEmail($userId){
    $findEmail = $this->find('first', array(
                                            'conditions' => array('User.id' => $userId),
                                            'recursive'=>1,
                                            'fields'=>array('User.email')
                                    ));
  return $findEmail['User']['email'];
    
}
public function getUserName($userId){
    $findName = $this->find('first', array(
                                            'conditions' => array('User.id' => $userId),
                                            'recursive'=>1,
                                            'fields'=>array('User.first_name','User.last_name')
                                    ));
  return $findName['User']['first_name'].' '.$findName['User']['last_name'];
    
}           
        
}
