<?php

namespace UserBundle\Form\Handler;

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\SecurityContext;
use UserBundle\Entity\Managers\UserManager;


class UserHandler extends AbstractUserHandler
{
    protected $form;

    public function __construct(Request $request, UserPasswordEncoder $encoder, SecurityContext $security, UserManager $userManager,Form $form)
    {
        parent::__construct($request,$encoder,$security,$userManager);
        $this->form = $form;
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
        $user->eraseCredentials();
        $this->userManager->Persist($user);
    }
}