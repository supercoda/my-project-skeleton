<?php

namespace AppBundle\Controller;


use Symfony\Component\HttpFoundation\Request;

class SecurityController extends BaseController
{
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'AppBundle:security:login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

//    public function loginCheckAction()
//    {
//        // this controller will not be executed,
//        // as the route is handled by the Security system
//    }
//
//    public function logoutAction()
//    {
//        // this controller will not be executed,
//        // as the route is handled by the Security system
//    }
}
