<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 19/07/15
 * Time: 3:58 PM
 */

namespace AppBundle\Controller;


class RegistrationController extends BaseController
{
    public function registerAction()
    {
//        $registration = new Registration();
//        $form = $this->createForm(new RegistrationType(), $registration, array(
//            'action' => $this->generateUrl('account_create'),
//        ));

        return $this->render(
            'AppBundle:registration:register.html.twig'
        );
    }
}