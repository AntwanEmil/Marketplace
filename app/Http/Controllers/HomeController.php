<?php

namespace App\Http\Controllers;
use App\Models\Item;


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
        if(auth()->user()){
       
       $user = auth()->user();
        $items = Item::select('items.*')->skip(0)->take(10)->get();   
        return view('home.HomeScreen' ,['items' => $items]);
        }
        else{

        }
    }

   
}
