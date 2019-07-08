<?php

namespace App\Http\Controllers\Company\Auth;

use App\Company;
use App\SiteSetting;
use Auth;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Front\CompanyFrontLoginFormRequest;

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
    protected $redirectTo = '/company-home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('company.guest')->except('logout');
    }
    /* Moved log in function from -> Illuminate\Foundation\Auth\AuthenticatesUsers : START */
    public function login(CompanyFrontLoginFormRequest $request)
    {
        $this->validateLogin($request);
        $userData = Company::where('email', '=', $request->email)->first();
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            flash(__('Welcome, ' . $userData->name . '!'))->success();
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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('company_auth.login');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $this->guard('company')->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('company');
    }

    /**
     * Redirect the user to the OAuth Provider.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        // echo config("services.{$provider}.redirect").'<br>'; 
        config(["services.{$provider}.redirect" => url("login/employer/{$provider}/callback")]);
        //echo config("services.{$provider}.redirect");die;
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
        config(["services.{$provider}.redirect" => url("login/employer/{$provider}/callback")]);
        if($provider === 'google'){
            $user = Socialite::driver($provider)->stateless()->user();
        }else{
            $user = Socialite::driver($provider)->user();
        }
        
        $authUser = $this->findOrCreateUser($user, $provider);
        /*         * ******************** */
        $images = array("employer_default_profile_1.png", "employer_default_profile_2.png", "employer_default_profile_3.png");
        $default_image = array_rand($images, 2);

        $authUser->logo = $images[$default_image[0]];
        $authUser->slug = str_slug($authUser->name, '-') . '-' . $authUser->id;
        $authUser->verified = 1;
        $authUser->is_active = 0;
        $authUser->update();
        /*         * ******************** */
        Auth::guard('company')->login($authUser, true);
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
            $authUser = Company::where('email', 'like', $user->getEmail())->first();
            if ($authUser) {
                /* $authUser->provider = $provider;
                  $authUser->provider_id = $user->getId();
                  $authUser->update(); */
                return $authUser;
            }
        }

        
        $str = $user->getName() . $user->getId() . $user->getEmail();
        return Company::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'is_active' => 0,
                    'verified' => 1,
                    'provider' => $provider,
                    'provider_id' => $user->getId(),
                    'password' => bcrypt($str),
                    
        ]);
    }

}
