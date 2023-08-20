<?php

namespace App\Repository;

use App\Entity\ExamenAnalyse;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ExamenAnalyse>
 *
 * @method ExamenAnalyse|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExamenAnalyse|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExamenAnalyse[]    findAll()
 * @method ExamenAnalyse[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExamenAnalyseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExamenAnalyse::class);
    }

//    /**
//     * @return ExamenAnalyse[] Returns an array of ExamenAnalyse objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ExamenAnalyse
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
