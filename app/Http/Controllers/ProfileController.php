<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //

    public function index(Request $request)
    {
        $user = auth()->user();
        $purchased_items = DB::table('purshased_items')->select('purshased_items.*')->where('user_id','=',1);
        //return view('/components/ProfileScreen');  // used for trial only :"
        return view('user.ProfileScreen');

    }

}
