<?php

namespace Yunshang\Bundle\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request as Request;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member as Member;
use Yunshang\Bundle\CommonBundle\Helper\AccountRegisterHelper as AccountRegisterHelper;
use Yunshang\Bundle\CommonBundle\Helper\AccountProfileHelper as AccountProfileHelper;

class DefaultController extends Controller
{
    /**
     *@Route("/account/profile",name="account_profile")
     *@Template()
     */
    public function profileAction(Request $request){
        $accountProfileHelper = new AccountProfileHelper();
        $form = $this->createFormBuilder($accountProfileHelper)
                ->add('oldpassword','password')
                ->add('password','repeated',array(
                          'type'=>'password',
                          'invalid_message'=>'The password fields must match.',
                          'options'=>array('label' => 'Password')
                          ))
                ->getForm();
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            if($form->isValid())
            {
                $accountService = $this->get('YunshangCommonBundle.accountService');
                try{
                    $oldPassword = $accountProfileHelper->getOldpassword();
                    $password = $accountProfileHelper->getPassword();
                    $logger = $this->get('logger');
                    $member = $this->get('security.context')->getToken()->getUser();
                    $accountService->updatePassword($member,$oldPassword,$password);
                    $this->get('session')->setFlash('notice', array('message'=>'success:'));
                    return $this->redirect($this->generateUrl('account_profile'));
                } catch(\Exception $e){
                    echo 'fuck';
                    $error['message'] = $e->getMessage();
                }
            }
        }
        return array('error'=>isset($error)?$error:'',
                     'form'=>$form->createView()); 
    }
    /**
     * @Route("/account/register",name="account_register")
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $t = $this->get('translator');
        $accountRegisterHelper = new AccountRegisterHelper();
        $form = $this->createFormBuilder($accountRegisterHelper)
                ->add('username','text')
                ->add('email','email')
                ->add('password','repeated',array('type'=>"password",
                                                  'invalid_message' => 'The password fields must match.',
                                                  'options' => array('label' => 'Password')
                          )
                    )
                ->getForm();
        if($request->getMethod() == 'POST')
        {
            $form->bindRequest($request);
            if($form->isValid())
            {
                $accountService = $this->get('YunshangCommonBundle.accountService');
                try{
                    $accountService->register($accountRegisterHelper);
                    $this->get('session')->setFlash('notice', array('message'=>'Success, please login'));
                    return $this->redirect($this->generateUrl('account_login'));
                } catch(\Exception $e){
                    $error['message'] = $e->getMessage();
                }
            }
        }
        return array("error"=>isset($error)?$error:array(),
                     "form"=>$form->createView()); 
    }

     /**
     * @Route("/account/login",name="account_login")
     * @Template()
     */
    public function loginAction()
    {
        
        $request = $this->getRequest();
        $session = $request->getSession();

        // get the login error if there is one
        if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
            $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
        } else {
            $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
        }

        return $this->render('YunshangCommonBundle:Default:login.html.twig', array(
            // last username entered by the user
            'last_username' => $session->get(SecurityContext::LAST_USERNAME),
            'error'         => $error,
        ));        
    }

    /**
     * @Route("/account/login_check",name="account_login_check")
     */
    public function loginCheckAction()
    {
        
    }

    /**
     * @Route("/account/logout",name="account_logout")
     */
    public function logoutAction()
    {
        
    }

    /**
     *@Route("/locale/en_US",name="locale_en_US")
     */
    public function setEnLocaleAction(){
        $this->get('session')->setLocale('en_US');
                return $this->redirect($this->generateUrl('manage_system_configuration_index'));
        
    }

    /**
     *@Route("/locale/zh_CN",name="locale_zh_CN")
     */
    public function setZhCNLocaleAction(){
        $this->get('session')->setLocale('zh_CN');        
                return $this->redirect($this->generateUrl('manage_system_configuration_index'));
    }

    /**
     * @Route("/locale/navi",name="locale_navi")
     * from Pandora: they can not take whatever they want
     * I see you.
     * in Navi: Nga yawne lu oer.
     * in English: I love you.
     */
    public function setNaviLocaleAction(){
        $this->get('session')->setLocale('navi');
                return $this->redirect($this->generateUrl('manage_system_configuration_index'));
    }
}
