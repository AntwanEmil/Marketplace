<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    //
    public function show($UserID){
        if(auth()->user()){
          
        $info = User::where('id','=',$UserID)
        ->select('users.image as userImage','users.Storename','users.name as userName','users.email')
        ->first();

        $items = Item::select('items.*')->where('owner_id','=',$UserID)->get();
        return view('user.StoreScreen',['info'=>$info, 'items'=>$items]);
        }
    }

    public function buyItem(Request $request){
        if(auth()->user()){
            $user = auth()->user();
            $item = Item::select('items.*')->where('id',$request->input('item_id'))->get()->first();
            $qty = $request->input('amount');
            $owner = User::select("users.*")->where('id', $item->owner_id)->get()->first();

            if($user->balance < ($item->price * $qty)){
                return back()->with('fail',"You don't have enough balance :((");
            }
            if($qty > $item->amount){

                return back()->with('fail',"The quantity is greater than the available amount !!");
            }

            DB::table('purshased_items')->insert(
                ['user_id'=>$user->id, 'item_id' => $item->id, 'amount' =>$qty]
            );
            $user->balance -= ($item->price * $qty);
            $owner->balance += ($item->price * $qty);
            $item->amount -= $qty;
            $user->save();
            $owner->save();
            $item->save();

            return back()->with("success","Your order has been done successfully");
        }
        else{
            return redirect()->back()->with('fail',"You are not logged in");
        }
    }


}
