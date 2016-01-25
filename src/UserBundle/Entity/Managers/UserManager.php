<?php

namespace UserBundle\Entity\Managers;

use Doctrine\ORM\EntityManager;

class UserManager {

    private $em;
    private $repository;

    public function __construct(EntityManager $em){
        $this->em= $em;
        $this->repository = $em->getRepository('UserBundle:User');
    }

    public function getAll()
    {
        return $this->repository->findAll();
    }

    public function getStudent($id)
    {
        return $this->repository->find($id);
    }

    public function Persist($user)
    {
        $this->em->persist($user);
        $this->em->flush();
    }
}