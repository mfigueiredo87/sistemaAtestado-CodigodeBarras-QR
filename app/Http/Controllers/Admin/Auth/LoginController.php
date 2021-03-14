<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\admin;
use App\Models\User\user;

//use Illuminate\Validation\ValidationException;


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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // protected $guard = 'admin';

    public function showLoginForm()
    {
        return view('admin.login');
    }

        public function login(Request $request)
    {
            $admin= admin::where('email',$request->email)->first();

          if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password, 'status'=>1])) {

            // dd(auth()->guard('admin')->user());

        }

        return back()->withErrors(['email' => 'Email ou senha inccorrectos. Contacte o Administrador']);
        // $this->validateLogin($request);

        // if ($this->attemptLogin($request)) {
        //     return $this->sendLoginResponse($request);
        // }

        // return $this->sendFailedLoginResponse($request);
    }
    
    // aplicando a restricao do username, email e do status
    //  protected function credentials(Request $request)
    // {
    //     $admin= admin::where('email',$request->email)->first();
    //     // $user= user::where('email',$request->email)->first();
    //   if ($admin->status == 0) {
    //        return ['email'=>'inactivo','password'=>'A sua conta não está activa. Contacte o Administrador'];
    //     }else{
    //       return ['email'=>$request->email,'password'=>$request->password, 'status'=>1];  
    //     }
        
    //     // return $request->only($this->username(), 'password');
    
    // }

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
