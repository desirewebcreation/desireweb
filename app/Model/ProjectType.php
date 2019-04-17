<?php

App::uses('AppModel', 'Model');

/**

 * ProjectType Model

 *

 */

class ProjectType extends AppModel {



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
     
public function getProjectTypeByLeadId($lead_id){ 
   
    $query = $this->query("SELECT `ProjectType`.`id`, `ProjectType`.`description` FROM `crmnibir_crm_live`.`project_types` AS `ProjectType` JOIN `crmnibir_crm_live`.`lead_project_types` AS `LeadProjectType` ON (`LeadProjectType`.`leads_id` IN (".$lead_id.") AND `LeadProjectType`.`project_types_id` = `ProjectType`.`id`) ORDER BY `LeadProjectType`.`id` ASC");
    
    return $query;  
  
    
}
}

