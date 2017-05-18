<?php

namespace HostguestBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Logements
 *
 * @ORM\Table(name="logements")
 * @ORM\Entity(repositoryClass="HostguestBundle\Repository\LogementRepository")
 */
class Logements
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
     * @ORM\Column(name="adresse", type="string", length=50, nullable=false)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=50, nullable=false)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="paye", type="string", length=50, nullable=false)
     */
    private $paye;

    /**
     * @var float
     *
     * @ORM\Column(name="prix", type="float", precision=10, scale=0, nullable=false)
     */
    private $prix;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=50, nullable=false)
     */
    private $type;

    /**
     * @var boolean
     *
     * @ORM\Column(name="internet", type="boolean", nullable=false)
     */
    private $internet;

    /**
     * @var boolean
     *
     * @ORM\Column(name="parking", type="boolean", nullable=false)
     */
    private $parking;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cableTv", type="boolean", nullable=false)
     */
    private $cabletv;

    /**
     * @var boolean
     *
     * @ORM\Column(name="piscine", type="boolean", nullable=false)
     */
    private $piscine;

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
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    }

    /**
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * @param string $ville
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    }

    /**
     * @return string
     */
    public function getPaye()
    {
        return $this->paye;
    }

    /**
     * @param string $paye
     */
    public function setPaye($paye)
    {
        $this->paye = $paye;
    }


    /**
     * @return float
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * @param float $prix
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
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
     * @return bool
     */
    public function isInternet()
    {
        return $this->internet;
    }

    /**
     * @param bool $internet
     */
    public function setInternet($internet)
    {
        $this->internet = $internet;
    }

    /**
     * @return bool
     */
    public function isParking()
    {
        return $this->parking;
    }

    /**
     * @param bool $parking
     */
    public function setParking($parking)
    {
        $this->parking = $parking;
    }

    /**
     * @return bool
     */
    public function isCabletv()
    {
        return $this->cabletv;
    }

    /**
     * @param bool $cabletv
     */
    public function setCabletv($cabletv)
    {
        $this->cabletv = $cabletv;
    }

    /**
     * @return bool
     */
    public function isPiscine()
    {
        return $this->piscine;
    }

    /**
     * @param bool $piscine
     */
    public function setPiscine($piscine)
    {
        $this->piscine = $piscine;
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

