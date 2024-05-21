<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!auth()->check()) {
            return redirect('/auth');
        }

        $email = auth()->user()->email;

        $data = explode('@', $email);
        $verifyEmail = $data[1];
        $verify = in_array($verifyEmail, ['gmail.com', 'gmail.com.br', 'contato.com.br', 'contato.com', 'hotmail.com.br', 'hotmail.com']);

        if($verify != true) {
            return redirect()->back();
        }
        return $next($request);
    }
}
