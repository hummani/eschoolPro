<?php

namespace ManagementBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use EschoolBundle\Entity\Evaluation;
use UserBundle\Entity\Student;

/**
 * StudentEvaluations
 *
 * @ORM\Table(name="student_evaluations")
 * @ORM\Entity(repositoryClass="ManagementBundle\Repository\StudentEvaluationsRepository")
 */
class StudentEvaluations
{

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="EschoolBundle\Entity\Evaluation", inversedBy="marks")
     * @ORM\JoinColumn(name="evaluation_id", referencedColumnName="id")
     */
    private $evaluation;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Student", inversedBy="marks")
     * @ORM\JoinColumn(name="student_id", referencedColumnName="id")
     */
    private $student;

    /**
     * @var float
     * @ORM\Column(name="mark", type="float")
     */
    private $mark;

    /**
     * @param Evaluation $evaluation
     * @param Student $student
     */
    public function __construct(Evaluation $evaluation, Student $student){
        $this->evaluation=$evaluation;
        $this->student=$student;
    }



    /**
     * Set evaluation
     *
     * @param \EschoolBundle\Entity\Evaluation $evaluation
     *
     * @return StudentEvaluations
     */
    public function setEvaluation(\EschoolBundle\Entity\Evaluation $evaluation)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return \EschoolBundle\Entity\Evaluation
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set mark
     *
     * @param float $mark
     *
     * @return StudentEvaluations
     */
    public function setMark($mark)
    {
        $this->mark = $mark;

        return $this;
    }

    /**
     * Get mark
     *
     * @return float
     */
    public function getMark()
    {
        return $this->mark;
    }

    /**
     * Set student
     *
     * @param \UserBundle\Entity\Student $student
     *
     * @return StudentEvaluations
     */
    public function setStudent(\UserBundle\Entity\Student $student)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \UserBundle\Entity\Student
     */
    public function getStudent()
    {
        return $this->student;
    }
}
