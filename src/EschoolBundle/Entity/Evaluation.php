<?php

namespace EschoolBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="EschoolBundle\Repository\EvaluationRepository")
 *
 */
class Evaluation
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="date")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updatedAt", type="date")
     */
    private $updatedAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="evaluationDate", type="date")
     */
    private $evaluationDate;

    /**
     * @var int
     *
     * @ORM\Column(name="duration", type="smallint")
     */
    private $duration;

    /**
     * @ORM\OneToMany(targetEntity="ManagementBundle\Entity\StudentEvaluations", mappedBy="evaluation")
     */
    private $marks;

    /**
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\Teacher", inversedBy="evaluations")
     * @ORM\JoinColumn(name="teacher_id", referencedColumnName="id")
     */
    private $teacher;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->marks = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Evaluation
     */
    public function setName($name)
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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Evaluation
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Evaluation
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set evaluationDate
     *
     * @param \DateTime $evaluationDate
     *
     * @return Evaluation
     */
    public function setEvaluationDate($evaluationDate)
    {
        $this->evaluationDate = $evaluationDate;

        return $this;
    }

    /**
     * Get evaluationDate
     *
     * @return \DateTime
     */
    public function getEvaluationDate()
    {
        return $this->evaluationDate;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Evaluation
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Add mark
     *
     * @param \ManagementBundle\Entity\StudentEvaluations $mark
     *
     * @return Evaluation
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
}
