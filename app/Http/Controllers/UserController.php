<?php

namespace App\Http\Controllers;

use App\Models\TravelApproval;
use App\Models\TravelApprovalDetail;
use App\Models\User;
use App\Models\WorkAssignment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function showform()
    {
        $getprovince = DB::table('provinces')->get();
        $users = User::select('id', 'prefix', 'name', 'lname', 'position', 'is_admin', 'level')->get();  // ดึงข้อมูล id และ name จาก users
        return view('formcer', compact('users', 'getprovince'));
    }


    public function savedata(Request $request)
    {
        $driver = $request->input('driver');
        $carOffice = null;

        if ($request->has('vehicle_number')) {
            $vehicleNumber = $request->input('vehicle_number');
        }
        if ($request->has('vehicle_number_company')) {
            $vehicleNumber = $request->input('vehicle_number_company');
            if ($vehicleNumber == "ฮว-4536 กทม.") {
                $carOffice =  "TOYOTA (รถตู้)";
            }
            if ($vehicleNumber == "ฮฉ-8312 กทม.") {
                $carOffice =  "TOYOTA (VIGO)";
            }
        }

        $action_plan = $request->action_plan == 'อื่นๆ' ? $request->other_input_action_plan : $request->action_plan;

        // ตรวจสอบกิจกรรม
        if ($request->input('activity') === "other_activity") {
            $INPUT_ACTIVITY = $request->input('other_input_activity');
        } else {
            $INPUT_ACTIVITY = $request->input('activity');
        }

        // แยกช่วงวันที่เป็นวันเริ่มต้นและวันสิ้นสุด
        $dateRange = explode(' ถึง ', $request->input('daterange'));
        $startDate = $dateRange[0];
        $endDate = $dateRange[1];

        // ตรวจสอบว่ามีการเลือกวันที่ในช่อง "ขอพักแรม" หรือไม่
        if ($request->has('sojourn') && !empty($request->input('sojourn'))) {
            $dateRangesojourn = explode(' ถึง ', $request->input('sojourn'));
            $startDatesojourn = $dateRangesojourn[0];
            $endDatesojourn = $dateRangesojourn[1];
        } else {
            $startDatesojourn = null;
            $endDatesojourn = null;
        }

        $travelApproval = TravelApproval::create([
            'employee_id' => auth()->user()->id,
            'at' => $request->at,
            'name' => $request->name,
            'prefix' => $request->prefix,
            'lname' => $request->lname,
            'position' => $request->position,
            'level' => $request->level,
            'department' => $request->department,
            'section' => $request->section,
            'division' => $request->division,
            'phone_number' => $request->phone_number,
            'faculty_count' => $request->faculty_count,
            'numberid' => auth()->user()->numberid,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'transport' => $request->transport, //ประเภทยนที่ใช้ในการเดินทาง 
            'vehicle_number' => $vehicleNumber, //ทะเบียนรถยนต์
            'vacation_start_date' => $startDatesojourn,
            'vacation_end_date' => $endDatesojourn,
            'budget_reference' => $request->budget_reference,
            'action_plan' => $action_plan,    //แผนปฏิบัติการ
            'activity' => $INPUT_ACTIVITY,     //กิจกรรม
            'car_office' => $carOffice,
            'driver' => $driver,
            'vehicle_expenses' =>  $request->vehicle_expenses,
            'fuel_expenses' => $request->fuel_expenses,
            'food_expenses' => $request->food_expenses,
        ]);

        // // สร้างเรคอร์ดในตาราง TravelApprovalDetail
        $facultyCount = (int) $request->faculty_count;
        for ($i = 1; $i <= $facultyCount; $i++) {
            $facultyName = $request->input('name_' . $i);
            $user = User::find($facultyName); // ค้นหาผู้ใช้จาก id ที่เลือก
            $facultyMemberName = $user->prefix . '' . $user->name . ' ' . $user->lname; // สร้างชื่อผู้ใช้แบบเต็มรูปแบบ

            $facultyPosition = $request->input('position_' . $i);
            $facultyLevel = $request->input('level_' . $i); // เพิ่มการดึงข้อมูล level
            // $facultyNote = $request->input('note_' . $i);
            TravelApprovalDetail::create([
                'travel_approval_id' => $travelApproval->id,
                'faculty_member_name' => $facultyMemberName,
                'faculty_member_position' => $facultyPosition,
                'faculty_member_level' => $facultyLevel, // เพิ่มการบันทึก level
                // 'faculty_note' => $facultyNote,
            ]);
        }

        // สร้างเรคอร์ดในตาราง WorkAssignment
        $dateFields = $request->only(['date', 'task']);

        $provinces = $request->input('province');
        $amps = $request->input('amp');
        $dists = $request->input('dis');

        foreach ($dateFields['date'] as $key => $date) {
            $dateValue = date('Y-m-d', strtotime($date));
            $task = $dateFields['task'][$key];
            $province = $provinces[$key]; //ใส่จังหวัด
            $amp = $amps[$key]; //ใส่อำเภอ
            $dis = $dists[$key]; //ใส่ตำบล

            WorkAssignment::create([
                'travel_approval_id' => $travelApproval->id,
                'date' => $dateValue,
                'task' => $task,
                'location' => 'ต.' . $dis . ' อ.' . $amp . ' จ.' . $province,
            ]);
        }

        return redirect()->route('detail', ['id' => $travelApproval->id])->with('success', 'สำเร็จแล้ว');
    }

    public function homepage()
    {
        // ดึงข้อมูลของผู้ใช้ที่กำลังเข้าสู่ระบบ
        $user = User::find(auth()->user()->id);

        // ค้นหาข้อมูลการขออนุมัติเดินทางของผู้ใช้ที่กำลังเข้าสู่ระบบ
        $data = TravelApproval::where('employee_id', $user->id)
            ->select('id', 'created_at', 'faculty_count')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('homepage', compact('data'));
    }

    public function detail($id)
    {
        $travelApproval = TravelApproval::find($id);
        $workassignment = WorkAssignment::where('travel_approval_id', $travelApproval->id)->get();
        $travelapprovaldetail = TravelApprovalDetail::where('travel_approval_id', $travelApproval->id)->get();
        return view('detail', compact('travelApproval', 'workassignment', 'travelapprovaldetail'));
    }

    // public function printpdf($id)
    // {
    //     $travelapproval = TravelApproval::find($id);
    //     $travelapprovaldetail = TravelApprovalDetail::where('travel_approval_id', $id)->get();
    //     $workassignment = WorkAssignment::where('travel_approval_id', $id)->get();
    //     $thaiDate = Carbon::now()->locale('th')->isoFormat('LL');
    //     $thaiYear = (int)Carbon::now()->addYears(543)->format('Y');
    //     $thaiDateWithYear = str_replace((string)Carbon::now()->year, (string)$thaiYear, $thaiDate);
    //     $pdfs = PDF::loadview('pdfview', compact('travelapproval', 'travelapprovaldetail', 'workassignment', 'thaiDateWithYear'));
    //     return $pdfs->stream();  
    // }

    public function printpdf($id)
    {
        $travelapproval = TravelApproval::find($id);
        $travelapprovaldetail = TravelApprovalDetail::where('travel_approval_id', $id)->get();
        $workassignment = WorkAssignment::where('travel_approval_id', $id)->get();
        $thaiDate = Carbon::now()->locale('th')->isoFormat('LL');
        $thaiYear = (int)Carbon::now()->addYears(543)->format('Y');
        $thaiDateWithYear = str_replace((string)Carbon::now()->year, (string)$thaiYear, $thaiDate);
        // ตรวจสอบจังหวัด
        $provinces = [];
        $isSameProvince = true;

        foreach ($workassignment as $index => $show) {
            preg_match('/จ\.(\S+)/', $show->location, $matches);
            if ($matches) {
                $province = $matches[1];
                $provinces[] = $province;
                if ($index > 0 && $province !== $provinces[$index - 1]) {
                    $isSameProvince = false;
                }
            }
        }
        // ใช้ dd() เพื่อตรวจสอบค่า
        if ($isSameProvince) {
            // dd("ทุกจังหวัดเหมือนเดิม");
            return $this->printpdfbefore($id);
        } else {
            // dd("ต่างกัน");
            return $this->printpdfdifferent($id);
        }
    }

    private function printpdfbefore($id)
    {
        $travelapproval = TravelApproval::find($id);
        $travelapprovaldetail = TravelApprovalDetail::where('travel_approval_id', $id)->get();
        $workassignment = WorkAssignment::where('travel_approval_id', $id)->get();
        $thaiDate = Carbon::now()->locale('th')->isoFormat('LL');
        $thaiYear = (int)Carbon::now()->addYears(543)->format('Y');
        $thaiDateWithYear = str_replace((string)Carbon::now()->year, (string)$thaiYear, $thaiDate);
        $pdfs = PDF::loadview('pdfview', compact('travelapproval', 'travelapprovaldetail', 'workassignment', 'thaiDateWithYear'));
        return $pdfs->stream();
    }
    private function printpdfdifferent($id)
    {
        $travelapproval = TravelApproval::find($id);
        $travelapprovaldetail = TravelApprovalDetail::where('travel_approval_id', $id)->get();
        $workassignment = WorkAssignment::where('travel_approval_id', $id)->get();
        $thaiDate = Carbon::now()->locale('th')->isoFormat('LL');
        $thaiYear = (int)Carbon::now()->addYears(543)->format('Y');
        $thaiDateWithYear = str_replace((string)Carbon::now()->year, (string)$thaiYear, $thaiDate);
        $pdfs = PDF::loadview('pdfviewdifferent', compact('travelapproval', 'travelapprovaldetail', 'workassignment', 'thaiDateWithYear'));
        return $pdfs->stream();
    }




    public function newpubliccar($id){
        $travelApproval = TravelApproval::find($id);
        $work_location = WorkAssignment::where('travel_approval_id', $id)->get();
        $work_task = WorkAssignment::where('travel_approval_id', $id)->get();
        $pdfs = PDF::loadview('newpubliccar', compact('travelApproval', 'work_location','work_task'));
        return $pdfs->stream();
    }












    public function publiccar($id)
    {
        $data = TravelApproval::find($id);
        $datawork = WorkAssignment::where('travel_approval_id', $id)->get();
        //ส่วนlocation
        $message = '';
        foreach ($datawork as $index => $work) {
            // รับข้อความจาก $work และเชื่อมต่อกับ $message
            $message .= $work->location;
            // เพิ่มเครื่องหมาย "," เว้นคั่นระหว่างข้อความ ยกเว้นข้อความสุดท้าย
            if ($index < count($datawork) - 1) {
                $message .= ', ';
            }
        }
        $totalCharacters = mb_strlen($message, 'UTF-8');
        if (mb_strlen($message) > 83) {
            $shortMessage = mb_substr($message, 0, 83); // ตัดข้อความ 40 ตัวอักษรแรก
            $remainingMessage = mb_substr($message, 83); // ตัดข้อความที่เหลือ
        } else {
            $shortMessage = $message;
            $remainingMessage = '';
        }


        //ส่วนtask
        // $message_task = '';
        // foreach ($datawork as $index => $work) {
        //     $message_task .= $work->task;
        //     if ($index < count($datawork) - 1) {
        //         $message_task .= ', ';
        //     }
        // }
        // $totalCharacters_task = mb_strlen($message, 'UTF-8');
        // if (mb_strlen($message_task) > 63) {
        //     $shortMessage_task = mb_substr($message_task, 0,63); 
        //     $remainingMessage_task = mb_substr($message_task, 63); 
        // } else {

        //     $shortMessage_task = $message_task;
        //     $remainingMessage_task = '';
        // }

        // ส่วน task
        $message_task = '';
        foreach ($datawork as $index => $work) {
            $message_task .= $work->task;
            if ($index < count($datawork) - 1) {
                $message_task .= ', ';
            }
        }
        $totalCharacters_task = mb_strlen($message_task, 'UTF-8');
        if (mb_strlen($message_task) > 60) {
            $shortMessage_task = mb_substr($message_task, 0, 60);
            $remainingMessage_task = mb_substr($message_task, 60);
            if (mb_strlen($remainingMessage_task) > 40) {
                $shortMessage_task_2 = mb_substr($remainingMessage_task, 0, 40);
                $remainingMessage_task_2 = mb_substr($remainingMessage_task, 40);
            } else {
                $shortMessage_task_2 = $remainingMessage_task;
                $remainingMessage_task_2 = '';
            }
        } else {
            $shortMessage_task = $message_task;
            $remainingMessage_task = '';
            $shortMessage_task_2 = '';
            $remainingMessage_task_2 = '';
        }

        $pdfs = PDF::loadview('publiccar', compact(
            'data',
            'datawork',
            'message',
            'shortMessage',
            'remainingMessage',
            'totalCharacters_task',
            'message_task',
            'shortMessage_task',
            'remainingMessage_task',
            'shortMessage_task_2',
            'remainingMessage_task_2'
        ));
        $pdfs = PDF::loadview('publiccar', compact('data', 'datawork', 'message', 'shortMessage', 'remainingMessage', 'totalCharacters_task', 'message_task', 'shortMessage_task', 'remainingMessage_task', 'remainingMessage_task_2', 'remainingMessage_task_2', 'shortMessage_task_2'));
        return $pdfs->stream();
    }






    public function test()
    {
        $message = "สวัสดีครับทุกท่าน วันนี้มีความสุข วันนี้ได้กินต้มไก่ใส่แกงหน่อไม้";
        $totalCharacters = mb_strlen($message, 'UTF-8');

        if (mb_strlen($message) > 10) {
            $shortMessage = mb_substr($message, 0, 10); // ตัดข้อความ 40 ตัวอักษรแรก
            $remainingMessage = mb_substr($message, 10); // ตัดข้อความที่เหลือ
        } else {
            $shortMessage = $message;
            $remainingMessage = '';
        }

        return view('test', compact('message', 'shortMessage', 'remainingMessage', 'totalCharacters'));
    }



    public function joypdf()
    {
        $datawork = WorkAssignment::where('travel_approval_id', 92)->get();
        $dataworks = WorkAssignment::where('travel_approval_id', 92)->get();

        // $data = TravelApproval::where('id', 92)->first();
        $pdfs = PDF::loadview('joy', compact('datawork', 'dataworks'));
        return $pdfs->stream();
    }



    public function pdfexpenses($id)
    {
        $travelapproval = TravelApproval::find($id);
        $travelapprovaldetail = TravelApprovalDetail::where('travel_approval_id', $id)->get();
        $workAssignment = WorkAssignment::where('travel_approval_id', $id)->get();
        $workAssignment_date = WorkAssignment::where('travel_approval_id', $id)->get();


        $vacation_start_date = $travelapproval->vacation_start_date; //วันที่เริ่มพักแรม
        $vacation_end_date = $travelapproval->end_date; //วันที่สิ้นสุดการพักแรม 


        $pdfs = PDF::loadview('pdfexpenses', compact('travelapproval', 'travelapprovaldetail', 'workAssignment', 'workAssignment_date', 'vacation_start_date', 'vacation_end_date'))->setPaper('a4', 'landscape');
        return $pdfs->stream();
    }




    // public function publiccarcopy($id)
    // {
    //     $data = TravelApproval::find($id);
    //     $datawork_location = WorkAssignment::where('travel_approval_id', $id)->get();
    //     $datawork_task = WorkAssignment::where('travel_approval_id', $id)->get();

    //     $pdfs = PDF::loadview('publiccarcopy', compact('data', 'datawork_location','datawork_task'));
    //     return $pdfs->stream();
    // }



    public function fileprice()
    {
        $travelapproval = "รถยนต์";
        $pdfs = PDF::loadview('pdfprice', compact('travelapproval'));
        return $pdfs->stream();
    }

    //เลือกจังหวัด
    public function province()
    {
        $getprovince = DB::table('provinces')->get();
        return view('formcer', compact('getprovince'));
    }
    //เลือกอำเภอ
    public function getsendprovince($sendprovincedata)
    {
        $senddata = DB::table('amphures')->where('province_id', $sendprovincedata)->get();
        return response()->json($senddata);
    }
    //เลือกตำบล
    public function getsenddis($senddisdata)
    {
        $senddatadis = DB::table('districts')->where('amphure_id', $senddisdata)->get();
        return response()->json($senddatadis);
    }


    public function edit($id)
    {
        $travelApproval = TravelApproval::find($id);
        $workassignment = WorkAssignment::where('travel_approval_id', $travelApproval->id)->get();
        $travelapprovaldetail = TravelApprovalDetail::where('travel_approval_id', $travelApproval->id)->get();
        $getprovince = DB::table('provinces')->get();

        return view('editdata', compact('travelApproval', 'workassignment', 'travelapprovaldetail', 'getprovince'));
    }




    public function requesttravel()
    {
        $employee = User::find(28);
        // $travelRequest = TravelRequest::find(1);
        return view('joy', compact('employee'));
    }
}
