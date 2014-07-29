<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="immo_immobilier")
 * @author raiza
 *
 */
class Immobilier
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="immo_im_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
     * @ORM\Column(type="string", length=100, name="imm_im_libelle", nullable=true)
     * @var string
     */
	protected $libelle;
	
	/**
     * @ORM\ManyToOne(targetEntity="Type")
     * @ORM\JoinColumn(name="immo_type_id", referencedColumnName="immo_type_id")
     * @var Entities\Type
     */
	protected $type;
	
	/**
     * @ORM\Column(type="decimal", precision=20, scale=2, name="imm_im_prix", nullable=true)
     * @var double
     */
	protected $prix;
	
	/**
     * @ORM\Column(type="integer", name="imm_im_nb_chambre", nullable=true)
     * @var int
     */
	protected $nbChambre;
	
	/**
     * @ORM\ManyToOne(targetEntity="Fokotany")
     * @ORM\JoinColumn(name="imm_fokotany_id", referencedColumnName="id")
     * @var Entities\Fokotany
     */
	protected $fokotany;
	
	/**
     * @ORM\ManyToOne(targetEntity="Contrat")
     * @ORM\JoinColumn(name="immo_im_contrat_id", referencedColumnName="immo_contrat_id")
     * @var Entities\Contrat
     */
	protected $contrat;
	
	/**
     * @ORM\Column(type="datetime", name="immo_im_cree", nullable=true)
     * @var datetime
     */
	protected $cree;
	
	/**
     * @ORM\Column(type="datetime", name="immo_im_modifie", nullable=true)
     * @var datetime
     */
	protected $modifie;
	
	/**
     * @ORM\ManyToMany(targetEntity="File")
     * @ORM\JoinTable(name="immos_files",
     *      joinColumns={@ORM\JoinColumn(name="immo_id", referencedColumnName="immo_im_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="file_id", referencedColumnName="immo_file_id")}
     *      )
     **/
	protected $files;
	
	/**
     * @ORM\ManyToMany(targetEntity="Amenity")
     * @ORM\JoinTable(name="immos_amenities",
     *      joinColumns={@ORM\JoinColumn(name="immo_id", referencedColumnName="immo_im_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="amenity_id", referencedColumnName="immo_amenity_id")}
     *      )
     **/
	protected $amenities;
	
	/**
     * @ORM\ManyToMany(targetEntity="User")
     * @ORM\JoinTable(name="immos_contacts",
     *      joinColumns={@ORM\JoinColumn(name="immo_id", referencedColumnName="immo_im_id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="immo_us_id")}
     *      )
     **/
	protected $contacts;
    
    /**
     * @ORM\Column(type="decimal", name="imm_im_surface", nullable=true)
     * @var double
     */
    protected $area;
    
    /**
     * @ORM\Column(type="text", name="immo_im_desc", nullable=true)
     * @var text
     */
    protected $description;
    
    /**
     * @ORM\ManyToOne(targetEntity="Agence", inversedBy="immobiliers")
     * @ORM\JoinColumn(name="agence_id", referencedColumnName="immo_agence_id")
     **/
    protected $agence;
    
    /**
     * @ORM\Column(type="string", length=256, name="immo_im_adresse", nullable=true)
     * @var string
     */
    protected $adresse;
    
    /**
     * @ORM\Column(type="decimal", precision=10, scale=6, name="immo_im_latitude", nullable=true)
     * @var double
     */
    protected $latitude;
    
    /**
     * @ORM\Column(type="decimal", precision=10, scale=6, name="immo_im_longitude", nullable=true)
     * @var double
     */
    protected $longitude;
    
    /**
     * @ORM\Column(type="integer", name="immo_is_deleted", nullable=false)
     * @var int
     */
	protected $isdeleted;
	
	public function __construct()
    {
        $this->files = new Collection();
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
    
	public function getType()
    {
    	return $this->type;
    }
    
    public function setType($type)
    {
    	$this->type = $type;
    	return $this;
    }
    
	public function getPrix()
    {
    	return $this->prix;
    }
    
    public function setPrix($prix)
    {
    	$this->prix = $prix;
    	return $this;
    }
    
	public function getNbChambre()
    {
    	return $this->nbChambre;
    }
    
    public function setNbChambre($nbChambre)
    {
    	$this->nbChambre = $nbChambre;
    	return $this;
    }
    
	public function getFokotany()
    {
    	return $this->fokotany;
    }
    
    public function setFokotany($fokotany)
    {
    	$this->fokotany = $fokotany;
    	return $this;
    }
    
	public function getContrat()
    {
    	return $this->contrat;
    }
    
    public function setContrat($contrat)
    {
    	$this->contrat = $contrat;
    	return $this;
    }
    
	public function getCree()
    {
    	return $this->cree;
    }
    
    public function setCree($cree)
    {
    	$this->cree = $cree;
    	return $this;
    }
    
	public function getModifie()
    {
    	return $this->modifie;
    }
    
    public function setModifie($modifie)
    {
    	$this->modifie = $modifie;
    	return $this;
    }
    
	public function getFiles()
	{
		return $this->files;
	}
	
	public function addFile($file)
	{
		$this->files[] = $file;
	}
	
	public function addFiles(Collection $files)
	{
		foreach($files as $file) {
			$this->files->add($file);
		}
	}
	
	public function removeFiles(Collection $files)
    {
        foreach ($files as $file) {
            $this->files->removeElement($file);
        }
    }
    
	public function getAmenities()
	{
		return $this->amenities;
	}
	
	public function addAmenity($amenity)
	{
		$this->amenities[] = $amenity;
	}
	
	public function addAmenities(Collection $amenities)
	{
		foreach($amenities as $amenity) {
			$this->amenities->add($amenity);
		}
	}
	
	public function removeAmenities(Collection $amenities)
    {
        foreach ($amenities as $amenity) {
            $this->amenities->removeElement($amenity);
        }
    }
    
	public function getContacts()
	{
		return $this->contacts;
	}
	
	public function addContact($contact)
	{
		$this->contacts[] = $contact;
	}
	
	public function addContacts(Collection $contacts)
	{
		foreach($contacts as $contact) {
			$this->contacts->add($contact);
		}
	}
	
	public function removeContacts(Collection $contacts)
    {
        foreach ($contacts as $contact) {
            $this->contacts->removeElement($contact);
        }
    }
    
    public function getArea()
    {
    	return $this->area;
    }
    
    public function setArea($area)
    {
    	$this->area = $area;
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
    
	public function getAgence()
    {
    	return $this->agence;
    }
    
    public function setAgence($agence)
    {
    	$this->agence = $agence;
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
    
	public function getLatitude()
    {
    	return $this->latitude;
    }
    
    public function setLatitude($latitude)
    {
    	$this->latitude = $latitude;
    	return $this;
    }
    
	public function getLongitude()
    {
    	return $this->longitude;
    }
    
    public function setLongitude($longitude)
    {
    	$this->longitude = $longitude;
    	return $this;
    }
    
    public function getIsdeleted()
    {
    	return $this->isdeleted;
    }
    
    public function setIsdeleted($isdeleted)
    {
    	$this->isdeleted = $isdeleted;
    	return $this;
    }
	
}
	