<?php

namespace App\Repository;

use App\Entity\FormulaireConnexion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormulaireConnexion|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormulaireConnexion|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormulaireConnexion[]    findAll()
 * @method FormulaireConnexion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormulaireConnexionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormulaireConnexion::class);
    }

    // /**
    //  * @return FormulaireConnexion[] Returns an array of FormulaireConnexion objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FormulaireConnexion
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
