<?php

namespace UserBundle\Entity\Managers;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityNotFoundException;

class StudentManager {

    private $em;
    private $repository;

    public function __construct(EntityManager $em){
        $this->em= $em;
        $this->repository = $em->getRepository('UserBundle:Student');
    }

    public function getAll()
    {
        return $this->repository->findAll();
    }

    public function getStudent($id)
    {
        return $this->repository->find($id);
    }

    public function persist($user)
    {
        $this->em->persist($user);
        $this->em->flush();
        return $user;
    }

    public function remove($id)
    {
        $student = $this->repository->find($id);
        if($student!=null)
        {
            $this->em->remove($student);
            $this->em->flush();
        }
        else
            throw new EntityNotFoundException('fgfg');
    }
}