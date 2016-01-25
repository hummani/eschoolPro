<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;

/**
 * Student
 *
 * @ORM\Table(name="student")
 * @ORM\Entity(repositoryClass="UserBundle\Repository\StudentRepository")
 */
class Student extends User
{

    /**
     * @ORM\OneToMany(targetEntity="ManagementBundle\Entity\StudentEvaluations", mappedBy="student")
     */
    private $marks;

    /**
     * Add mark
     *
     * @param \ManagementBundle\Entity\StudentEvaluations $mark
     *
     * @return Student
     */
    public function addMark(\ManagementBundle\Entity\StudentEvaluations $mark)
    {
        $this->marks[] = $mark;

        return $this;
    }

    /**
     * Remove mark
     *
     * @param \ManagementBundle\Entity\StudentEvaluations $mark
     */
    public function removeMark(\ManagementBundle\Entity\StudentEvaluations $mark)
    {
        $this->marks->removeElement($mark);
    }

    /**
     * Get marks
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMarks()
    {
        return $this->marks;
    }



    public function getRoles()
    {
        // TODO: Implement getRoles() method.
    }

    public function getPassword()
    {
        // TODO: Implement getPassword() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    public function getUsername()
    {
        // TODO: Implement getUsername() method.
    }




}
