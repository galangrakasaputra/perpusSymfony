<?php

namespace App\Controller;

use App\Repository\MemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;

final class MemberController extends AbstractController
{
    #[Route('/member', name: 'app_member')]
    public function index(MemberRepository $member): Response
    {
        $data = $member->getAllMember();
        return $this->render('member/index.html.twig', [
            'controller_name' => 'MemberController',
            'members' => $data
        ]);
    }

    #[Route('/create_member', name: 'tambah_anggota')]
    public function create(): Response
    {
        return $this->render('member/create.html.twig', [
            'controller_name' => 'BooksController',
        ]);
    }

    #[Route('/save_member', name: 'save_member_create', methods: ['POST'])]
    public function store(Request $request, MemberRepository $member): Response
    {
        $data = $request->request->all();
        $member->addMember($data);
        
        return $this->redirectToRoute('app_member');
    }

    #[Route('/edit_member/{id}', name: 'edit_anggota')]
    public function edit(int $id, MemberRepository $member){
        $data = $member->getDataMember($id);
        return $this->render('member/edit.html.twig', [
            'member' => $data
        ]);
    }

    #[Route('/update_member/{id}', name: 'save_member_edit', methods: ['POST'])]
    public function update(int $id,Request $request, MemberRepository $member): Response
    {
        $data = $request->request->all();
        $member->editMember($data, $id);
        
        return $this->redirectToRoute('app_member');
    }

    #[Route('/delete_member/{id}', name: 'hapus_anggota', methods: ['POST'])]
    public function delete(int $id, MemberRepository $member){
        $member->deleteMember($id);
        return $this->redirectToRoute('app_member');
    }
}
