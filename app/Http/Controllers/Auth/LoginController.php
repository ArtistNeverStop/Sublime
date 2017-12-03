<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Socialite;
use App\User;
use Auth;
use App\File;

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
    protected $redirectTo = '/me';

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect()->getTargetUrl();
    }
    
    /**
     * Obtain the user information from a provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        // Obtain the users info
        $social_user = Socialite::driver($provider)->user();
        // Login the user if exists
        if ($user = User::where('email', $social_user->email)->first()) {
            return $this->authAndRedirect($user, $provider);
        } else {
            // If the user does not exist create a new One
            $user = User::create([
                'name' => $social_user->name,
                'user_name' => $social_user->name,
                'gender' => array_key_exists('gender', $social_user->user) ? $social_user->user['gender'] : $social_user->gender,
                'email' => $social_user->email,
                // 'avatar' => $social_user->avatar,
                'password' => null,
            ]);
            if ($social_user->avatar_original) {
                $temp = tempnam(sys_get_temp_dir(), 'TMP_');
                file_put_contents($temp, file_get_contents($social_user->avatar_original));
                $this->storeFile(new UploadedFile($temp, 'FacebookAvatar'), 'users', $user, User::AVATAR_FILE_TYPE, $user);
            }
            return $this->authAndRedirect($user, $provider);
        }
    }
 
    /**
     * Authenticate the user and Redirecto
     *
     * @return Response
     */
    public function authAndRedirect($user, $provider)
    {
        Auth::login($user);
        return redirect()->to("/sublime-user-authorized-done");
    }

    
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
    protected function authenticated(Request $request, $user)
    {
        //
    }
     */
}
