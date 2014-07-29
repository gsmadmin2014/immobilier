<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Immo_service
{
	protected $em = null;
    protected $CI = null;
	
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library('doctrine');
		$this->em = $this->CI->doctrine->em;	
        $this->CI->load->service("user_service","user");
	}
	/** 
     * get list contrat
     */
	public function getContrat()
	{
	return $this->em->getRepository('Entities\Contrat')->findAll();
       
	   }
       
    /**
     * Ajout immobilier
     * 
     */
    public function add($data = array())
    {
        $immo = new Entities\Immobilier();
    	if (array_key_exists('agence', $data)) {
            $agenceId = $data['agence'];
            $agence = $this->em->find('Entities\Agence', (int)$agenceId);
            if ($agence instanceof Entities\Agence) {
            	$immo->setAgence($agence);
            }
        } else {
            $agenceId = get_session_value('agence_id');
            $agence = $this->em->find('Entities\Agence', (int)$agenceId);
            if ($agence instanceof Entities\Agence) {
            	$immo->setAgence($agence);
            }
        }
        if (array_key_exists('libelle', $data)) {
            $immo->setLibelle($data['libelle']);
        }
        $fokotany = $this->em->find('Entities\Fokotany', (int)$data['fokotany']);
        if ($fokotany instanceof Entities\Fokotany) {
            $immo->setFokotany($fokotany);    
        }
        $type = $this->em->find('Entities\Type', (int)$data['type_immo']);
        if ($type instanceof Entities\Type) {
            $immo->setType($type);    
        }
        $contrat = $this->em->find('Entities\Contrat', (int)$data['contrat']);
        if ($contrat instanceof Entities\Contrat) {
            $immo->setContrat($contrat);    
        }
        if (array_key_exists('amenities', $data)) {
        	$amenities = explode(",", $data['amenities']);
        	foreach ($amenities as $amenity) {
        		if (is_numeric($amenity)) {
        			$a = $this->em->find('Entities\Amenity', (int)$amenity);      			
        		} else if (strlen($amenity) > 0) {
        			$a = new Entities\Amenity();
        			$a->setLibelle(strtolower($amenity));
        			$this->em->persist($a);
        		}
        		$immo->addAmenity($a);
        	}
        	$this->em->flush();
        }
    	if (array_key_exists('description', $data)) {
        	$immo->setDescription($data['description']);
        }
        $immo->setNbChambre($data['room_number']);
        $immo->setPrix($data['price']);
        $immo->setArea($data['area']);
        $immo->setCree(new \DateTime()); 
        if (array_key_exists('fileId', $data)) {
            $files = $data['fileId'];
            foreach ($files as $fileId) {
                $file = $this->em->find('Entities\File', (int)$fileId);
                $immo->addFile($file);
            }
        }
        if (array_key_exists('lat_lng', $data)) {
            if (strlen($data['lat_lng']) > 0) {
                $lat_lng = explode(',', $data['lat_lng']);
            	$mLat = filter_var($lat_lng[0], FILTER_VALIDATE_FLOAT);
    			$mLng = filter_var($lat_lng[1], FILTER_VALIDATE_FLOAT);
    			$immo->setLatitude($mLat);
    			$immo->setLongitude($mLng);    
            }
        	
        }
        
        $this->em->persist($immo);
        $this->em->flush();
       
        if ($immo->getId()) {
            return true;
        }
        return false;
    }
       
    /** 
     * get list type
     */
	public function getType()
	{
	   return $this->em->getRepository('Entities\Type')->findAll();
	   }
       
    public function getFokotanyStartingBy($query)
	{
		$list = $this->em->getRepository('Entities\Fokotany')->getFokotanyStartingBy($query);
		$result = array();
 		foreach ($list as $item) {
 			$commune = $item->getCommune();
 			$district = $item->getCommune()->getDistrict();
 			$districtName = $district->getName();
 			$res = array('id' => $item->getId(), 'fokotany' => $item->getName(), 'district' => $districtName);
 			array_push($result, $res);
 		}
 		return $result;
	}
    
    /**
     * get fokotany by id
     */
     public function fokotanyObjectToArray($fokotany)
	{		
		$commune = $fokotany->getCommune()->getName();
		$district = $fokotany->getCommune()->getDistrict();
		$districtName = $district->getName();
        $res = array('id' => $fokotany->getId(), 'nom_fokotany' => $fokotany->getName(),'commune'=>$commune, 'district' => $districtName);
	   return $res;
    }
    /**
     * get type and contrat
     */
     public function objectToArray($object)
	{	
        $res = array('id' => $object->getId(), 'libelle' => $object->getLibelle());
	   return $res;
    }
    /**
     * 
     * get lis immobilier
     */
     public function getList($limit,$offset,$dataget=array()){
       
        $arrayListChecked=array();
        $type=isset($dataget['type_immo'])?$dataget['type_immo']:0;
        $nbrooms=isset($dataget['nb_rooms'])?$dataget['nb_rooms']:0;
        $rent=isset($dataget['inputRent'])?$dataget['inputRent']:'';
        $sale=isset($dataget['inputSale'])?$dataget['inputSale']:'';
        $priceFrom=isset($dataget['inputPriceFrom'])&&$dataget['inputPriceFrom']>0?$dataget['inputPriceFrom']:0;
        $priceTo=isset($dataget['inputPriceTo'])&&$dataget['inputPriceTo']>0?$dataget['inputPriceTo']:0;
        $id_agence=isset($dataget['idagence'])&&$dataget['idagence']>0?$dataget['idagence']:0;
        $sort=isset($dataget['inputSortBy'])&&$dataget['inputSortBy']>0?$dataget['inputSortBy']:0;
        $order=isset($dataget['inputOrder'])&&$dataget['inputOrder']>0?$dataget['inputOrder']:0;
        $location=isset($dataget['location'])&&$dataget['location']>0?$dataget['location']:0;
        
        $theorder=$order>1?"ASC":"DESC";
        $thesort=$sort>1?"prix":"cree";
        if($type>0){              
              $theArray=array("num"=>1,"sql"=>' t.id='.$type,"val"=>$type);
              array_push($arrayListChecked,$theArray);
            }
        if($nbrooms>0){              
              $theArray=array("num"=>2,"sql"=>' i.nbChambre='.$nbrooms,"val"=>$nbrooms);
              array_push($arrayListChecked,$theArray);
            }
        if($rent=="on"){
              $cont=1;
              $theArray=array("num"=>3,"sql"=>' c.id='.$cont,"val"=>$cont);
              array_push($arrayListChecked,$theArray);
            }   
        if($sale=="on"){
              $cont=2;
              $theArray=array("num"=>4,"sql"=>' c.id='.$cont,"val"=>$cont);
              array_push($arrayListChecked,$theArray);
            }
        if($priceFrom>0 && $priceTo>0){
                $theArray=array("num"=>5,"sql"=>' i.prix<='.$priceTo.' AND i.prix>='.$priceFrom,"val"=>$priceFrom);
                array_push($arrayListChecked,$theArray);
        } 
       
        
        //par agence
        if($id_agence>0){
            $theArray=array("num"=>6,"sql"=>' a.id='.$id_agence,"val"=>$id_agence);
              array_push($arrayListChecked,$theArray);
        }  
        
         if($location>0){
            $theArray=array("num"=>7,"sql"=>' reg.id='.$location,"val"=>$location);
                array_push($arrayListChecked,$theArray);
        }             
        $resultat=array();
      
            $sql = 'SELECT i FROM Entities\Immobilier i JOIN i.type t JOIN i.contrat c JOIN i.agence a
                    JOIN i.fokotany f JOIN f.commune co JOIN co.district dist JOIN dist.region reg
             ';
            $totalchecked=count($arrayListChecked);
            $listSql='';
             if(!empty($arrayListChecked) && $totalchecked>0){
                $sql.='WHERE 1=1 ';
                if($totalchecked>1){
                    $sql.="  AND  (";
                    $listSql="";
                    foreach($arrayListChecked as $item){
                        $listSql.=$item['sql']." AND ";
                    }                    
                    $listSql=substr($listSql,0,-4);                   
                    $sql.=$listSql.")";
                }
                else{   
                    $sql.="AND ".$arrayListChecked[0]['sql'];
                  
                }
            }
            $sql.='ORDER BY i.'.$thesort.' '.$theorder;
			$query = $this->em->createQuery($sql);
			if ($limit > 0) {
				$query->setMaxResults($limit);
			}
			if ($offset > 0) {
				$query->setFirstResult($offset);
			}
           //print_r($query->getSql());
			$immo = $query->getResult();
            
            if(count($immo)>0){
                foreach($immo as $item){
                    $immoId = $item->getId();
                    $fokotany=$this->fokotanyObjectToArray($item->getFokotany());
                    $type=$this->objectToArray($item->getType());
                    $contrat=$this->objectToArray($item->getContrat());
                    $files = $item->getFiles(); 
                    $default_url = base_url("assets/img/tmp/property-small-3.png");  
                    $default_large_url = base_url("assets/img/tmp/property-large-1.jpg");  
                    $default_small_url = base_url("assets/img/tmp/property-small-2.png");                   
                    if(isset($files[0])){
                        $default_file = $files[0];
                        $default_url = base_url("assets".relative_image_path('medium', $default_file->getId()));
                        $default_large_url=base_url("assets".relative_image_path('large', $default_file->getId()));
                        $default_small_url=base_url("assets".relative_image_path('small', $default_file->getId()));
                    }                    
                    $res=array("id"=>$immoId,"fokotany"=>$fokotany,"libelle"=>$item->getLibelle(),
                                "prix"=>$item->getPrix(),"nb_chambre"=>$item->getNbChambre(),
                                "date"=>$item->getCree(),"area"=>$item->getArea(),"type"=>$type,
                                "contrat"=>$contrat, "default_url" => $default_url,"default_large_url"=>$default_large_url
                                ,"default_small_url"=>$default_small_url);
                    array_push($resultat,$res);
                }
                
                
            }
            
            return $resultat;
     }
     
     /**
     * 
     * get detail immobilier
     */
     public function getDetailImmo($idimmo){
        
     	$sql = 'SELECT i FROM Entities\Immobilier i WHERE i.id = ?1';
		$query = $this->em->createQuery($sql);
        
		$query->setParameter(1, $idimmo);
		$item = $query->getSingleResult();
		$immoId = $item->getId();
		$fokotany = $this->fokotanyObjectToArray($item->getFokotany());
		$type = $this->objectToArray($item->getType());
        $contrat = $this->objectToArray($item->getContrat());
        $files = $item->getFiles(); 
        $amenities=$item->getAmenities();
        $idagence=$item->getAgence()->getId();
         
        $urlimage = array();
        $listamenities= array();
        $default_url = base_url("assets/img/tmp/property-small-3.png");                   
        
        if (isset($files[0])) {
        	$default_file = $files[0];
        	$path = base_url()."assets/".relative_image_path('medium', $default_file->getId());
        	if (getimagesize($path) !== false) {
        		$default_url = base_url("assets".relative_image_path('medium', $default_file->getId()));
        	}
        }
        //list file
        if (count($files) > 0) {
        	$theurl_large = base_url("assets/img/tmp/property-large-1.jpg");
        	$theurl_small = base_url("assets/img/tmp/property-small-3.png");
        	foreach ($files as $file) {
        		$path = base_url()."assets/".relative_image_path('large', $file->getId());
        		if (getimagesize($path) !== false) {
        			$theurl_large = base_url("assets".relative_image_path('large', $file->getId()));
        		}
        		$path = base_url()."assets/".relative_image_path('small', $file->getId());
        		if (getimagesize($path) !== false) {
        			$theurl_small = base_url("assets".relative_image_path('small', $file->getId()));
        		}
        		$resfile = array("id_file"=>$file->getId(),"url_large"=>$theurl_large,"url_small"=>$theurl_small);
        		array_push($urlimage, $resfile);
        	}
        }
        //list amenities
         if(isset($amenities) && count($amenities)>0){
            foreach($amenities as $am){
                $res=array("id_amn"=>$am->getId(),"lib_amn"=>$am->getLibelle());
                array_push($listamenities,$res);
            }
        }
        $res = array(
        	"id" 			=> $immoId,
        	"fokotany" 		=> $fokotany,
        	"libelle" 		=> $item->getLibelle(),
        	"prix" 			=> $item->getPrix(),
        	"nb_chambre" 	=> $item->getNbChambre(),
        	"date" 			=> $item->getCree(),
        	"area" 			=> $item->getArea(),
        	"type" 			=> $type,
        	"contrat" 		=> $contrat,
        	"default_url" 	=> $default_url,
        	"url_images" 	=> $urlimage,
        	"latitude"		=> $item->getLatitude(),
        	"longitude"		=> $item->getLongitude(),
            "desc"		=> $item->getDescription(),
            "listamenities"		=> $listamenities,
            "idagence"		=> $idagence
        );
        return $res;
        
        }
     
     /**
     * get count
     */
     public function getCountImmo($dataget){
        /*$sql = 'SELECT count(i.id) as tot FROM Entities\Immobilier i';
			$query = $this->em->createQuery($sql);*/
            
         $arrayListChecked=array();
        $type=isset($dataget['type_immo'])?$dataget['type_immo']:0;
        $nbrooms=isset($dataget['nb_rooms'])?$dataget['nb_rooms']:0;
        $rent=isset($dataget['inputRent'])?$dataget['inputRent']:'';
        $sale=isset($dataget['inputSale'])?$dataget['inputSale']:'';
        $priceFrom=isset($dataget['inputPriceFrom'])&&$dataget['inputPriceFrom']>0?$dataget['inputPriceFrom']:0;
        $priceTo=isset($dataget['inputPriceTo'])&&$dataget['inputPriceTo']>0?$dataget['inputPriceTo']:0;
        $id_agence=isset($dataget['idagence'])&&$dataget['idagence']>0?$dataget['idagence']:0;
        $sort=isset($dataget['inputSortBy'])&&$dataget['inputSortBy']>0?$dataget['inputSortBy']:0;
        $order=isset($dataget['inputOrder'])&&$dataget['inputOrder']>0?$dataget['inputOrder']:0;
        $location=isset($dataget['location'])&&$dataget['location']>0?$dataget['location']:0;
        
        $theorder=$order>1?"ASC":"DESC";
        $thesort=$sort>1?"prix":"cree";
        if($type>0){              
              $theArray=array("num"=>1,"sql"=>' t.id='.$type,"val"=>$type);
              array_push($arrayListChecked,$theArray);
            }
        if($nbrooms>0){              
              $theArray=array("num"=>2,"sql"=>' i.nbChambre='.$nbrooms,"val"=>$nbrooms);
              array_push($arrayListChecked,$theArray);
            }
        if($rent=="on"){
              $cont=1;
              $theArray=array("num"=>3,"sql"=>' c.id='.$cont,"val"=>$cont);
              array_push($arrayListChecked,$theArray);
            }   
        if($sale=="on"){
              $cont=2;
              $theArray=array("num"=>4,"sql"=>' c.id='.$cont,"val"=>$cont);
              array_push($arrayListChecked,$theArray);
            }
        if($priceFrom>0 && $priceTo>0){
                $theArray=array("num"=>5,"sql"=>' i.prix<='.$priceTo.' AND i.prix>='.$priceFrom,"val"=>$priceFrom);
                array_push($arrayListChecked,$theArray);
        } 
       
        
        //par agence
        if($id_agence>0){
            $theArray=array("num"=>6,"sql"=>' a.id='.$id_agence,"val"=>$id_agence);
              array_push($arrayListChecked,$theArray);
        }  
        
         if($location>0){
            $theArray=array("num"=>7,"sql"=>' reg.id='.$location,"val"=>$location);
                array_push($arrayListChecked,$theArray);
        }             
        $resultat=array();
      
            $sql = 'SELECT count(i.id) as tot FROM Entities\Immobilier i JOIN i.type t JOIN i.contrat c JOIN i.agence a
                    JOIN i.fokotany f JOIN f.commune co JOIN co.district dist JOIN dist.region reg
             ';
           
            $totalchecked=count($arrayListChecked);
            $listSql='';
             if(!empty($arrayListChecked) && $totalchecked>0){
                $sql.='WHERE 1=1 ';
                if($totalchecked>1){
                    $sql.="  AND  (";
                    $listSql="";
                    foreach($arrayListChecked as $item){
                        $listSql.=$item['sql']." AND ";
                    }                    
                    $listSql=substr($listSql,0,-4);                   
                    $sql.=$listSql.")";
                }
                else{   
                    $sql.="AND ".$arrayListChecked[0]['sql'];
                  
                }
            }
			$query = $this->em->createQuery($sql);
			$immo = $query->getSingleResult();
            $total=isset($immo['tot'])&&$immo['tot']>0?$immo['tot']:0;
            return $total;
     }
     
     /**
      * count Immo 
      */
      public function getCountImmobilier(){
        $res=0;
        $sql = 'SELECT COUNT(i.id) as tot FROM Entities\Immobilier i';
        $query = $this->em->createQuery($sql);
        $immo = $query->getSingleResult();
        
        $res=isset($immo['tot'])?$immo['tot']:0;
        return $res;
        
      }
      
      /**
      * count Immo by type
      */
      public function getCountImmobilierByType($type){
        $res=0;
        $sql = 'SELECT COUNT(i.id) as tot FROM Entities\Immobilier i JOIN i.type t WHERE t.id = ?1 ';
        
        $query = $this->em->createQuery($sql);
        $query->setParameter(1, $type);
        $immo = $query->getSingleResult();
        $res=isset($immo['tot'])?$immo['tot']:0;
        return $res;
        
      }
      
      /**
      * count Immo by contrat
      */
      public function getCountImmobilierByContrat($contrat){
        $res=0;
        $sql = 'SELECT COUNT(i.id) as tot FROM Entities\Immobilier i JOIN i.contrat c WHERE c.id = ?1 ';
        
        $query = $this->em->createQuery($sql);
        $query->setParameter(1, $contrat);
        $immo = $query->getSingleResult();
        $res=isset($immo['tot'])?$immo['tot']:0;
        return $res;
        
      }
     
     public function getImmoById($id)
     {
        $immobilier = $this->em->getRepository('Entities\Immobilier')->find($id);
		if ($immobilier instanceof Entities\Immobilier) {
			return $immobilier;
		}
		return false;
     }
     
     public function getImageRelativePathById($dimension, $idFile)
     {
        $file = $this->em->getRepository('Entities\File')->find($idFile);
		if ($file instanceof Entities\File) {
			return $file->getImageRelativePath($dimension);
		}
		return false;
     }
     
     public function getAmenitiesByLibelle($query)
     {
     	return $this->em->getRepository('Entities\Amenity')->getAmenitiesByLibelle($query);
     }
     
     public function getAllAmenities()
     {
     	return $this->em->getRepository('Entities\Amenity')->findAll();
     }
       
}