<?php

namespace Yunshang\Bundle\MarketBundle\Service\Catalog;

use Doctrine\ORM\EntityManager;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member;
use Yunshang\Bundle\MarketBundle\Entity\Catalog\ProductCategory;
use Yunshang\Bundle\MarketBundle\Entity\Catalog\Product;

/**
 *
 *@author <a href="http://haulynjason.net">Haulyn Jason</a>
 *
 */
class ProductService
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function getProducts(){
      $entities = $this->em->getRepository('YunshangMarketBundle:Product')->findAll();

    }
