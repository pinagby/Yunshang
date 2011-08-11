<?php

namespace Yunshang\Bundle\ManageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="manage_index")
     * @Template()
     */
    public function indexAction()
    {
        return array('name' => 'fuck gfw');
    }
}
