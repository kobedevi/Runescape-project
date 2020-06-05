<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\User;
use App\Password_resets;
use App;


class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */
    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

        
    public function redirecting($token){
        return redirect()->route('redirect.password.reset', ['language' => App()->getLocale(), 'token' => $token, 'email' => $_GET['email']]);
    }

    public function showReseterForm($lang, $token = null)
    {
        return view('auth.passwords.reset')->with(
            ['token' => $token]
        );
    }

    // overwrite password reset, built-in one doesn't work with {language}
    public function reset(Request $r)
    {
        if($r->password == $r->password_confirmation){
            $account = Password_resets::where('email', $r->email)->first();
            if(!$account){
                return redirect()->route('redirect.password.reset', ['language' => app()->getLocale(), 'token' => $r->token])->with('warning', trans('alert.mail')); //wrong email
            }
            if(password_verify($r->token, $account->token)){
                Password_resets::where('email', $r->email)->delete();
                $update = User::where('email', $r->email)->first();
                $update->update(['password' => bcrypt($r->password_confirmation)]);
                return redirect()->route('login', ['language' => app()->getLocale()])->with('succes', trans('alert.passwordChanged')); //passwords don't match
            }
            else{
                abort(403, trans('alert.wrongCode'));
            }
        }
        else{
            return redirect()->route('redirect.password.reset', ['language' => app()->getLocale(), 'token' => $r->token, 'email' => $_GET['email'] ])->with('warning', trans('alert.password')); //passwords don't match
        }
    }
}
