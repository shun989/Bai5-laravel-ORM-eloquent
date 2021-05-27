<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $dob = $request->dob;
        $age =Carbon::parse($dob)->age;
        if ($age < 18) {
            return redirect()->route('user.showCreateForm')->with('error', 'Không đủ tuổi!');
        }
        return $next($request);
    }
}
