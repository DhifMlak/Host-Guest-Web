<?php
/**
 * Created by PhpStorm.
 * User: Firas
 * Date: 07/04/2017
 * Time: 00:31
 */

namespace HostguestBundle\Repository;
use \Doctrine\ORM\EntityRepository;


class RandonneeRepository extends EntityRepository
{
    function findRandoByOffre($offre)
    {
        $query=$this->getEntityManager()->createQuery("
                select r from HostguestBundle:Randonnees r where r.id=:offre AND r.etat=:stat
              ")->setParameter('offre',$offre)->setParameter('stat',1);
        return $query->getResult();
    }
    function findRandoByOffreLieu($offre ,$lieu)
    {
        $query=$this->getEntityManager()->createQuery("
                select r from HostguestBundle:Randonnees r where r.id=:offre  AND r.lieu=:lieu AND r.etat=:stat
              ")->setParameter('offre',$offre)->setParameter('lieu',$lieu)->setParameter('stat',1);
        return $query->getResult();
    }

}