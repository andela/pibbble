<?php

namespace Pibbble\Http\Controllers\Auth;

use Auth;
use Redirect;
use Validator;
use Socialite;
use Pibbble\User;
use Pibbble\Provider;
use Pibbble\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $redirectPath = '/';

    protected $redirectTo = '/';

    protected $username = 'username';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|max:255',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * Redirect the user to the provider's authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from the provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return Redirect::to('auth/'.$provider);
        }

        $authUser = $this->findOrCreateUser($user, $provider);

        Auth::login($authUser, true);

        return Redirect::to($this->redirectTo);
    }

    /**
     * Return user if exists; create and return if doesn't.
     *
     * @param $theUser
     * @return User
     */
    private function findOrCreateUser($theUser, $provider)
    {
        $_provider = Provider::where('provider', $provider)->first();
        $authUser = $_provider->users()->where('username', $theUser->nickname)->first();

        if ($authUser) {
            return $authUser;
        }

        $authUser = $this->create([
            'username' => $theUser->nickname,
            'password' => $theUser->token,
        ]);

        Provider::find($_provider->id)->users()->attach($authUser->id);

        return $authUser;
    }
}
