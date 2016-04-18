<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Empleado, App\Rol;

use Debugbar, Auth, Hash;

class WelcomeAdminController extends Controller
{

    public function __construct() {
        $this->auth = app('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('loginAdmin');
    }

    public function login (Request $request) {

        // Debugbar::addMessage($request->input('password'));
        if (Auth::attempt(['email' => $request->input('usuario'), 'password' => $request->input('password')])) {
            # code...
             return redirect()->intended('admin');
        } else {
            Debugbar::addMessage('algo paso');
        }

        return view('loginAdmin');

    }

    
}
