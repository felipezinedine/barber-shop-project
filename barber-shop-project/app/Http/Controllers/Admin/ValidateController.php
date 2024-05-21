<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ValidateController extends Controller
{
    public static function validateRegister($request, $id = null)
    {
        if ($id != null) {
            $auth = $request->validate([
                'name' => ['required'],
                'email' => ['email', 'required'],
                'phone' => ['required', "unique:users,cellphone,{$id},id"]
            ], [
                'name.required' => 'O campo nome é obrigatório',
                'email.email' => 'Preencha com um email válido',
                'email.required' => 'O campo email é obrigatório',
                'phone.unique' => 'Este telefone já está em uso, faça o login para ter acesso a sua conta',
                'phone.required' => 'O campo telefone é obrigatório'
            ]);
        }

        if($id == null) {
            $auth = $request->validate([
                'name' => ['required'],
                'email' => ['email', 'required'],
                'phone' => ['required', "unique:users,cellphone"]
            ], [
                'name.required' => 'O campo nome é obrigatório',
                'email.email' => 'Preencha com um email válido',
                'email.required' => 'O campo email é obrigatório',
                'phone.unique' => 'Este telefone já está em uso, faça o login para ter acesso a sua conta',
                'phone.required' => 'O campo telefone é obrigatório'
            ]);
        }

        return $auth;
    }
}
