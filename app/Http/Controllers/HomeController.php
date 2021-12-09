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
        $orig_items = Item::select('items.*')->where('owner_id','!=',$user->id)
        ->join('users', 'items.owner_id','=','users.id')
        ->select ('items.*' , 'users.Storename')
        ->get();  
        
        
        // $items = DB::table('sellers')
        // ->join('items', 'sellers.item_id', '=', 'items.id')
        // ->join('users', 'sellers.seller_id','=','users.id')
        // ->select ('items.*' , 'users.Storename')->where('items.owner_id','!=',$user->id)
        // ->get();
        return view('home.HomeScreen' ,['items'=>$orig_items]);
        }
        else{
            return redirect()->back()->with('fail',"You are not logged in");
        }
    }

   
}
