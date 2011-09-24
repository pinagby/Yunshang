<?php

namespace Yunshang\Bundle\MarketBundle\Service\Catalog;

use Doctrine\ORM\EntityManager;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member;
use Yunshang\Bundle\MarketBundle\Entity\Catalog\ProductCategory;

/**
 *
 *@author <a href="http://haulynjason.net">Haulyn Jason</a>
 *
 */
class ProductCategoryService
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }    

    public function getTopParentCategories(){
        $query = $this->em->createQuery('SELECT pc FROM YunshangMarketBundle:ProductCategory pc WHERE pc.parent is null');
        $entities = $query->getResult();
        return $entities;
    }
}