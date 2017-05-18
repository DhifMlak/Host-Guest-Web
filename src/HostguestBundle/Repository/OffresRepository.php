<?php
namespace HostguestBundle\Repository;
use \Doctrine\ORM\EntityRepository;
/**
 * Created by PhpStorm.
 * User: Firas
 * Date: 06/04/2017
 * Time: 09:42
 */
class OffresRepository extends EntityRepository
{
    function lastInsertedId(){
        $query=$this->getEntityManager()->createQuery("
                select MAX(o.id)  from HostguestBundle:Offres o 
              ");
        return $query->getSingleResult();

    }
    function findOffreByUser($user)
    {
        $query=$this->getEntityManager()->createQuery("
                select o from HostguestBundle:Offres o where o.idHote=:user  AND o.typeOffre=:type
              ")->setParameter('user',$user)->setParameter('type','randonnee');
        return $query->getResult();
    }

}