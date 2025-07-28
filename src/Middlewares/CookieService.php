<?php

namespace App\Middlewares;

use Symfony\Component\HttpFoundation\Cookie;

class CookieService
{
    public function generateCookie(string $token) {
        return Cookie::create('access_token')
            ->withValue($token)
            ->withHttpOnly(true)
            ->withSecure(false)
            ->withPath('/');
    }

    public function deleteCookie() {
        return Cookie::create('access_token')
            ->withValue('')
            ->withHttpOnly(true)
            ->withSecure(false)
            ->withPath('/');
    }

}
