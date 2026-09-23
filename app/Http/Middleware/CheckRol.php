<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRol
{
    /**
     * Laat de gebruiker alleen door als hij een van de toegestane rollen heeft.
     * Gebruik in routes: ->middleware('rol:admin,magazijnmedewerker')
     */
    public function handle(Request $request, Closure $next, string ...$rollen): Response
    {
        $user = $request->user();

        if (! $user || ! $user->heeftRol(...$rollen)) {
            return redirect()
                ->route('dashboard')
                ->with('melding', 'Je hebt geen toegang tot deze pagina met jouw rol.');
        }

        return $next($request);
    }
}
