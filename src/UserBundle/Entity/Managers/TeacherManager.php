<?php

namespace UserBundle\Entity\Managers;

use Doctrine\ORM\EntityManager;

class TeacherManager {

    private $em;
    private $repository;

    public function __construct(EntityManager $em){
        $this->em= $em;
        $this->repository = $em->getRepository('UserBundle:Teacher');
    }


    public function Persist($user)
    {
        $this->em->persist($user);
        $this->em->flush();

       // return $user;
    }
}