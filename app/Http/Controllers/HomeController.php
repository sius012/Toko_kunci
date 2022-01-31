<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class HomeController extends Controller
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
        $detailtranstoday = DB::table('billing')->join('billing_detail', 'billing.id', '=', 'billing_detail.billing_id' )->whereDate('billing.created_at', date('Y-m-d'))->count();
        $transtoday = DB::table('billing')->whereDate('billing.created_at', date('Y-m-d'))->count();
        $ttn = DB::table('billing')->whereDate('billing.created_at', date('Y-m-d'))->sum('bayar');
       
        $detailtranstoweek = DB::table('billing')->join('billing_detail', 'billing.id', '=', 'billing_detail.billing_id' )->whereBetween('billing.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $transtoweek = DB::table('billing')->whereBetween('billing.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        $twn  = DB::table('billing')->whereBetween('billing.created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('bayar');

        $detailtranstom = DB::table('billing')->join('billing_detail', 'billing.id', '=', 'billing_detail.billing_id' )->whereBetween('billing.created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $transtom = DB::table('billing')->whereBetween('billing.created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->count();
        $tmn = DB::table('billing')->whereBetween('billing.created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])->sum('bayar');
        
       
        return view('home', ['dtt' => $detailtranstoday, 'tt' => $transtoday,'ttn' => $ttn, 'dtw' => $detailtranstoweek, 'tw' => $transtoweek, 'twn' => $twn, 'tm' => $transtom, 'dtm' => $detailtranstom, 'tmn' => $tmn]);
    }
}
