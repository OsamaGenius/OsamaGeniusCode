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
        // Fetch the admins users
        $users = Auth::guard('panel')->user();

        // If the provided credentials is not correct
        if( !$users ) {
            return redirect()
                    ->route('panel.login')
                    ->with('error', 'Only authenticated users can access the dashboard panel');
        }

        if( $users->approvent != 'Yes' || $users->status != 'Active' || $users->group_id != 'Admins' ) {
            abort(403, 'Unatherized Access, please contact your admins');
        }

        return $next($request);
    }
}
