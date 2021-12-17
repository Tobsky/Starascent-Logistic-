<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    function dashboard()
    {
        
    

    }

    function total_branches()
    {
        $branch = DB::table('branches')
            ->count();

        $parcel = DB::table('parcels')
            ->count();

        $staff = DB::table('staffs')
            ->where('type','!=', 1)
            ->count();

        
        $status = DB::table('parcels')
            ->select('status')
            ->get();

        return view('dashboard',['branches'=>$branch, 'parcels'=>$parcel, 'staffs'=>$staff, 'statuses'=>$status]);
    }
    
   /*  function total_parcels()
    {
        $status = DB::table('parcels')
            ->where('status','=', 1 )
            ->count();

        return view('dashboard',['statuses'=>$status]);
    } */

}
