<?php

namespace HostguestBundle\Entity;

/**
 * PackOffre
 */
class PackOffre
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \HostguestBundle\Entity\Packs
     */
    private $idPack;

    /**
     * @var \HostguestBundle\Entity\Offres
     */
    private $idOffre;


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
     * Set idPack
     *
     * @param \HostguestBundle\Entity\Packs $idPack
     *
     * @return PackOffre
     */
    public function setIdPack(\HostguestBundle\Entity\Packs $idPack = null)
    {
        $this->idPack = $idPack;

        return $this;
    }

    /**
     * Get idPack
     *
     * @return \HostguestBundle\Entity\Packs
     */
    public function getIdPack()
    {
        return $this->idPack;
    }

    /**
     * Set idOffre
     *
     * @param \HostguestBundle\Entity\Offres $idOffre
     *
     * @return PackOffre
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
}
