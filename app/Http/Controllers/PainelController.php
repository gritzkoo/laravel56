<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PainelController extends Controller
{
    public function index()
    {
        return view('painel.home');
    }

    public function loginblade()
    {
        return view('painel.login');
    }
    public function login(Request $request)
    {
        return $this->_callService('LoginService','login',$request->all());
    }

    public function logout()
    {
        Auth::guard('web')->logout(false);
        return redirect()->route('site.home');
    }

    public function mailTest(Request $request)
    {
        return $this->_callService('PainelService', 'sendMail', $request->all());
    }
}
