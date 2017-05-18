<?php

namespace HostguestBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Randonnees
 *
 * @ORM\Table(name="randonnees")
 * @ORM\Entity
 */
class Sorties
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $lieu;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $nbmax;

    /**
     * @var string
     */
    private $conditions;

    /**
     * @var string
     */
    private $typeSortie;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Sorties
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Sorties
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set lieu
     *
     * @param string $lieu
     *
     * @return Sorties
     */
    public function setLieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get lieu
     *
     * @return string
     */
    public function getLieu()
    {
        return $this->lieu;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Sorties
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set nbmax
     *
     * @param integer $nbmax
     *
     * @return Sorties
     */
    public function setNbmax($nbmax)
    {
        $this->nbmax = $nbmax;

        return $this;
    }

    /**
     * Get nbmax
     *
     * @return integer
     */
    public function getNbmax()
    {
        return $this->nbmax;
    }

    /**
     * Set conditions
     *
     * @param string $conditions
     *
     * @return Sorties
     */
    public function setConditions($conditions)
    {
        $this->conditions = $conditions;

        return $this;
    }

    /**
     * Get conditions
     *
     * @return string
     */
    public function getConditions()
    {
        return $this->conditions;
    }

    /**
     * Set typeSortie
     *
     * @param string $typeSortie
     *
     * @return Sorties
     */
    public function setTypeSortie($typeSortie)
    {
        $this->typeSortie = $typeSortie;

        return $this;
    }

    /**
     * Get typeSortie
     *
     * @return string
     */
    public function getTypeSortie()
    {
        return $this->typeSortie;
    }

    /**
     * Set id
     *
     * @param \HostguestBundle\Entity\Offres $id
     *
     * @return Sorties
     */
    public function setId(\HostguestBundle\Entity\Offres $id = null)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \HostguestBundle\Entity\Offres
     */
    public function getId()
    {
        return $this->id;
    }
}
