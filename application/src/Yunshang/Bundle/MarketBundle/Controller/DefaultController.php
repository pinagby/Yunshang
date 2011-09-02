<?php

namespace Yunshang\Bundle\MarketBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Yunshang\Bundle\MarketBundle\Entity\Product;
use Yunshang\Bundle\MarketBundle\Form\ProductType;

class DefaultController extends Controller
{
    /**
     * @Route("/",name="market_index")
     * @Template()
     */
    public function indexAction()
    {
        /*@todo remove */
        $yunshangService = $this->get('YunshangCommonBundle.yunshangService');
        $yunshangService->init();

        
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('YunshangMarketBundle:Product')->findAll();

        return array('entities' => $entities);
    }
    /**
     * Finds and displays a Product entity.
     *
     * @Route("/{id}/show", name="market_product_show")
     * @Template()
     */
    public function showProductAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('YunshangMarketBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        );
    }

}
