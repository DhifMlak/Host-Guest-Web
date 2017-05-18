<?php
/**
 * Created by PhpStorm.
 * User: mehdi
 * Date: 4/9/2017
 * Time: 13:57
 */

namespace HostguestBundle\Repository;
use \Doctrine\ORM\EntityRepository;

class LogementRepository extends EntityRepository
{

    function findLogByOffre($offre)
    {
        $query=$this->getEntityManager()->createQuery("
                select r from HostguestBundle:Logements r where r.id=:offre
              ")->setParameter('offre',$offre);
        return $query->getResult();
    }
    function findLogByOffreLieu($offre ,$ville)
    {
        $query=$this->getEntityManager()->createQuery("
                select r from HostguestBundle:Logements r where r.id=:offre  AND r.ville=:ville
              ")->setParameter('offre',$offre)->setParameter('ville',$ville);
        return $query->getResult();
    }

}