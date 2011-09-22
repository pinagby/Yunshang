<?php

namespace Yunshang\Bundle\MarketBundle\Service\Catalog;

use Doctrine\ORM\EntityManager;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member;

class ProductCategoryService
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }    
    
}