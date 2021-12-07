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
        $user = auth()->user();
        $info = User::where('id','=',$UserID)
        ->select('users.image as userImage','users.Storename','users.name as userName','users.email')
        ->first();

        $items = Item::select('items.*')->where('owner_id','=',$UserID)->get();
        return view('user.StoreScreen',['info'=>$info, 'items'=>$items , 'user'=>$user , 'id'=>$UserID]);
        }
    }
    public function update_report($op, $item , $user , $store , $transfered_cash){
        // adding description to transactions table //
        $name = $item->name;


        if($op == 'buyItem'){
            $description_add =  'you purchased a(an) "' . $name  .  '"  with price= '.$item->price.'$'.', from store: '.$store->Storename;
            $transaction_id = DB::table('transactions')->insertGetId([
                'description' => $description_add
            ]);
        }
        else if ($op == 'addItem'){
            $description_add =  'you added a(an) "' . $name  .  '"  with price= '.$item->price.'$ to be sold in your store'.', from store: '.$store->Storename;
            $transaction_id = DB::table('transactions')->insertGetId([
                'description' => $description_add
            ]);
        }
        else if ($op == 'removeItem'){
            $description_add =  'you removed a(an) "' . $name  .  '"  with price= '.$item->price.'$ from your store';
            $transaction_id = DB::table('transactions')->insertGetId([
                'description' => $description_add
            ]);
        }
        else if ($op == 'transferCash'){

            $description_add =  'you transfered amount of cash =' .$transfered_cash.'$ from your store to store: "'.$store->Storename.'" that is owned by: '.$store->name;
            $transaction_id = DB::table('transactions')->insertGetId([
                'description' => $description_add
            ]);
            DB::table('transferred_cash')->insert([ 'from_user_id'=>$user->id, 'to_user_id'=>$store->id, 'amount'=>$transfered_cash ]);
        }

        // adding mapping info to reports table //
        DB::table('reports')->insert(
            ['transaction_id' => $transaction_id, 'user_id' => $user->id]
        );


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
            

            $op  = 'buyItem';
            $this-> update_report($op, $item , $user , $owner , $item->price);
            return back()->with("success","Your order has been done successfully");
        }
        else{
            return redirect()->back()->with('fail',"You are not logged in");
        }
    }
    public function addItem(Request $request){
        if(auth()->user()){
            $user = auth()->user();
            $item = Item::select('items.*')->where('id',$request->input('item_id'))->get()->first();
            $owner = User::select("users.*")->where('id', $item->owner_id)->get()->first();

            DB::table('sellers')->insert(
                ['item_id' => $item->id, 'owner_id' =>$owner->id , 'seller_id' => $user->id]
            );
            $user->save();
            $owner->save();
            $item->save();
            $op  = 'addItem';
            $this-> update_report($op, $item , $user , $owner , $item->price);
            return back()->with("success","Item has been added to be sold on your store");
        }
        else{
            return redirect()->back()->with('fail',"You are not logged in");
        }


    }


    public function removeSoldItem(Request $request){
        if(auth()->user()){
            $user = auth()->user();
            $item = Item::select('items.*')->where('id',$request->input('item_id'))->get()->first();
            //$owner = User::select("users.*")->where('id', $item->owner_id)->get()->first();
            //$seller = DB::table('sellers')->select('sellers.*')->where([['item_id','=',$item->id] , ['seller_id','=',$user->id]])->first();
            DB::table('sellers')->select('sellers.*')->where([['item_id','=',$item->id] , ['seller_id','=',$user->id]])->delete();
            $user->save();
            $op  = 'removeItem';
            $this-> update_report($op, $item , $user , $user , $item->price);
            return back()->with("success","Item has been deleted from your store");
        }
        else{
            return redirect()->back()->with('fail',"You are not logged in");
        }

    }

    public function transferCash(Request $request){
        if(auth()->user()){
            
            $user = auth()->user();
            $store = User::select('users.*')->where('id',$request->input('store_id'))->get()->first();
            $transfered_cash = $request->input('transfer');
            $new_doner_balance = $user->balance - $request->input('transfer');
            $new_store_balance = $store-> balance +  $request->input('transfer');
            DB::table('users')
              ->where('id', $user->id)
              ->update(['balance' => $new_doner_balance]);
            
            DB::table('users')
              ->where('id', $store->id)
              ->update(['balance' => $new_store_balance]);
            
            
            $user->save();
            $store->save();
            $op  = 'transferCash';
            $this-> update_report($op, $user , $user , $store , $transfered_cash);
            return back()->with("success","money transferred succesfly");
        }
        else{
            return redirect()->back()->with('fail',"You are not logged in");
        }


    }

}
