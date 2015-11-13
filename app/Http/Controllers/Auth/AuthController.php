<?php

namespace Pibbble\Http\Controllers\Auth;

use Auth;
use Redirect;
use Validator;
use Socialite;
use Pibbble\User;
use Illuminate\Http\Request;
use Pibbble\Http\Controllers\Controller;
use Pibbble\Exceptions\OAuthNameException;
use Pibbble\Exceptions\OAuthEmailException;
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

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);

        $this->middleware('hasUser', ['only' => ['oauthGet']]);
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
            'username' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
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
            'email' => $data['email'],
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

        Auth::loginUsingId($authUser->id, true);

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
        $authUser = User::where('uid', $theUser->id)->first();

        if ($authUser) {
            return $authUser;
        }

        if (User::where('username', $theUser->nickname)->first()) {
            $user = factory(User::class)->make([
                'username' => $theUser->nickname,
                'email' => $theUser->email,
                'provider' => $provider,
                'uid' => $theUser->id,
                'avatar' => $theUser->avatar,
            ]);
            $err = new OAuthNameException();
            $err->setUser($user);
            throw $err;
        }

        if (User::where('email', $theUser->email)->first()) {
            throw new OAuthEmailException();
        }

        return User::create([
            'username' => $theUser->nickname,
            'email' => $theUser->email,
            'provider' => $provider,
            'uid' => $theUser->id,
            'avatar' => $theUser->avatar,
        ]);
    }

    public function postOauth(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'username' => 'required|max:255|unique:users',
        ]);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if ($request->session()->has('user')) {
            $user = $request->session()->pull('user');
            $data['email'] = $user->email;
            $data['provider'] = $user->provider;
            $data['uid'] = $user->uid;
            $data['avatar'] = $user->avatar;
        }

        Auth::login(User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'provider' => $data['provider'],
            'uid' => $data['uid'],
            'avatar' => $data['avatar'],
        ]));

        return redirect($this->redirectPath());
    }

    public function getOauth()
    {
        return view('/errors/oauthname');
    }
}
