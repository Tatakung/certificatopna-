<?php

namespace App\Http\Controllers;

use App\Models\TravelApproval;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function showuser()
    {
        $users = User::all();
        return view('adminHome', compact('users'));
    }

    public function userdetail($id)
    {
        $detail = User::find($id);
        return view('userdetail', compact('detail'));
    }


    public function historyuser($id)
    {
        $finduser = User::find($id);
        // ค้นหาข้อมูลการขออนุมัติเดินทางของผู้ใช้ที่กำลังเข้าสู่ระบบ
        $data = TravelApproval::where('employee_id', $finduser->id)
            ->select('id', 'created_at', 'faculty_count')
            ->get();

        return view('historyuser',compact('data','finduser'));
    }
}
