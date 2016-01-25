<?php

namespace UserBundle\Form\Handler;

use Symfony\Component\Form\Extension\Validator\Constraints\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\SecurityContext;
use UserBundle\Entity\Managers\UserManager;


abstract class AbstractUserHandler
{
    protected $request;
    protected $userManager;
    protected $encoder;
    protected $security;


    public function __construct(Request $request, UserPasswordEncoder $encoder, SecurityContext $security, UserManager $userManager)
    {

        $this->request = $request;
        $this->userManager= $userManager;
        $this->encoder = $encoder;
        $this->security=$security;
    }

}