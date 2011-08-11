<?php

namespace Yunshang\Bundle\CustomerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="customer_index")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'everyone fuck gfw hahahah');
    }
}
