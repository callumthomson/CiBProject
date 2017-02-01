<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

use App\Project;

class RedirectIfNotAuthed
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
        if(!Auth::check()) {
            $request->session()->flash('error', 'You need to be logged in to view that page');
            return redirect('login');
        }
        if(!$this->isUserPM(Auth::user())) {
            $request->session()->flash('error', 'You need to be a project manager to log into this app');
            return redirect('login');
        }
        return $next($request);
    }

    /**
     * Check if a user is a project manager
     *
     * @param $user
     * @return bool
     */
    private function isUserPM($user)
    {
        foreach(Project::all() as $project)
        {
            if($project->manager == $user) {
                return true;
            }
        }
        return false;
    }
}
