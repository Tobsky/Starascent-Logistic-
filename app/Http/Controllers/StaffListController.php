<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staffs;
use App\Models\TestStaffs;
use Crypt;
use Session;

class StaffListController extends Controller
{
    //
    function listStaff()
    {
        $data= Staffs::all();
        
        return view('staff_list',['staffs'=>$data]);
    }

    function addStaff(Request $req)
    {
        $staff = new Staffs;
        $staff->firstname = $req->firstname;
        $staff->lastname = $req->lastname;
        $staff->email = $req->email;
        $staff->phone_number = $req->phone_number;
        $staff->password = Crypt::encrypt($req->password);
        $staff->save(); 
        $req->session()->flash('status','Record Saved');

        return redirect('new_staff');
    }

    function deleteStaff($id)
    {
        $delete_staff = Staffs::find($id);
        $delete_staff->delete();
        
        return redirect('staff_list');
    }

    function editStaff($id)
    {
        $edit_staff = Staffs::find($id);
        return view('edit_staff',['edit_staff'=>$edit_staff]);
    }

    function updateStaff(Request $req)
    {
        $edit_staff = Staffs::find($req->id);
        $edit_staff->firstname = $req->firstname;
        $edit_staff->lastname = $req->lastname;
        $edit_staff->email = $req->email;
        $edit_staff->phone_number = $req->phone_number;
        $edit_staff->password = Crypt::encrypt($req->password);
        $edit_staff->save(); 

        return redirect('staff_list')->with('success', 'Staff record Updated');
    }

    
}
