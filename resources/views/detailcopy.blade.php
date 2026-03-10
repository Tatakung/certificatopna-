@extends('layouts.user')
@section('title', 'รายละเอียดใบอนุมัติเดินทาง')
@section('content')
    <style>
        h2 {
            text-align: center;
            margin-top: 10px;
        }

        .detail-link {
            color: #127A0E;
            text-decoration: none;
            transition: color 0.3s;
        }

        .detail-link:hover {
            color: #E49900;
        }

        .form-container {
            margin: auto;
            /* กำหนดให้ตำแหน่งของ form-container อยู่ตรงกลาง */
            width: 90%;
            /* กำหนดความกว้างของ form-container */
            border: 1px solid #f5f5f5;
            /* เพิ่มเส้นขอบสีเทา */
            border-radius: 10px;
            /* ทำให้มีเส้นขอบโค้ง */
            padding: 20px;
            /* เพิ่มระยะห่างของเนื้อหาภายใน form-container */
            margin-top: 20px;
            /* ทำให้ห่างจากขอบบนประมาณ 20px */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
            /* เพิ่มเงา */
            font-size: 20px;
            /* กำหนดขนาดตัวอักษร */
        }



        .btn-create {
            background-color: #4CAF50;
            /* Green background */
            border: none;
            /* Remove borders */
            color: white;
            /* White text */
            padding: 15px 32px;
            /* Some padding */
            text-align: center;
            /* Center text */
            text-decoration: none;
            /* No text decoration */
            display: inline-block;
            /* Inline block */
            font-size: 16px;
            /* Increase font size */
            border-radius: 8px;
            /* Rounded corners */
        }

        .btn-create:hover {
            background-color: #E49900;
            /* Yellow background on hover */
        }

        input[readonly] {
            background-color: #f2f2f2;
            /* Gray background color */
        }

        input[readonly]:focus {
            background-color: #f2f2f2;
            /* Ensure background color remains gray even when focused */
            outline: none;
            /* Remove the default focus outline */
        }

        .row {
            margin-top: 10px;
            /* ระยะห่างจากบน 20px */
            margin-bottom: 10px;
        }

        .d-flex {
            margin-left: 4.8%;
        }

        .d-flex a {
            padding: 10px 20px;
            margin: 1px;
            background-color: #d43131;
            color: white;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s, border-color 0.3s;
        }

        .d-flex a:hover {
            background-color: #E49900;
            color: white;
        }

        #transaction_date {
            text-align: right;
            font-size: 14px;
        }

        .breadcrumb {
            background-color: #ffffff;
            /* กำหนดสีพื้นหลังของ breadcrumb */
            padding: 10px 15px;
            /* กำหนดระยะห่างของขอบใน breadcrumb */
            border-radius: 4px;
            /* กำหนดรูปร่างของมุมใน breadcrumb */
        }

        .breadcrumb-item.active {
            color: #605e5e;
            /* กำหนดสีข้อความของ breadcrumb item ที่ active */
        }

        #now a {
            color: #ff0000;
            /* กำหนดสีข้อความของลิงก์ในข้อความที่มี ID เป็น "now" */
        }

        #notcolor a {
            color: #605e5e;
        }

        .not-clickable {
            pointer-events: none;
            opacity: 1;
        }
        
    </style>

    @if (Auth::user() && Auth::user()->is_admin == 1)
        <ol class="breadcrumb">
            <li class="breadcrumb-item" id="notcolor"><a href="{{ route('admin.home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item" id="notcolor"><a
                    href="{{ route('userdetail', ['id' => $travelApproval->employee_id]) }}">รายละเอียด</a></li>
            <li class="breadcrumb-item" id="notcolor"><a
                    href="{{ route('historyuser', ['id' => $travelApproval->employee_id]) }}">ประวัติขอใบอนุมัติ</a></li>
            <li class="breadcrumb-item" id="now"><a href="">รายละเอียดใบอนุมัติเดินทาง</a></li>
        </ol>
    @elseif(Auth::user() && Auth::user()->is_admin == 0)
        <ol class="breadcrumb">
            <li class="breadcrumb-item" id="notcolor"><a href="{{ route('homepage') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item" id="now"><a href="">รายละเอียดใบอนุมัติเดินทาง</a></li>

        </ol>
    @endif
    <h2>รายละเอียดใบอนุมัติเดินทาง</h2>
    <br>
    <div class="d-flex flex-nowrap gap-2">
        <a class="nav-link rounded" href="{{ route('printpdf', ['id' => $travelApproval->id]) }}" target="_blank">พิมพ์ใบอนุมัติเดินทาง</a>

        <a class="nav-link rounded" href="{{ route('pdfexpenses', ['id' => $travelApproval->id]) }}" target="_blank">พิมพ์ตารางประมาณค่าใช้จ่ายในการเดินทาง</a>

        @if($travelApproval->transport === 'รถยนต์ สนง.')
            <a class="nav-link rounded" href="{{ route('newpubliccar', ['id' => $travelApproval->id]) }}" target="_blank">พิมพ์ใบขอใช้รถส่วนกลาง</a>
        @else
            <a class="nav-link rounded" href="#" style="pointer-events: none; user-select: none; color: rgb(255, 255, 255);" target="_blank">พิมพ์ใบขอใช้รถส่วนกลาง</a>
        @endif
    
        <a class="nav-link rounded" href="{{ route('fileprice') }}" target="_blank">พิมพ์ใบเบิกค่าใช้จ่ายในการเดินทาง(ยังไม่ได้ทำ)</a>
        <a class="nav-link rounded" href="#" style="pointer-events: none; user-select: none;">พิมพ์หลักฐานการจ่ายเงิน(ยังไม่ได้ทำ)</a>
    </div>
    
    <div class="form-container">
        <?php
        $thaiDate = \Carbon\Carbon::parse($travelApproval->created_at)
            ->locale('th')
            ->isoFormat('LL');
        $thaiYear = (int) \Carbon\Carbon::parse($travelApproval->created_at)
            ->addYears(543)
            ->format('Y');
        $thaiDateWithYear = str_replace((string) \Carbon\Carbon::parse($travelApproval->created_at)->year, (string) $thaiYear, $thaiDate);
        $thaiTime = \Carbon\Carbon::parse($travelApproval->created_at)
            ->locale('th')
            ->isoFormat('LT');
        ?>
        <p id="transaction_date">วันเวลาที่ขอใบอนุมัติ: {{ $thaiDateWithYear }} เวลา {{ $thaiTime }} น.</p>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <label for="prefix" class="form-label">เรียน</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->at }}" readonly>
                </div>


            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="prefix" class="form-label">คำนำหน้า</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->prefix }}" readonly>

                </div>
                <div class="col-md-4">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->name }}" readonly>


                </div>
                <div class="col-md-4">
                    <label for="lname" class="form-label">นามสกุล</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->lname }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="position" class="form-label">ตำแหน่ง</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->position }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="level" class="form-label">ระดับ</label>
                    <input type="text" class="form-control" value="ระดับ {{ $travelApproval->level }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="department" class="form-label">สังกัด</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->department }}" readonly>
                </div>
            </div>




            <div class="row">
                <div class="col-md-4">
                    <label for="section" class="form-label">แผนก</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->section }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="division" class="form-label">กอง</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->division }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="phone_number" class="form-label">เบอร์ติดต่อ</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->phone_number }}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label for="budget_reference" class="form-label">งบประมาณที่ใช้จ่ายจากมาตรา</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->budget_reference }}" readonly>
                </div>

                <div class="col-md-4">
                    <label for="action_plan" class="form-label">แผนปฏิบัติการ</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->action_plan }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="activity" class="form-label">กิจกรรม</label>
                    <input type="text" class="form-control" value="{{ $travelApproval->activity }}" readonly>
                </div>
            </div>
            <h4>ขออนุมัติเดินทางตั้งแต่วันที่</h4>

            @foreach ($workassignment as $show)
                <div class="row">
                    <div class="col-md-4">
                        <label for="budget_reference" class="form-label">วันที่</label>
                        <input type="text" class="form-control"
                            value="<?php
                            $thaiDate = \Carbon\Carbon::parse($show->date)
                                ->locale('th')
                                ->isoFormat('LL');
                            $thaiYear = (int) \Carbon\Carbon::parse($show->date)
                                ->addYears(543)
                                ->format('Y');
                            $thaiDateWithYear = str_replace((string) \Carbon\Carbon::parse($show->date)->year, (string) $thaiYear, $thaiDate);
                            ?>{{ $thaiDateWithYear }}"readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="action_plan" class="form-label">ท้องที่หรือสถานที่ปฏิบัติงาน</label>
                        <input type="text" class="form-control" value="{{ $show->location }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="activity" class="form-label">งานที่ปฏิบัติ</label>
                        <input type="text" class="form-control" value="{{ $show->task }}" readonly>
                    </div>
                </div>
                <br>
            @endforeach
            <div class="col-md-4">
                จำนวนคนที่เดินทางไปปฏิบัติงานเป็นหมู่คณะ(คน)
                <input type="text" class="form-control" value="{{ $travelApproval->faculty_count ?? 0 }}" readonly>
            </div>
            
            มีรายชื่อดังต่อไปนี้
            @foreach ($travelapprovaldetail as $show)
                <div class="row">
                    <div class="col-md-4">
                        <label for="budget_reference" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" value="{{ $show->faculty_member_name }}" readonly>
                    </div>

                    <div class="col-md-4">
                        <label for="action_plan" class="form-label">ตำแหน่ง</label>
                        <input type="text" class="form-control" value="{{ $show->faculty_member_position }}"
                            readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="action_plan" class="form-label">ระดับ</label>
                        <input type="text" class="form-control" value="ระดับ&nbsp;{{ $show->faculty_member_level }}"
                            readonly>
                    </div>

                </div>
            @endforeach
            <br>
            <h4>พาหนะส่วนตัว</h4>
            <div class="row">
                <br>
                @if ($travelApproval->transport == 'รถยนต์ สนง.')
                    <div class="col-md-3">
                        <label for="budget_reference" class="form-label">ประเภท</label>
                        <input type="text" class="form-control" value="{{ $travelApproval->transport }}" readonly>
                    </div>
                    <div class="col-md-3">
                        <label for="action_plan" class="form-label">เลขทะเบียนรถ</label>
                        <input type="text" class="form-control" value="{{ $travelApproval->vehicle_number }}"
                            readonly>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">รถยนต์สำนักงาน</label>
                        <div class="form-check">
                            <input class="form-check-input not-clickable" type="radio" name="car_office"
                                value="TOYOTA (รถตู้)"
                                {{ $travelApproval->car_office == 'TOYOTA (รถตู้)' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                TOYOTA (รถตู้)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input not-clickable" type="radio" name="car_office"
                                value="TOYOTA (VIGO)"
                                {{ $travelApproval->car_office == 'TOYOTA (VIGO)' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                TOYOTA (VIGO)
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">ผู้ขับ</label>
                        <div class="form-check">
                            <input class="form-check-input not-clickable" type="radio" name="driver"
                                id="driver_damrong" value="นายดำรงค์ สืบพันธ์"
                                {{ $travelApproval->driver == 'นายดำรงค์ สืบพันธ์' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                นายดำรงค์ สืบพันธ์
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input not-clickable" type="radio" name="driver"
                                id="driver_naruthep" value="นายนฤเทพ หัทไทย"
                                {{ $travelApproval->driver == 'นายนฤเทพ หัทไทย' ? 'checked' : '' }}>
                            <label class="form-check-label">
                                นายนฤเทพ หัทไทย
                            </label>
                        </div>
                    </div>
                @else
                    <div class="col-md-4">
                        <label for="budget_reference" class="form-label">ประเภท</label>
                        <input type="text" class="form-control" value="{{ $travelApproval->transport }}" readonly>
                    </div>
                    <div class="col-md-4">
                        <label for="action_plan" class="form-label">เลขทะเบียนรถ</label>
                        <input type="text" class="form-control" value="{{ $travelApproval->vehicle_number }}"
                            readonly>
                    </div>
                @endif

            </div>

            <h4>ขอพักแรม</h4>
            @if (is_null($travelApproval->vacation_start_date) || is_null($travelApproval->vacation_end_date))
                <p><span class="dokjan2"> </span>ไม่มีการพักแรม</p>
            @else
                <div class="row">
                    <div class="col-md-4">
                        วันเริ่มต้น

                        <input type="text" class="form-control"
                            value="<?php
                            $thaiDate = \Carbon\Carbon::parse($travelApproval->vacation_start_date)
                                ->locale('th')
                                ->isoFormat('LL');
                            $thaiYear = (int) \Carbon\Carbon::parse($travelApproval->vacation_start_date)
                                ->addYears(543)
                                ->format('Y');
                            $thaiDateWithYear = str_replace((string) \Carbon\Carbon::parse($travelApproval->vacation_start_date)->year, (string) $thaiYear, $thaiDate);
                            ?>{{ $thaiDateWithYear }}"readonly>
                    </div>
                    <div class="col-md-4">
                        วันสิ้นสุด

                        <input type="text" class="form-control"
                            value="<?php
                            $thaiDate = \Carbon\Carbon::parse($travelApproval->vacation_end_date)
                                ->locale('th')
                                ->isoFormat('LL');
                            $thaiYear = (int) \Carbon\Carbon::parse($travelApproval->vacation_end_date)
                                ->addYears(543)
                                ->format('Y');
                            $thaiDateWithYear = str_replace((string) \Carbon\Carbon::parse($travelApproval->vacation_end_date)->year, (string) $thaiYear, $thaiDate);
                            ?>{{ $thaiDateWithYear }}"readonly>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Modalแสดงข้อความสำเร็จ-->
    <div class="modal fade" id="showsuccessss" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document"
            style="display: flex; align-items: center; min-height: calc(100vh - 20px);">
            <div class="modal-content">
                <br>
                <div class="modal-body">
                    <center>
                        <img src="{{ asset('images/success.png') }}" alt="Success Image" width="50ox" height="50px">
                    </center>

                    <p>
                        <center>ขออนุมัติสำเร็จ</center>
                    </p>
                </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        @if (session('success'))
            // แสดง Modal หลังจาก 500 มิลลิวินาที
            setTimeout(function() {
                $('#showsuccessss').modal('show');

                // ตั้งเวลาให้ปิด Modal หลังจาก 2000 มิลลิวินาที (2 วินาที) หลังจากที่แสดง
                setTimeout(function() {
                    $('#showsuccessss').modal('hide');

                    // รีเฟรชหน้าเว็บหลังจากปิด Modal อีก 500 มิลลิวินาที
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                }, 2000);
            }, 500);
        @endif
    </script>
@endsection
