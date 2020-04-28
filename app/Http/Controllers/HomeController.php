<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
    public function index()
    {
        $user_id  = Auth::id();
        $city = User::join('cities','cities.id','=','users.city_id')->where("users.id",$user_id)->first();
        $data['city'] = $city->name;
        Session::put(['city_id'=> $city->id,'city_name'=> $city->name,'city_state'=> $city->state]);

        return view('home',$data);
    }
}
