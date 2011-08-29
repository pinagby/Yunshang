<?php

namespace Yunshang\Bundle\CommonBundle\Entity\Account;

use Doctrine\ORM\Mapping as ORM;

/**
 * Yunshang\Bundle\CommonBundle\Entity\Account\ShippingAddress
 *
 * @ORM\Table(name="shipping_address")
 * @ORM\Entity
 */
class ShippingAddress
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
     * @var string $shippingName
     *
     * @ORM\Column(name="shippingName", type="string", length=255)
     */
    private $shippingName;

    /**
     * @var string $zip
     *
     * @ORM\Column(name="zip", type="string", length=255, nullable=true)
     */
    private $zip;

    /**
     * @var string $mobile1
     *
     * @ORM\Column(name="mobile1", type="string", length=255,nullable=true)
     */
    private $mobile1;

    /**
     * @var string $mobile2
     *
     * @ORM\Column(name="mobile2", type="string", length=255,nullable=true)
     */
    private $mobile2;

    /**
     * @var string $phone1
     *
     * @ORM\Column(name="phone1", type="string", length=255,nullable=true)
     */
    private $phone1;

    /**
     * @var string $phone2
     *
     * @ORM\Column(name="phone2", type="string", length=255,nullable=true)
     */
    private $phone2;

    /**
     * @var string $country
     *
     * @ORM\Column(name="country", type="string", length=255,nullable=true)
     */
    private $country;

    /**
     * @var string $state
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var string $city
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string $address1
     *
     * @ORM\Column(name="address1", type="string", length=255)
     */
    private $address1;

    /**
     * @var string $address2
     *
     * @ORM\Column(name="address2", type="string", length=255,nullable=true)
     */
    private $address2;

    /**
     * @var datetime $shippingTimeStarted
     *
     * @ORM\Column(name="shippingTimeStarted", type="datetime",nullable=true)
     */
    private $shippingTimeStarted;

    /**
     * @var datetime $shippingTimeEnded
     *
     * @ORM\Column(name="shippingTimeEnded", type="datetime",nullable=true)
     */
    private $shippingTimeEnded;

    /**
     * @var integer $sequence
     *
     * @ORM\Column(name="sequence", type="integer")
     */
    private $sequence;

    /**
     * @var boolean $status
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

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
     * @var string $member
     *
     * @ORM\Column(name="member", type="string", length=255)
     * @ORM\ManyToOne(targetEntity="Member")
     * @ORM\JoinColumn(name="member_id", referencedColumnName="id")     * 
     */
    private $member;


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
     * Set shippingName
     *
     * @param string $shippingName
     */
    public function setShippingName($shippingName)
    {
        $this->shippingName = $shippingName;
    }

    /**
     * Get shippingName
     *
     * @return string 
     */
    public function getShippingName()
    {
        return $this->shippingName;
    }

    /**
     * Set zip
     *
     * @param string $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set mobile1
     *
     * @param string $mobile1
     */
    public function setMobile1($mobile1)
    {
        $this->mobile1 = $mobile1;
    }

    /**
     * Get mobile1
     *
     * @return string 
     */
    public function getMobile1()
    {
        return $this->mobile1;
    }

    /**
     * Set mobile2
     *
     * @param string $mobile2
     */
    public function setMobile2($mobile2)
    {
        $this->mobile2 = $mobile2;
    }

    /**
     * Get mobile2
     *
     * @return string 
     */
    public function getMobile2()
    {
        return $this->mobile2;
    }

    /**
     * Set phone1
     *
     * @param string $phone1
     */
    public function setPhone1($phone1)
    {
        $this->phone1 = $phone1;
    }

    /**
     * Get phone1
     *
     * @return string 
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * Set phone2
     *
     * @param string $phone2
     */
    public function setPhone2($phone2)
    {
        $this->phone2 = $phone2;
    }

    /**
     * Get phone2
     *
     * @return string 
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set country
     *
     * @param string $country
     */
    public function setCountry($country)
    {
        $this->country = $country;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set state
     *
     * @param string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set city
     *
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set address1
     *
     * @param string $address1
     */
    public function setAddress1($address1)
    {
        $this->address1 = $address1;
    }

    /**
     * Get address1
     *
     * @return string 
     */
    public function getAddress1()
    {
        return $this->address1;
    }

    /**
     * Set address2
     *
     * @param string $address2
     */
    public function setAddress2($address2)
    {
        $this->address2 = $address2;
    }

    /**
     * Get address2
     *
     * @return string 
     */
    public function getAddress2()
    {
        return $this->address2;
    }

    /**
     * Set shippingTimeStarted
     *
     * @param datetime $shippingTimeStarted
     */
    public function setShippingTimeStarted($shippingTimeStarted)
    {
        $this->shippingTimeStarted = $shippingTimeStarted;
    }

    /**
     * Get shippingTimeStarted
     *
     * @return datetime 
     */
    public function getShippingTimeStarted()
    {
        return $this->shippingTimeStarted;
    }

    /**
     * Set shippingTimeEnded
     *
     * @param datetime $shippingTimeEnded
     */
    public function setShippingTimeEnded($shippingTimeEnded)
    {
        $this->shippingTimeEnded = $shippingTimeEnded;
    }

    /**
     * Get shippingTimeEnded
     *
     * @return datetime 
     */
    public function getShippingTimeEnded()
    {
        return $this->shippingTimeEnded;
    }

    /**
     * Set sequence
     *
     * @param integer $sequence
     */
    public function setSequence($sequence)
    {
        $this->sequence = $sequence;
    }

    /**
     * Get sequence
     *
     * @return integer 
     */
    public function getSequence()
    {
        return $this->sequence;
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
     * Set member
     *
     * @param string $member
     */
    public function setMember($member)
    {
        $this->member = $member;
    }

    /**
     * Get member
     *
     * @return string 
     */
    public function getMember()
    {
        return $this->member;
    }
}