<?php

namespace App\Http\Controllers;
use App\Models\Item;
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
    public function index()
    {
        if(auth()->user()){
       
       $user = auth()->user();
        $orig_items = Item::select('items.*')
        ->join('users', 'items.owner_id','=','users.id')
        ->select ('items.*' , 'users.Storename')
        ->skip(0)->take(5)->get();  
        
        
        $items = DB::table('sellers')
        ->join('items', 'sellers.item_id', '=', 'items.id')
        ->join('users', 'sellers.seller_id','=','users.id')
        ->select ('items.*' , 'users.Storename')
        ->skip(0)->take(5)->get();
        return view('home.HomeScreen' ,['items' => $items , 'orig_items'=>$orig_items]);
        }
        else{
            return redirect()->back()->with('fail',"You are not logged in");
        }
    }

   
}
