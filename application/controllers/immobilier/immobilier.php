<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Immobilier extends GSM_Controller 
{
	private $em = null;
	
	public function __construct()
	{
		parent::__construct();
        $this->setLayoutView("layout");
        $this->load->service("immo_service","is");
        $this->load->service("agence_service","agence");
        $this->load->service("user_service","user");
	}
	
    /**
     * index
     */
	public function index()
	{
	    
        $data['immo']=$this->is->getList();
        
        $this->setData($data);
        $this->setContentView('listing-grid-filter');
	}
    
    /**
     * list des propriete
     */
     
     public function listGrid()
	{       
	    $dataget=$this->input->get();
        $limit=6;
        $page=isset($dataget['page'])?$dataget['page']:1;
        $offset=($page-1)*$limit;
	   
        $data['region']=$this->user->getListRegion();
       
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
        $this->setContentView('listing-grid-filter');
	}
    
     /**
     * list des propriete
     */
     
     public function pageHomeGrid()
	{       
        $limit=6;
        $offset=0;
	    
        $data['immo']=$this->is->getList($limit,$offset);
        $data['region']=$this->user->getListRegion();
        $data['contrat']=$this->is->getContrat();
        $data['type']=$this->is->getType(); 
        $data['agent']=$this->user->getListUser(2,0); 
        $this->setData($data);
        $this->setContentView('index-slider');
	}
    
    /**
     * detail immobilier
     */
     public function detailImmo($idimmo){
        $immo = $this->is->getDetailImmo($idimmo);
        $data['detimmo'] = $immo;
        $data['immo'] = $this->is->getList(4,0);
        $data['agent'] = $this->user->getListUser(2,0,$immo['idagence']); 
        $data['agents'] = $this->user->getListUser(0, 0, $immo['idagence']);
        
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
        $this->setContentView('detail');
     }
     
     /**
      * Map
      * 
      */
    public function pageMap()
	{
		$limit=6;
        $offset=0;
	    
        $data['immo']=$this->is->getList($limit,$offset);
        $data['contrat']=$this->is->getContrat();
        $data['type']=$this->is->getType(); 
        $data['agent']=$this->user->getListUser(2,0); 
        
        
        // Add list map (index with map)
        $immos = $this->is->getList(0, 0);
        $properties = array();
        if (isset($immos) && count($immos)) {
        	foreach ($immos as $immo) {
        		$immoId = $immo['id'];
        		$detailImmo = $this->is->getDetailImmo($immoId);
        		$mapDetail = array(
		        	'coords' => array('latitude' => $detailImmo['latitude'], 'longitude' => $detailImmo['longitude']),
		        	'src' => $detailImmo['url_images'][0]['url_small'],
		        	'url' => site_url('detailImmobilier/detail/'.$detailImmo['id']),
		        	'location' => ucwords(strtolower($detailImmo['fokotany']['nom_fokotany'])),
		        	'area' => number_format($detailImmo['area'], 2, ',', ' '),
		        	'price' => number_format($detailImmo['prix'], 2, ',', ' '),
		        );
		        array_push($properties, $mapDetail);
        	}
        }
        $data['properties'] = json_encode($properties);
        
        $this->setData($data);
		$this->setContentView('index');
	}
    
    /**
     *ajout immmobilier 
     */
    public function add()
    {
        $this->load->helper(array('form', 'url'));
        
        $this->load->library('acl_auth');
       	$this->acl_auth->restrict_access('agent');
		$this->setLayoutView("layout_admin");

		$this->load->library('form_validation');
        $post = $this->input->post();
    	$this->form_validation->set_rules('libelle', 'Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('fokotany', 'Location', 'required');
		$this->form_validation->set_rules('type_immo', 'Property type', 'required');
        $this->form_validation->set_rules('contrat', 'Contract type', 'required');
        $this->form_validation->set_rules('room_number', 'Rooms', 'required|numeric');
        $this->form_validation->set_rules('area', 'Contract type', 'required|numeric');
        $this->form_validation->set_rules('price', 'Contract type', 'required|numeric');
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div class="alert-user alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>', '</div>');			
		} else {
            if ($this->is->add($post)) {
                $data['success'] = "Succes";
            } else {
                $data['success'] = "Failed";
            }
		}
        $data['contrat'] = $this->is->getContrat();
        $data['type'] = $this->is->getType();
        $data['agences'] = $this->agence->listeAgences();
        $this->setData($data);
        $this->setContentView('admin/immobilier');
    }	
    
    /**
     * liste fokotany 
     */
    public function listAjax()
	{
		$this->setLayoutView(null);
		$get = $this->input->get();
		$query = $get['q'];
		$list = $this->is->getFokotanyStartingBy($query);
		$result = array();
 		foreach ($list as $item) {
 			$id = $item['id'];
 			$fokotany = $item['fokotany'];
 			$district = $item['district'];
 			$res = array('id' => $id, 'text' => $fokotany, 'district' => $district);
 			array_push($result, $res);
 		}
 		echo json_encode($result);
	}
    
    /**
     * liste aminities
     */
     public function amenitiesAjax()
 	{
 		$this->setLayoutView(null);
 		$query = $this->input->get('q');
 		if (isset($query)) {
 			$amenities = $this->is->getAmenitiesByLibelle($query);
 		} else {
 			$amenities = $this->is->getAllAmenities();
 		}
 		
 		$result = array();
 		foreach ($amenities as $amenity) {
 			$res = array('id' => $amenity->getId(), 'text' => $amenity->getLibelle());
 			array_push($result, $res);
 		}
 		echo json_encode($result);
 	}
    
     /**
      * get list agent public
      */
      public function getListAgent(){
        $agents=$this->user->listUserWithAgent();
        $data['agents']=$agents;
        $data['immo']=$this->is->getList(3,0);
        $this->setData($data);
        $this->setContentView('list_agent');
      }
    
	
}