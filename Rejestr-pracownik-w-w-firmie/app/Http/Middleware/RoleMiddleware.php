<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        if (! $request->user()) {
            return redirect()->route('login');
        }

        $allowedRoles = [];

        foreach ($roles as $roleGroup) {
            foreach (preg_split('/[,\|]/', $roleGroup, -1, PREG_SPLIT_NO_EMPTY) ?: [] as $role) {
                $allowedRoles[] = $role;
            }
        }

        if (! in_array($request->user()->role, $allowedRoles, true)) {
            abort(403);
        }

        return $next($request);
    }
}
