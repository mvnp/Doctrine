<?php
namespace DoctrineNaPratica\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="Enrollment")
*/
class Enrollment
{
    /**
     * @ORM\Id @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var integer
     */
    protected $id;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="enrollmentCollection", cascade={"persist", "merge", "refresh"})
     *
     * @var Course
     * 
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="enrollmentCollection", cascade={"persist", "merge", "refresh"})
     *
     * @var Course
     * 
     */
    protected $course;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     * @var string
     * 
     */
    protected $certificationCode;

    /* ####################################################################### */
    /* ######### Getters e Setters ########################################### */
    /* ####################################################################### */
    
    public function getId()
    {
        return $this->id;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser($user)
    {
        return $this->user = $user;
    }

    public function getCourse()
    {
        return $this->course;
    }

    public function setCourse($course)
    {
        return $this->course = $course;
    }

    public function getCertificationCode()
    {
        return $this->certificationCode;
    }

    public function setCertificationCode($certificationCode)
    {
        return $this->certificationCode = $certificationCode;
    }
}