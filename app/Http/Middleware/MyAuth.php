<?php
    namespace App\Http\Middleware;

    use Closure;
    use Redirect;

    class MyAuth
    {
        public function handle($request, Closure $next, $guard = null)
        {
            if (!session('user')) {
                return Redirect::to('/login');
            }
            return $next($request);
        }
    }