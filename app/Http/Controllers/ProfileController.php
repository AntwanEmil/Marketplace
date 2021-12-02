<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //

    public function index()
    {
        // $user = auth()->user();
       if(auth()->user()){
           
        $user = auth()->user();
        $items = Item::select('items.*')->where('owner_id','=',$user->id)->get();   //added products section
        
        $purchased_items = DB::table('purshased_items')->select('purshased_items.*')->where('user_id','=',$user->id);
        
        
        return view('user.ProfileScreen',['items'=>$items, 'user'=>$user, 'purchased' =>$purchased_items]);
       }

       else{
           return redirect()->back()->with('fail','You are not logged in');
       }
    }

   
  
}
