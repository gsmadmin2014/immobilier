<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Repositories\AmenityRepository")
 * @ORM\Table(name="immo_amenity")
 * @author raiza
 *
 */
class Amenity
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="immo_amenity_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
     * 
     * @ORM\Column(type="string", length=128, name="immo_amenity_libelle")
     * @var string
     */
	protected $libelle;
	
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
    
}