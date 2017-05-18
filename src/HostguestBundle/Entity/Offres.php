<?php

namespace HostguestBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Offres
 *
 * @ORM\Table(name="offres", indexes={@ORM\Index(name="id_utilisateur", columns={"id_hote"})})
 * @ORM\Entity(repositoryClass="HostguestBundle\Repository\OffresRepository")
 */
class Offres
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
     * @var string
     *
     * @ORM\Column(name="type_offre", type="string", length=50, nullable=false)
     */
    private $typeOffre;

    /**
     * @var \Utilisateurs
     *
     * @ORM\ManyToOne(targetEntity="Utilisateurs")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_hote", referencedColumnName="id")
     * })
     */
    private $idHote;

    /**
     * Offres constructor.
     */
    public function __construct()
    {
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
     * @return string
     */
    public function getTypeOffre()
    {
        return $this->typeOffre;
    }

    /**
     * @param string $typeOffre
     */
    public function setTypeOffre($typeOffre)
    {
        $this->typeOffre = $typeOffre;
    }

    /**
     * @return \Utilisateurs
     */
    public function getIdHote()
    {
        return $this->idHote;
    }

    /**
     * @param \Utilisateurs $idHote
     */
    public function setIdHote($idHote)
    {
        $this->idHote = $idHote;
    }



}

