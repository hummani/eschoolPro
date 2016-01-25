<?php

namespace UserBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\SecurityContext;
use UserBundle\Entity\Managers\StudentManager;
use UserBundle\Entity\Managers\UserManager;


class StudentHandler extends AbstractUserHandler
{
    private $form;

    
    public function __construct(Request $request, UserPasswordEncoder $encoder, SecurityContext $security,UserManager $userManager, Form $form)
    {
        $this->form=$form;
        parent::__construct($request,$encoder,$security,$userManager);
    }

    /**
     * @return bool
     */
    public function onProcess()
    {
        $this->form->handleRequest($this->request);

        if ($this->request->isMethod('post') && $this->form->isValid()) {
            $this->onSuccess();
            return true;
        }

        return false;
    }


    public function getForm()
    {
        return $this->form;
    }


    protected function onSuccess()
    {
        $user= $this->form->getData();

        $creator = $this->security->getToken()->getUser();
        if($creator!=='anon.')
            $user->setCreatedBy($creator);
        $password = $this->encoder->encodePassword($user, $user->getPlainPassword());
        $user->setPassword($password);
        $user->setRoles(array('ROLE_STUDENT'));
        $user->eraseCredentials();
        $this->userManager->Persist($user);
    }
}