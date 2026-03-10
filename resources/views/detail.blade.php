@extends('layouts.user')
@section('title', 'รายละเอียดใบอนุมัติเดินทาง')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap');

        body {
            font-family: 'Prompt', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 30px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        h1 {
            color: #127A0E;
            font-weight: 600;
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 10px;
            font-size: 2rem;
        }

        .info-group {
            margin-bottom: 30px;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
        }

        .info-group h2 {
            font-size: 1.4rem;
            color: #E49900;
            margin-bottom: 15px;
            font-weight: 600;
            /* border-bottom: 2px solid #E49900; */
            padding-bottom: 5px;
        }

        .info-item {
            margin-bottom: 12px;
            display: flex;
            align-items: baseline;
        }

        .info-label {
            font-weight: 600;
            color: #127A0E;
            min-width: 200px;
        }

        .info-value {
            color: #555;
            flex: 1;
        }

        .travel-details {
            background-color: #e8f5e9;
            border-radius: 10px;
            padding: 20px;
            margin-top: 30px;
        }

        .travel-details h3 {
            color: #127A0E;
            font-size: 1.2rem;
            margin-bottom: 20px;
            /* border-bottom: 2px solid #127A0E; */
            padding-bottom: 5px;
        }

        .travel-info {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .travel-info-item {
            flex-basis: 48%;
            margin-bottom: 10px;
        }

        .attendees-list {
            list-style-type: none;
            padding-left: 0;
        }

        .attendees-list li {
            margin-bottom: 8px;
            background-color: #f1f8e9;
            padding: 8px;
            border-radius: 5px;
        }

        .transport-accommodation {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-top: 20px;
        }

        .transport-accommodation div {
            flex-basis: 48%;
            padding: 20px;
            background-color: #f1f8e9;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: left;
            font-size: 1rem;
            color: #333;
        }

        .transport-accommodation div p {
            margin: 0;
            padding: 5px 0;
        }

        .icon {
            font-size: 30px;
            margin-bottom: 10px;
            color: #127A0E;
        }

        .transport-accommodation .title {
            font-weight: 600;
            color: #127A0E;
            /* border-bottom: 2px solid #127A0E; */
            padding-bottom: 5px;
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .work-assignment-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            padding: 15px;
            margin-bottom: 15px;
        }

        .work-assignment-item h4 {
            color: #127A0E;
            font-size: 1.1rem;
            margin: 0;
            padding-bottom: 5px;
            /* border-bottom: 2px solid #127A0E; */
        }

        .work-assignment-item p {
            margin: 5px 0;
            font-size: 1rem;
            color: #333;
        }

        .work-assignment-item strong {
            color: #127A0E;
        }

        .btn-container {
            margin-top: 30px;
            text-align: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            font-size: 1rem;
            font-weight: 600;
            color: #fff;
            background-color: #127A0E;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0e6d05;
        }
        .approval-date {
            background-color: #e8f5e9;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: 600;
            color: #127A0E;
        }
            /* Breadcrumb */
    .breadcrumb {
        background-color: #f5f5f5;
        padding: 10px 20px;
        border-radius: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .breadcrumb-item.active {
        color: #605e5e;
    }

    .breadcrumb-item + .breadcrumb-item::before {
        content: "›";
        color: #757575;
    }

    #now a {
        color: #4caf50;
        font-weight: 600;
    }

    </style>
    @if (Auth::user() && Auth::user()->is_admin == 1)
        <ol class="breadcrumb">
            <li class="breadcrumb-item" id="now"><a href="{{ route('admin.home') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item" id="now"><a
                    href="{{ route('userdetail', ['id' => $travelApproval->employee_id]) }}">รายละเอียด</a></li>
            <li class="breadcrumb-item" id="now"><a
                    href="{{ route('historyuser', ['id' => $travelApproval->employee_id]) }}">ประวัติขอใบอนุมัติ</a></li>
            <li class="breadcrumb-item active" id="now"><a href="">รายละเอียดใบอนุมัติเดินทาง</a></li>
        </ol>
    @elseif(Auth::user() && Auth::user()->is_admin == 0)
        <ol class="breadcrumb">
            <li class="breadcrumb-item" id="now"><a href="{{ route('homepage') }}">หน้าแรก</a></li>
            <li class="breadcrumb-item" id="now"><a href="">รายละเอียดใบอนุมัติเดินทาง</a></li>
        </ol>
    @endif


    <div class="container">
        <h1>รายละเอียดใบอนุมัติเดินทาง</h1>
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
        <div class="approval-date">
            วันเวลาที่ขอใบอนุมัติ: {{ $thaiDateWithYear }} เวลา {{ $thaiTime }} น.
        </div>
        <div class="btn-container">
            <a href="{{ route('printpdf', ['id' => $travelApproval->id]) }}" class="btn"
                target="_blank">พิมพ์ใบอนุมัติเดินทาง</a>
            <a href="{{ route('pdfexpenses', ['id' => $travelApproval->id]) }}" class="btn"
                target="_blank">พิมพ์ตารางประมาณค่าใช้จ่ายในการเดินทาง</a>
            @if ($travelApproval->transport === 'รถยนต์ สนง.')
                <a href="{{ route('newpubliccar', ['id' => $travelApproval->id]) }}" class="btn"
                    target="_blank">พิมพ์ใบขอใช้รถส่วนกลาง</a>
            @else
                <a href="{{ route('newpubliccar', ['id' => $travelApproval->id]) }}"
                    style="pointer-events: none; user-select: none; color: rgb(255, 255, 255);" class="btn"
                    target="_blank">พิมพ์ใบขอใช้รถส่วนกลาง</a>
            @endif


            {{-- <a href="#" class="btn">พิมพ์ใบเบิกค่าใช้จ่ายในการเดินทาง</a> --}}
        </div>
        <div class="info-group">
            <h2>ข้อมูลผู้ขออนุมัติ</h2>
            <div class="info-item">
                <span class="info-label">เรียน:</span>
                <span class="info-value">{{ $travelApproval->at }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">ชื่อ-นามสกุล:</span>
                <span class="info-value">{{ $travelApproval->prefix }}{{ $travelApproval->name }}
                    {{ $travelApproval->lname }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">ตำแหน่ง:</span>
                <span class="info-value">{{ $travelApproval->position }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">ระดับ:</span>
                <span class="info-value">{{ $travelApproval->level }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">สังกัด:</span>
                <span class="info-value">{{ $travelApproval->department }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">แผนก:</span>
                <span class="info-value">{{ $travelApproval->section }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">กอง:</span>
                <span class="info-value">{{ $travelApproval->division }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">เบอร์ติดต่อ:</span>
                <span class="info-value">{{ $travelApproval->phone_number }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">งบประมาณที่ใช้จ่ายจากมาตรา:</span>
                <span class="info-value">&nbsp;{{ $travelApproval->budget_reference }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">แผนปฏิบัติการ:</span>
                <span class="info-value"> {{ $travelApproval->action_plan }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">กิจกรรม:</span>
                <span class="info-value"> {{ $travelApproval->activity }}</span>
            </div>
        </div>

        {{-- <div class="info-group">
            <h2>รายละเอียดงบประมาณ</h2>
            <div class="info-item">
                <span class="info-label">งบประมาณที่ใช้จ่ายจากมาตรา:</span>
                <span class="info-value">{{ $travelApproval->budget_reference }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">แผนปฏิบัติการ:</span>
                <span class="info-value">{{ $travelApproval->action_plan }}</span>
            </div>
            <div class="info-item">
                <span class="info-label">กิจกรรม:</span>
                <span class="info-value">{{ $travelApproval->activity }}</span>
            </div>
        </div> --}}

        <div class="travel-details">
            <h3>รายละเอียดการขออนุมัติเดินทาง</h3>
            <div class="travel-info">
                <div class="travel-info-item">
                    <span class="info-label">วันที่เริ่มปฏิบัติงาน:</span>
                    <span class="info-value">
                        {{ Carbon\Carbon::parse($travelApproval->start_date)->locale('th')->isoFormat('D MMMM') }}
                        {{ Carbon\Carbon::parse($travelApproval->start_date)->year + 543 }}

                    </span>
                </div>
                <div class="travel-info-item">
                    <span class="info-label">วันที่สิ้นสุดการปฏิบัติงาน:</span>
                    <span class="info-value">
                        {{ Carbon\Carbon::parse($travelApproval->end_date)->locale('th')->isoFormat('D MMMM') }}
                        {{ Carbon\Carbon::parse($travelApproval->end_date)->year + 543 }}

                    </span>
                </div>
                <div class="travel-info-item">
                    <span class="info-label">จำนวนคนเดินทางไปปฏิบัติงานเป็นหมู่คณะ:</span>
                    <span class="info-value">{{ $travelApproval->faculty_count ?? '0' }} คน</span>
                </div>

            </div>
            <h3>รายชื่อผู้เดินทางไปเป็นหมู่คณะ</h3>
            <ul class="attendees-list">
                @foreach ($travelapprovaldetail as $index => $show)
                    <li>{{ $index + 1 }}. {{ $show->faculty_member_name }}  </li>
                @endforeach
            </ul>
            <div class="travel-details">
                <h3>สถานที่ปฏิบัติงาน</h3>
                @foreach ($workassignment as $show)
                    <div class="work-assignment-item">
                        <h4>
                            วันที่
                            {{ Carbon\Carbon::parse($show->date)->locale('th')->isoFormat('D MMMM') }}
                            {{ Carbon\Carbon::parse($show->date)->year + 543 }}
                        </h4>
                        <p><strong>สถานที่ปฏิบัติงาน:</strong> {{ $show->location }}</p>
                        <p><strong>งานที่ปฏิบัติ:</strong> {{ $show->task }}</p>
                    </div>
                @endforeach
            </div>



            <div class="transport-accommodation">
                <div>
                    <i class="fas fa-car icon"></i>
                    <p class="title">พาหนะที่ใช้ในการเดินทาง</p>
                    @if ($travelApproval->transport == 'รถยนต์ สนง.')
                        <p>ประเภท: {{ $travelApproval->transport }}</p>
                        <p>เลขทะเบียนรถ: {{ $travelApproval->vehicle_number }}</p>
                        <p>รถยนต์สำนักงาน: {{ $travelApproval->car_office }}</p>
                        <p>ผู้ขับ: {{ $travelApproval->driver }}</p>
                    @else
                        <p>ประเภท: {{ $travelApproval->transport }}</p>
                        <p>เลขทะเบียนรถ: {{ $travelApproval->vehicle_number }}</p>
                    @endif
                </div>
                <div>
                    <i class="fas fa-bed icon"></i>
                    <p class="title">ขอพักแรม</p>
                    @if ($travelApproval->vacation_start_date && $travelApproval->vacation_end_date)
                        @php
                            $startDate = Carbon\Carbon::parse($travelApproval->vacation_start_date);
                            $endDate = Carbon\Carbon::parse($travelApproval->vacation_end_date);
                            $totalDays = $endDate->diffInDays($startDate) + 1; // รวมวันเริ่มต้น
                        @endphp
                        <p>ระหว่างวันที่
                            <strong>{{ $startDate->locale('th')->isoFormat('D MMMM') }}
                                {{ $startDate->locale('th')->year + 543 }}
                            </strong>

                            ถึงวันที่
                            <strong>{{ $endDate->locale('th')->isoFormat('D MMMM') }}
                                {{ $endDate->locale('th')->year + 543 }}
                            </strong>

                        </p>
                        <p>รวมเป็นจำนวน <strong>{{ $totalDays }} วัน</strong></p>
                    @else
                        <p>ไม่ได้มีการพักแรม</p>
                    @endif
                </div>

            </div>

        </div>
    </div>
@endsection