<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
<<<<<<< HEAD
<<<<<<< HEAD
    
=======
>>>>>>> master
=======
>>>>>>> 967efeef90d533632ff8eeabfa049cc40d1dff34
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}