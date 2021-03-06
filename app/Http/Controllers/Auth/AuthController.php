<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Registrar;
use Illuminate\Contracts\Auth\Guard;
//use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller {

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

    use AuthenticatesAndRegistersUsers;

    protected $redirectTo = '/articles';

    /**
     * @param Guard $auth
     * @param Registrar|\Illuminate\Contracts\Auth\Registrar $registrar
     */
    public function __construct(Guard $auth, Registrar $registrar)
    {
        $this->auth = $auth;
        $this->registrar = $registrar;

        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     */
//    public function __construct()
//    {
////        $this->auth = $auth;
////        $this->registrar = $registrar;
//
//        $this->middleware('guest', ['except' => 'getLogout']);
//    }
}

//namespace App\Http\Controllers\Auth;
//
//use App\User;
//use Validator;
//use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
//
//class AuthController extends Controller
//{
//    use AuthenticatesAndRegistersUsers;
//
//    public function __construct()
//    {
//        $this->middleware('guest', ['except' => 'getLogout']);
//    }
//
//    protected function validator(array $data)
//    {
//        return Validator::make($data, [
//            'name' => 'required|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|confirmed|min:6',
//        ]);
//    }
//
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
//    }
//}
