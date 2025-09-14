<?php

namespace App\Repository;

use App\Entity\Member;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Member>
 */
class MemberRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Member::class);
    }

    public function getAllMember(){
        $data = $this->createQueryBuilder('m')
        ->orderBy('m.id', 'ASC')
        ->getQuery()
        ->getResult();

        if($data != []){
            return $data;
        }else{
            return false;
        }
    }

    public function addMember($data): void
    {
        $member = new Member();
        $member->setKTA($data['kta']);
        $member->setNama($data['nama_anggota']);
        $em = $this->getEntityManager();
        $em->persist($member);
        $em->flush();
    }

    public function deleteMember(int $id): void
    {
        $this->createQueryBuilder('b')
        ->delete()
        ->where('b.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->execute();
    }

    public function getDataMember(int $id)
    {
        return $this->createQueryBuilder('b')
        ->where('b.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getOneOrNullResult();
    }

    public function editMember($data, int $id): void
    {
        $member = $this->find($id);
        $member->setKTA($data['kta']);
        $member->setNama($data['nama_anggota']);
        $em = $this->getEntityManager();
        $em->persist($member);
        $em->flush();
    }

    //    /**
    //     * @return Member[] Returns an array of Member objects
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

    //    public function findOneBySomeField($value): ?Member
    //    {
    //        return $this->createQueryBuilder('m')
    //            ->andWhere('m.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
