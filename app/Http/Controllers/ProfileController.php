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

    public function index(Request $request)
    {
        // $user = auth()->user();
       
        $items = Item::select('items.*')->where('owner_id','=',1)->get();   //added products section
        
        $purchased_items = DB::table('purshased_items')->select('purshased_items.*')->where('user_id','=',1);
        
        $user = User::select('users.*')->where('id','=',1)->first();
        return view('user.ProfileScreen',['items'=>$items, 'user'=>$user]);
    }

}
