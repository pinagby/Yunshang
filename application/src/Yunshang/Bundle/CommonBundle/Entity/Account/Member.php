<?php

namespace Yunshang\Bundle\CommonBundle\Entity\Account;

use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;

use Doctrine\ORM\Mapping as ORM;

/**
 * Yunshang\Bundle\CommonBundle\Entity\Account\Member
 *
 * @ORM\Table(name="member")
 * @ORM\Entity
 */
class Member implements AdvancedUserInterface
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
     * @var string $username
     *
     * @ORM\Column(name="username", type="string", length=36,unique=true)
     */
    private $username;

    /**
     * @var string $firstName
     *
     * @ORM\Column(name="firstName", type="string", length=64,nullable=true)
     */
    private $firstName;

    /**
     * @var string $lastName
     *
     * @ORM\Column(name="lastName", type="string", length=64,nullable=true)
     */
    private $lastName;

    /**
     * @var string $email
     *
     * @ORM\Column(name="email", type="string", length=255,unique=true)
     */
    private $email;

    /**
     * @var string $password
     *
     * @ORM\Column(name="password", type="string", length=255)
     */
    private $password;

    /**
     * @var string $middleName
     *
     * @ORM\Column(name="middleName", type="string", length=64,nullable=true)
     */
    private $middleName;

    /**
     * @var date $birthday
     *
     * @ORM\Column(name="birthday", type="date",nullable=true)
     */
    private $birthday;

    /**pp
     * @var string $gender
     *
     * @ORM\Column(name="gender", type="string", length=8,nullable=true)
     */
    private $gender;

    /**
     * @var string $prefix
     *
     * @ORM\Column(name="prefix", type="string", length=36,nullable=true)
     */
    private $prefix;

    /**
     * @var datetime $created
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var datetime $modify
     *
     * @ORM\Column(name="modify", type="datetime")
     */
    private $modify;

    /**
     * @var boolean $status
     *
     * @ORM\Column(name="status", type="boolean")
     */
    private $status;

    /**
     * @var string $roles
     *
     * @ORM\Column(name="roles", type="string", length=255)
     */
    private $roles;

    /**
     * @var string $salt
     *
     * @ORM\Column(name="salt", type="string", length=255,nullable=true)
     */
    private $salt;

    /**
     * @var date $expiredDate
     *
     * @ORM\Column(name="expiredDate", type="date",nullable=true)
     */
    private $expiredDate;

    /**
     * @var boolean $enabled
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var boolean $locked
     *
     * @ORM\Column(name="locked", type="boolean")
     */
    private $locked;


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
     * Set username
     *
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set middleName
     *
     * @param string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * Get middleName
     *
     * @return string 
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * Set birthday
     *
     * @param date $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * Get birthday
     *
     * @return date 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set gender
     *
     * @param string $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set prefix
     *
     * @param string $prefix
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Get prefix
     *
     * @return string 
     */
    public function getPrefix()
    {
        return $this->prefix;
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
     * Set modify
     *
     * @param datetime $modify
     */
    public function setModify($modify)
    {
        $this->modify = $modify;
    }

    /**
     * Get modify
     *
     * @return datetime 
     */
    public function getModify()
    {
        return $this->modify;
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
     * Set roles
     *
     * @param string $roles
     */
    public function setRoles($roles)
    {
        $this->roles = implode(":",$roles);
    }

    /**
     * Get roles
     *
     * @return string 
     */
    public function getRoles()
    {
        if(empty($this->roles)){
            return array('ROLE_REGISTER');
        }else{
            return explode(":",$this->roles);
            }
    }

    /**
     * Set salt
     *
     * @param string $salt
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        if(empty($this->salt)){
            return "yunshang-auto-sale,http://yunshang.org";
        }else{
            return $this->sale;            
        }
    }

    /**
     * Set expiredDate
     *
     * @param date $expiredDate
     */
    public function setExpiredDate($expiredDate)
    {
        $this->expiredDate = $expiredDate;
    }

    /**
     * Get expiredDate
     *
     * @return date 
     */
    public function getExpiredDate()
    {
        return $this->expiredDate;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set locked
     *
     * @param boolean $locked
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }

    /**
     * Get locked
     *
     * @return boolean 
     */
    public function getLocked()
    {
        return $this->locked;
    }

    public function eraseCredentials(){
        
    }

    /**
     *Whether data which is relevant for the authentication status has changed.
     */
    public function equals(UserInterface $user){
        return true;
    }

    public function isAccountNonExpired(){
        return true;
    }
    function isAccountNonLocked(){
        return !$this->getLocked();
    }
    function isCredentialsNonExpired(){
        return true;
    }
    function isEnabled(){
        return $this->getEnabled();
    }
 
}