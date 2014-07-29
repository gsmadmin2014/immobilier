<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="immo_contrat")
 * @author raiza
 *
 */
class Contrat
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="immo_contrat_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
     * 
     * @ORM\Column(type="string", length=50, name="immo_contrat_libelle")
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