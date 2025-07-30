<?php

namespace App\DTO;

use Symfony\Component\Uid\Uuid;

class PublicationResponseDTO {
    private ?Uuid $id;
    private ?string $text;
    private ?bool $pin;

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
}
