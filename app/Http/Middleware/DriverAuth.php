<?php

namespace App\Http\Middleware;

use App\Models\Driver;
use Closure;
use Illuminate\Support\Facades\Auth;

class DriverAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $driver = Driver::get()->where('user_id' , Auth::id())->first();
        if(!$driver)
            return redirect()->route('home');
        return $next($request);
    }
}
