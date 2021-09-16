<?php

namespace App\Repository;

use App\Entity\DateExam;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DateExam|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateExam|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateExam[]    findAll()
 * @method DateExam[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateExamRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DateExam::class);
    }

    // /**
    //  * @return DateExam[] Returns an array of DateExam objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DateExam
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
