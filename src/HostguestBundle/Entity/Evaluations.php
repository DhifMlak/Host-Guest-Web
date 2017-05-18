<?php

namespace HostguestBundle\Entity;

/**
 * Evaluations
 */
class Evaluations
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var float
     */
    private $facility;

    /**
     * @var float
     */
    private $service;
    /**
     * @var float
     */
    private $interesting;
    /**
     * @var float
     */
    private $human;
    /**
     * @var float
     */
    private $note;
    /**
     * @var string
     */
    private $commentaire;

    /**
     * @var integer
     */
    private $idOffre;

    /**
     * @var integer
     */
    private $idVoyageur;


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
     * Set titre
     *
     * @param string $titre
     *
     * @return Evaluations
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
     * Set note
     *
     * @param float $note
     *
     * @return Evaluations
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return float
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set commentaire
     *
     * @param string $commentaire
     *
     * @return Evaluations
     */
    public function setCommentaire($commentaire)
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    /**
     * Get commentaire
     *
     * @return string
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }

    /**
     * Set idOffre
     *
     * @param integer $idOffre
     *
     * @return Evaluations
     */
    public function setIdOffre($idOffre)
    {
        $this->idOffre = $idOffre;

        return $this;
    }

    /**
     * Get idOffre
     *
     * @return integer
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * Set idVoyageur
     *
     * @param  $idVoyageur
     *
     * @return Evaluations
     */
    public function setIdVoyageur($idVoyageur)
    {
        $this->idVoyageur = $idVoyageur;

        return $this;
    }

    /**
     * Get idVoyageur
     *
     * @return integer
     */
    public function getIdVoyageur()
    {
        return $this->idVoyageur;
    }

    /**
     * @return float
     */
    public function getFacility()
    {
        return $this->facility;
    }

    /**
     * @param float $facility
     */
    public function setFacility($facility)
    {
        $this->facility = $facility;
    }

    /**
     * @return float
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @param float $service
     */
    public function setService($service)
    {
        $this->service = $service;
    }

    /**
     * @return float
     */
    public function getInteresting()
    {
        return $this->interesting;
    }

    /**
     * @param float $interesting
     */
    public function setInteresting($interesting)
    {
        $this->interesting = $interesting;
    }

    /**
     * @return float
     */
    public function getHuman()
    {
        return $this->human;
    }

    /**
     * @param float $human
     */
    public function setHuman($human)
    {
        $this->human = $human;
    }


}
