<?php

namespace App\Repository;

use App\Entity\MatiereBio;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MatiereBio>
 *
 * @method MatiereBio|null find($id, $lockMode = null, $lockVersion = null)
 * @method MatiereBio|null findOneBy(array $criteria, array $orderBy = null)
 * @method MatiereBio[]    findAll()
 * @method MatiereBio[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatiereBioRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MatiereBio::class);
    }

//    /**
//     * @return MatiereBio[] Returns an array of MatiereBio objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MatiereBio
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
