<?php

namespace App\Repository;

use App\Entity\POSTE;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @extends ServiceEntityRepository<POSTE>
 *
 * @method POSTE|null find($id, $lockMode = null, $lockVersion = null)
 * @method POSTE|null findOneBy(array $criteria, array $orderBy = null)
 * @method POSTE[]    findAll()
 * @method POSTE[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class POSTERepository extends ServiceEntityRepository
{
    public const PAGINATOR_PER_PAGE = 20; //even number 

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, POSTE::class);
    }

    public function add(POSTE $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(POSTE $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function getPostePaginator(int $offset): Paginator
    {
        $query = $this->createQueryBuilder('p')
            //->andWhere('p.id = :poste')
            //->setParameter('poste', $poste)
            //->orderBy('p.nombreReponse', 'DESC')
            ->setMaxResults(self::PAGINATOR_PER_PAGE)
            ->setFirstResult($offset)
            ->getQuery()
        ;

        return new Paginator($query);
    }


//    /**
//     * @return POSTE[] Returns an array of POSTE objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?POSTE
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
