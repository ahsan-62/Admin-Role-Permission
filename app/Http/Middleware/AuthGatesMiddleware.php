<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthGatesMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();

        if($user){
            $permissions = Permission::all();
            foreach ($permissions as $key => $permission) {
                Gate::define($permission->permission_slug, function(User $user) use($permission){
                    return $user->hasPermission($permission->permission_slug);
                });
            }
        }

        return $next($request);
    }
}
