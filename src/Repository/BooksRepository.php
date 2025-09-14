<?php

namespace App\Repository;

use App\Entity\Books;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Books>
 */
class BooksRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Books::class);
    }

    public function getAllBooks(){
        return $this->createQueryBuilder('b')
        ->orderBy('b.id', 'ASC')
        ->getQuery()
        ->getResult();
    }


    public function addBooks($data): void
    {
        $book = new Books();
        $book->setNamaBuku($data['nama_buku']);
        $book->setGenre($data['genre']);
        $book->setStock($data['stock']);
        $book->setAuthor($data['author']);
        $em = $this->getEntityManager();
        $em->persist($book);
        $em->flush();
    }

    public function deleteBook(int $id): void
    {
        $this->createQueryBuilder('b')
        ->delete()
        ->where('b.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->execute();
    }

    public function editBooks($data, int $id): void
    {
        $book = $this->find($id);
        $book->setNamaBuku($data['nama_buku']);
        $book->setGenre($data['genre']);
        $book->setStock($data['stock']);
        $book->setAuthor($data['author']);
        $em = $this->getEntityManager();
        $em->flush();
    }

    public function getDataBook(int $id)
    {
        return $this->createQueryBuilder('b')
        ->where('b.id = :id')
        ->setParameter('id', $id)
        ->getQuery()
        ->getOneOrNullResult();
    }

    //    /**
    //     * @return Books[] Returns an array of Books objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('b.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Books
    //    {
    //        return $this->createQueryBuilder('b')
    //            ->andWhere('b.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
