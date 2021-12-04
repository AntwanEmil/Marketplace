<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
       
        $items = Item::select('items.*')->skip(0)->take(10)->get(); 

        
       // $users += User::select('users.*')->skip(0)->take(10)->get();       
        return view('home.HomeScreen' ,['items' => $items ]);
    }
}
