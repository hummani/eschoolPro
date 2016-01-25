<?php

namespace UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\CssSelector\XPath\Translator;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends Controller
{
    public function indexAction()
    {
        $user = $this->get('student_manager');

        return $this->render('UserBundle:Security:index.html.twig');
    }

    public function registerAction(Request $request)
    {

        $user = $this->get('student_handler');

        if ($user->onProcess()) {
           die('ok');
        }

        return $this->render(
            'UserBundle:Security:register.html.twig',
            array('form' => $user->getForm()->createView())
        );
    }

    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'UserBundle:Security:login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error' => $error,

            ));

    }
}
