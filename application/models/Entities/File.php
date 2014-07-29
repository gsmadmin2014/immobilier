<?php
namespace Entities;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection as Collection;

/** 
 *
 * @ORM\Entity(repositoryClass="Repositories\FileRepository")
 * @ORM\Table(name="immo_file")
 * 
 */
class File
{
	/**
     * @var int
     * @ORM\Id
     * @ORM\Column(type="integer", name="immo_file_id")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    /**
     * 
     * @ORM\Column(type="string", length=255, name="immo_file_type")
     * @var string
     */
    protected $type;
    
    /**
     * 
     * @ORM\Column(type="text", name="immo_file_relative_path")
     * @var text
     */
    protected $relativePath;
    
    /**
     * 
     * @ORM\Column(type="string", length=255, name="immo_file_name")
     * @var string
     */
    protected $name;
    
    /**
     * 
     * @ORM\Column(type="integer", name="immo_file_size")
     * @var integer
     */
    protected $size;   
    
    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="file")
     * @var array
     */
    protected $images;
    
    /**
     * @ORM\Column(type="datetime", name="immo_im_cree", nullable=true)
     * @var datetime
     */
    protected $cree;
    
    public function __construct()
    {
    	$this->images = new Collection();
    }
    
    public function getId()
    {
    	return $this->id;
    }
    
    public function setId($id)
    {
    	$this->id = $id;
    }
    
    public function getType()
    {
    	return $this->type;
    }
    
    public function setType($type)
    {
    	$this->type = $type;
    }
    
    public function getRelativePath()
    {
    	return $this->relativePath;
    }
    
    public function setRelativePath($relativePath)
    {
    	$this->relativePath = $relativePath;
    }
    
    public function getName()
    {
    	return $this->name;
    }
    
    public function setName($name)
    {
    	$this->name = $name;
    }
    
    public function getSize()
    {
    	return $this->size;
    }
    
    public function setSize($size)
    {
    	$this->size = $size;
    }           
	
    
	public function getImages()
	{
		return $this->images;
	}
	
	public function addImage($image)
	{
		$this->images[] = $image;
	}
	
	public function addImages(Collection $images)
	{
		foreach($images as $image) {
			$this->images->add($image);
		}
	}
	
	public function removeImages(Collection $images)
    {
        foreach ($images as $image) {
            $this->images->removeElement($image);
        }
    }
    
    public function getImageRelativePath($dimension)
    {
    	$relativePath = $this->relativePath;
    	$imgRelativePath = substr($relativePath, 0, strrpos($relativePath, '/'));
    	return $imgRelativePath . '/'.$dimension.'/' . $this->name;
    } 
    
    public function getMediumRelativePath()
    {
    	$relativePath = $this->relativePath;
    	$imgRelativePath = substr($relativePath, 0, strrpos($relativePath, '/'));
    	return $imgRelativePath . '/medium/' . $this->name;
    } 

	public function getImageRelativePathByDimension($dimension)
    {    	
		$images = $this->getImages();
		$relativePath = $this->getRelativePath();
		$imageName = '';
		foreach ($images as $image) {
			$dim = $image->getDimension();
			if ($dim == $dimension) {
				$imageName = $image->getName();
				break;
			}
		}		
		$imgRelativePath = substr($relativePath, 0, strrpos($relativePath, '/'));
    	return $imgRelativePath . '/cropped/' . $imageName;
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
    
}