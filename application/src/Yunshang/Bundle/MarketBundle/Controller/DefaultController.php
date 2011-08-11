<?php

namespace Yunshang\Bundle\MarketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="market_index")
     * @Template()
     */
    public function indexAction()
    {
        return array();
    }
}
