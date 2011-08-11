<?php

namespace Yunshang\Bundle\CommonBundle\Service;

use Symfony\Component\Security\Core\Encoder\EncoderFactory;

use Doctrine\ORM\EntityManager;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member;

class YunshangService
{
    private $em;
    private $encoderFactory;

    public function __construct(EntityManager $em, EncoderFactory $encoderFactory)
    {
        $this->em = $em;
        $this->encoderFactory = $encoderFactory;
    }    
    
    public function init()
    {
        $memberQuery = $this->em->createQuery(
                'SELECT m FROM YunshangCommonBundle:Account\Member m WHERE m.username = :username'
        )->setParameter('username', 'admin');
        $members = $memberQuery->getResult();
        if(count($members)==0){
            $member = new Member();
            $password=$this->encoderFactory->getEncoder($member)->encodePassword('admin,.123',$member->getSalt());
            $created = date_create(date("F j, Y, g:i a"));
            $modify = $created;
            $roles = array('ROLE_ADMIN');

            $member->setUsername('admin');
            $member->setEmail('instance@opensource.yunshang.org');
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

    }
}