<?php

namespace App\Http\Middleware;

use Closure;

class CekLanguage
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
        // Mendapatkan input language dari user berdasarkan querystring ?lang=id
        $language = $request->query("lang");
        
        // Set default lokalisasi
        app()->setlocale($language);

        return $next($request);
    }
}
