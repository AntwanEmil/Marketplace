<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Report;

class ReportController extends Controller
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

        if (auth()->user()) {

        $user = auth()->user();
        $reports = DB::table ('reports')->where ('user_id','=',$user->id)
                ->join('transactions','reports.transaction_id','=','transactions.id')
                ->select('transactions.date','transactions.description')
                ->orderBy('transactions.date', 'desc')
                ->get();

        $transfers = DB::table ('transferred_cash')->where('from_user_id','=',$user->id)->get();
        return view('user.Report' ,['reports' => $reports ,'transfers'=>$transfers ,'user'=>$user]);
        }
    }

}
