<?php
namespace App\Http\Middleware;

use Closure;
use Redirect;

class Admin
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!session('admin')) {
            return Redirect::to('/admin/login');
        }
        return $next($request);
    }
}