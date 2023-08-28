<?php

namespace App\Newsletter\Infrastructure;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<DoctrineEmailAddressEntity>
 *
 * @method DoctrineEmailAddressEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method DoctrineEmailAddressEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method DoctrineEmailAddressEntity[]    findAll()
 * @method DoctrineEmailAddressEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DoctrineEmailAddressRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DoctrineEmailAddressEntity::class);
    }

    public function save(DoctrineEmailAddressEntity $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EmailAddress[] Returns an array of EmailAddress objects
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

//    public function findOneBySomeField($value): ?EmailAddress
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }

    public function findActiveEmailAddresses(): array
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.disabled = :val')
            ->setParameter('val', false)
            ->getQuery()
            ->getArrayResult()
        ;
    }

}
