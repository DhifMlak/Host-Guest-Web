<?php
/**
 * Created by PhpStorm.
 * User: EYA
 * Date: 10/04/2017
 * Time: 08:04
 */

namespace HostguestBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 *
 *
 * @ORM\Table(name="echange")
 * @ORM\Entity
 */

class Echange
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Logements")
     */
    private $logment1;
    /**
     * @ORM\OneToOne(targetEntity="Logements")
     */
    private $logment2;
    /**
     * @ORM\OneToOne(targetEntity="Utilisateurs")
     */
    private $user;
    /**
     * @ORM\OneToOne(targetEntity="Utilisateurs")
     */
    private $user1;
    /**
     * @var string
     *
     * @ORM\Column(name="date_Deb", type="date", length=50, nullable=false)
     */
    private $dateDeb;

    /**
     * @var string
     *
     * @ORM\Column(name="date_Fin", type="date", length=50, nullable=false)
     */
    private $dateFin;
    /**
     * @var integer
     *
     * @ORM\Column(name="accept", type="integer", nullable=false)
     */
    protected $accept;

    /**
     * @return mixed
     */
    public function getLogment1()
    {
        return $this->logment1;
    }

    /**
     * @param mixed $logment1
     */
    public function setLogment1($logment1)
    {
        $this->logment1 = $logment1;
    }

    /**
     * @return mixed
     */
    public function getLogment2()
    {
        return $this->logment2;
    }

    /**
     * @param mixed $logment2
     */
    public function setLogment2($logment2)
    {
        $this->logment2 = $logment2;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * @param mixed $dateDeb
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;
    }

    /**
     * @return string
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param string $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUser1()
    {
        return $this->user1;
    }

    /**
     * @param mixed $user1
     */
    public function setUser1($user1)
    {
        $this->user1 = $user1;
    }

    /**
     * @return int
     */
    public function getAccept()
    {
        return $this->accept;
    }

    /**
     * @param int $accept
     */
    public function setAccept($accept)
    {
        $this->accept = $accept;
    }

}