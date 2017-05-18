<?php

namespace HostguestBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\DateTime;

class OffresRepository extends EntityRepository
{

    public function myOffers($user)
    {
        $qb = $this->createQueryBuilder('s');
        $qb->select('s.id')
            ->where('s.idHote = :user')
            ->setParameter('user', $user);

        return $result = $qb->getQuery()->getResult();
    }
}