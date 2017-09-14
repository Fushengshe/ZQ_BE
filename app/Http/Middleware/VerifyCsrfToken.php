<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/carousel/add',
        '/carousel/del',
        '/carousel/edit',
        '/poetrysociety/add',
        '/poetrysociety/del',
        '/poetrysociety/edit',
        '/register',
        '/login',
        '/admin/register',
        '/forgot/password',
        '/check',
    ];
}
