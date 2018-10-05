<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use App\User;

class isAdmin
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
        if (empty($request->user())){
            return redirect("/");                       
        }

        $user = User::find($request->user()->id);
        if ($user->account_type == "CLIENT"){
          return redirect("admin_panel");           
        }
           
        return $next($request);
        
    }
}
