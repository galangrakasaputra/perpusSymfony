<?php

namespace App\Entity;

use App\Repository\TransaksiRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TransaksiRepository::class)]
class Transaksi
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_books = null;

    #[ORM\Column]
    private ?int $id_member = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): static
    {
        $this->id = $id;

        return $this;
    }

    public function getIdBooks(): ?int
    {
        return $this->id_books;
    }

    public function setIdBooks(int $id_books): static
    {
        $this->id_books = $id_books;

        return $this;
    }

    public function getIdMember(): ?int
    {
        return $this->id_member;
    }

    public function setIdMember(int $id_member): static
    {
        $this->id_member = $id_member;

        return $this;
    }
}
