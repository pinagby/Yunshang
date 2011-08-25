<?php

namespace Yunshang\Bundle\ManageBundle\Controller\System;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Yunshang\Bundle\ManageBundle\Helper\System\ConfigurationHelper;

class ConfigurationController extends Controller
{
    /**
     * @Route("/system/configuration",name="manage_system_configuration_index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $t = $this->get('translator');
        $t->trans('fuck gfw');
        $configurationService = $this->get("YunshangManageBundle.configurationService");
        $configurationHelper = $configurationService->getConfigurationHelper();
        $form= $this->createFormBuilder($configurationHelper)
               ->add('shopName', 'text',array('required'=>false))
               ->add('shopDescription','textarea',array('required'=>true))
//               ->add('shopTimezone','timezone')
//            ->add('shopLanguage','choice',array(
//                      'choices'=>array('en_US'=>'English','zh_CN'=>'Chinese','navi'=>'Navi')))
               ->add('shopProvince','text',array('required'=>false))
               ->add('shopCity','text',array('required'=>false))
               ->add('shopAddress','text',array('required'=>false))
               ->add('shopQQ','text',array('required'=>false))
               ->add('shopWangwang','text',array('required'=>false))
               ->add('shopSkype','text',array('required'=>false))
               ->add('shopYahooMessage','text',array('required'=>false))
               ->add('shopMsn','text',array('required'=>false))
               ->add('shopEmail','email',array('required'=>false))
               ->add('shopSalesPhone','text',array('required'=>false))
               ->add('shopSalesMobile','text',array('required'=>false))
               ->add('shopSupportPhone','text',array('required'=>false))
               ->add('shopSupportMobile','text',array('required'=>false))
               ->add('shopAnnouncement','textarea',array('required'=>false))
            ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);
            if ($form->isValid()) {
                $configurationService->setConfigurationHelper($configurationHelper);
                return $this->redirect($this->generateUrl('manage_system_configuration_index'));
            }
        }
        return array('form'=>$form->createView());
    }
}
