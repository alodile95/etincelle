<?php

namespace App\Repository;

use App\Entity\Contexte;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contexte|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contexte|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contexte[]    findAll()
 * @method Contexte[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContexteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contexte::class);
    }

    // /**
    //  * @return Contexte[] Returns an array of Contexte objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contexte
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
