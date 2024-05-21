<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Services\UserService;
use App\DTOs\Users\UserCreateDTO;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $client;
    protected $from;
    public function __construct(
        protected UserService $service,
    ) {}
    /*********** REQUISIÇÕES -- GET -- */
    public function getAuth()
    {
        return view('auth.auth');
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function verify()
    {
        return view('auth.verify');
    }


    /*********** REQUISIÇÕES -- POSTS -- */

    public function verifyCode(Request $request)
    {
        dd($request->all());
    }
    public function auth(Request $request)
    {
        $phone = str_replace([' ', '-', '(', ')'], ['', '', '', ''], $request->cellphone);
        $phoneUser = '+55'.$phone;
        $user = $this->service->searchPhone($phoneUser);
        if(isset($user) && $user->id !=  null) {
            $phoneNumber = $user->cellphone;
            $code = mt_rand(1000, 9999);
            session()->put('verification_code', $code);
            session()->put('phone_number', $phoneNumber);
            return redirect('/verify-account');
        } else {
            return redirect()->back();
        }
    }

    public function register(Request $request)
    {
        $phone = str_replace([' ', '-', '(', ')'], ['', '', '', ''], $request->phone);
        $phoneUser = '+55'.$phone;

        ValidateController::validateRegister($request);

        $data = [
            'name'=> $request->name,
            'email'=> $request->email,
            'cellphone' => $phoneUser
        ];

        $newUser = $this->service->create(UserCreateDTO::createNewUser($data));

        if($newUser->id) {
            //TODO BAIXAR UMA BIBLIOTECA PARA ENVIO DE SMS E VALIDAR NÚMERO DE TELEFONE POR SMS
            // NÃO BAIXEI, PORQUE É POSSIVEL ENVIAR SMS APENAS PARA UM
            // NÚMERO DE TELEFONE, E IA ATRAPALHAR O FLUXO DO PROJETO

            $phoneNumber = $newUser->cellphone;
            $code = mt_rand(1000, 9999);
            session()->put('verification_code', $code);
            session()->put('phone_number', $phoneNumber);
            return redirect('/verify-account');
        } else {
            return redirect()->back();
        }
    }

    public function validationCode(Request $request)
    {
        if(session()->get('verification_code') == $request->get('code')) {
            $user = $this->service->searchPhone(session()->get('phone_number'));
            Auth::login($user);
            return redirect('/schedule/new');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
