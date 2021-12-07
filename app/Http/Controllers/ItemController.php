<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends ProfileController
{
    //
    public function index()
    {
        return view('home.HomeScreen');
    }
    public function update_report($op, $item,$user){
        // adding description to transactions table //
        $name = $item->name;
        $description_add =  'a new product " ' . $name  .  ' " is added to your store with price= '.$item->price;
        $description_update =  'your product: " ' . $name . ' " is updated ';

        if($op == 'store'){
            $transaction_id = DB::table('transactions')->insertGetId([
                'description' => $description_add
            ]);
        }
        else {
            $transaction_id = DB::table('transactions')->insertGetId([
                'description' => $description_update
            ]);
        }

        // adding mapping info to reports table //
        DB::table('reports')->insert(
            ['transaction_id' => $transaction_id, 'user_id' => $user->id]
        );


    }

    public function store(Request $request)
    {

        if (auth()->user()) {

            $user = auth()->user();
            $item = new Item;
            $item->name = $request->input('name');
            $item->price = $request->input('price');
            $item->amount = $request->input('amount');
            $item->description = $request->input('description');
            $item->owner_id = $user->id;

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $exten = $file->getClientOriginalExtension();
                $filename = time() . '.' . $exten;
                $file->move('upload/items/', $filename);
                $item->image = $filename;
            }

            $item->save();
            $op  = 'store';
            $this->update_report($op, $item,$user);
            return redirect('/profile')->with('success', 'The item is added successfully');
        } else {
            return redirect()->back()->with('fail', 'You are not logged in');
        }

    }

    public function ViewItem($id)
    {if (auth()->user()) {
        $user = auth()->user();

        if (Item::where('id', $id)->exists()) {
            $item = Item::where('items.id', $id)
            ->join('purshased_items','purshased_items.item_id','=','items.id')
            ->select('items.*', 'purshased_items.amount as qty')
            ->first();
            $store = User::where('id', $item->owner_id)->first();

            return view('products.ProductDetails', ['item' => $item, 'store' => $store]);
        } else {
            return redirect()->back()->with('fail', 'No such a product');
        }
    } else {
        return redirect()->back()->with('fail', 'You are not logged in');
    }
    }
    public function View($id)
    {
        if (auth()->user()) {
        $user = auth()->user();
       
        if (Item::where('id', $id)->exists()) {
            $item = Item::where('id', $id)->first();
            $store = User::where('id', $item->owner_id)->first();

            return view('products.EditProduct', ['item' => $item, 'store' => $store]);
        } else {
            return redirect()->back()->with('fail', 'No such a product');
        }
    } else {
        return redirect()->back()->with('fail', 'You are not logged in');
    }
    }
    public function Update(Request $request, $id)
    {      
       if (auth()->user()) {
            $user = auth()->user();
        
        if (Item::where('id', $id)->exists()) {
            $item = Item::where('id', $id)->first();
        }
        else{
            return redirect('/profile')->with('fail','No such an item');
        }
           // $item=items::find($id);
            $item->name = $request->input('name');
           // $item->name= $request['name'];
            $item->price = $request->input('price');
            $item->amount = $request->input('amount');
            $item->description = $request->input('description');
            $item->owner_id = $user->id;

            if ($request->hasFile('image')) {
              
                $file = $request->file('image');
                $exten = $file->getClientOriginalExtension();
                $filename = time() . '.' . $exten;
                $file->move('upload/items/', $filename);
                $item->image = $filename;
            }
        }
      $item->save();
      $op  = 'update';
      $this->update_report($op, $item,$user);

        return redirect('/profile')->with('success', "The item is updated successfully"); 
    
}
    
    public function DetailForSale($id)
    {
        if (auth()->user()) {
            
            if (Item::where('id', $id)->exists()) {
                $item = Item::where('id', $id)->first();
                $store = User::where('id', $item->owner_id)->first();
                $flag = "ForSale";
                return view('products.ProductDetails', ['item' => $item, 'store' => $store, 'flag' => $flag]);
            } else {
                return redirect()->back()->with('fail', 'No such a product');
            }
        } else {
            return redirect()->back()->with('fail', 'You are not logged in');
        }
    }

    public function destroy($id)
    {
     
        DB::table('purshased_items')->where('item_id', $id)->delete();

        DB::table('sellers')->where('item_id', $id)->delete();
        Item::destroy($id);
       
        return redirect('/profile')->with('success', 'The item is deleted successfully');

    }

    public function search()
    {

    $search_text=$_GET['search'];
    $items=Item::where('name','LIKE','%'.$search_text.'%')->get();
    return  view('home.HomeScreen',['items'=>$items]);


    }

    public function ViewForBuy($id){
        if (auth()->user()) {
           
           
            if (Item::where('id', $id)->exists()) {
                $item = Item::where('items.id', '=',$id)->join('users','items.owner_id','=','users.id')
                        ->select('items.*','users.Storename')->get()->first();
                $balance = User::select('users.*')->where('id', '=', auth()->user()->id)->first();
                $user = auth()->user();     
                $seller = DB::table('sellers')->select('sellers.*')->where([['item_id','=',$item->id] , ['seller_id','=',$user->id]])->first();
                $owner =  DB::table('sellers')->select('sellers.*')->where([['item_id','=',$item->id] , ['owner_id','=',$user->id]])->first();
                $is_sold = false;
                $is_owned = false;

                if ($seller != null) $is_sold = true;
                if ($owner != null) $is_owned = true;

                return view('products.BuyProduct', ['item' => $item, 'balance'=>$balance ,'is_sold'=>$is_sold , 'is_owned'=>$is_owned,'seller'=>$seller , 'owner'=>$owner,'user'=>$user]);
            } else {
                return redirect()->back()->with('fail', 'No such a product');
            }
        } else {
            return redirect()->back()->with('fail', 'You are not logged in');
        }
    }

    
}
