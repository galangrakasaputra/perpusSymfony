<?php

namespace App\Controller;

use App\Repository\BooksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class BooksController extends AbstractController
{
    #[Route('/books', name: 'app_books')]
    public function index(BooksRepository $books): Response
    {
        $data = $books->getAllBooks();
        return $this->render('books/index.html.twig', [
            'controller_name' => 'BooksController',
            'books' => $data,
        ]);
    }

    #[Route('/create_book', name: 'tambah_buku')]
    public function create(BooksRepository $books): Response
    {
        $data = $books->getAllBooks();
        return $this->render('books/create.html.twig', [
            'controller_name' => 'BooksController',
            'books' => $data,
        ]);
    }
}
