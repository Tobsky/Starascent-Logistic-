<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parcel;
use App\Helpers\Helper;
use App\Models\Parcel_track;

class ParcelListController extends Controller
{
    //
    function show()
    {
       // $data= Parcel::orderBy('recipient_name','DESC')
//                    ->get();

       // return view('parcel_list',['parcels'=>$data]);
       $data = DB::table('parcels')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('parcel_list',['parcels'=>$data]);
    }

    function parcelStatus($stats)
    {
        $data = DB::table('parcels') 
            ->where('status', '=', $stats)
            ->get();
        return view('parcel_list',['parcels'=>$data]);
    }

    function addParcel(Request $req)
    {
        $tracking_number = Helper::TrackNo_Generator(new Parcel, 'tracking_number', 12, 'STA');
        
        $parcel = new Parcel;
        $parcel->tracking_number = $tracking_number;
        $parcel->sender_name = $req->sender_name;
        $parcel->sender_address = $req->sender_address;
        $parcel->sender_contact = $req->sender_contact;
        $parcel->recipient_name = $req->recipient_name;
        $parcel->recipient_address = $req->recipient_address;
        $parcel->recipient_contact = $req->recipient_contact;
        $parcel->product_category = $req->product_category;
        $parcel->save(); 
        
        $parcelTrack = new Parcel_track;
        $parcelTrack->tracking_number = $tracking_number;
        $parcelTrack->save(); 

        return redirect('parcel_list');
    }

    function deleteParcel($id)
    {
        $delete_parcel = Parcel::find($id);
        $delete_parcel->delete();
        
        return redirect('parcel_list');
    }

    function editParcel($id)
    {
        $edit_parcel = Parcel::find($id);
        return view('edit_parcel',['edit_parcel'=>$edit_parcel]);
    }

    function updateParcel(Request $req)
    {
        $edit_parcel = Parcel::find($req->id);
        $edit_parcel->sender_name = $req->sender_name;
        $edit_parcel->sender_address = $req->sender_address;
        $edit_parcel->sender_contact = $req->sender_contact;
        $edit_parcel->product_category = $req->product_category;
        $edit_parcel->recipient_name = $req->recipient_name;
        $edit_parcel->recipient_address = $req->recipient_address;
        $edit_parcel->recipient_contact = $req->recipient_contact;
        $edit_parcel->save(); 

        return redirect('parcel_list');
    }

    function updateStatus(Request $req)
    {
        $parcel_status = Parcel::find($req->id);
        $parcel_status->status = $req->status;
        

        $parcelTrack = new Parcel_track;
        $parcelTrack->tracking_number = $req->tracking_number;
        $parcelTrack->status = $req->status;
        
        $parcel_status->save();
        $parcelTrack->save(); 

        return redirect('parcel_list');
    }

    function trackParcel()
    {
        $track_num = $_GET['tracking_number'];
        $trackparcel = Parcel_track::where('tracking_number', '=', $track_num)->get();
        // dd($trackparcel);
        
        return view('track_parcel',['trackparcel'=>$trackparcel, 'tracking_number'=>$track_num]);

       /*  $tracking_number = $req['tracking_number'] ?? "";
        if($tracking_number != ""){
            $tracks = Parcel_track::where('tracking_number', '=', $tracking_number)->get();
        } else {
            $tracks = "not available";
        }
        $data = compact('tracks','tracking_number');
        return view('track')->with($data); */
        


        /* $tracking_number = $req->tracking_number;
        
        $data = Parcel_track::where('tracking_number', '=', $tracking_number)
        ->get();    
        
        return view('track',['trackparcel'=>$data]); */
    }
    
}
