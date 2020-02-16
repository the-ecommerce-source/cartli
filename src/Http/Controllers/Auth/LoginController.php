<?php

namespace TES\Cartli\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        return view('cartli::auth.login');
    }

    public function login(Request $request)
    {   
        if(Auth::guard('admin')->attempt($request->only('email','password'), true)){
            return redirect()
                ->intended(route('admin.dashboard.index'));
        }
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    
}
