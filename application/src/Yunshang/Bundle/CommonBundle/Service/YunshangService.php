<?php

namespace Yunshang\Bundle\CommonBundle\Service;

use Symfony\Component\Security\Core\Encoder\EncoderFactory;

use Doctrine\ORM\EntityManager;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member;
use Yunshang\Bundle\CommonBundle\Entity\Infrastructure\Options as Options;
use Yunshang\Bundle\MarketBundle\Entity\ProductType as ProductType;

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

        
        $productType = $this->em
        ->getRepository('YunshangMarketBundle:ProductType')
        ->find(1);

        if (!$productType){
            $productType = new ProductType();
            $productType->setId(1);
            $productType->setName('Simple Product');
            $productType->setDescription('Simple Product');
            $productType->setStatus(true);
            $productType->setCreated(date_create(date("F j, Y, g:i a")));
            $productType->setModified($productType->getCreated());
            $productType->setIsInternel(true);
        }else if($productType->getName()!=='Simple Product'){
            $productType->setId(1);
            $productType->setName('Simple Product');
            $productType->setDescription('Simple Product');
            $productType->setStatus(true);
            $productType->setCreated(date_create(date("F j, Y, g:i a")));
            $productType->setModified($productType->getCreated());
            $productType->setIsInternel(true);
        }
        $this->em->persist($productType);
        $this->em->flush();


        $productType = $this->em
        ->getRepository('YunshangMarketBundle:ProductType')
        ->find(2);

        if (!$productType){
            $productType = new ProductType();
            $productType->setId(2);
            $productType->setName('Service Product');
            $productType->setDescription('Service Product');
            $productType->setStatus(true);
            $productType->setCreated(date_create(date("F j, Y, g:i a")));
            $productType->setModified($productType->getCreated());
            $productType->setIsInternel(true);
        }else if($productType->getName()!=='Service Product'){
            $productType->setId(1);
            $productType->setName('Service Product');
            $productType->setDescription('Service Product');
            $productType->setStatus(true);
            $productType->setCreated(date_create(date("F j, Y, g:i a")));
            $productType->setModified($productType->getCreated());
            $productType->setIsInternel(true);
        }
        $this->em->persist($productType);
        $this->em->flush();


        
    }

    /**
     * 
     *
     */
    public function setOptions($key,$value,$args=NULL){
        $options = $this->em
        ->getRepository('YunshangCommonBundle:Infrastructure\Options')
        ->findOneByKey($key);
        if (!$options) {
            $options = new Options();
            $options->setKey($key);
            $options->setValue($value);
            $options->setCreated(date_create(date("F j, Y, g:i a")));
            $options->setModified($options->getCreated());
            $options->setVersion(1);

            $options->setRemark('');
            $options->setStatus(true);
            $options->setCustomField('');

        }else{
            $options->setValue($value);
            $options->setModified(date_create(date("F j, Y, g:i a")));
            $options->setVersion($options->getVersion()+1);
        }

        if(NULL!==$args&&is_array($args)){
            if(isset($args['remark'])){
                $options->setRemark($args['remark']);
            }
            if(isset($args['status'])){
                $options->setStatus($args['status']);
            }
            if(isset($args['customField'])){
                $options->setCustomField($args['customField']);
            }
        }

        $this->em->persist($options);
        $this->em->flush();
    }

    public function getOptions($key){
        $options = $this->em
        ->getRepository('YunshangCommonBundle:Infrastructure\Options')
        ->findOneByKey($key);
        return $options;       
    }
}