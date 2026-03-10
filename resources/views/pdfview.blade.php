<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>แบบขออนุมัติเดินทางไปปฏิบัติงาน</title>

    {{-- <meta http-equiv="Content-Language" content="th" /> --}}

    <!-- Bootstrap 3.x only : DOMPDF support float, not flexbox -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <!-- thai font -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Sarabun" rel="stylesheet" /> --}}


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>


    {{-- ฟ้อนไทยนะ --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

    <style>
        /* กำหนดขนาดของหน้าเอกสารเป็น A4 */
        @page {
            size: A4;
            margin: 0;
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal ; 
            /* src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format('truetype') ;  */
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');

        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            /* src: url("{{ asset('fonts/THSarabunNew Bold.ttf') }}") format('truetype') ;  */
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            /* src: url("{{ asset('fonts/THSarabunNew Italic.ttf') }}") format('truetype') ;  */
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');

        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            /* src: url("{{ asset('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype') ;  */
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');

        }



        /* กำหนดขนาดของเนื้อหาให้เต็มหน้ากระดาษ A4 */
        html,
        body {
            /* width: 210mm;
            height: 297mm; */
            /* margin: 0;
            padding: 0; */
            /* font-weight: 100; */
            font-style: normal;
            font-weight: bold;

            /* font-family: "Sarabun", !important; */
            font-family: "THSarabunNew";
            /* font-size: 16px;  */
        }


        /* table {
            border-collapse: collapse;
             font-size: 18px ;
             line-height: 10px;
             overflow: hidden;
             white-space: nowrap;
        } */









        /* สร้างกรอบดำ */
        .black-border {
            position: absolute;
            top: 8mm;
            left: 8mm;
            right: 8mm;
            bottom: 8mm;
            width: calc(100% - 40mm);
            height: calc(100% - 40mm);
            border: 1px solid #000000;
            box-sizing: border-box;
            padding: 10mm;
        }

        /* สร้างกรอบดำ */
        .black-border-two {
            position: absolute;
            top: 8mm;
            left: 8mm;
            right: 8mm;
            bottom: 8mm;
            width: calc(100% - 40mm);
            height: calc(100% - 40mm);
            border: 1px solid #ffffff;
            box-sizing: border-box;
            padding: 10mm;

        }



        .left-frame {
            position: absolute;
            top: 726px;
            left: 0;
            width: 45%;
            height: 297px;
            border-right: 1px solid #000000;
            box-sizing: border-box;
            padding: 5mm;
        }

        .right-frame {
            position: absolute;
            top: 750px;
            right: 0;
            width: 45%;
            height: 72mm;
            box-sizing: border-box;
            padding: 5mm;
        }




        


        .black-border::before {
            content: "";
            position: absolute;
            top: 726px;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #000000;
        }

        .header-a {

            margin-top: -1.25cm;
            text-align: center;
            font-size: 23px;
            font-weight: bold;
        }



        .da {
            text-align: right;
            padding-right: 80px;
            margin-top: -20px;
            font-size: 18px;
        }

        .for {
            text-align: left;
            margin-top: -0.7cm;
            font-size: 18px;
        }

        .s {
            padding-left: 36px;
            margin-top: -49px;
            font-size: 18px;
        }

        .asd2 {
            margin-top: -10px;
        }

        .asd1 {
            margin-top: -10px;
        }

        .employee-info {
            margin-top: -57px;
            white-space: pre-line;
            font-size: 18px;
        }

        .datefordate {
            margin-top: -20px;
            font-size: 18px;
        }

        .work {
            /* text-align: left; */
            /* padding-left: 36px; */
            margin-top: -9px;
            font-size: 18px;
        }

        .sheet-one {
            margin-top: 3px;
            margin-left: -4px;
            font-size: 18px;

        }

        .zxz {
            margin-top: 1.5px;
            text-align: left;
            padding-left: 50px;
            font-size: 18px;
        }

        .pp {
            text-align: right;
            margin-right: 1px;
            margin-top: -15px;
            font-size: 18px;
        }

        .sign {
            margin-left: 10.2cm;
            margin-top: -20px;
            position: fixed;
            font-size: 18px;
        }

        .numbercode {
            margin-left: 15.9cm;
            margin-top: -41px;
            position: fixed;
            font-size: 18px;
        }

        .budget {
            margin-top: -20px;
            font-size: 18px;
        }

        .left-a {
            font-size: 18px;
            text-align: center;
            margin-top: -20px;
        }

        .right-a {
            font-size: 18px;
            text-align: center;
            margin-top: -47px;
        }

        .right-bracket {
            text-align: center;
            margin-top: -26px;
            font-size: 18px;
        }

        .right-line-a {
            margin-top: -26px;
            font-size: 18px;
            text-align: center;
        }

        .right-line-as {
            margin-top: -26px;
            font-size: 18px;
            text-align: center;
        }

        .right-line-ab {
            margin-top: -26px;
            font-size: 18px;
            text-align: center;
        }

        .right-line-b {
            margin-top: -10px;
            font-size: 18px;
            text-align: center;
        }

        .right-line-c {
            margin-top: -26px;
            font-size: 18px;
            text-align: center;
        }

        .right-line-d {
            margin-top: -26px;
            font-size: 18px;
            text-align: center;
        }

        .right-line-e {
            text-align: center;
            font-size: 18px;
            margin-top: -26px;

        }

        .left-line-a {
            margin-top: -14px;
            font-size: 18px;
            text-align: center;
        }

        .left-line-b {
            /* text-align: center; */
            margin-top: -26px;
            margin-left: 1.23cm;
            font-size: 18px;

        }

        .left-bracket {
            text-align: center;
            margin-top: -26px;
            font-size: 18px;
            margin-left: -1.9cm;
        }

        .left-line-c {
            /* text-align: center; */
            margin-top: -26px;
            margin-left: 1.23cm;
            font-size: 18px;
        }

        .left-line-d {
            margin-top: -26px;
            font-size: 18px;
            text-align: center;
        }

        .left-line-e {
            /* text-align: center; */
            margin-top: -26px;
            margin-left: 1.23cm;
            font-size: 18px;
        }

        .left-bracket-a {
            text-align: center;
            margin-top: -26px;
            font-size: 18px;
            margin-left: -1.9cm;
        }

        .left-line-f {
            /* text-align: center; */
            margin-top: -26px;
            font-size: 18px;
            margin-left: 1.23cm;
        }

        .left-line-g {
            margin-top: -26px;
            font-size: 18px;
            text-align: center;
        }



        .left-line-h {
            /* text-align: center; */
            margin-top: -26px;
            margin-left: 1.23cm;
            font-size: 18px;
        }

        .left-bracket-i {
            text-align: center;
            margin-top: -26px;
            font-size: 18px;
            margin-left: -1.9cm;
        }

        .left-line-j {
            /* text-align: center; */
            margin-top: -26px;
            font-size: 18px;
            margin-left: 1.23cm;
        }

        .black-box {
            width: 0.3em;
            height: 0.3em;
            background-color: rgb(0, 0, 0);
            padding: 0.3em;
            border: 2px solid rgb(0, 0, 0);
        }

        .white-box {
            width: 0.3em;
            height: 0.3em;
            background-color: rgb(255, 255, 255);
            padding: 0.3em;
            border: 2px solid rgb(0, 0, 0);
        }

        .two-header {
            margin-top: -10px;
            text-align: center;
            font-size: 23px;
            font-weight: bold;
        }

        .two-point-a {
            text-align: right;
            margin-top: 6px;
            font-size: 18px;
        }

        .two-point-b {
            margin-left: 10.6cm;
            margin-top: -20px;
            position: fixed;
            font-size: 18px;
        }

        .two-point-c {
            position: fixed;
            text-align: right;
            margin-left: 10.1cm;
            margin-top: 10px;
            font-size: 18px;
        }

        .two-point-d {
            position: fixed;
            text-align: right;
            margin-left: 10.1cm;
            margin-top: 41px;
            font-size: 18px;
        }

        .footer-onet {
            text-align: right;
            margin-top: 28.7cm;
            margin-right: 32px;
            font-size: 12px;

        }

        #carother {
            margin-top: 10px;
        }

        .ipemployeename {
            margin-left: 3.1cm;
        }

        .employee-at {
            position: fixed;
            top: 2.29cm;
            left: 3.2cm;
            font-size: 18px;
        }

        .employee-name {
            position: fixed;
            top: 2.99cm;
            left: 4.2cm;
            font-size: 18px;
        }

        .employee-position {
            position: fixed;
            top: 2.99cm;
            left: 11.1cm;
            font-size: 18px;
        }

        .employee-level {
            position: fixed;
            top: 3cm;
            right: 2.4cm;
            font-size: 18px;
        }

        .employee-department {
            position: fixed;
            top: 3.74cm;
            left: 3cm;
            font-size: 18px;
        }

        .employee-faculty_count {
            position: fixed;
            top: 3.74cm;
            left: 12.2cm;
            font-size: 18px;

        }

        .travelapproval-start_date {
            position: fixed;
            top: 4.49cm;
            left: 4.2cm;
            font-size: 18px;
        }

        .travelapproval-end_date {
            position: fixed;
            top: 4.49cm;
            left: 10.65cm;
            font-size: 18px;
        }

        /* .carregistration-2{
            position: fixed;
            top: 14.87cm;
            left: 10.65cm;
        }
        .carregistration-1{
            position: fixed;
            top: 14.60cm;
            left: 10.65cm;
        } */
        .travelapproval-vehicle_number {
            position: fixed;
            top: 15.18cm;
            left: 14.65cm;
        }

        .dash {
            position: fixed;
            top: 15.1cm;
            left: 14.65cm;
        }

        .travelapproval-vacation_start_date {
            position: fixed;
            top: 15.9cm;
            left: 6cm;
        }

        .travelapproval-vacation_end_date {
            position: fixed;
            top: 15.9cm;
            left: 9.59cm;
        }

        .travelapproval-day {
            position: fixed;
            top: 15.9cm;
            left: 16.5cm;
        }


        .travelapproval-vacation_start_date-vacation_end_date-dash-1 {
            position: fixed;
            top: 15.91cm;
            left: 10cm;
        }

        .travelapproval-vacation_start_date-vacation_end_date-dash-2 {
            position: fixed;
            top: 15.91cm;
            left: 17cm;
        }

        .travelapproval-budget_reference {
            position: fixed;
            top: 16.84cm;
            left: 6.20cm;
            font-size: 14px;
        }

        .travelapproval-budget_reference-ft {
            position: fixed;
            top: 17.45cm;
            left: 2.20cm;
            font-size: 18px;
        }

        .travelapproval-action_plan {
            position: fixed;
            top: 16.84cm;
            left: 9.10cm;
            font-size: 14px;

        }

        .travelapproval-activity {
            position: fixed;
            top: 16.84cm;
            left: 15.50cm;
            font-size: 14px;
        }

        .travelapproval-jod {
            position: fixed;
            top: 16.751cm;
            left: 18.81cm;
            font-size: 18px;

        }

        .two-point-b-employee-name {
            position: fixed;
            top: 26.05cm;
            left: 13.42cm;
            font-size: 18px;
        }

        .two-point-b-employee-position {
            position: fixed;
            top: 26.87cm;
            left: 13.9cm;
            font-size: 18px;
        }

        .na-date {
            position: fixed;
            top: 27.67cm;
            left: 13.8cm;
            font-size: 18px;
        }

        .Receipt-number {
            position: fixed;
            top: 0.79cm;
            right: 1.9cm;
            font-size: 18px;
        }

        .date-j {
            position: fixed;
            top: 2.0cm;
            left: 13.00cm;
            font-size: 18px;
        }

        #circlecar,
        #circlebike {
            position: relative;
            top: 5px;
        }

        table {
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;

            overflow: hidden;
            font-size: 18px;
            line-height: 10px;
            vertical-align: middle;
            line-height: 10px;
        }


        /* table {
            border-collapse: collapse;
             font-size: 18px ;
             line-height: 10px;
             overflow: hidden;
             white-space: nowrap;
        } */
    </style>
</head>

<body>

    <!-- หน้าที่หนึ่ง -->
    <div class="black-border">

        <div class="header-a">
            <p>แบบขออนุมัติเดินทางไปปฏิบัติงาน</p>
        </div>

        {{-- <div>
            <p>เลขรับที่.................../................</p>
        </div> --}}

        <div class="da">
            <p>{{ $thaiDateWithYear }}</p>
        </div>

        <span class="Receipt-number">เลขรับที่........../...........</span>

        <span class="date-j">วันที่....................................................................</span>

        <div class="for">
            <p>เรียน.........................................................................</p>
        </div>


        <div class="s">
            <p>ข้าพเจ้า...................................................................ตำแหน่ง...................................................................................ระดับ..............
            </p>
        </div>
        <span class="employee-at">{{ $travelapproval->at }}</span>
        {{-- <span class="employee-name">{{ $employee->name }}</span> --}}
        <span class="employee-name">{{ $travelapproval->prefix }}{{ $travelapproval->name }}
            {{ $travelapproval->lname }}</span>

        <span class="employee-position">{{ $travelapproval->position }}</span>
        <span class="employee-level">{{ $travelapproval->level }}</span>



        <p class="employee-info">
            สังกัด........................................................................................พร้อมด้วยคณะ...............คน&nbsp;&nbsp;ขออนุมัติเดินทางไปปฏิบัติงานระหว่าง
        </p>

        <span class="employee-department">{{ $travelapproval->department }}</span>
        <span class="employee-faculty_count">
            @if ($travelapproval->faculty_count !== null && $travelapproval->faculty_count !== '')
                {{ $travelapproval->faculty_count }}
            @else
                -
            @endif
        </span>


        <div class="datefordate">
            วันที่....................................................................ถึงวันที่....................................................................ดังนี้
        </div>

        <?php
        $startDate = $travelapproval->start_date;
        $endDate = $travelapproval->end_date;
        
        // แปลงเป็นรูปแบบวันที่และปีไทย
        $thaiStartDate = \Carbon\Carbon::parse($startDate)->locale('th')->isoFormat('LL');
        $thaiEndDate = \Carbon\Carbon::parse($endDate)->locale('th')->isoFormat('LL');
        
        // แปลงปีเป็นปีพุทธศักราช
        $thaiStartYear = (int) \Carbon\Carbon::parse($startDate)->addYears(543)->format('Y');
        $thaiEndYear = (int) \Carbon\Carbon::parse($endDate)->addYears(543)->format('Y');
        
        // เปลี่ยนปีในวันที่เป็นปีพุทธศักราช
        $thaiStartDateWithYear = str_replace((string) \Carbon\Carbon::parse($startDate)->year, (string) $thaiStartYear, $thaiStartDate);
        $thaiEndDateWithYear = str_replace((string) \Carbon\Carbon::parse($endDate)->year, (string) $thaiEndYear, $thaiEndDate);
        ?>

        <span class="travelapproval-start_date">{{ $thaiStartDateWithYear }}</span>
        <span class="travelapproval-end_date">{{ $thaiEndDateWithYear }}</span>


        <div class="work">
            1. งานที่ปฏิบัติตามรายการโดยสังเขปต่อไปนี้
        </div>
        {{-- <table>
            <thead>
                <tr>
                    <th style="width: 130px;">วัน เดือน ปี</th>
                    <th style="width: 200px;">ท้องที่หรือสถานที่ปฏิบัติงาน</th>
                    <th style="width: 320px;">งานที่ปฏิบัติ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($workassignment as $show)
                    <tr>
                        <td style="width: 130px;">{{ $show->date }}</td>
                        <td style="width: 200px;">{{ $show->location }}</td>
                        <td style="width: 320px;">{{ $show->task }}</td>
                    </tr>
                @endforeach
        
                @for ($i = 0; $i < 12 - count($workassignment); $i++)
                    <tr>
                        <td style="width: 130px;"></td>
                        <td style="width: 200px;"></td>
                        <td style="width: 320px;"></td>
                    </tr>
                @endfor
            </tbody>
        </table> --}}

        <?php
        function splitTextIntoLines($text, $maxChars)
        {
            $words = preg_split('/\s+/u', $text);
            $lines = [];
            $currentLine = '';
        
            foreach ($words as $word) {
                if (mb_strlen($currentLine . ' ' . $word) <= $maxChars) {
                    $currentLine .= ($currentLine ? ' ' : '') . $word;
                } else {
                    if ($currentLine) {
                        $lines[] = trim($currentLine);
                        $currentLine = $word;
                    } else {
                        $subwords = splitLongWord($word, $maxChars);
                        $lines = array_merge($lines, $subwords);
                    }
                }
            }
        
            if ($currentLine) {
                $lines[] = trim($currentLine);
            }
        
            return $lines;
        }
        
        function splitLongWord($word, $maxChars)
        {
            $subwords = [];
            $length = mb_strlen($word);
            $start = 0;
        
            while ($start < $length) {
                $size = $maxChars;
                $slice = mb_substr($word, $start, $size);
        
                // ตรวจสอบว่าไม่ตัดกลางสระหรือวรรณยุกต์
                while ($size > 1 && preg_match('/^[\p{Mn}\p{Mc}]/u', mb_substr($word, $start + $size, 1))) {
                    $size--;
                }
        
                // ตรวจสอบว่าไม่ตัดระหว่างพยัญชนะต้นกับสระ
                while ($size > 1 && preg_match('/^[\p{Lo}]/u', mb_substr($word, $start + $size - 1, 1)) && preg_match('/^[\p{Mn}\p{Mc}]/u', mb_substr($word, $start + $size, 1))) {
                    $size--;
                }
        
                $slice = mb_substr($word, $start, $size);
                $subwords[] = $slice;
                $start += $size;
            }
        
            return $subwords;
        }
        ?>

        <table>
            <thead>
                <tr>
                    <th style="height: 25px;width: 130px; text-align: center; font-weight: bold;">วัน เดือน ปี</th>
                    <th style="width: 200px; text-align: center; font-weight: bold;">ท้องที่หรือสถานที่ปฏิบัติงาน</th>
                    <th style="width: 313px; text-align: center; font-weight: bold;">งานที่ปฏิบัติ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // สร้างแถวเปล่าจำนวน 12 แถวก่อน
                $rows = array_fill(0, 12, ['date' => '', 'location' => '', 'task' => '']);
                
                // เติมข้อมูลลงในแถวที่สร้างไว้
                $rowIndex = 0;
                foreach ($workassignment as $show) {
                    $locationChunks = splitTextIntoLines($show->location, 32);
                    $taskChunks = splitTextIntoLines($show->task, 53);
                    $maxChunks = max(count($locationChunks), count($taskChunks));
                
                    for ($i = 0; $i < $maxChunks; $i++) {
                        if ($rowIndex >= 12) {
                            break;
                        }
                
                        $thaiDate = \Carbon\Carbon::parse($show->date)
                            ->locale('th')
                            ->isoFormat('LL');
                
                        $thaiYear = (int) \Carbon\Carbon::parse($show->date)
                            ->addYears(543)
                            ->format('Y');
                
                        $thaiDateWithYear = str_replace((string) \Carbon\Carbon::parse($show->date)->year, (string) $thaiYear, $thaiDate);
                
                        $rows[$rowIndex]['date'] = $i == 0 ? $thaiDateWithYear : '';
                        $rows[$rowIndex]['location'] = $locationChunks[$i] ?? '';
                        $rows[$rowIndex]['task'] = $taskChunks[$i] ?? '';
                        $rowIndex++;
                    }
                }
                
                // ตรวจสอบเงื่อนไขเพื่อเติมข้อมูลในแถวที่ 12
                if ($travelapproval->transport !== 'รถยนต์' && $travelapproval->transport !== 'รถจักรยานยนต์') {
                    $rows[11]['date'] = '';
                    $rows[11]['location'] = 'หมายเหตุ เดินทางโดย' . $travelapproval->transport;
                    $rows[11]['task'] = 'ทะเบียน ' . $travelapproval->vehicle_number;
                }
                
                // แสดงแถวทั้งหมด
                foreach ($rows as $row) {
                    echo '<tr>';
                    echo '<td style="height: 25px;width: 130px;text-align: center;">' . $row['date'] . '</td>';
                    echo '<td style="width: 200px; text-align: left; padding-left: 6px;">' . $row['location'] . '</td>';
                    echo '<td style="width: 313px; text-align: left; padding-left: 6px;">' . $row['task'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>






        <div style="font-size: 18px ; ">
            2. ขอใช้พาหนะส่วนตัว
            @if ($travelapproval->transport === 'รถยนต์' || $travelapproval->transport === 'รถจักรยานยนต์')
                <input type="radio" id="circlecar" name="vehicle" value="car"
                    @if ($travelapproval->transport === 'รถยนต์') checked @endif readonly disabled> รถยนต์

                <input type="radio" id="circlebike" name="vehicle" value="bike"
                    @if ($travelapproval->transport === 'รถจักรยานยนต์') checked @endif readonly disabled> รถจักรยานยนต์

                {{-- หมายเลขทะเบียน {{ $travelapproval->vehicle_number }} --}}
                <span
                    style="margin-left: 60px;">หมายเลขทะเบียน..........................................................................
                    </< /span>

                    {{-- <p class="carregistration-1">หมายเลขทะเบียน123..................................................................</p> --}}
                    <span class="travelapproval-vehicle_number">{{ $travelapproval->vehicle_number }}</span>
                @else
                    <input type="radio" id="circlecar" name="vehicle" value="car" readonly disabled> รถยนต์
                    <input type="radio" id="circlebike" name="vehicle" value="bike" readonly disabled>รถจักรยานยนต์
                    {{-- หมายเลขทะเบียน --}}
                    {{-- <p class="carregistration-2">หมายเลขทะเบียน..................................................................</p> --}}
                    <span
                        style="margin-left: 60px;">หมายเลขทะเบียน..........................................................................
                        </< /span>
                        <span class="dash">-</span>
            @endif
        </div>


        {{-- <span class="dash">-</span> --}}



        @if ($travelapproval->vacation_start_date !== null && $travelapproval->vacation_end_date !== null)
            <div class="asd1" style="font-size: 18px;">
                <p>3.
                    ขอพักแรมในวันที่........................................................................................................................รวม................................................วัน
                </p>
                <span class="travelapproval-vacation_start_date">
                    {{-- แปลงเป็นรูปแบบวันที่และปีไทย --}}
                    <?php
                    $thaiStartDate = \Carbon\Carbon::parse($travelapproval->vacation_start_date)
                        ->locale('th')
                        ->isoFormat('LL');
                    $thaiStartYear = (int) \Carbon\Carbon::parse($travelapproval->vacation_start_date)
                        ->addYears(543)
                        ->format('Y');
                    $thaiStartDateWithYear = str_replace((string) \Carbon\Carbon::parse($travelapproval->vacation_start_date)->year, (string) $thaiStartYear, $thaiStartDate);
                    ?>
                    <?php
                    $thaiEndDate = \Carbon\Carbon::parse($travelapproval->vacation_end_date)
                        ->locale('th')
                        ->isoFormat('LL');
                    $thaiEndYear = (int) \Carbon\Carbon::parse($travelapproval->vacation_end_date)
                        ->addYears(543)
                        ->format('Y');
                    $thaiEndDateWithYear = str_replace((string) \Carbon\Carbon::parse($travelapproval->vacation_end_date)->year, (string) $thaiEndYear, $thaiEndDate);
                    ?>
                    {{ $thaiStartDateWithYear }}&nbsp;ถึง&nbsp;{{ $thaiEndDateWithYear }}
                </span>







                <span class="travelapproval-day">
                    <?php
                    $start_date = \Carbon\Carbon::parse($travelapproval->vacation_start_date);
                    $end_date = \Carbon\Carbon::parse($travelapproval->vacation_end_date)->addDays(1);
                    $days = $end_date->diffInDays($start_date);
                    ?>
                    {{ $days }}
                </span>



            </div>
        @elseif($travelapproval->vacation_start_date === null && $travelapproval->vacation_end_date === null)
            <div style="font-size: 18px ; "class="asd2">
                <p>3.
                    ขอพักแรมในวันที่........................................................................................................................รวม................................................วัน
                </p>
                <span class="travelapproval-vacation_start_date-vacation_end_date-dash-1">-</span>
                <span class="travelapproval-vacation_start_date-vacation_end_date-dash-2">-</span>
            </div>
        @endif


        <div class="budget">
            <p>4.
                งบประมาณใช้จ่ายจากมาตรา............แผนปฏิบัติงาน..................................................................กิจกรรม..........................................
            </p>
        </div>
        <span class="travelapproval-budget_reference-ft">
            งบประมาณประจำปีที่ได้รับ........................................เบิกใช้แล้ว.................................................คงเหลือ........................................บาท
        </span>


        <span class="travelapproval-budget_reference">{{ $travelapproval->budget_reference }}</span>
        <span class="travelapproval-action_plan">{{ $travelapproval->action_plan }}</span>
        <span class="travelapproval-activity">{{ $travelapproval->activity }}</span>

        <span class="travelapproval-jod">....</span>



        <div class="zxz">
            จึงเรียนมาเพื่อโปรดพิจารณาอนุมัติ
        </div>

        <div class="pp">
            ลงชื่อ..................................................เลขประจำตัว......................
        </div>

        <div class="sign">
            ({{ $travelapproval->prefix }}{{ $travelapproval->name }} {{ $travelapproval->lname }})
        </div>

        <div class="numbercode">
            {{ $travelapproval->numberid }}
        </div>


        <!-- กรอบฝั่งซ้าย -->
        <div class="side-frame left-frame">
            <div class="left-a">
                <p>ความเห็นผู้บังคับบัญชา</p>
            </div>

            <div class="left-line-a">
                <p>.............................................................................................</p>
            </div>

            <div class="left-line-b">
                <p>ลงชื่อ.................................&nbsp;&nbsp;&nbsp;............/............/............</p>
            </div>

            <div class="left-bracket">
                <p>(..........................................)</p>
            </div>

            <div class="left-line-c">
                <p>ตำแหน่ง..........................................</p>
            </div>

            <div class="left-line-d">
                <p>.............................................................................................</p>
            </div>


            <div class="left-line-e">
                <p>ลงชื่อ.................................&nbsp;&nbsp;&nbsp;............/............/............</p>
            </div>

            <div class="left-bracket-a">
                <p>(..........................................)</p>
            </div>

            <div class="left-line-f">
                <p>ตำแหน่ง..........................................</p>
            </div>

            <div class="left-line-g">
                <p>.............................................................................................</p>
            </div>



            <div class="left-line-h">
                <p>ลงชื่อ.................................&nbsp;&nbsp;&nbsp;............/............/............</p>
            </div>

            <div class="left-bracket-i">
                <p>(..........................................)</p>
            </div>

            <div class="left-line-j">
                <p>ตำแหน่ง..........................................</p>
            </div>

        </div>

        <!-- กรอบฝั่งขวา -->
        <div class="side-frame right-frame">
            <div class="right-a">
                <p>คำสั่งผู้อนุมัติ</p>
            </div>

            <div class="right-line-a">
                <p>.............................................................................................
                </p>
            </div>
            <div class="right-line-as">
                <p>.............................................................................................
                </p>
            </div>
            <div class="right-line-ab">
                <p>.............................................................................................
                </p>
            </div>




            <div class="right-line-b">
                <p>ลงชื่อ....................................................................................</p>
            </div>

            <div class="right-bracket">
                <p>(......................................................................)</p>
            </div>

            <div class="right-line-c">
                <p>ตำแหน่ง................................................................................</p>
            </div>

            <div class="right-line-d">
                <p>.............................................................................................</p>
            </div>

            <div class="right-line-e">
                <p>............../............../..............</p>
            </div>
        </div>
    </div>

    <div class="footer-onet">
        <p>
            กยท.-ฝกค.-กตจ./2599-01
        </p>
    </div>




    <!-- หน้าที่สอง -->
    <div style="page-break-before: always;"></div> <!-- ใช้สร้างหน้าใหม่ -->
    <div class="black-border-two">
        <div class="two-header">
            <p>บัญชีรายชื่อผู้เดินทางไปปฏิบัติงานเป็นหมู่คณะ</p>
        </div>








        <?php
        
        function splitTextIntoLines_two($text, $maxChars)
        {
            $lines = [];
            $currentLine = '';
            $textLength = mb_strlen($text);
        
            for ($i = 0; $i < $textLength; $i++) {
                $currentLine .= mb_substr($text, $i, 1);
                if (mb_strlen($currentLine) >= $maxChars) {
                    $lines[] = trim($currentLine);
                    $currentLine = '';
                }
            }
        
            if (!empty($currentLine)) {
                $lines[] = trim($currentLine);
            }
        
            return $lines;
        }
        ?>

        <table border="1">
            <thead>
                <tr>
                    <th style="width: 100px; height: 37px; text-align: center; border: 1px solid;">ลำดับที่</th>
                    <th style="width: 210px; text-align: center; border: 1px solid;">ชื่อ-สกุล</th>
                    <th style="width: 190px; text-align: center; border: 1px solid;">ตำแหน่ง/ระดับ</th>
                    <th style="width: 150px; text-align: center; border: 1px solid;">หมายเหตุ</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // สร้างแถวเปล่าจำนวน 21 แถวก่อน
                $rows = array_fill(0, 21, ['index' => '', 'faculty_member_name' => '', 'faculty_member_position' => '', 'note' => '']);
                
                // เติมข้อมูลลงในแถวที่สร้างไว้
                $rowIndex = 0;
                $index = 1; // ลำดับที่เริ่มต้น
                foreach ($travelapprovaldetail as $show) {
                    $faculty_member_nameChunks = splitTextIntoLines_two($show->faculty_member_name, 38);
                
                    // $faculty_member_positionChunks = splitTextIntoLines_two($show->faculty_member_position . ' / ' . $show->faculty_member_level, 30);
                    if ($show->faculty_member_level == null) {
                        $faculty_member_positionChunks = splitTextIntoLines_two($show->faculty_member_position, 30);
                    } else {
                        $faculty_member_positionChunks = splitTextIntoLines_two($show->faculty_member_position . ' / ' . $show->faculty_member_level, 30);
                    }
                    $maxChunks = max(count($faculty_member_nameChunks), count($faculty_member_positionChunks));
                
                    for ($i = 0; $i < $maxChunks; $i++) {
                        if ($rowIndex >= 21) {
                            break;
                        }
                
                        $rows[$rowIndex]['index'] = $i == 0 ? $index : '';
                        $rows[$rowIndex]['faculty_member_name'] = $faculty_member_nameChunks[$i] ?? '';
                        $rows[$rowIndex]['faculty_member_position'] = $faculty_member_positionChunks[$i] ?? '';
                        $rowIndex++;
                    }
                    $index++;
                }
                
                // แสดงแถวทั้งหมด
                foreach ($rows as $row) {
                    echo '<tr>';
                    echo '<td style="height: 37px; text-align: center; border: 1px solid;">' . $row['index'] . '</td>';
                    echo '<td style="width: 210px; text-align: left; padding-left: 10px; border: 1px solid;">' . $row['faculty_member_name'] . '</td>';
                    echo '<td style="width: 190px; text-align: center; border: 1px solid;">' . $row['faculty_member_position'] . '</td>';
                    echo '<td style="width: 150px; text-align: center; border: 1px solid;">' . $row['note'] . '</td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

















        <div class="two-point-a">
            <p>ลงชื่อ.......................................................หัวหน้าคณะเดินทาง</p>
        </div>

        <div class="two-point-b">
            <p>(................................................................)</p>
        </div>


        @if ($travelapproval->faculty_count !== null)
            <span class="two-point-b-employee-name">{{ $travelapproval->prefix }}{{ $travelapproval->name }}
                {{ $travelapproval->lname }}</span>
            <span class="two-point-b-employee-position">{{ $travelapproval->position }}</span>
            <span class="na-date">
                {{ \Carbon\Carbon::parse($travelapproval->created_at)->translatedFormat('d F') }}
                {{ \Carbon\Carbon::parse($travelapproval->created_at)->translatedFormat('Y') + 543 }}
            </span>
        @endif


        <div class="two-point-c">
            <p>ตำแหน่ง.............................................................</p>
        </div>




        <div class="two-point-d">
            <p>วันที่....................................................................</p>
        </div>




    </div>

</body>

</html>
