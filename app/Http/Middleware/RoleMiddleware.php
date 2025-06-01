<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle($request, Closure $next, ...$Role)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::User();

        if (in_array($user->Role, $Role)) {
            return $next($request);
        }

        abort(403, 'Akses ditolak.');
    }
}

