<?php

namespace App\Repository;

use App\Email\Infrastructure\DoctrineEmailTemplateEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DoctrineEmailTemplateEntity>
 *
 * @method DoctrineEmailTemplateEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method DoctrineEmailTemplateEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method DoctrineEmailTemplateEntity[]    findAll()
 * @method DoctrineEmailTemplateEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EmailTemplateRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DoctrineEmailTemplateEntity::class);
    }

//    /**
//     * @return EmailTemplate[] Returns an array of EmailTemplate objects
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

//    public function findOneBySomeField($value): ?EmailTemplate
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
