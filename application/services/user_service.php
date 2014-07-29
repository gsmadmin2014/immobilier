<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_service
{
	protected $em = null;
	protected $CI = null;
	
	public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->library( array('doctrine', 'phpass') );
		$this->em = $this->CI->doctrine->em;	
	}
	
	public function register( $data )
	{
		
		
		$name = isset($data['name']) ? $data['name'] : '';
		$username = isset($data['username']) ? $data['username'] : '';
		$email = isset($data['email']) ? $data['email'] : '';
		$password = $this->CI->phpass->hash( $data['password'] );
		
		$user = new Entities\User();
		
		$roleId = isset($data['role']) ? $data['role'] : 2;
		$role = $this->em->getRepository('Entities\Role')->find($roleId);

		$phone1 = isset($data['phone1']) ? $data['phone1'] : '';
		$phone2 = isset($data['phone2']) ? $data['phone2'] : '';
		
		if (array_key_exists('userFileId', $data) && $data['userFileId']) {
			$fileId = (int)$data['userFileId'];
			$file = $this->em->find('Entities\File', $fileId);
			if ($file instanceof Entities\File) {
				$user->setFile($file);
			}
		} else {
            $file = $this->em->getRepository('Entities\File')->getDefaultFile();
            if ($file instanceof Entities\File) {
				$user->setFile($file);
			}
		}	
		
		$user->setName($name);
		$user->setUsername($username);
		if (strlen($email)) {
			$user->setEmail($email);	
		}
		if (strlen($phone1)) {
			$user->setFirstPhone($phone1);
		}
		if (strlen($phone2)) {
			$user->setSecondPhone($phone2);
		}
		$user->setPassword($password);
		$user->addRole($role);
		$this->em->persist($user);
		$this->em->flush();
		
		if ($user->getId()) {
			return true;
		}
		return false;
	}
	
	public function findByEmail($email)
	{
		return $this->em->getRepository('Entities\User')->findByIdentity($email);
	}
	
	public function findByUsername($username)
	{
		return $this->em->getRepository('Entities\User')->findByIdentity($username, 'username');
	}
	
	public function save($user)
	{
		if ($user instanceof Entities\User) {
			$this->em->persist($user);
			$this->em->flush();	
		} else if (is_array($user)) {
			$data = $user;
			$user = new Entities\User();
			$class_vars = get_class_vars(get_class($user));
			foreach ($class_vars as $key => $value) {
				if (array_key_exists($key, $data)) {
					$user->set{ucfirst($key)}($data[$key]);
				}
			}
		}
		if ($user->getId()) {
			return true;
		}
		return false;
	}
	
	public function logout($id)
	{
		$user = $this->findById($id);
		if ($user instanceof Entities\User) {
			$user->setLastLogout(new \DateTime());
			return $this->save($user);	
		} else {
			return false;
		}		
	}
	
	public function findById($id)
	{
		return $this->em->getRepository('Entities\User')->find($id);
	}
	
	public function listRole()
	{
		return $this->em->getRepository('Entities\Role')->findAll();
	}
	
	public function getRoleByName($roleName)
	{
		return $this->em->getRepository('Entities\Role')->findByLibelle($roleName);
	}
	
	public function getUserRolename($userId)
	{
		$user = $this->findById($userId);
		$return = array();
		if ($user instanceof Entities\User) {
			$roles = $user->getRoles();			
			foreach ($roles as $role) {
				array_push($return, array('roleId' => $role->getId(), 'roleName' => $role->getLibelle()));
			}	
		}
		return $return;
	}
	
	public function listUser()
	{
		$users = $this->em->getRepository('Entities\User')->findAll();
		$return = array();
		if (isset($users) && count($users)) {
			foreach ($users as $user) {
				$res = array();
				$res['id'] = $user->getId();
				$res['name'] = $user->getName();
                $res['email'] = $user->getEmail();
                $res['firstPhone'] = $user->getFirstPhone();
                $res["fileId"]=$user->getFile()->getId();
                $agence = $user->getAgence();
                if ($agence instanceof Entities\Agence) {
                	$res["agence"]=$agence->getLibelle();
                } else {
                	$res["agence"] = "-";
                }
				$roles = $user->getRoles();
				if (isset($roles) && count($roles)) {					
					foreach ($roles as $role) {
						$res['role'] = array('id' => $role->getId(), 'name' => $role->getLibelle());
					}
				}				
				array_push($return, $res);
			}
		}
		return $return;
	}
    /**
     * 
     * list user with agent
     */
    	public function listUserWithAgent()
	{
	   $sql = 'SELECT u FROM Entities\User u JOIN u.agence a';
		
        $query = $this->em->createQuery($sql);
        //print($query->getSql());
        $users = $query->getResult();
		$return = array();
		if (isset($users) && count($users)) {
			foreach ($users as $user) {
				$res = array();
				$res['id'] = $user->getId();
				$res['name'] = $user->getName();
                $res['email'] = $user->getEmail();
                $res['firstPhone'] = $user->getFirstPhone();
                $res['secondPhone'] = $user->getSecondPhone();
                $res["fileId"]=$user->getFile()->getId();
                
              
                $res["agence"]=$user->getAgence()->getLibelle();
             
				$roles = $user->getRoles();
				if (isset($roles) && count($roles)) {					
					foreach ($roles as $role) {
						$res['role'] = array('id' => $role->getId(), 'name' => $role->getLibelle());
					}
				}				
				array_push($return, $res);
			}
		}
		return $return;
	}
	
	public function changeRole($data)
	{
		$userId = (int)$data['userId'];
		$roleId = (int)$data['roleId'];
		$user = $this->em->find('Entities\User', $userId);
		$role = $this->em->find('Entities\Role', $roleId);
		if ($user instanceof Entities\User && $role instanceof Entities\Role) {
			$currentRoles = $user->getRoles();
			foreach ($currentRoles as $item) {
				$user->removeRole($item);	
			}			
			$user->addRole($role);
			$this->em->persist($user);
			$this->em->flush();
			return true;
		}
		return false;
	}
	
	
	public function listeAgents()
	{
		$users = $this->em->getRepository('Entities\User')->findAll();
		$return = array();
		if (isset($users) && count($users)) {
			foreach ($users as $user) {
				if ($user->hasRole('agent')) {
					array_push($return, $user);
				}
			}
		}
		return $return;
	}
    
    /**
     * get list user home page 
     */
     public function getListUser($limit,$offset,$idagence=0){
        $resultat=array();
         $sql = 'SELECT i FROM Entities\User i JOIN i.roles r';
         if($idagence>0){
            $sql.=' JOIN i.agence a WHERE a.id ='.$idagence;
            $sql.=' AND r.id=3 ';
         }else{
            $sql.=' WHERE r.id=3 ';
         }
         $sql.='ORDER BY i.created DESC';
         
         $query = $this->em->createQuery($sql);
         
         
			if ($limit > 0) {
				$query->setMaxResults($limit);
			}
			if ($offset > 0) {
				$query->setFirstResult($offset);
			}
        
			$user = $query->getResult();
            if(count($user)>0){
                foreach($user as $item){
                    $res=array("id_user"=>$item->getId(),"name"=>$item->getName(),"email"=>$item->getEmail(),
                    "firstPhone"=>$item->getFirstPhone(),"secondPhone"=>$item->getSecondPhone(),
                    "fileId"=>$item->getFile()->getId());
                    
                    array_push($resultat,$res);
                }
            }
            return $resultat;
            
     }
     
     /**
      * count user 
      */
      public function getCountUser(){
        $res=0;
        $sql = 'SELECT COUNT(i.id) as tot FROM Entities\User i';
        $query = $this->em->createQuery($sql);
        $user = $query->getSingleResult();
        
        $res=isset($user['tot'])?$user['tot']:0;
        return $res;
        
      }
     
     public function getUserImageRelativePathById($dimension, $idFile)
     {
        $file = $this->em->getRepository('Entities\File')->find($idFile);
		if ($file instanceof Entities\File) {
			return $file->getImageRelativePathByDimension($dimension);
		}
		return false;
     }
    
    /**
     * find all region
     */
    public function getListRegion()
	{
		
        $sql = 'SELECT r FROM Entities\Region r';
        $query = $this->em->createQuery($sql);
        
        $regions = $query->getResult();
		$return = array();
		if (isset($regions) && count($regions)) {
			foreach ($regions as $region) {
				$res = array();
				$res['id'] = $region->getId();
				$res['name'] = $region->getName();
				array_push($return, $res);
			}
		}
       
		return $return;
	}
    
}