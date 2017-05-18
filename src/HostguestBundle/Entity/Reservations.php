<?php

namespace HostguestBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Reservations
 *
 * @ORM\Table(name="reservations", indexes={@ORM\Index(name="id_voyageur", columns={"id_voyageur"}), @ORM\Index(name="id_offre", columns={"id_offre"}), @ORM\Index(name="id_pack", columns={"id_pack"})})
 * @ORM\Entity
 */
class Reservations
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbReservation", type="integer", nullable=false)
     */
    private $nbreservation;

    /**
     * @var string
     *
     * @ORM\Column(name="Telephone", type="string", length=18,nullable=true)
     */
    private $telephone;

    /**
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param string $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }





    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=5, nullable=false)
     */
    private $type;

    /**
     * @var date
     *
     * @ORM\Column(name="date_Deb", type="datetime")
     */
    private $dateDeb;

    /**
     * @var date
     *
     * @ORM\Column(name="date_Fin", type="datetime")
     */
    private $dateFin;

    /**
     * @var \Packs
     *
     * @ORM\ManyToOne(targetEntity="Packs" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pack", referencedColumnName="id")
     * })
     */
    private $idPack;

    /**
     * @var \Offres
     *
     * @ORM\ManyToOne(targetEntity="Offres")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_offre", referencedColumnName="id")
     * })
     */
    private $idOffre;

    /**
     * @var \Utilisateurs
     *
     * @ORM\ManyToOne(targetEntity="Utilisateurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_voyageur", referencedColumnName="id")
     * })
     */
    private $idVoyageur;

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
     * @return int
     */
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * @param int $etat
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;
    }

    /**
     * @return int
     */
    public function getNbreservation()
    {
        return $this->nbreservation;
    }

    /**
     * @param int $nbreservation
     */
    public function setNbreservation($nbreservation)
    {
        $this->nbreservation = $nbreservation;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
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
     * @return mixed
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * @param mixed $dateFin
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    }

    /**
     * @return \Packs
     */
    public function getIdPack()
    {
        return $this->idPack;
    }

    /**
     * @param \Packs $idPack
     */
    public function setIdPack($idPack)
    {
        $this->idPack = $idPack;
    }

    /**
     * @return \Offres
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * @param \Offres $idOffre
     */
    public function setIdOffre($idOffre)
    {
        $this->idOffre = $idOffre;
    }

    /**
     * @return \Utilisateurs
     */
    public function getIdVoyageur()
    {
        return $this->idVoyageur;
    }

    /**
     * @param \Utilisateurs $idVoyageur
     */
    public function setIdVoyageur($idVoyageur)
    {
        $this->idVoyageur = $idVoyageur;
    }

    public function __construct()
    {
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
    }


}

