<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class PanelAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $users = User::where('approvent', 'Yes')->where('status', 'Active')->where('group_id', 'Admins')->get();
        if( !Auth::guard('panel')->user() && count($users) == 0 ) {
            return redirect()
                    ->route('panel.login')
                    ->with('error', 'Only authenticated users can access the dashboard panel');
        }

        return $next($request);
    }
}
