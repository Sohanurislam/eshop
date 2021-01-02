<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
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
//        $user=Auth::user();
//        $user = auth()->user();
//        if ($user->da>=18){
//
            return $next($request);
//        }else{
//            session()->flash('status','You have no permission to access admin panel');
//            return redirect('/');

        }

//    }
}
