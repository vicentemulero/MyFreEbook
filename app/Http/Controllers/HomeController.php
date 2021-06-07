<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     *Allows access only to the logged users
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if (Auth::user()->roles[0]->name == 'Admin') {
            return redirect()->route('AdminBook.index');
        } elseif (Auth::user()->roles[0]->name == 'User') {
            $user = User::findorfail(Auth::user()->id);
            return redirect()->action('App\Http\Controllers\IndexController')->with('success', "¡ Hola $user->name !");
        }
    }
}
