<?php

namespace Proxies\__CG__\Entities;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class File extends \Entities\File implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setId($id)
    {
        $this->__load();
        return parent::setId($id);
    }

    public function getType()
    {
        $this->__load();
        return parent::getType();
    }

    public function setType($type)
    {
        $this->__load();
        return parent::setType($type);
    }

    public function getRelativePath()
    {
        $this->__load();
        return parent::getRelativePath();
    }

    public function setRelativePath($relativePath)
    {
        $this->__load();
        return parent::setRelativePath($relativePath);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getSize()
    {
        $this->__load();
        return parent::getSize();
    }

    public function setSize($size)
    {
        $this->__load();
        return parent::setSize($size);
    }

    public function getImages()
    {
        $this->__load();
        return parent::getImages();
    }

    public function addImage($image)
    {
        $this->__load();
        return parent::addImage($image);
    }

    public function addImages(\Doctrine\Common\Collections\ArrayCollection $images)
    {
        $this->__load();
        return parent::addImages($images);
    }

    public function removeImages(\Doctrine\Common\Collections\ArrayCollection $images)
    {
        $this->__load();
        return parent::removeImages($images);
    }

    public function getImageRelativePath($dimension)
    {
        $this->__load();
        return parent::getImageRelativePath($dimension);
    }

    public function getMediumRelativePath()
    {
        $this->__load();
        return parent::getMediumRelativePath();
    }

    public function getImageRelativePathByDimension($dimension)
    {
        $this->__load();
        return parent::getImageRelativePathByDimension($dimension);
    }

    public function getCree()
    {
        $this->__load();
        return parent::getCree();
    }

    public function setCree($cree)
    {
        $this->__load();
        return parent::setCree($cree);
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'type', 'relativePath', 'name', 'size', 'cree', 'images');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}