<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\SiteSetting;
use Auth;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Front\UserFrontLoginFormRequest;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /* Moved log in function from -> Illuminate\Foundation\Auth\AuthenticatesUsers : START */
    public function login(UserFrontLoginFormRequest $request)
    {
        $this->validateLogin($request);
        $userData = User::where('email', '=', $request->email)->first();
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            flash(__('Welcome, ' . $userData->first_name . '!'))->success();
            return $this->sendLoginResponse($request);
        }
        $this->incrementLoginAttempts($request);
        /* Check if only password is correct : START */
        if ($userData) {
            if (password_verify($request->password, $userData->password)) {
                return $this->sendFailedLoginResponse($request, 'failed');
            } else {
                return $this->sendFailedLoginResponse($request, 'wrongpassword', 'password');
            }
        }
        /* Check if only password is correct : END */
        return $this->sendFailedLoginResponse($request, 'failed');
    }
    protected function sendFailedLoginResponse(Request $request, $type = null, $at = null)
    {   
        throw ValidationException::withMessages([
            $at ? $at : $this->username() => [trans('auth.'.$type)],
        ]);
    }
    /* Moved log in function from -> Illuminate\Foundation\Auth\AuthenticatesUsers : END */
    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        $hasKeys = SiteSetting::whereNotNull($provider . '_app_id')->whereNotNull($provider . '_app_secret')->first();
        if (!$hasKeys) {
            flash(__('Could not connect to ' . ucwords($provider)))->error();
            return redirect('/login');
        }
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from provider.  Check if the user already exists in our
     * database by looking up their provider_id in the database.
     * If the user exists, log them in. Otherwise, create a new user then log them in. After that 
     * redirect them to the authenticated users homepage.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        if($provider === 'google'){
            /* echo "<pre>"; */
            $user = Socialite::driver($provider)->stateless()->user();
            $this->redirectTo = "/my-profile";
        }elseif($provider === 'twitter'){
            $user = Socialite::driver($provider)->user();
            $this->redirectTo = "/my-profile";
        }else{
            $user = Socialite::driver($provider)->user();
        }

        $authUser = $this->findOrCreateUser($user, $provider);
        /*         * ******************** */
        $images = array("jobseeker_default_profile_1.png", "jobseeker_default_profile_2.png", "jobseeker_default_profile_3.png");
        $default_image = array_rand($images, 2);
        if($provider === 'google'){
            $first_name = $user->user['name']['givenName'];
            $last_name = $user->user['name']['familyName'];

            $authUser->first_name = $first_name;
            $authUser->last_name = $last_name;

            flash(__('Please update your profile.'))->success();
        }elseif($provider === 'twitter'){
            flash(__('Please update your profile.'))->success();
        }

        $authUser->image = $images[$default_image[0]];
        $authUser->verified = 1;
        $authUser->is_active = 1;
        $authUser->provider = $provider;
        $authUser->provider_id = $user->getId();
        $authUser->update();

        /*         * ******************** */
        Auth::login($authUser, true);
        return redirect($this->redirectTo);
    }

    /**
     * If a user has registered before using social auth, return the user
     * else, create a new user object.
     * @param  $user Socialite user object
     * @param $provider Social auth provider
     * @return  User
     */
    public function findOrCreateUser($user, $provider)
    {
        if ($user->getEmail() != '') {
            $authUser = User::where('email', 'like', $user->getEmail())->first();
            if ($authUser) {
                /* $authUser->provider = $provider;
                  $authUser->provider_id = $user->getId();
                  $authUser->update(); */
                return $authUser;
            }
        }

        $str = $user->getName() . $user->getId() . $user->getEmail();
        return User::create([
                    'first_name' => $user->getName(),
                    'middle_name' => $user->getName(),
                    'last_name' => $user->getName(),
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'is_active' => 1,
                    'verified' => 1,
                    'provider' => $provider,
                    'provider_id' => $user->getId(),
                    'password' => bcrypt($str),
        ]);
    }

}
