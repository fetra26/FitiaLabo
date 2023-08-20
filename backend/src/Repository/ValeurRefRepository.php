<?php

namespace App\Repository;

use App\Entity\ValeurRef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ValeurRef>
 *
 * @method ValeurRef|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValeurRef|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValeurRef[]    findAll()
 * @method ValeurRef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValeurRefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValeurRef::class);
    }

//    /**
//     * @return ValeurRef[] Returns an array of ValeurRef objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ValeurRef
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
