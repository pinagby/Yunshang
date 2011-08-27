<?php
namespace Yunshang\Bundle\CommonBundle\Helper;

use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 *@author <a href="mailto:dc@yunshang.org">Haulyn Jason</a>
 */
class AccountRegisterHelper{
    /**
     * @Assert\NotBlank()
     * @Assert\MinLength(4)
     * @Assert\MaxLength(36)
     */
    private $username;

    public function setUsername($username){
        $this->username = $username ;
    }

    public function getUsername(){
        return $this->username;
    }

    /**
     * @Assert\NotBlank()
     * @Assert\MinLength(4)
     * @Assert\MaxLength(36)
     */
    private $password;

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
    /**
     * @Assert\NotBlank()
     * @Assert\Email(
     *     message = "The email '{{ value }}' is not a valid email.",
     *     checkMX = true
     *   )
     */
    private $email;

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }
    
}