<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    //use AuthenticatesUsers;


    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        //$this->middleware('guest:admin')->except('logout');
        //$this->middleware('guest:student')->except('logout');
        //$this->middleware('guest:teacher')->except('logout');
    }

    /* public function logout()
    {
        auth()->logout();
        return redirect('/');
    } */
    public function logout(Request $req,$type)
    {
        Auth::guard($type)->logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/');
    }
    public function loginForm($type)
    {
        return view('auth.login', compact('type'));
    }
    
    public function login(Request $req)
    {
        if($req->type == "student"){
            $guardName="student";
        }elseif($req->type == "teacher"){
            $guardName="teacher";
        }else{
            $guardName="web";
        }
        if(Auth::guard($guardName)->attempt(['email'=>$req->email,'password'=>$req->password])){
            return $this->redirectionTo($req);
        }
    }

    public function redirectionTo(Request $req){
        if($req->type == "student"){
            return redirect()->intended(RouteServiceProvider::STUDENT);
        }elseif($req->type == "teacher"){
            return redirect()->intended(RouteServiceProvider::TEACHER);
        }else{
            return redirect()->intended(RouteServiceProvider::HOME);
        }
    }
    
    /*
    

    public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showStudentLoginForm()
    {
        return view('auth.login', ['url' => 'blogger']);
    }

    public function studentLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('blogger')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/blogger');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showTeacherLoginForm()
    {
        return view('auth.login', ['url' => 'blogger']);
    }

    public function teacherLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('blogger')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/blogger');
        }
        return back()->withInput($request->only('email', 'remember'));
    }
    */
}
