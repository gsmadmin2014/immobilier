<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="immo_agence")
 * @author raiza
 *
 */
class Agence
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="immo_agence_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
     * 
     * @ORM\Column(type="string", length=128, name="immo_agence_libelle")
     * @var string
     */
	protected $libelle;
	
	/**
     * @ORM\Column(type="text", name="immo_agence_desc", nullable=true)
     * @var text
     */
	protected $description;
	
	/**
     * 
     * @ORM\Column(type="string", length=256, name="immo_agence_adresse", nullable=true)
     * @var string
     */
	protected $adresse;
	
	/**
     * @ORM\OneToMany(targetEntity="User", mappedBy="agence", cascade={"persist"})
     * @var Collection
     **/
	protected $agents;
	
	/**
     * @ORM\OneToMany(targetEntity="Immobilier", mappedBy="agence")
     * @var Collection
     **/
	protected $immobiliers;
	
	public function __construct()
	{
		$this->agents = new Collection();
		$this->immobiliers = new Collection();
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
    
	public function getLibelle()
    {
    	return $this->libelle;
    }
    
    public function setLibelle($libelle)
    {
    	$this->libelle = $libelle;
    	return $this;
    }
    
	public function getDescription()
    {
    	return $this->description;
    }
    
    public function setDescription($description)
    {
    	$this->description = $description;
    	return $this;
    }
    
	public function getAdresse()
    {
    	return $this->adresse;
    }
    
    public function setAdresse($adresse)
    {
    	$this->adresse = $adresse;
    	return $this;
    }
    
	public function getAgents()
	{
		return $this->agents;
	}
	
	public function addAgent($agent)
	{
		$agent->setAgence($this);
		$this->agents[] = $agent;
		
	}
	
	public function addAgents(Collection $agents)
	{
		foreach($agents as $agent) {
			$this->addAgent($agent);
		}
	}
	
	public function removeAgents(Collection $agents)
    {
        foreach ($agents as $agent) {
            $this->agents->removeElement($agent);
        }
    }
    
	public function getImmobiliers()
	{
		return $this->immobiliers;
	}
	
	public function addImmobilier($immobilier)
	{
		$this->immobiliers[] = $immobilier;
	}
	
	public function addImmobiliers(Collection $immobiliers)
	{
		foreach($immobiliers as $immobilier) {
			$this->immobiliers->add($immobilier);
		}
	}
	
	public function removeImmobiliers(Collection $immobiliers)
    {
        foreach ($immobiliers as $immobilier) {
            $this->immobiliers->removeElement($immobilier);
        }
    }
    
}