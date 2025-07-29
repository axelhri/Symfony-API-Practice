<?php

namespace App\DTO;

use App\Entity\User;
use Symfony\Component\Uid\Uuid;

class PublicationDTO {
    private ?Uuid $id;
    private ?string $text;
    private ?bool $pin;
    private ?User $author = null;

    public function getId(): ?Uuid
    {
        return $this->id;
    }

    public function setId(?Uuid $id): void
    {
        $this->id = $id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): void
    {
        $this->text = $text;
    }

    public function getPin(): ?bool
    {
        return $this->pin;
    }

    public function setPin(?bool $pin): void
    {
        $this->pin = $pin;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): void
    {
        $this->author = $author;
    }
}
