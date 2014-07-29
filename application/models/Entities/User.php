<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity(repositoryClass="Repositories\UserRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="immo_user")
 * @author raiza
 *
 */
class User
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="immo_us_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=512, name="immo_us_name", nullable=true)
	 * @var string
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length=128, name="immo_us_username", nullable=true, unique=true)
	 * @var string
	 */
	protected $username;
	
	/**
	 * @ORM\Column(type="string", length=128, name="immo_us_email", nullable=true, unique=true)
	 * @var string
	 */
	protected $email;
	
	/**
	 * @ORM\Column(type="string", length=200, name="immo_us_password")
	 * @var string
	 */
	protected $password;
	
	/**
	 * @ORM\Column(type="string", length=32, name="immo_us_reset_code", nullable=true)
	 * @var string
	 */
	protected $resetCode;
	
	/**
	 * @ORM\Column(type="integer", name="immo_us_reset_time", nullable=true)
	 * @var integer
	 */
	protected $resetTime;
	
	/**
	 * @ORM\Column(type="string", length=255, name="immo_us_remember_code", nullable=true)
	 * @var string
	 */
	protected $rememberCode;
	
	/**
     * @ORM\Column(type="datetime", name="immo_us_last_login", nullable=true)
     * @var datetime
     */
	protected $lastLogin;
	
	/**
     * @ORM\Column(type="datetime", name="immo_us_last_logout", nullable=true)
     * @var datetime
     */
	protected $lastLogout;
	
	/**
     * @var \Doctrine\Common\Collections\ArrayCollection
     * @ORM\ManyToMany(targetEntity="Role")
     * @ORM\JoinTable(name="immo_user_role",
     *      joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="immo_us_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="role_id", referencedColumnName="immo_ro_id")}
     * )
     */
    protected $roles;
    
    /**
	 * @ORM\Column(type="string", length=50, name="immo_tel1", nullable=true)
	 * @var string
	 */
    protected $firstPhone;
    
    /**
	 * @ORM\Column(type="string", length=50, name="immo_tel2", nullable=true)
	 * @var string
	 */
    protected $secondPhone;
    
     /**
     * @ORM\ManyToOne(targetEntity="Agence", inversedBy="agents")
     * @ORM\JoinColumn(name="agence_id", referencedColumnName="immo_agence_id", onDelete="SET NULL")
     * @var Agence
     **/
    protected $agence;
    
    /**
	 * @ORM\ManyToOne(targetEntity="File")
	 * @ORM\JoinColumn(name="file_id", referencedColumnName="immo_file_id", onDelete="SET NULL")
	 * @var File
	 */
	protected $file;
	
	
	/**
     * @ORM\Column(type="datetime", name="immo_us_created", nullable=true)
     * @var datetime
     */
	protected $created;
    
	public function __construct()
    {
        $this->roles = new Collection();
    }
    
	/**
     * @ORM\PrePersist
     */
    public function timestamp()
    {
        if(is_null($this->created)) {
            $this->setCreated(new \DateTime());
        }
        return $this;
    }
	
	public function getId()
	{
		return $this->id;
	}
	
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	public function getName()
	{
		return $this->name;
	}
	
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}
	
	public function getUsername()
	{
		return $this->username;
	}
	
	public function setUsername($username)
	{
		$this->username = $username;
		return $this;
	}
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}
	
	public function getPassword()
	{
		return $this->password;
	}
	
	public function setPassword($password)
	{
		$this->password = $password;
		return $this;
	}
	
	public function getResetCode()
	{
		return $this->resetCode;
	}
	
	public function setResetCode($resetCode)
	{
		$this->resetCode = $resetCode;
		return $this;
	}
	
	public function getResetTime()
	{
		return $this->resetTime;
	}
	
	public function setResetTime($resetTime)
	{
		$this->resetTime = $resetTime;
		return $this;
	}
	
	public function getRememberCode()
	{
		return $this->rememberCode;
	}
	
	public function setRememberCode($rememberCode)
	{
		$this->rememberCode = $rememberCode;
		return $this;
	}
	
	public function getLastLogin()
	{
		return $this->lastLogin;
	}
	
	public function setLastLogin($lastLogin)
	{
		$this->lastLogin = $lastLogin;
		return $this;
	}
	
	public function getLastLogout()
	{
		return $this->lastLogout;
	}
	
	public function setLastLogout($lastLogout)
	{
		$this->lastLogout = $lastLogout;
		return $this;
	}
	
	public function getRoles()
    {
    	return $this->roles;
    }
    
    public function addRole(Role $role)
    {
    	$this->roles[] = $role;
    	return $this;
    }
    
	public function addRoles(Collection $roles)
    {
        foreach ($roles as $role) {
            $this->roles->add($role);
        }
        return $this;
    }

    public function removeRoles(Collection $roles)
    {
        foreach ($roles as $role) {
            $this->roles->removeElement($role);
        }
        return $this;
    }
    
	public function removeRole(Role $role)
    {
        $this->roles->removeElement($role);        
        return $this;
    }
    
    public function hasRole($roleName)
    {
    	$user_roles = $this->getRoles();
    	if (isset($user_roles)) {
    		foreach ($user_roles as $role) {
    			do {
	    			if ($roleName === $role->getLibelle()) {    				
	    				return true;
	    			} else {
	    				$role = $role->getParent();	
	    			}    				
    			} while ($role != null);
    		}
    	}
    	return false;
    }
    
	public function getFirstPhone()
	{
		return $this->firstPhone;
	}
	
	public function setFirstPhone($firstPhone)
	{
		$this->firstPhone = $firstPhone;
		return $this;
	}
	
	public function getSecondPhone()
	{
		return $this->secondPhone;
	}
	
	public function setSecondPhone($secondPhone)
	{
		$this->secondPhone = $secondPhone;
		return $this;
	}
	
	public function getAgence()
	{
		return $this->agence;
	}
	
	public function setAgence($agence)
	{
		$this->agence = $agence;
		return $this;
	}
    
	public function getFile()
	{
		return $this->file;
	}
	
	public function setFile($file)
	{
		$this->file = $file;
		return $this;
	}
	
	public function getCreated()
	{
		return $this->created;
	}
	
	public function setCreated($created)
	{
		$this->created = $created;
		return $this;
	}
}