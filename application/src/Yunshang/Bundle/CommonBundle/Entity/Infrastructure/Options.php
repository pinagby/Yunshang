<?php

namespace Yunshang\Bundle\CommonBundle\Entity\Infrastructure;

use Doctrine\ORM\Mapping as ORM;

/**
 * Yunshang\Bundle\CommonBundle\Entity\Infrastructure\Options
 *
 * @ORM\Table(name="options")
 * @ORM\Entity
 */
class Options
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $key
     *
     * @ORM\Column(name="`key`", type="string", length=255,unique=true)
     */
    private $key;

    /**
     * @var text $value
     *
     * @ORM\Column(name="`value`", type="text")
     */
    private $value;

    /**
     * @var datetime $created
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var datetime $modified
     *
     * @ORM\Column(name="modified", type="datetime")
     */
    private $modified;

    /**
     * @var integer $version
     *
     * @ORM\Column(name="version", type="integer")
     */
    private $version;

    /**
     * @var text $remark
     *
     * @ORM\Column(name="remark", type="text",nullable=true)
     */
    private $remark;

    /**
     * @var boolean $status
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var string $customField
     *
     * @ORM\Column(name="custom_field", type="string", length=255,nullable=true)
     */
    private $customField;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set key
     *
     * @param string $key
     */
    public function setKey($key)
    {
        $this->key = $key;
    }

    /**
     * Get key
     *
     * @return string 
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Set value
     *
     * @param text $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * Get value
     *
     * @return text 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set created
     *
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * Get created
     *
     * @return datetime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param datetime $modified
     */
    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    /**
     * Get modified
     *
     * @return datetime 
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set version
     *
     * @param integer $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Get version
     *
     * @return integer 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set remark
     *
     * @param text $remark
     */
    public function setRemark($remark)
    {
        $this->remark = $remark;
    }

    /**
     * Get remark
     *
     * @return text 
     */
    public function getRemark()
    {
        return $this->remark;
    }

    /**
     * Set status
     *
     * @param boolean $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set customField
     *
     * @param string $customField
     */
    public function setCustomField($customField)
    {
        $this->customField = $customField;
    }

    /**
     * Get customField
     *
     * @return string 
     */
    public function getCustomField()
    {
        return $this->customField;
    }

    public function __toString()
    {
        return $this->value?$this->value:"";
    }
}