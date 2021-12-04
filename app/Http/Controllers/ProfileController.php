<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //

    public function index()
    {
        // $user = auth()->user();
        if (auth()->user()) {

            $user = auth()->user();
            $items = Item::select('items.*')->where('owner_id', '=', $user->id)->get(); //added products section

            $purchased_items = DB::table('purshased_items')->where('purshased_items.user_id', '=', $user->id)
                ->join('items', 'purshased_items.item_id', '=', 'items.id')
                ->join('users', 'items.owner_id', '=', 'users.id')
                ->select('items.*', 'purshased_items.amount', 'users.Storename')
                ->get();

            $sell_item = DB::table('sellers')->where('sellers.seller_id', '=', $user->id)
                ->join('items', 'sellers.item_id', '=', 'items.id')
                ->select('items.*')
                ->get();
            return view('user.ProfileScreen', ['items' => $items, 'user' => $user, 'purchased' => $purchased_items,
                'selled' => $sell_item]);
        } else {
            return redirect()->back()->with('fail', 'You are not logged in');
        }
    }

    public function View($id)
    {if (auth()->user()) {
        $user = auth()->user();
       

            return view('user.EditProfileScreen', ['user' => $user]);
        }
     else {
        return redirect()->back()->with('fail', 'You are not logged in');
    }
    }
    public function updatePro(Request $request)
    {      
       if (auth()->user()) {
            $user = auth()->user();     
            $user->name = $request->input('name');
            $user->Storename = $request->input('storename');
            $user->email = $request->input('email');
            $s=strlen($request->input('password'));
            $pass=$request->input('password');
           if($request->input('password')==$request->input('re')&& $pass!=null){
               if($s>=8)
          $user->password= Hash::make($request->input('password'));
          else echo "password has to be more than 8 characters";
           }
          else
          echo "Passwords don`t match";
         }      
      $user->save();
    
        return view('user.EditProfileScreen', ['user' => $user]); 
    
}
}
