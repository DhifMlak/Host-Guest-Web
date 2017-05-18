<?php

namespace HostguestBundle\Entity;

/**
 * OffreImage
 */
class OffreImage
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \HostguestBundle\Entity\Offres
     */
    private $idOffre;

    /**
     * @var \HostguestBundle\Entity\Images
     */
    private $idImage;


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
     * Set idOffre
     *
     * @param \HostguestBundle\Entity\Offres $idOffre
     *
     * @return OffreImage
     */
    public function setIdOffre(\HostguestBundle\Entity\Offres $idOffre = null)
    {
        $this->idOffre = $idOffre;

        return $this;
    }

    /**
     * Get idOffre
     *
     * @return \HostguestBundle\Entity\Offres
     */
    public function getIdOffre()
    {
        return $this->idOffre;
    }

    /**
     * Set idImage
     *
     * @param \HostguestBundle\Entity\Images $idImage
     *
     * @return OffreImage
     */
    public function setIdImage(\HostguestBundle\Entity\Images $idImage = null)
    {
        $this->idImage = $idImage;

        return $this;
    }

    /**
     * Get idImage
     *
     * @return \HostguestBundle\Entity\Images
     */
    public function getIdImage()
    {
        return $this->idImage;
    }
}
