<?php

namespace App\Repositories\Users;
use App\DTOs\Users\UserCreateDTO;

interface UserRepository
{
    public function create(UserCreateDTO $dto);
    public function searchPhone($param);
    public function allProfessionals();
    public function find($id);
}
