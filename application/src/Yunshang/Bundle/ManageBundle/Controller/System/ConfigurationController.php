<?php

namespace Yunshang\Bundle\ManageBundle\Controller\System;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


use Yunshang\Bundle\ManageBundle\Helper\System\ConfigurationHelper;

class ConfigurationController extends Controller
{
    /**
     * @Route("/system/configuration",name="manage_system_configuration_index")
     * @Template()
     */
    public function indexAction()
    {
        //@todo query from database first.
        $configurationHelper = new ConfigurationHelper();
        $form= $this->createFormBuilder($configurationHelper)
            ->add('shopName', 'text')
            ->add('shopDescription','textarea')
            ->add('shopTimezone','timezone')
            ->add('shopLanguage','choice',array(
                      'choices'=>array('en_US'=>'English','zh_CN'=>'Chinese','navi_Pandora'=>'Navi')))
            ->add('shopProvince','text')
            ->add('shopCity','text')
            ->add('shopAddress','text')
            ->add('shopQQ','text')
            ->add('shopWangwang','text')
            ->add('shopSkype','text')
            ->add('shopYahooMessage','text')
            ->add('shopMsn','text')
            ->add('shopEmail','email')
            ->add('shopSalesPhone','text')
            ->add('shopSalesMobile','text')
            ->add('shopSupportPhone','text')
            ->add('shopSupportMobile','text')
            ->add('shopAnnouncement','textarea')
            ->getForm();
        return array('form'=>$form->createView());

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            //@todo add validation on server side.
            if ($form->isValid()) {
                //@todo save configuration
                return $this->redirect($this->generateUrl('manage_system_configuration_index'));
            }
        }
    }
}
