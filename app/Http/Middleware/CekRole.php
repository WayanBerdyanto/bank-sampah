<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Model\User;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $roles): Response
    {
        try {
            // Coba mendapatkan peran pengguna saat ini
            $user = Auth::user();
    
            if ($user && $user->role == $roles) {
                return $next($request);
            } else {
                // Jika peran tidak sesuai atau pengguna tidak ada, lempar pengecualian
                throw new \Exception('Unauthorized access');
            }
        } catch (\Exception $e) {
            // Tangkap pengecualian dan arahkan pengguna ke tampilan error
            return response()->view('guest.login', ['error' => $e->getMessage()], 403);
        }
    }
}
