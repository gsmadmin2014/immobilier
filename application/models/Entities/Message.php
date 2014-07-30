<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/**
 * @ORM\Entity(repositoryClass="Repositories\MessageRepository")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="immo_message")
 * @author raiza
 *
 */
class Message
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", name="immo_message_id")
	 * @ORM\GeneratedValue(strategy="AUTO")
	 * @var int
	 */
	protected $id;
	
	/**
	 * @ORM\Column(type="string", length=512, name="immo_message_user_name")
	 * @var string
	 */
	protected $name;
	
	/**
	 * @ORM\Column(type="string", length=128, name="immo_message_user_email")
	 * @var string
	 */
	protected $email;
	
	/**
     * @ORM\Column(type="text", name="immo_message_content")
     * @var text
     */
	protected $content;
	
	/**
     * @ORM\Column(type="integer", name="immo_message_deleted")
     * @var int
     */
	protected $deleted;
	
	/**
     * @ORM\Column(type="integer", name="immo_message_viewed")
     * @var int
     */
	protected $viewed;
	
	/**
     * @ORM\Column(type="datetime", name="immo_message_created")
     * @var datetime
     */
	protected $created;
	
	/**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="immo_message_agent_id", referencedColumnName="immo_us_id", onDelete="SET NULL")
     **/
	protected $agent;
	
	/**
     * @ORM\ManyToOne(targetEntity="Immobilier")
     * @ORM\JoinColumn(name="immo_message_immo_id", referencedColumnName="immo_im_id", onDelete="SET NULL")
     **/
	protected $immobilier;
	
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
	
	public function getEmail()
	{
		return $this->email;
	}
	
	public function setEmail($email)
	{
		$this->email = $email;
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
	
	public function getContent()
	{
		return $this->content;
	}
	
	public function setContent($content)
	{
		$this->content = $content;
		return $this;
	}
	
	public function getViewed()
	{
		return $this->viewed;
	}
	
	public function setViewed($viewed)
	{
		$this->viewed = $viewed;
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
	
	public function getDeleted()
	{
		return $this->deleted;
	}
	
	public function setDeleted($deleted)
	{
		$this->deleted = $deleted;
		return $this;
	}
	
	public function getAgent()
	{
		return $this->agent;
	}
	
	public function setAgent($agent)
	{
		$this->agent = $agent;
		return $this;
	}
	
	public function getImmobilier()
	{
		return $this->immobilier;
	}
	
	public function setImmobilier($immobilier)
	{
		$this->immobilier = $immobilier;
		return $this;
	}
	
	
}