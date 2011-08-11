<?php

namespace Yunshang\Bundle\CommonBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Yunshang\Bundle\CommonBundle\Entity\Account\Member;

class DefaultController extends Controller
{
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
}
