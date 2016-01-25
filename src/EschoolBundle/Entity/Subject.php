<?php

namespace EschoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subject
 *
 * @ORM\Table(name="subject")
 * @ORM\Entity(repositoryClass="EschoolBundle\Repository\SubjectRepository")
 */
class Subject extends Evaluation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="names", type="string", length=50)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="coef", type="smallint")
     */
    private $coef;



    /**
     * Set name
     *
     * @param string $name
     *
     * @return Subject
     */
    public function setNames($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set coef
     *
     * @param integer $coef
     *
     * @return Subject
     */
    public function setCoef($coef)
    {
        $this->coef = $coef;

        return $this;
    }

    /**
     * Get coef
     *
     * @return integer
     */
    public function getCoef()
    {
        return $this->coef;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Subject
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
