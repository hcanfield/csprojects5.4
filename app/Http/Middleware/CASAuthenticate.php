<?php namespace App\Http\Middleware;

use Closure;
use Cas;
use Auth;
use App\User;

class CASAuthenticate
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
        if(!Auth::check()){
            Cas::authenticate();
            $user = User::where('username', Cas::user())->first();
            if($user === null){
                $user = new User;
                $user->username = Cas::user();
                $user->save();
            }
            Auth::login($user);
        }
        return $next($request);
    }
}
