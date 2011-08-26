<?php

namespace Yunshang\Bundle\MarketBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(name="started", type="datetime")
     */
    private $started;

    /**
     * @var datetime $ended
     *
     * @ORM\Column(name="ended", type="datetime")
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
     * @ORM\Column(name="special_price", type="decimal")
     */
    private $specialPrice;

    /**
     * @var datetime $specialPriceStarted
     *
     * @ORM\Column(name="special_price_started", type="datetime")
     */
    private $specialPriceStarted;

    /**
     * @var datetime $specialPriceEnded
     *
     * @ORM\Column(name="special_price_ended", type="datetime")
     */
    private $specialPriceEnded;

    /**
     * @var string $mainPicture
     *
     * @ORM\Column(name="main_picture", type="string", length=255)
     */
    private $mainPicture;

    /**
     * @var integer $amount
     *
     * @ORM\Column(name="amount", type="integer")
     */
    private $amount;

    /**
     * @var integer $specialAmount
     *
     * @ORM\Column(name="special_amount", type="integer")
     */
    private $specialAmount;


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
}