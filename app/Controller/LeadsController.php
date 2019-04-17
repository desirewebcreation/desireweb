<?php
App::uses ( 'AppController', 'Controller' );
/**
 * Leads Controller
 *
 * @property Lead $Lead
 * @property PaginatorComponent $Paginator
 */
class LeadsController extends AppController {
	public $uses = array (
			'Lead',
			'Campaign',
			'Status',
			'CampaignType',
			'ProjectType',
			'LeadProjectType',
			'Client',
			'User',
			'Country',
			'StatusProjectType',
			'LeadAction',
			'Action',
                        'Region',
                        'LeadGroup'
	);
	
	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array (
			'Paginator',
			'Session',
			'RequestHandler' 
	);
	
	public function initialize() {
		parent::initialize ();
		$this->loadComponent ( 'RequestHandler' );
	}
	
	/**
	 * index method
	 *
	 * @return void
	 */
	public function index() {
	 	
		$this->Lead->recursive = 2;
		$loginid = $this->UserAuth->getUserId();
		$this->set ( 'loginid', $loginid );
		 
		
	//	$leads = $this->Lead->find ('all');
		
	//	$this->set ( 'leads', $leads );
		// $this->set('leads', $this->Paginator->paginate());
		
		// ////////////////////////////Search //////////////////////////////////////////////////////////////////
		
		$ProjectKeyword = isset ( $this->request->query ['ProjectKeywordValue'] ) ? $this->request->query ['ProjectKeywordValue'] : '';
		//$ClientName = isset ( $this->request->query ['ClientNameValue'] ) ? $this->request->query ['ClientNameValue'] : '';
                $ClientValue = isset ( $this->request->query ['ClientValue'] ) ? $this->request->query ['ClientValue'] : '';
		$Username = isset ( $this->request->query ['UsernameValue'] ) ? $this->request->query ['UsernameValue'] : '';
		$Creator = isset ( $this->request->query ['CreatorValue'] ) ? $this->request->query ['CreatorValue'] : '';
		
		$Country = isset ( $this->request->query ['CountryValue'] ) ? $this->request->query ['CountryValue'] : '';
		$Campaign = isset ( $this->request->query ['CampaignValue'] ) ? $this->request->query ['CampaignValue'] : '';
		// $Status = isset($this->request->query['Status']) ? $this->request->query['Status']:'';
		
		$Status = isset ( $this->request->query ['StatusValue'] ) ? $this->request->query ['StatusValue'] : '';
		$Region = isset ( $this->request->query ['RegionValue'] ) ? $this->request->query ['RegionValue'] : '';
                $LeadGroups = isset ( $this->request->query ['LeadGroupsValue'] ) ? $this->request->query ['LeadGroupsValue'] : '';
                $CreatedOn = isset ( $this->request->query ['CreatedOn'] ) ? $this->request->query ['CreatedOn'] : '';
		// print_r($this->request->query ['Status']);
		$queryStr = array ();
		
		if ($ProjectKeyword != "") {
			$queryStr [] = array (
					'OR' => array(
							array("Lead.title LIKE '%" . trim ( $ProjectKeyword ) . "%'"),
							array("Lead.tag LIKE '%" . trim ( $ProjectKeyword ) . "%'"), 
							array("Lead.id LIKE '%" . trim ( $ProjectKeyword ) . "%'"),
							array("Lead.requirement LIKE '%" . trim ( $ProjectKeyword ) . "%'"),
							array("Lead.scope LIKE '%" . trim ( $ProjectKeyword ) . "%'")
							//array("Client.company_name LIKE '%" . trim ( $ProjectKeyword ) . "%'")
					),
					  
					
			);
		}
		/*if ($ClientName != "") {
			$queryStr [] = array (
					"Lead.clients_id" => trim ( $ClientName ) 
			);
		}*/
                
                if ($ClientValue != "") {
			$queryStr [] = array (
                            'OR' => array(
                            array("Client.company_name LIKE '%" . trim ( $ClientValue ) . "%'"),
                            array("Client.email_address LIKE '%" . trim ( $ClientValue ) . "%'")
                            ),
					
			);
		}
		if ($Username != "") {
			$queryStr [] = array (
					"Lead.users_id" => trim ( $Username ) 
			);
		}
		if ($Creator != "") {
			$queryStr [] = array (
					"Lead.created_by" => trim ( $Creator )
			);
		}
		if ($Country != "") {
			$queryStr [] = array (
					"Lead.countries_id" => trim ( $Country ) 
			);
		}
		if ($Status != "") {
			
			$queryStr [] = array (
					"Lead.statuses_id " => $Status 
			);
		}
                
                if ($Region != "") {
			
			$queryStr [] = array (
					"Lead.region_id " => $Region 
			);
		}
                
                if ($LeadGroups != "") {
			
			$queryStr [] = array (
					"Lead.lead_group_id " => $LeadGroups 
			);
		}
		
		if ($Campaign != "") {
			$queryStr [] = array (
					"Lead.campaigns_id" => trim ( $Campaign ) 
			);
		}
		if ($CreatedOn != "") {
			$queryStr [] = array (
					"date(Lead.created)" => trim ( $CreatedOn ) 
			);
		}
		
		$this->Paginator->settings = array (
				
						'recursive'=>'2',
						'conditions' => array (
								'AND' => array (
										$queryStr 
								) 
						) ,
						'order' => array('modified'=> 'desc'), 
						'limit'=> 50
				
		); 
		
		$dataListClients = $this->Paginator->paginate();
		
		$this->set ( 'leads', $dataListClients );
		
		// /////////////////////////////////////////////////////////////
		
		
		$clientname = $this->Client->find ( 'list', array (
				'fields' => array (
						'id',
						'company_name' 
				) 
		) );
		$this->set ( 'clientname', $clientname );
		
		$username = $this->User->find ( 'list', array (
				'fields' => array (
						'id',
						'first_name' 
				) 
		) );
		$this->set ( 'username', $username );
		
		$country = $this->Country->find ( 'list', array (
				'fields' => array (
						'id',
						'name' 
				) 
		) );
		$this->set ( 'country', $country );
		
		$Campaign = $this->Campaign->find ( 'list', array (
				'fields' => array (
						'id',
						'title' 
				) 
		) );
		$this->set ( 'Campaign', $Campaign );
		
		$Status = $this->Status->find ( 'list', array (
				'fields' => array (
						'id',
						'description' 
				) 
		) );
		$this->set ( 'Status', $Status );
		$region = $this->Region->find ( 'list', array (
				'fields' => array (
						'id',
						'description' 
				) 
		) );
		$this->set ( 'region', $region );
                
                $leadgroup = $this->LeadGroup->find ( 'list', array (
				'fields' => array (
						'id',
						'description' 
				) 
		) );
		$this->set ( 'leadgroup', $leadgroup );
		// $this->LeadAction->find('all');
		
	}
	
	
	
	public function myLeads() {
		 
		$this->Lead->recursive = 2;
		$loginid = $this->UserAuth->getUserId();
		$this->set ( 'loginid', $loginid );
			
	
		//	$leads = $this->Lead->find ('all');
	
		//	$this->set ( 'leads', $leads );
		// $this->set('leads', $this->Paginator->paginate());
	
		// ////////////////////////////Search //////////////////////////////////////////////////////////////////
	
		$ProjectKeyword = isset ( $this->request->query ['ProjectKeywordValue'] ) ? $this->request->query ['ProjectKeywordValue'] : '';
		//$ClientName = isset ( $this->request->query ['ClientNameValue'] ) ? $this->request->query ['ClientNameValue'] : '';
		 $ClientValue = isset ( $this->request->query ['ClientValue'] ) ? $this->request->query ['ClientValue'] : '';
                $Creator = isset ( $this->request->query ['CreatorValue'] ) ? $this->request->query ['CreatorValue'] : '';
	
		$Country = isset ( $this->request->query ['CountryValue'] ) ? $this->request->query ['CountryValue'] : '';
		$Campaign = isset ( $this->request->query ['CampaignValue'] ) ? $this->request->query ['CampaignValue'] : '';
		// $Status = isset($this->request->query['Status']) ? $this->request->query['Status']:'';
	
		$Status = isset ( $this->request->query ['StatusValue'] ) ? $this->request->query ['StatusValue'] : '';
                $Status = isset ( $this->request->query ['StatusValue'] ) ? $this->request->query ['StatusValue'] : '';
		$Region = isset ( $this->request->query ['RegionValue'] ) ? $this->request->query ['RegionValue'] : '';
                $LeadGroups = isset ( $this->request->query ['LeadGroupsValue'] ) ? $this->request->query ['LeadGroupsValue'] : '';
                $CreatedOn = isset ( $this->request->query ['CreatedOn'] ) ? $this->request->query ['CreatedOn'] : '';
	
		// print_r($this->request->query ['Status']);
		$queryStr = $queryStr [] = array (
					"Lead.users_id" => $loginid
			);
	
		if ($ProjectKeyword != "") {
			$queryStr [] = array (
					'OR' => array(
							array("Lead.title LIKE '%" . trim ( $ProjectKeyword ) . "%'"),
							array("Lead.tag LIKE '%" . trim ( $ProjectKeyword ) . "%'"),
							array("Lead.id LIKE '%" . trim ( $ProjectKeyword ) . "%'"),
							array("Lead.requirement LIKE '%" . trim ( $ProjectKeyword ) . "%'"),
							array("Lead.scope LIKE '%" . trim ( $ProjectKeyword ) . "%'"),
							//array("Client.company_name LIKE '%" . trim ( $ProjectKeyword ) . "%'")
					),
						
						
			);
		}
		/*if ($ClientName != "") {
			$queryStr [] = array (
					"Lead.clients_id" => trim ( $ClientName ) 
			);
		}*/
                
                if ($ClientValue != "") {
			$queryStr [] = array (
                            'OR' => array(
                            array("Client.company_name LIKE '%" . trim ( $ClientValue ) . "%'"),
                            array("Client.email_address LIKE '%" . trim ( $ClientValue ) . "%'")
                            ),
					
			);
		}
		if ($Creator != "") {
			$queryStr [] = array (
					"Lead.created_by" => trim ( $Creator )
			);
		}
		if ($Country != "") {
			$queryStr [] = array (
					"Lead.countries_id" => trim ( $Country )
			);
		}
		if ($Status != "") {
				
			$queryStr [] = array (
					"Lead.statuses_id " => $Status
			);
		}
	
		if ($Region != "") {
			
			$queryStr [] = array (
					"Lead.region_id " => $Region 
			);
		}
                
                if ($LeadGroups != "") {
			
			$queryStr [] = array (
					"Lead.lead_group_id " => $LeadGroups 
			);
		}
		
		if ($Campaign != "") {
			$queryStr [] = array (
					"Lead.campaigns_id" => trim ( $Campaign ) 
			);
		}
		if ($CreatedOn != "") {
			$queryStr [] = array (
					"date(Lead.created)" => trim ( $CreatedOn ) 
			);
		}
	
	
		$this->Paginator->settings = array (
	
				'recursive'=>'2',
				'conditions' => array (
						'AND' => array (
								$queryStr
						)
				) ,
				'order' => array('modified'=> 'desc'),
				'limit'=> 50
	
		);
	
		$dataListClients = $this->Paginator->paginate();
	
		$this->set ( 'leads', $dataListClients );
	
		// /////////////////////////////////////////////////////////////
	
	
		$clientname = $this->Client->find ( 'list', array (
				'fields' => array (
						'id',
						'company_name'
				)
		) );
		$this->set ( 'clientname', $clientname );
	
		$username = $this->User->find ( 'list', array (
				'fields' => array (
						'id',
						'first_name'
				)
		) );
		$this->set ( 'username', $username );
	
		$country = $this->Country->find ( 'list', array (
				'fields' => array (
						'id',
						'name'
				)
		) );
		$this->set ( 'country', $country );
	
		$Campaign = $this->CampaignType->find ( 'list', array (
				'fields' => array (
						'id',
						'description'
				)
		) );
		$this->set ( 'Campaign', $Campaign );
	
		$Status = $this->Status->find ( 'list', array (
				'fields' => array (
						'id',
						'description'
				)
		) );
		$this->set ( 'Status', $Status );
	
	        $region = $this->Region->find ( 'list', array (
				'fields' => array (
						'id',
						'description' 
				) 
		) );
		$this->set ( 'region', $region );
                
                $leadgroup = $this->LeadGroup->find ( 'list', array (
				'fields' => array (
						'id',
						'description' 
				) 
		) );
		$this->set ( 'leadgroup', $leadgroup );
		// $this->LeadAction->find('all');
	
	}
	
        	public function doneToday() {
		 		
		$userId = $this->UserAuth->getUserId();
		$this->set ( 'loginid', $userId );
                 
                 $requestDate = isset ( $this->request->query ['action_done_on'] ) ? $this->request->query ['action_done_on'] : '';
                 if ($requestDate != "") {
                 $currentDate =  $requestDate;
                 }else{
                    $currentDate =  date('Y-m-d');
                 }
                 
                 
		$doneTodayOthers = $this->Lead->doneTodayOthers($userId,$currentDate);      
                
                 $k=0;
                foreach($doneTodayOthers as $doneTodayOthersvalue){
                $doneTodayOthers[$k]['LeadAction']['project_type'] = $this->ProjectType->getProjectTypeByLeadId($doneTodayOthersvalue['LeadAction']['lead_id']); 
                $k++;    
                }
                ### For fallow up call and Emails ###               
                $doneTodayFUCandFUE = $this->Lead->doneTodayFUEandFUC($userId,$currentDate);
                
              
                $j=0;
                foreach($doneTodayFUCandFUE as $doneTodayFUCandFUEvalue){
                $doneTodayFUCandFUE[$j]['LeadAction']['project_type'] = $this->ProjectType->getProjectTypeByLeadId($doneTodayFUCandFUEvalue['LeadAction']['lead_id']); 
                $j++;    
                }
                
	        ###  End for fallow up call and email ##                
		$this->set ( 'doneTodayOthers', $doneTodayOthers );
                $this->set ( 'doneTodayFUCandFUE', $doneTodayFUCandFUE );
	        ####  Today Planed #####   
	         
                
                 ### For Planed fallow up call and Emails ###
                
                $todaysPlanedECActions = $this->LeadAction->find('all',
					array(	
					'conditions' => array (
						'LeadAction.owner_id' => $userId,
							
						'LeadAction.status'=>'Scheduled',
						'LeadAction.lead_action_id'=>array('9','10'),							
						'date(LeadAction.action_done_on) ='=>$currentDate,                                           
                                         
                                            ),
                                            'order' => array('LeadAction.action_done_on' => 'DESC')
                                  
		) );
		$i =0;
		foreach($todaysPlanedECActions as $todaysPlanedActionsValues){
		//print_r($todaysPendingActionsValues);
		$todaysPlanedECActions[$i]['LeadAction']['company_name'] = $this->Lead->getClientNameByLeadId($todaysPlanedActionsValues['LeadAction']['lead_id']);
		$i++;
		}
                
	        ###  End for fallow up call and email ##


                 $todaysPlanedActions = $this->LeadAction->find('all',
					array(	
					'conditions' => array (
						'LeadAction.owner_id' => $userId,
							
						'OR'=>array(array('LeadAction.status'=>'Scheduled'),array('LeadAction.status'=>'Open')),
						'NOT' => array(array('LeadAction.lead_action_id'=>array('9','10'))),							
						'date(LeadAction.action_done_on) ='=>$currentDate,                                           
                                         
                                            ),
                                            'order' => array('LeadAction.action_done_on' => 'DESC')
                                  
		) );
		$i =0;
		foreach($todaysPlanedActions as $todaysPlanedActionsValues){
		//print_r($todaysPendingActionsValues);
		$todaysPlanedActions[$i]['LeadAction']['company_name'] = $this->Lead->getClientNameByLeadId($todaysPlanedActionsValues['LeadAction']['lead_id']);
		$i++;
		}

                $this->set ( 'TodaysPlanedActions', $todaysPlanedActions );  ##
                $this->set ( 'TodaysPlanedECActions', $todaysPlanedECActions );  ##
	
	}
        
        
        
	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function view($id = null) {
		if (! $this->Lead->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid lead' ) );
		}
		$this->Lead->recursive = 1;
		$options = array (
				'conditions' => array (
						'Lead.' . $this->Lead->primaryKey => $id 
				) 
		);
		$this->set ( 'lead', $this->Lead->find ( 'first', $options ) );
		$this->LeadAction->recursive = 1;
		$actions = $this->LeadAction->find ( 'all', array (
				'conditions' => array (
						'lead_id' => $id 
				),
				'order' => 'LeadAction.id desc' 
		) );
		$this->set ( 'actions', $actions );
		// $this->set('actionTitles',$this->Action->find('list',array('conditions'=>array('type'=>'Client'))));
		$this->set ( 'actionTitles', $this->Action->find ( 'list',array('conditions' => array('not' => array('type'=>'Status')))));
		$users_name = $this->User->find('all', array('fields'=>array('id','first_name','last_name')));
              
                foreach ($users_name as $user_name){
                     $options_name[$user_name['User']['id']] = $user_name['User']['first_name'] . ' ' . $user_name['User']['last_name'];
                }  
                $this->set ( 'owners', $options_name );
                
	}
	
	
	/*
	 * Not in use for now
	 */
	public function action_type_actions_ajax() {
		$this->request->onlyAllow ( 'ajax' );
		$type = $this->request->query ( 'type' );
		
		$this->viewClass = 'Tools.Ajax';
		// echo $type; die;
		
		$actionActionTitles = $this->Action->find ( 'list', array (
				'conditions' => array (
						'type' => $type 
				) 
		) );
		
		$this->layout = 'ajax';
		$this->set ( compact ( 'actionTitles' ) );
		$this->set ( '_serialize', 'actionActionTitles' );
	}
	public function saveAction($leadID = null) {
		$this->request->data ['LeadAction'] ['lead_id'] = $leadID;
		if($this->request->data ['LeadAction'] ['status']=='Open')
		{
			$actionTitle = $this->Action->find('first',array('conditions'=>array('id'=>$this->request->data ['LeadAction'] ['lead_action_id']),'fields'=>'title' ));
			$this->Lead->save(array('id'=>$leadID,'last_next_action'=>$actionTitle['Action']['title'].':'.date ('Y-m-d')));
		}	
		
		$this->LeadAction->save ( $this->request->data );
		
		$this->autoRender = false;
		$this->Session->setFlash ( __ ( 'Action has been added.' ) );
		return $this->redirect ( array (
				'action' => 'view',
				$leadID 
		) );
	}
	public function completeAction($leadID = null, $leadActionID = null) {
		$this->request->data ['LeadAction'] ['status'] = "Completed";
		$this->request->data ['LeadAction'] ['lead_id'] = $leadID;
		$this->request->data ['LeadAction'] ['id'] = $leadActionID;
		$this->request->data ['LeadAction'] ['action_completed_on'] = date ( 'Y-m-d H:i:s' );
               // $this->request->data ['LeadAction'] ['action_completed_on'] = date ( 'Y-m-d H:i:s' );
               // $this->request->data ['LeadAction'] ['modified'] = date ( 'Y-m-d H:i:s' );
                
		
		$this->LeadAction->save ( $this->request->data );
		$actionTitle = $this->Action->find('first',array('conditions'=>array('id'=>$this->request->data ['LeadAction']['lead_action_id'])));
		$this->Lead->save(array('id'=>$leadID,'last_next_action'=>$actionTitle['Action']['title'].'-'.$actionTitle['Action']['closing_action'].':'.date ( 'Y-m-d' )));
		
		$this->autoRender = false;
		$this->Session->setFlash ( __ ( 'Action has been marked as completed.' ) );
		return $this->redirect ( array (
				'action' => 'view',
				$leadID 
		) );
	}
	
	
	public function openAction($leadID = null, $leadActionID = null) {
		$this->request->data ['LeadAction'] ['status'] = "Open";
		$this->request->data ['LeadAction'] ['lead_id'] = $leadID;
		$this->request->data ['LeadAction'] ['id'] = $leadActionID;
		$this->request->data ['LeadAction'] ['action_done_on'] = date ( 'Y-m-d H:i:s' );
		$this->LeadAction->save( $this->request->data );
		$actionTitle = $this->Action->find('first',array('conditions'=>array('id'=>$this->request->data ['LeadAction']['lead_action_id']),'fields'=>'title' ));
		$this->Lead->save(array('id'=>$leadID,'last_next_action'=>$actionTitle['Action']['title'].':'.date ( 'Y-m-d' )));
		$this->autoRender = false;
		$this->Session->setFlash ( __ ( 'Action has been marked as Open.' ) );
		return $this->redirect ( array (
				'action' => 'view',
				$leadID
		) );
	}
	
		public function quickEditLead($id=null)
		{
			
			$leadOldStatus  = $this->Lead->find('first',array('fields'=>array('statuses_id'),'conditions'=>array('Lead.id'=>$id)));

		     	 unset($this->Lead->validate['Req']);
		     	
			$this->Lead->save($this->request->data);
			 
			//print_r($this->request->data); 
			if($leadOldStatus['Lead']['statuses_id']!=$this->request->data['Lead']['statuses_id'])
			{
				$actionStatusChangedID = $this->Action->find('first', array (
						'fields' => array('id'),
						'conditions' => array (
								'title' => 'Status Changed'
						)
				) );
				$oldStatus = $this->Status->find('first',array('fields'=>array('description'),'conditions'=>array('id'=>$leadOldStatus['Lead']['statuses_id'])));
				$newStatus = $this->Status->find('first',array('fields'=>array('description'),'conditions'=>array('id'=>$this->request->data['Lead']['statuses_id'])));
			
				$this->LeadAction->create ();
				$this->LeadAction->save ( array (
						'lead_id' => $id,
						'lead_action_id' => $actionStatusChangedID['Action']['id'],
						'action_note' => "Lead Status changed from ".$oldStatus['Status']['description']." to ".$newStatus['Status']['description'],
						'action_done_on' => date ( 'Y-m-d H:i:s' ),
						'owner_id' => $this->UserAuth->getUserId(),
						'status'=>'Completed'
				) );
			}
			
			$this->autoRender = false;
			$this->Session->setFlash ( __ ( 'Lead has been updated.' ) );
			
			return $this->redirect($this->referer());
		/*	return $this->redirect ( array (
					'action' => 'index'
			) );*/
		}
	
	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		$loginid = $this->UserAuth->getUserId();
		
		$this->set ( 'loginid', $loginid );
		
		if ($this->request->is ( 'post' )) {
			if ($this->request->data ['Lead'] ['first_communication'] != "")
			$this->request->data ['Lead'] ['last_next_action']=_("First Communication on ").date ( 'Y-m-d' );
			else 
				$this->request->data ['Lead'] ['last_next_action']=_("Fresh Lead");
			
			$this->Lead->create ();
			if ($this->Lead->save ( $this->request->data )) {
				
				    ## Cake Mail ##
	                            $fromEmail = $this->Session->read('UserAuth.User.email');  //current logedin user email
	                            $fromName = $this->Session->read('UserAuth.User.first_name').' '.$this->Session->read('UserAuth.User.last_name');  //current logedin user name
	                            $toEmail = $this->User->getUserEmail($this->request->data ['Lead']['users_id']);  // TO user email id               
	                            $toName = $this->User->getUserName($this->request->data ['Lead']['users_id']);
	                            
	                            $subject = "New Lead:". $this->request->data ['Lead']['title']. "Assing to you.";
	                            $mail_message ="Hi, please go to the lead Title:<br/>". $this->request->data ['Lead']['title']; 
	            
	                            $Email = new CakeEmail();
	                            $Email->config('gmail');
	                            $Email->from($fromEmail,$fromName);
	                            //$Email->sender('emample@gmail.com', 'Name'); // for reseting sender
	                            $Email->to($toEmail);  
	                            $Email->subject($subject);
	                            $Email->emailFormat('both');               
	                            $Email->send($mail_message);
				    ## End For Email ##
                            
				
				
				$lstinsertedid = $this->Lead->getLastInsertID ();
				/*
				$slectedProjectType = $this->request->data ['Lead'] ['ProjectType'];
				
				if ($slectedProjectType != "") {
					foreach ( $slectedProjectType as $value ) {
						
						$this->request->data ['LeadProjectType'] ['project_types_id'] = $value;
						$this->request->data ['LeadProjectType'] ['leads_id'] = $lstinsertedid;
						
						$this->LeadProjectType->create ();
						$this->LeadProjectType->save ( $this->request->data );
					}
				}
				*/
				$actionStatusChangedID = $this->Action->find('first', array (
						'fields' => array('id'),
						'conditions' => array (
								'title' => 'Status Changed'
						)
				) );
				
				// print_r($this->request->data); die; 
				$newStatus = $this->Status->find ( 'first', array (
						'fields' => array (
								'description' 
						),
						'conditions' => array (
								'id' => $this->request->data ['Lead'] ['statuses_id'] 
						) 
				) );
					
				
				$this->LeadAction->create ();
				$this->LeadAction->save ( array (
						'lead_id' => $this->Lead->id,
						'lead_action_id' => $actionStatusChangedID['Action']['id'],
						'action_note' => "Lead Status: ".$newStatus['Status']['description'],
						'action_done_on' => date ( 'Y-m-d H:i:s' ),
						'owner_id' => $this->request->data ['Lead'] ['users_id'] ,
						'status'=>'Completed',
                                                'created' => date ( 'Y-m-d H:i:s' ),
                                                'modified' => date ( 'Y-m-d H:i:s' )    
				) );
				
				if ($this->request->data ['Lead'] ['first_communication'] != "") {
					$actionFirstCommID = $this->Action->find('first', array (
							'fields' => array('id'),
							'conditions' => array (
									'title' => 'First Communication'
							)
					) );
					$this->LeadAction->create ();
					$this->LeadAction->save ( array (
							'lead_id' => $this->Lead->id,
							'lead_action_id' => $actionFirstCommID['Action']['id'],
							'action_note' => $this->request->data ['Lead'] ['first_communication'],
							'action_done_on' => date ( 'Y-m-d H:i:s' ),
							'owner_id' => $this->request->data ['Lead'] ['users_id'] ,
							'status'=>'Open',
                                                        'created' => date ( 'Y-m-d H:i:s' ),
                                                        'modified' => date ( 'Y-m-d H:i:s' )
					) );
				}
				
				$this->Session->setFlash ( __ ( 'The lead has been saved.' ) );
				return $this->redirect ( array (
						'action' => 'index' 
				) );
			} else {
				$this->Session->setFlash ( __ ( 'The lead could not be saved. Please, try again.' ) );
			}
		}
		$sources = $this->Lead->Source->find ( 'list', array (
				'fields' => array (
						'Source.id',
						'Source.description' 
				) 
		) );
		$users = $this->Lead->User->find ( 'list' , array (
				'fields' => array (
						'User.id',
						'User.first_name' 
				) 
		) );
		$countries = $this->Lead->Country->find ( 'list' );
		$currencies = $this->Lead->Currency->find ( 'list' );
		$clients = $this->Lead->Client->find ( 'list', array (
				'fields' => array (
						'Client.id',
						'Client.company_name' 
				) 
		) );
		$campaigns = $this->Lead->Campaign->find ( 'list' );
		$statuses = $this->Lead->Status->find ( 'list', array (
				'fields' => array (
						'Status.id',
						'Status.description' 
				) 
		) );
		$ProjectTypes = $this->ProjectType->find ( 'list', array (
				'fields' => array (
						'ProjectType.id',
						'ProjectType.description' 
				) 
		) );
                
                $regions = $this->Lead->Region->find ( 'list', array (
				'fields' => array (
						'Region.id',
						'Region.description' 
				) 
		) );
                
                $leadGroups = $this->Lead->LeadGroup->find ( 'list', array (
				'fields' => array (
						'LeadGroup.id',
						'LeadGroup.description' 
				) 
		) );
                $reqs = $this->Lead->Req->find ( 'list', array (
				'fields' => array (
						'Req.id',
						'Req.description' 
				) 
		) );
		$this->set ( compact ( 'regions','leadGroups','reqs','sources', 'users', 'countries', 'currencies', 'clients', 'campaigns', 'statuses', 'ProjectTypes' ) );
	}
	
	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function edit($id = null) {
		$loginid = $this->UserAuth->getUserId();
		$this->set ( 'loginid', $loginid );
		
		if (! $this->Lead->exists ( $id )) {
			throw new NotFoundException ( __ ( 'Invalid lead' ) );
		}
		
		if ($this->request->is ( array (
				'post',
				'put' 
		) )) {
		 
			$leadOldStatus  = $this->Lead->find('first',array('fields'=>array('statuses_id'),'conditions'=>array('Lead.id'=>$id)));
			if ($this->Lead->save ( $this->request->data )) {
				
				/* to edit the checkbox project type */
				/*
                                $db = ConnectionManager::getDataSource ( 'default' );
				$db->rawQuery ( "DELETE FROM lead_project_types WHERE leads_id='" . $id . "'" );
				
				$projectselected = $this->request->data ['Lead'] ['ProjectType'];
				if(!empty($projectselected)){
				foreach ( $projectselected as $valuer ) {
					$this->LeadProjectType->create ();
					$this->request->data ['LeadProjectType'] ['project_types_id'] = $valuer;
					$this->request->data ['LeadProjectType'] ['leads_id'] = $id;
					$this->LeadProjectType->save ( $this->request->data );
				}
                                }
				*/
				if($leadOldStatus['Lead']['statuses_id']!=$this->request->data['Lead']['statuses_id'])
				{
					$actionStatusChangedID = $this->Action->find('first', array (
							'fields' => array('id'),
							'conditions' => array (
									'title' => 'Status Changed'
							)
					) );
					$oldStatus = $this->Status->find('first',array('fields'=>array('description'),'conditions'=>array('id'=>$leadOldStatus['Lead']['statuses_id'])));
					$newStatus = $this->Status->find('first',array('fields'=>array('description'),'conditions'=>array('id'=>$this->request->data['Lead']['statuses_id'])));
						
					$this->LeadAction->create ();
					$this->LeadAction->save ( array (
							'lead_id' => $this->Lead->id,
							'lead_action_id' => $actionStatusChangedID['Action']['id'],
							'action_note' => "Lead Status changed from ".$oldStatus['Status']['description']." to ".$newStatus['Status']['description'],
							'action_done_on' => date ( 'Y-m-d H:i:s' ),
							'owner_id' => $this->request->data ['Lead']['users_id'] ,
							'status'=>'Completed'
					) );
				}
				
				$this->Session->setFlash ( __ ( 'The lead has been saved.' ) );
				return $this->redirect ( array (
						'action' => 'view', $this->Lead->id
				) );
			} else {
				$this->Session->setFlash ( __ ( 'The lead could not be saved. Please, try again.' ) );
			}
		} else {
			$options = array (
					'conditions' => array (
							'Lead.' . $this->Lead->primaryKey => $id 
					) 
			);
			$this->request->data = $this->Lead->find ( 'first', $options );
		}
		
		$sources = $this->Lead->Source->find ( 'list', array (
				'fields' => array (
						'Source.id',
						'Source.description' 
				) 
		) );
		$users = $this->Lead->User->find ( 'list', array (
				'fields' => array (
						'User.id',
						'User.first_name' 
				) 
		) );
		$countries = $this->Lead->Country->find ( 'list' );
		$currencies = $this->Lead->Currency->find ( 'list' );
		$clients = $this->Lead->Client->find ( 'list', array (
				'fields' => array (
						'Client.id',
						'Client.company_name' 
				) 
		) );
		$campaigns = $this->Lead->Campaign->find ( 'list' );
		$statuses = $this->Lead->Status->find ( 'list', array (
				'fields' => array (
						'Status.id',
						'Status.description' 
				) 
		) );
		
		$allProjectType = $this->ProjectType->find ( 'list', array (
				'fields' => array (
						'ProjectType.id',
						'ProjectType.description' 
				) 
		) );
		$selectedProjectType = $this->LeadProjectType->find ( 'list', array (
				'conditions' => array (
						'leads_id' => $id 
				),
				'fields' => array (
						'id',
						'LeadProjectType.project_types_id' 
				) 
		) );
		
		$selectedStatusProject = $this->Lead->Status->find ( 'list' );
		 $regions = $this->Lead->Region->find ( 'list', array (
				'fields' => array (
						'Region.id',
						'Region.description' 
				) 
		) );
                
                $leadGroups = $this->Lead->LeadGroup->find ( 'list', array (
				'fields' => array (
						'LeadGroup.id',
						'LeadGroup.description' 
				) 
		) );
                $reqs = $this->Lead->Req->find ( 'list', array (
				'fields' => array (
						'Req.id',
						'Req.description' 
				) 
		) );
		$this->set ( compact ( 'regions','leadGroups','reqs','selectedStatusProject', 'sources', 'users', 'countries', 'currencies', 'clients', 'campaigns', 'statuses', 'allProjectType', 'selectedProjectType' ) );
	
	
	// Addded for Actions Tab 
		$actions = $this->LeadAction->find ( 'all', array (
				'conditions' => array (
						'lead_id' => $id
				),
				'order' => 'LeadAction.id desc'
		) );
		$this->set ( 'actions', $actions );
		// $this->set('actionTitles',$this->Action->find('list',array('conditions'=>array('type'=>'Client'))));
		$this->set ( 'actionTitles', $this->Action->find ( 'list',array('conditions' => array('not' => array('type'=>'Status')))));
		// $this->set ( 'owners', $this->User->find ( 'list' ) );
	}
	
	public function allleadaction(){
		$hotLeadStatusId = 2; 
		$newLeadStatusId = 1;
		$userId=$this->UserAuth->getUserId();
		
		$userGroupId = $this->Session->read('UserAuth.User.user_group_id');
		
		$todaysPendingActions = $this->LeadAction->find('all',
					array(	
					'conditions' => array (
						'LeadAction.owner_id' => $userId,
							
						'OR'=>array(array('LeadAction.status'=>'Scheduled'),array('LeadAction.status'=>'Open')),
						'NOT' => array(array('LeadAction.lead_action_id'=>array('9','10')))
				)
		) );
		
					// insert rows to an array.
				for ($a=0; count($todaysPendingActions )> $a; $a++){
				
				$rows[]= '{"id":'.$todaysPendingActions[$a]['LeadAction']['lead_id'].', "title":"Lead#'.$todaysPendingActions[$a]['LeadAction']['lead_id'].'\n'.$todaysPendingActions[$a]['Action']['title'].'", "start":"'.$todaysPendingActions[$a]['LeadAction']['action_done_on'].'","url":"http://crm.nibirulite.com/Leads/view/'.$todaysPendingActions[$a]['LeadAction']['lead_id'].'"}';
				
				}
				
				// convert the array to a string.
				if ($rows){
				$convertojson = implode(",", $rows);
				}
				
				// pass the string to the json variable. this will then be passed  and printed to the javascript code.
				$this->set('json',"[".$convertojson."]"); 
	
	}
	
        
        public function editAction() {
            
              $this->autoRender = false;
              if ($this->request->is ( array ('post','put') )) {
                
                $leadID = $this->request->data ['LeadAction'] ['lead_id'];
		
                /*
                $this->request->data ['LeadAction'] ['id'] = $this->request->data ['LeadAction'] ['id'];
		$this->request->data ['LeadAction'] ['lead_id'] = $this->request->data ['LeadAction'] ['lead_id'];
		$this->request->data ['LeadAction'] ['owner_id'] = $this->request->data ['LeadAction'] ['owner_id'];
                $this->request->data ['LeadAction'] ['action_note'] = $this->request->data ['LeadAction'] ['action_note'];
		*/
		$this->LeadAction->save ( $this->request->data );				
		$this->Session->setFlash ( __ ( 'Action note edited successfully.' ) );
		
                return $this->redirect ( array (
				'action' => 'view',
				$leadID 
		) );
               
                }
	}
        
        
        
	public function ajaxeditaction($actionId) {
              $this->autoRender = false;
              if ($this->RequestHandler->isAjax()) {                
                 $actions = $this->LeadAction->find ( 'first', array (
				'conditions' => array (
						'LeadAction.id' => $actionId
				)			
		) ); 
        $jsonhdata = array('id'=>$actions['LeadAction']['id'],'lead_id'=>$actions['LeadAction']['lead_id'],'owner_id'=>$actions['LeadAction']['owner_id'],'action_note'=>$actions['LeadAction']['action_note']);
        echo json_encode($jsonhdata);
              }
	}
	
	
	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id        	
	 * @return void
	 */
	public function delete($id = null) {
		$this->Lead->id = $id;
		if (! $this->Lead->exists ()) {
			throw new NotFoundException ( __ ( 'Invalid lead' ) );
		}
		$this->request->allowMethod ( 'post', 'delete' );
		if ($this->Lead->delete ()) {
			$this->Session->setFlash ( __ ( 'The lead has been deleted.' ) );
		} else {
			$this->Session->setFlash ( __ ( 'The lead could not be deleted. Please, try again.' ) );
		}
		return $this->redirect ( array (
				'action' => 'index' 
		) );
	}
}