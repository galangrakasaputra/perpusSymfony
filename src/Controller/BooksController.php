<?php

namespace App\Controller;

use App\Repository\BooksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/save_book', name: 'save_book_create', methods: ['POST'])]
    public function store(Request $request, BooksRepository $books): Response
    {
        $data = $request->request->all();
        $books->addBooks($data);
        
        return $this->redirectToRoute('app_books');
    }
    
    #[Route('/edit_book/{id}', name: 'edit_buku')]
    public function edit(){
        
    }
    
    #[Route('/delete_book/{id}', name: 'hapus_buku', methods: ['POST'])]
    public function delete(int $id,Request $request, BooksRepository $book){
        $book->deleteBook($id);
        return $this->redirectToRoute('app_books');
    }

}
