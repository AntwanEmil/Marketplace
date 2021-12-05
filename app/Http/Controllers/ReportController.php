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
        $reports = Report::select('reports.*')->skip(0)->take(100)->where('reports.user_id', '=', $user->id)->get(); 
        return view('user.Report' ,['reports' => $reports ]);
        }
    }
    public function func(){
        error_log('Some message here.');
        $info = 'This is some useful information.';
        return info*blabla;
    }
}
