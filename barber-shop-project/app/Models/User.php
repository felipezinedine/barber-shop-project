<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
        'updated_at',
        'created_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function validateRegister($request)
    // {
    //     $auth = $request->validate([
    //         'name' => ['required'],
    //         'email' => ['email', 'required'],
    //         'phone' => ['required', 'unique:users,cellphone,'. $this->user->id .',id'],
    //     ], [
    //         'name.required' => 'O campo nome é obrigatório',
    //         'email.email' => 'Preencha com um email válido',
    //         'email.required' => 'O campo email é obrigatório',
    //         'phone.unique' => 'Este telefone já está em uso, faça o login para ter acesso a sua conta',
    //         'phone.required'  => 'O campo telefone é obrigatório'
    //     ]);

    //     return $auth;
    // }
}
