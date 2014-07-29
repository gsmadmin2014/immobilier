<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends GSM_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();		
        $this->setLayoutView("layout_admin");
        $this->load->service('user_service', 'user');
        $this->load->service("immo_service","is");
        $this->load->service("agence_service","ag");
        $this->load->library('acl_auth');
        $this->acl_auth->restrict_access('agent');
	}
	
	public function index()
	{
	    $data['usercount']=$this->user->getCountUser(); 
        $data['immocount']=$this->is->getCountImmobilier(); 
        $data['immocountAppart']=$this->is->getCountImmobilierByType(1);
        $data['immocountCondo']=$this->is->getCountImmobilierByType(2);
        $data['immocountVilla']=$this->is->getCountImmobilierByType(3); 
        $data['immocountRent']=$this->is->getCountImmobilierByContrat(1);  
        $data['immocountSale']=$this->is->getCountImmobilierByContrat(2);
        $data['agencecount']=$this->ag->getCountAgence();      
        $this->setData($data);
		$this->setContentView('admin/index');				
	}
    
    /**
     * list immobilier par agence
     */
     public function listImmoByAgence(){
        $id_agence=get_session_value('agence_id')>0?get_session_value('agence_id'):0;
        $dataget=$this->input->get();
        $limit=6;
        $page=isset($dataget['page'])?$dataget['page']:1;
        $offset=($page-1)*$limit;
	    $dataget['idagence']= $id_agence;
        
        //var_dump($dataget);
        $data['immo']=$this->is->getList($limit,$offset,$dataget);
        $total=(int)($this->is->getCountImmo($dataget));
            $totalpage=round($total/$limit);
            if($totalpage<($total/$limit)){
                $totalpage=$totalpage+1;
            }
        $data['contrat']=$this->is->getContrat();
        $data['type']=$this->is->getType();    
        $data['totalpage']=$totalpage;  
        $data['agent']=$this->user->getListUser(2,0); 
        $data['page']=$page;      
        $this->setData($data);
        $this->setContentView('listing-grid-filter-admin');
     }
     
     /**
      * detail dans page admin
      */
      public function detailImmoByAgence($idimmo){
        $immo=$this->is->getDetailImmo($idimmo);
        $data['detimmo']=$immo;
        $data['immo']=$this->is->getList(4,0);
        $data['agent']=$this->user->getListUser(2,0,$immo['idagence']); 
        
        $mapDetail = array(
        	'coords' => array('latitude' => $immo['latitude'], 'longitude' => $immo['longitude']),
        	'src' => $immo['url_images'][0]['url_small'],
        	'url' => site_url('immobilier/detail/'.$immo['id']),
        	'location' => ucwords(strtolower($immo['fokotany']['nom_fokotany'])),
        	'area' => number_format($immo['area'], 2, ',', ' '),
        	'price' => number_format($immo['prix'], 2, ',', ' '),
        );
        
        $data['mapDetail'] = json_encode($mapDetail);
        $this->setData($data);
        $this->setContentView('detail-admin');
     }
     
     /**
      * get list user
      */
      public function getListUser(){
        $olonas=$this->user->listUser();
        $data['olonas']=$olonas;
        $this->setData($data);
        $this->setContentView('admin/listuser');
      }
      /**
      * get list agence
      */
      public function getListAgence(){
        $ag=$this->ag->getAgencesList();
        $data['agence']=$ag;
        $this->setData($data);
        $this->setContentView('admin/listagence');
      }
      
      
	
}