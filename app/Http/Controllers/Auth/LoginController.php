<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    public function redirectToProvider($provider) {
        return Socialite::driver($provider)->redirect();
    }
    
    public function handleProviderCallback($provider) {
        $provided_user = Socialite::driver($provider)->user();
        $user = User::where('provider', $provider)->where('provided_user_id', $provided_user->id)->first();
        if($user === null) {
            $user = User::create([
                'name' => $provided_user->name,
                'provider' => $provider,
                'provided_user_id' => $provided_user->id,
            ]);
        }
        
        Auth::login($user);
        
        return view('top');
    }
    
    protected function loggedOut(Request $request)
    {
        return redirect(route('textbook.index'));
    }
}
