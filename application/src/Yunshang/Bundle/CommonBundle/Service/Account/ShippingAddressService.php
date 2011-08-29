<?php
namespace Yunshang\Bundle\CommonBundle\Service\Account;

use Symfony\Component\Security\Core\Encoder\EncoderFactory;

use Doctrine\ORM\EntityManager;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member;

class ShippingServiceService
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    
}
