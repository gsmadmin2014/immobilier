<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agence_service
{
	protected $em = null;
	
	public function __construct()
	{
		$CI =& get_instance();
		$CI->load->library('doctrine');
		$this->em = $CI->doctrine->em;	
	}
	
	/**
     * Ajout agence
     * 
     */
    public function add($data = array())
    {
        $agence = new Entities\Agence();
        if (array_key_exists('name', $data)) {
            $agence->setLibelle($data['name']);
        }
    	if (array_key_exists('description', $data)) {
            $agence->setDescription($data['description']);
        }
    	if (array_key_exists('adresse', $data)) {
            $agence->setAdresse($data['adresse']);
        }
    	if (array_key_exists('agents', $data) && is_array(($data['agents']))) {
    		$agents = $data['agents'];
    		foreach ($agents as $agentId) {
    			$agent = $this->em->find('Entities\User', (int)$agentId);
    			if ($agent instanceof Entities\User) {
    				$agence->addAgent($agent);		
    			}
    		}            
        }
		$this->em->persist($agence);
        $this->em->flush();
       
        if ($agence->getId()) {
            return true;
        }
        return false;
    }
    
    public function listeAgences()
    {
    	return $this->em->getRepository('Entities\Agence')->findAll();
    }
    
    /**
     * get agence list
     */
     public function getAgencesList()
    {
    	$sql = 'SELECT a FROM Entities\Agence a ';
		
        $query = $this->em->createQuery($sql);
        
        $agences = $query->getResult();
		$return = array();
		if (isset($agences) && count($agences)) {
			foreach ($agences as $agence) {
				$res = array();
				$res['id'] = $agence->getId();
				$res['name'] = $agence->getLibelle();
                $res['adresse'] = $agence->getAdresse();
                $res['desc'] = $agence->getDescription();
               		
				array_push($return, $res);
			}
		}
		return $return;
    }
    
    /**
      * count Agence 
      */
      public function getCountAgence(){
        $res=0;
        $sql = 'SELECT COUNT(i.id) as tot FROM Entities\Agence i';
        $query = $this->em->createQuery($sql);
        $ag = $query->getSingleResult();
        
        $res=isset($ag['tot'])?$ag['tot']:0;
        return $res;
        
      }
	
}