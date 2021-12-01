<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Exception;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    //
    public function index(){
        return view('home.HomeScreen');
    }

  
    public function store(Request $request){
        try{
        $item = new Item;
        $item->name = $request->input('name');
        $item->price = $request->input('price');
        $item->amount = $request->input('amount');
        $item->description = $request->input('description');
        $item->owner_id = 1;
        $item->store_id = 1;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $exten = $file->getClientOriginalExtension();
            $filename = time(). '.' . $exten;
            $file->move('upload/items/', $filename);
            $item->image = $filename;
        }

        $item->save();
        return redirect()->back()->with('success', 'The item is added successfully');
    }catch(Exception $e){
        return redirect()->back()->with('fail', 'Somethin went wrong');
    }
    }

}
