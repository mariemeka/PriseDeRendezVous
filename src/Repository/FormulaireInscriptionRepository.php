<?php

namespace App\Repository;

use App\Entity\FormulaireInscription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormulaireInscription|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormulaireInscription|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormulaireInscription[]    findAll()
 * @method FormulaireInscription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormulaireInscriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormulaireInscription::class);
    }

    // /**
    //  * @return FormulaireInscription[] Returns an array of FormulaireInscription objects
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
    public function findOneBySomeField($value): ?FormulaireInscription
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
