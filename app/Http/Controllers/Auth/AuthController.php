<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\UserTypes,
    App\Business,
    App\Agents;

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

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'user_type_id' => 'required|max:255',
            'name'         => 'required|max:255',
            'email'        => 'required|email|max:255|unique:users',
            'password'     => 'required|min:6|confirmed',
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

        $user = User::create([
            'user_type_id' => $data['user_type_id'],
            'name'         => $data['name'],
            'email'        => $data['email'],
            'password'     => bcrypt($data['password']),
            'active'       => 1,
        ]);

        switch ($data['user_type_id']) {
            case 2:
                // Business
                Business::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                ]);
                break;

            case 3:
                // Agent
                Agents::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    // ageregar email
                ]);
                break;
        }

        return $user;
    }

    public function register(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->redirectTo = '/register';
        flash('User Created', 'success');
        $this->create($request->all());

        return redirect($this->redirectTo);
    }

    public function showRegistrationForm()
    {
        $users_types = UserTypes::where('active', 1)->lists('name', 'id');
        return view('auth.register', compact('users_types'));
    }

}
