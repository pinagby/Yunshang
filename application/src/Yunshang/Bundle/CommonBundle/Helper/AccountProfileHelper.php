<?php

namespace Yunshang\Bundle\CommonBundle\Helper;

use Symfony\Component\Validator\Constraints as Assert;

class AccountProfileHelper{

    /**
     * @Assert\NotBlank()
     * @Assert\MinLength(6)
     * @Assert\MaxLength(36)
     */
    private $oldpassword;

    /**
     * @Assert\NotBlank()
     * @Assert\MinLength(6)
     * @Assert\MaxLength(36)
     */
    private $password;

    public function setOldpassword($oldpassword){
        $this->oldpassword = $oldpassword;
    }

    public function getOldpassword(){
        return $this->oldpassword;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function getPassword(){
        return $this->password;
    }
}