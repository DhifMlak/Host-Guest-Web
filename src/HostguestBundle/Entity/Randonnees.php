<?php

namespace HostguestBundle\Entity;
use Doctrine\ORM\Mapping as ORM;



/**
 * Randonnees
 *
 * @ORM\Table(name="randonnees")
 * @ORM\Entity(repositoryClass="HostguestBundle\Repository\RandonneeRepository")
 */

class Randonnees
{
    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=50, nullable=false)
     */
    private $titre;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu", type="string", length=50, nullable=false)
     */
    private $lieu;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbMax", type="integer", nullable=false)
     */
    private $nbmax;
    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="lieu_rencontre", type="string", length=50, nullable=false)
     */
    private $lieuRencontre;

    /**
     * @var string
     *
     * @ORM\Column(name="heure_rencontre", type="string", length=10, nullable=false)
     */
    private $heureRencontre;

    /**
     * @var string
     *
     * @ORM\Column(name="prix", type="string", length=10, nullable=false)
     */
    private $prix;

    /**
     * @var \Offres
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Offres")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


    /**
     * Randonnees constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * @param string $lieu
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;
    }

    /**
     * @return int
     */
    public function getNbmax()
    {
        return $this->nbmax;
    }

    /**
     * @param int $nbmax
     */
    public function setNbmax($nbmax)
    {
        $this->nbmax = $nbmax;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getLieuRencontre()
    {
        return $this->lieuRencontre;
    }

    /**
     * @param string $lieuRencontre
     */
    public function setLieuRencontre($lieuRencontre)
    {
        $this->lieuRencontre = $lieuRencontre;
    }

    /**
     * @return string
     */
    public function getHeureRencontre()
    {
        return $this->heureRencontre;
    }

    /**
     * @param string $heureRencontre
     */
    public function setHeureRencontre($heureRencontre)
    {
        $this->heureRencontre = $heureRencontre;
    }

    /**
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param string $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    }

    /**
     * @return \Offres
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param \Offres $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }






}

