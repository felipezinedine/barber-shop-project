<?php

namespace App\Repositories\Users;
use App\Models\User;
use App\DTOs\Users\UserCreateDTO;

class UserORM implements UserRepository
{
    public function __construct(
        protected User $user,
    ) {}
    public function create(UserCreateDTO $dto)
    {
        $data = [
            'name' => $dto->name,
            'email'=> $dto->email,
            'cellphone' => $dto->phone,
            'type' => 'customer'
        ];

        $newUser = $this->user->setConnection('mysql')->create($data);

        return $newUser;
    }

    public function searchPhone($param)
    {
        $user = $this->user->setConnection('mysql')->where('cellphone', '=', $param)->first();
        return $user;
    }

    public function allProfessionals()
    {
        $professionals = $this->user->setConnection('mysql')->where('type', '=', 'professional')->get();
        return $professionals;
    }

    public function find($id)
    {
        $prof = $this->user->setConnection('mysql')->find($id);
        return $prof;
    }
}
