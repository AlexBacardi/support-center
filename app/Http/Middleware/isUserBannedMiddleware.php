<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isUserBannedMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {

            $bannedDays = now()->diffInDays(auth()->user()->banned_until) + 1;

            auth()->logout();

            $banMessage = 'Ваш аккаунт заблокирован на ' . trans_choice(':count день|:count дня|:count дней', $bannedDays);

            return redirect()->route('login')->with('ban', $banMessage);

        }

        return $next($request);
    }
}
