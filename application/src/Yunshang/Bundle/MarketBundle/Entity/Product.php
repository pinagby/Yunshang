<?php

namespace Yunshang\Bundle\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Yunshang\Bundle\MarketBundle\Entity\ProductCategory as ProductCategory;
use Yunshang\Bundle\MarketBundle\Entity\ProductAttributeSet as ProductAttributeSet;
use Yunshang\Bundle\MarketBundle\Entity\ProductType as ProductType;
use Yunshang\Bundle\CommonBundle\Entity\Account\Member as Member ;

/**
 * Yunshang\Bundle\MarketBundle\Entity\Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity
 */
class Product
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
     * @var string $name
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var text $description
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var text $shortDescription
     *
     * @ORM\Column(name="short_description", type="text")
     */
    private $shortDescription;

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
     * @var datetime $started
     *
     * @ORM\Column(name="started", type="datetime",nullable=true)
     */
    private $started;

    /**
     * @var datetime $ended
     *
     * @ORM\Column(name="ended", type="datetime",nullable=true)
     */
    private $ended;

    /**
     * @var string $code
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var decimal $price
     *
     * @ORM\Column(name="price", type="decimal")
     */
    private $price;

    /**
     * @var decimal $specialPrice
     *
     * @ORM\Column(name="special_price", type="decimal",nullable=true)
     */
    private $specialPrice;

    /**
     * @var datetime $specialPriceStarted
     *
     * @ORM\Column(name="special_price_started", type="datetime",nullable=true)
     */
    private $specialPriceStarted;

    /**
     * @var datetime $specialPriceEnded
     *
     * @ORM\Column(name="special_price_ended", type="datetime",nullable=true)
     */
    private $specialPriceEnded;

    /**
     * @var string $mainPicture
     *
     * @ORM\Column(name="main_picture", type="string", length=255,nullable=true)
     */
    private $mainPicture;

    /**
     * @var integer $amount
     *
     * @ORM\Column(name="amount", type="integer",nullable=true)
     */
    private $amount;

    /**
     * @var integer $specialAmount
     *
     * @ORM\Column(name="special_amount", type="integer",nullable=true)
     */
    private $specialAmount;

    /**
     * @var string $productCategory
     *
     * @ORM\ManyToOne(targetEntity="ProductCategory")
     * @ORM\JoinColumn(name="product_category_id", referencedColumnName="id")     
     */
    private $productCategory;

    /**
     * @var string $member
     *
     * @ORM\ManyToOne(targetEntity="Yunshang\Bundle\CommonBundle\Entity\Account\Member")
     * @ORM\JoinColumn(name="member_id", referencedColumnName="id")     
     */
    private $member ;

    /**
     * @var string $productAttributeSet
     *
     * @ORM\ManyToOne(targetEntity="ProductAttributeSet")
     * @ORM\JoinColumn(name="product_attribute_set_id", referencedColumnName="id",nullable=true)     
     */
    private $productAttributeSet ;

        /**
     * @var string $productType
     *
     * @ORM\ManyToOne(targetEntity="ProductType")
     * @ORM\JoinColumn(name="product_type_id", referencedColumnName="id")     
     */
    private $productType ;

    
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
     * Set name
     *
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param text $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description
     *
     * @return text 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set shortDescription
     *
     * @param text $shortDescription
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;
    }

    /**
     * Get shortDescription
     *
     * @return text 
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
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
     * Set started
     *
     * @param datetime $started
     */
    public function setStarted($started)
    {
        $this->started = $started;
    }

    /**
     * Get started
     *
     * @return datetime 
     */
    public function getStarted()
    {
        return $this->started;
    }

    /**
     * Set ended
     *
     * @param datetime $ended
     */
    public function setEnded($ended)
    {
        $this->ended = $ended;
    }

    /**
     * Get ended
     *
     * @return datetime 
     */
    public function getEnded()
    {
        return $this->ended;
    }

    /**
     * Set code
     *
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set price
     *
     * @param decimal $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * Get price
     *
     * @return decimal 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set specialPrice
     *
     * @param decimal $specialPrice
     */
    public function setSpecialPrice($specialPrice)
    {
        $this->specialPrice = $specialPrice;
    }

    /**
     * Get specialPrice
     *
     * @return decimal 
     */
    public function getSpecialPrice()
    {
        return $this->specialPrice;
    }

    /**
     * Set specialPriceStarted
     *
     * @param datetime $specialPriceStarted
     */
    public function setSpecialPriceStarted($specialPriceStarted)
    {
        $this->specialPriceStarted = $specialPriceStarted;
    }

    /**
     * Get specialPriceStarted
     *
     * @return datetime 
     */
    public function getSpecialPriceStarted()
    {
        return $this->specialPriceStarted;
    }

    /**
     * Set specialPriceEnded
     *
     * @param datetime $specialPriceEnded
     */
    public function setSpecialPriceEnded($specialPriceEnded)
    {
        $this->specialPriceEnded = $specialPriceEnded;
    }

    /**
     * Get specialPriceEnded
     *
     * @return datetime 
     */
    public function getSpecialPriceEnded()
    {
        return $this->specialPriceEnded;
    }

    /**
     * Set mainPicture
     *
     * @param string $mainPicture
     */
    public function setMainPicture($mainPicture)
    {
        $this->mainPicture = $mainPicture;
    }

    /**
     * Get mainPicture
     *
     * @return string 
     */
    public function getMainPicture()
    {
        return $this->mainPicture;
    }

    /**
     * Set amount
     *
     * @param integer $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * Get amount
     *
     * @return integer 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set specialAmount
     *
     * @param integer $specialAmount
     */
    public function setSpecialAmount($specialAmount)
    {
        $this->specialAmount = $specialAmount;
    }

    /**
     * Get specialAmount
     *
     * @return integer 
     */
    public function getSpecialAmount()
    {
        return $this->specialAmount;
    }

    /**
     * Set productCategory
     *
     * @param string $productCategory
     */
    public function setProductCategory($productCategory)
    {
        $this->productCategory = $productCategory;
    }

    /**
     * Get productCategory
     *
     * @return string 
     */
    public function getProductCategory()
    {
        return $this->productCategory;
    }

    /**
     * Set member
     *
     * @param Member $member
     */
    public function setMember(\Yunshang\Bundle\CommonBundle\Entity\Account\Member $member)
    {
        $this->member = $member;
    }

    /**
     * Get member
     *
     * @return Member 
     */
    public function getMember()
    {
        return $this->member;
    }

    /**
     * Set productAttributeSet
     *
     * @param Yunshang\Bundle\MarketBundle\Entity\ProductAttributeSet $productAttributeSet
     */
    public function setProductAttributeSet(\Yunshang\Bundle\MarketBundle\Entity\ProductAttributeSet $productAttributeSet)
    {
        $this->productAttributeSet = $productAttributeSet;
    }

    /**
     * Get productAttributeSet
     *
     * @return Yunshang\Bundle\MarketBundle\Entity\ProductAttributeSet 
     */
    public function getProductAttributeSet()
    {
        return $this->productAttributeSet;
    }

    /**
     * Set productType
     *
     * @param Yunshang\Bundle\MarketBundle\Entity\ProductType $productType
     */
    public function setProductType(\Yunshang\Bundle\MarketBundle\Entity\ProductType $productType)
    {
        $this->productType = $productType;
    }

    /**
     * Get productType
     *
     * @return Yunshang\Bundle\MarketBundle\Entity\ProductType 
     */
    public function getProductType()
    {
        return $this->productType;
    }

    public function __toString(){
        return $this->name;
    }
}