<?php

namespace Yunshang\Bundle\CommonBundle\Service;

use Symfony\Component\Security\Core\Encoder\EncoderFactory;

use Doctrine\ORM\EntityManager;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member;
use Yunshang\Bundle\CommonBundle\Helper\AccountRegisterHelper as AccountRegisterHelper;

class AccountService
{
    private $em;
    private $encoderFactory;

    public function __construct(EntityManager $em, EncoderFactory $encoderFactory)
    {
        $this->em = $em;
        $this->encoderFactory = $encoderFactory;
    }    
    
    public function createAccount($username, $password, $email)
    {
        $member = new Member();
        $password=$this->encoderFactory->getEncoder($member)->encodePassword($password,$member->getSalt());
        $created = date_create(date("F j, Y, g:i a"));
        $modify = $created;
        $roles = array('ROLE_REGISTER');
        
        $member->setUsername($username);
        $member->setEmail($email);
        $member->setPassword($password);
        $member->setCreated($created);
        $member->setModify($modify);
        $member->setRoles($roles);
        $member->setStatus(true);
        $member->setEnabled(true);
        $member->setLocked(false);

        $this->em->persist($member);
        $this->em->flush();
    }

    public function validateUsername($username)
    {
        $memberQuery = $this->em->createQuery(
                'SELECT m FROM YunshangCommonBundle:Account\Member m WHERE m.username = :username'
            )->setParameter('username', $username);
        $members = $memberQuery->getResult();
        if(count($members)!=0)
        {
            throw new \Exception('Username is taken');
        }
    }

    public function validateEmail($email){
        $memberQuery = $this->em->createQuery(
                'SELECT m FROM YunshangCommonBundle:Account\Member m WHERE m.email = :email'
            )->setParameter('email', $email);
        $members = $memberQuery->getResult();
        if(count($members)!=0)
        {
            throw new \Exception('Email is taken');
        }
    }


    /**
     *
     *
     *
     */
    public function register($accountRegisterHelper)
    {
        $this->validateUsername($accountRegisterHelper->getUsername());
        $this->validateEmail($accountRegisterHelper->getEmail());
        $this->createAccount($accountRegisterHelper->getUsername(),
                             $accountRegisterHelper->getPassword(),
                             $accountRegisterHelper->getEmail());
    }
    
}
