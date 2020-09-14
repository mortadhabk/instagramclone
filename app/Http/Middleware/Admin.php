<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;
class Admin
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

        if(Auth::check()){


            if(Auth::user()->role->name == "admin"){

                return $next($request);


            }

        else{
            return redirect('/');
        }


        }


        return redirect('/posts');
    }

}
