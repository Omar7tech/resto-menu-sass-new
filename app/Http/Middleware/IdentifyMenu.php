<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Support\MenuContext;

class IdentifyMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $menu = $request->route('menu');

        if ($menu) {
            app(MenuContext::class)->set($menu);
        }

        return $next($request);
    }
}
