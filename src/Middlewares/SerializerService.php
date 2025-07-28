<?php
namespace App\Middlewares;

use Symfony\Component\Serializer\SerializerInterface;

class SerializerService
{

    public function __construct(private SerializerInterface $serializer,){}
    public function deserialize(string $class, mixed $data): mixed {
        return $this->serializer->deserialize($data, $class, 'json');
    }
}
