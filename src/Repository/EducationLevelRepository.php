<?php

namespace App\Repository;

use App\Entity\EducationLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EducationLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method EducationLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method EducationLevel[]    findAll()
 * @method EducationLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EducationLevelRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EducationLevel::class);
    }

//    /**
//     * @return EducationLevel[] Returns an array of EducationLevel objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EducationLevel
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
