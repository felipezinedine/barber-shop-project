<?php

namespace App\DTOs\Users;

class UserCreateDTO
{
    public function __construct(
        public string $name,
        public string $email,
        public string|int $phone,
    ) {}


    public static function createNewUser($data)
    {
        return new self(
            $data["name"],
            $data["email"],
            $data["cellphone"],
        );
    }
}
