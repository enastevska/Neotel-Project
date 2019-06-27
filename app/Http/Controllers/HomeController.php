<?php

namespace App\Http\Controllers;
use http\Encoding\Stream;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Channel;
use App\Stream1;
use Illuminate\Support\Facades\Redirect;
use mysql_xdevapi\Session;
use phpDocumentor\Reflection\Types\Integer;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
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
    public function index() {

        $userId = Auth::id();
        $user = User::find($userId);
        $channels = Channel::all();
        if($user->type_of_user == 1)
        {
            return view('admin',compact('channels'));
        }
        return view('home');
    }




  // public function admin()
  //  { return view('admin'); }
}
