<?php

namespace HostguestBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Validator\Constraints\DateTime;

class SortiesRepository extends EntityRepository
{
    public function searchBy($titre, $date, $lieu)
    {
        if ($date != 'Date') {
            $datee = new \DateTime($date);
            $query = $this->createQueryBuilder('s')
                ->where('s.titre LIKE :titre')
                ->andWhere('s.date = :date')
                ->andWhere('s.lieu LIKE :lieu')
                ->setParameter('titre', "$titre%")
                ->setParameter('lieu', "$lieu%")
                ->setParameter('date', $datee->format('Y-m-d'))
                ->getQuery();
        } else {
            $query = $this->createQueryBuilder('s')
                ->where('s.titre LIKE :titre')
                ->andWhere('s.lieu LIKE :lieu')
                ->setParameter('titre', "$titre%")
                ->setParameter('lieu', "$lieu%")
                ->getQuery();
        }
        return $query->getResult();
    }



    public function myTrips($ids)
    {
        $qb = $this->createQueryBuilder('s');
        $qb->where($qb->expr()->in('s.id', array(138,139)));

        return $result = $qb->getQuery()->getResult();
    }
}