<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index()
    {
        return view('home.HomeScreen');
    }

    public function store(Request $request)
    {
        try {
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
                return redirect()->back()->with('success', 'The item is added successfully');
            } else {
                return redirect()->back()->with('fail', 'You are not logged in');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('fail', 'Somethin went wrong');
        }
    }

    public function ViewItem($id)
    {if (auth()->user()) {
        $user = auth()->user();

        if (Item::where('id', $id)->exists()) {
            $item = Item::where('id', $id)->first();
            $store = User::where('id',$item->owner_id)->first();
            
            return view('products.ProductDetails', ['item' => $item, 'store' => $store]);
        } else {
            return redirect()->back()->with('fail', 'No such a product');
        }
    } else {
        return redirect()->back()->with('fail', 'You are not logged in');
    }
    }

}
