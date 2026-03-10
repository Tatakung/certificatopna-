<!DOCTYPE html>
<html lang="th">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>แบบฟอร์มการปฏิบัติราชการ</title>
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');

        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');

        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        @page {
            size: A4;
            margin-top: 16px;
            margin-left: 70px;
            margin-right: 70px;
        }

        body {
            font-family: "THSarabunNew";
            font-size: 20px;
            line-height: 1.1;
        }



        .dotted-line {
            border-bottom: 1px dotted #000000;

        }

        .faculty-count {
            border-bottom: 1px dotted #000000;
            min-width: 20px;
            display: inline-block;
            text-align: center;
            padding-bottom: 2px;
            /* ปรับค่าตามต้องการ */
        }


        .header-a {
            margin-top: -30px;
            text-align: center;
            font-size: 23px;
            font-weight: bold;
        }

        .Receipt-number {
            position: fixed;
            top: -20px;
            right: 1px;
            font-size: 20px;
        }

        .logo_f {
            position: fixed;
            top: 14px;
            font-size: 21px;
            margin-left: 0.6cm;
        }

        .for {
            text-align: right;
            margin-right: 2px;
            margin-top: -1.5cm;
            font-size: 19px;
        }

        .tfmm {
            position: fixed;
            top: 30px;
            font-size: 21px;
            margin-left: 6.3cm;
            font-weight: bold;
        }

        .black-border {
            position: absolute;
            top: 8mm;
            left: 0.2px;
            right: 0.2px;
            bottom: 8mm;
            width: calc(100% - 40mm);
            height: calc(100% - 40mm);
            border: 1px solid #ffffff;
            box-sizing: border-box;
            /* padding: 10mm; */
        }

        /* สร้างกรอบดำหน้าที่ 2 */
        .black-border-two {
            position: absolute;
            top: 8mm;
            left: 0.2px;
            right: 0.2px;
            bottom: 8mm;
            width: calc(100% - 40mm);
            height: calc(100% - 40mm);
            border: 1px solid #ffffff;
            box-sizing: border-box;
            padding: 10mm;

        }

        table {
            border-collapse: collapse;
            line-height: 10px;
            overflow: hidden;
            white-space: nowrap;
        }

        td,
        {
        border: 1px solid;
        line-height: 10px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        /* เพิ่มไว้สำหรับตัดข้อความที่เกินความกว้างของเซลล์ */
        }
    </style>
</head>

<body>
    <div class="black-border">

        <div class="header-a">
            <p>การยางแห่งประเทศไทย</p>
        </div>
        <div class="Receipt-number">
            <p>แบบ 1</p>
        </div>
        <div class="logo_f">
            <img src="{{ public_path('images/logo2.png') }}" alt="Logo" width="90px;" height: auto;>
        </div>

        <div class="for">
            <p>
                เลขที่ <span style="border-bottom: 1px dotted #000000; width: 28px; display: inline-block;"></span>/
                <span
                    style="border-bottom: 1px dotted #000000; width: 28px; display: inline-block; margin-left: -4px;"></span>
            </p>
        </div>

        <div class="tfmm">
            <p>ใบขออนุญาตขอใช้รถส่วนกลาง</p>
        </div>
        <div class="t-a" style="margin-left: 60px;margin-top: -0.2cm;">
            <p>
                ข้าพเจ้า
                <span style="border-bottom: 1px dotted #000000; width: 250px; display: inline-block;">
                    <span style="margin-left: 20px; line-height: 0.6; display: block;">
                        {{ $travelApproval->prefix }}{{ $travelApproval->name }}{{ $travelApproval->lname }}
                    </span>
                </span>
                ตำแหน่ง
                <span style="border-bottom: 1px dotted #000000; width: 240px; display: inline-block;">
                    <span style="margin-left: 20px; line-height: 0.6; display: block;">
                        {{ $travelApproval->position }}
                    </span>
                </span>
            </p>
        </div>


        <div class="t-b" style="margin-top: -1.15cm;">
            <p>แผนก
                <span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block;">
                        {{ $travelApproval->section }}
                    </span>
                </span>
                กอง
                <span style="border-bottom: 1px dotted #000000; width: 220px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block;">
                        {{ $travelApproval->division }}
                    </span>
                </span>
                ฝ่าย
                <span style="border-bottom: 1px dotted #000000; width: 130px; display: inline-block;">
                    <span style="margin-left: 60px; line-height: 0.6; display: block;">
                        -
                    </span>
                </span>
            </p>
        </div>


        <div class="t-c" style="margin-top: -1.1cm;">
            <p>หมายเลขโทรศัพท์ติดต่อ
                <span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block;">
                        {{ $travelApproval->phone_number }}
                    </span>
                </span>
            </p>
        </div>

        <div>
            <span style="margin-left: 60px;">ไปปฏิบัติราชการที่</span>
            <span class="dotted-line" style="width: auto;  ">
                @foreach ($work_location as $location)
                    {{ $location->location }}
                @endforeach
            </span>
            <br>
            <span>เพื่อปฏิบัติงาน</span>
            <span class="dotted-line" style="width: auto;  ">
                @foreach ($work_task as $task)
                    {{ $task->task }}
                @endforeach
            </span>
            {{-- <span>จำนวนผู้ปฏิบัติงาน</span>
        <span class="faculty-count">{{ $travelApproval->faculty_count ?? 0 }}</span>
        <span>คน</span> --}}
            <span>จำนวนผู้ปฏิบัติงาน
                <span
                    style="border-bottom: 1px dotted #000000; width: 30px; display: inline-block; text-align: center; transform: translateY(6px);">
                    <span style="line-height: 0.6; display: block;">
                        <span>{{ $travelApproval->faculty_count ?? 0 }}</span>
                    </span>
                </span>
                คน
            </span>
        </div>

        <div class="t-f" style="margin-top: -19px; font-size: 20px;">
            <p>ในวันที่
                <span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block;">
                        {{ Carbon\Carbon::parse($travelApproval->start_date)->locale('th')->isoFormat('D MMM') }}
                        {{ Carbon\Carbon::parse($travelApproval->start_date)->year + 543 }}
                        -
                        {{ Carbon\Carbon::parse($travelApproval->end_date)->locale('th')->isoFormat('D MMM') }}
                        {{ Carbon\Carbon::parse($travelApproval->end_date)->year + 543 }}
                    </span>
                </span>
                ออกเดินทางเวลา
                <span style="border-bottom: 1px dotted #000000; width: 45px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block;">
                    </span>
                </span>
                น.และกลับถึงสำนักงานประมาณเวลา
                <span style="border-bottom: 1px dotted #000000; width: 45px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block;">
                    </span>
                </span>
                น.
            </p>
        </div>
        <div style="position: fixed; margin-top: -30px; margin-left: 340px;">
            <p>(ลงชื่อ)
                <span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block;">
                    </span>
                </span>
                ผู้ขออนุญาต
            </p>
        </div>
        <div style="position: fixed; margin-top: -2px; margin-left: 385px;">
            <p>(
                <span style="border-bottom: 1px dotted #000000; width: 170px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                        {{ $travelApproval->prefix }}{{ $travelApproval->name }} {{ $travelApproval->lname }}
                    </span>
                </span>
                )
            </p>
        </div>
        <div style="position: fixed; margin-top: 34px; margin-left: 394px;">
            <p>
                <span style="border-bottom: 1px dotted #000000; width: 170px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                        {{ \Carbon\Carbon::parse($travelApproval->created_at)->locale('th')->isoFormat('D MMMM ') .(now()->year + 543) }}
                    </span>
                </span>
            </p>
        </div>
        <div style="position: fixed; margin-top: 86px; margin-left: 330px;">
            <p>(ลงชื่อ)
                <span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block;">
                    </span>
                </span>
                ผู้บังคับบัญชา
            </p>
        </div>

        <div style="position: fixed; margin-top: 114px; margin-left: 385px;">
            <p>(
                <span style="border-bottom: 1px dotted #000000; width: 170px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">

                    </span>
                </span>
                )
            </p>
        </div>

        <div style="position: fixed; margin-top: 141px; margin-left: 350px;">
            <p>ตำแหน่ง
                <span style="border-bottom: 1px dotted #000000; width: 170px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>
        <div style="position: fixed; margin-top: 192px; margin-left: 398px;">
            <p>
                <span style="border-bottom: 1px dotted #000000; width: 170px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>

        <div class="t-p" style="position: fixed; margin-top: 256px; ">
            สมควรจ่ายรถยนต์
            <span style="border-bottom: 1px dotted #000000; width: 170px; display: inline-block;">
                <span style="line-height: 0.6; display: block; text-align: center;">
                    {{ $travelApproval->car_office }}
                </span>
            </span>
            เลขทะเบียน
            <span style="border-bottom: 1px dotted #000000; width: 120px; display: inline-block;">
                <span style=" line-height: 0.6; display: block; text-align: center;">
                    {{ $travelApproval->vehicle_number }}
                </span>
            </span>
            ผู้ขับ
            <span style="border-bottom: 1px dotted #000000; width: 150px; display: inline-block;">
                <span style=" line-height: 0.6; display: block; text-align: center;">
                    {{ $travelApproval->driver }}
                </span>
            </span>
        </div>


        <table style=" position: fixed; margin-top: 18.7cm;">
            <!-- แถวสำหรับหัวข้อหลัก -->
            <tr>
                <td colspan="5" style="height: 25px;font-weight: bold; text-align: center; ">
                    การเติมน้ำมันระหว่างเดินทาง</td>
            </tr>
            <!-- แถวสำหรับหัวข้อย่อย -->
            <tr>
                <td style="height: 25px; width: 30px; font-weight: bold; text-align: center; ">ที่
                </td>
                <td style="width: 85px; font-weight: bold; text-align: center; ">วันที่</td>
                <td style="width: 60px; font-weight: bold; text-align: center; ">เลขไมล์</td>
                <td style="width: 50px; font-weight: bold; text-align: center; ">ลิตร</td>
                <td style="width: 67px; font-weight: bold; text-align: center; ">บาท</td>
            </tr>
            @for ($i = 0; $i < 9; $i++)
                <tr>
                    <td style="height: 25px; width: 30px; font-weight: bold; text-align: center; ">
                    </td>
                    <td style="width: 85px; font-weight: bold; text-align: center; "></td>
                    <td style="width: 60px; font-weight: bold; text-align: center; "></td>
                    <td style="width: 50px; font-weight: bold; text-align: center; "></td>
                    <td style="width: 67px; font-weight: bold; text-align: center; "></td>
                </tr>
            @endfor
            <tr>
                <td colspan="3" style="height: 25px;text-align: center;">รวม</td>
                <td style="width: 50px; font-weight: bold; text-align: center;"></td>
                <td style="width: 67px; font-weight: bold; text-align: center;"></td>
            </tr>
        </table>

        <div style="position: fixed; top: 17.7cm; margin-left: 9cm;">
            <p>(ลงชื่อ)
                <span style="border-bottom: 1px dotted #000000; width: 220px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
                ผู้จ่ายรถ
            </p>
        </div>


        <div style="position: fixed; top: 18.4cm; margin-left: 10.2cm;">
            <p>(<span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>)</p>
        </div>

        <div style="position: fixed; top: 19.1cm; margin-left: 9cm;">
            <p>ตำแหน่ง
                <span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>
        <div style="position: fixed; top: 20.4cm; margin-left: 10.4cm;">
            <p><span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>
        
        <div style="position: fixed;top: 20.9cm;  margin-left: 9cm;">
            <p>(ลงชื่อ)
                <span style="border-bottom: 1px dotted #000000; width: 89px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
                หัวหน้าส่วนงาน/หัวหน้าหน่วยงาน</p>
        </div>


        <div style="position: fixed;top: 21.6cm;margin-left: 10cm;">
            <p>(<span style="border-bottom: 1px dotted #000000; width: 160px; display: inline-block;">
                <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                </span>
            </span>)/ผู้ที่ได้รับมอบหมาย</p>
        </div>
        <div style="position: fixed; top: 22.3cm; margin-left: 9cm;">
            <p>ตำแหน่ง
                <span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>
        <div style="position: fixed; top: 23.6cm; margin-left: 10.4cm;">
            <p><span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>




        <div style="position: fixed; top: 24.1cm; margin-left: 9cm;">
            <p>(ลงชื่อ)
                <span style="border-bottom: 1px dotted #000000; width: 178px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
                ผู้มีอำนาจอนุมัติ
            </p>
        </div>


        <div style="position: fixed; top: 24.8cm; margin-left: 10.2cm;">
            <p>(<span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>)</p>
        </div>

        <div style="position: fixed; top: 25.5cm; margin-left: 9cm;">
            <p>ตำแหน่ง
                <span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>
        <div style="position: fixed; top: 26.8cm; margin-left: 10.4cm;">
            <p><span style="border-bottom: 1px dotted #000000; width: 200px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>






    </div>


    <!-- หน้าที่สอง -->
    <div style="page-break-before: always;"></div> <!-- ใช้สร้างหน้าใหม่ -->
    <div class="black-border-two">

        <div style="margin-top: -50px;text-align: center;font-size: 23px;font-weight: bold;">
            <p>พนักงานควบคุมยานพาหนะบันทึกการปฏิบัติงาน</p>
        </div>
        <table style="margin-left: -38px;">
            <!-- แถวสำหรับหัวข้อย่อย -->
            <tr>
                <td style="height: 50px; width: 37px; font-weight: bold; text-align: center; ">
                    ลำดับ
                </td>
                <td style="width: 101px; font-weight: bold; text-align: center; ">ออกจาก</td>
                <td style="width: 90px; font-weight: bold; text-align: center; ">เลขวัด<br>ระยะทาง
                </td>
                <td style="width: 57px; font-weight: bold; text-align: center;">เวลา</td>
                <td style="width: 101px; font-weight: bold; text-align: center;">ถึง</td>
                <td style="width: 90px; font-weight: bold; text-align: center;">เลขวัด<br>ระยะทาง
                </td>
                <td style="width: 60px; font-weight: bold; text-align: center;">เวลา</td>
                <td style="width: 92px; font-weight: bold; text-align: center;">ระยะทางที่ใช้
                </td>
            </tr>
            @for ($i = 0; $i < 19; $i++)
                <tr>
                    <td style="height:30px; width: 37px; font-weight: bold; text-align: center;">

                    </td>
                    <td style="width: 101px; font-weight: bold; text-align: center;"></td>
                    <td style="width: 90px; font-weight: bold; text-align: center; ">
                    </td>
                    <td style="width: 57px; font-weight: bold; text-align: center; "></td>
                    <td style="width: 101px; font-weight: bold; text-align: center; "></td>
                    <td style="width: 90px; font-weight: bold; text-align: center; ">
                    </td>
                    <td style="width: 60px; font-weight: bold; text-align: center; "></td>
                    <td style="width: 92px; font-weight: bold; text-align: center;">

                </tr>
            @endfor
        </table>


        <div style="margin-top: 1px;position: fixed ; margin-left: 9.1cm;">
            <p>รวมระยะทางที่ใช้ปฏิบัติงาน
                <span style="border-bottom: 1px dotted #000000; width: 100px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>กม.</p>
        </div>


        <div style="margin-top: 53px;position: fixed ; margin-left: 9.1cm;">
            <p>
                <span style="border-bottom: 1px dotted #000000; width: 120px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>พนักงานควบคุมยานพาหนะ</p>
        </div>

        <div style="margin-top: 86px;position: fixed ; margin-left: 9.1cm;">
            <p>
                <span style="border-bottom: 1px dotted #000000; width: 40px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>/
                <span style="border-bottom: 1px dotted #000000; width: 40px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>/
                <span style="border-bottom: 1px dotted #000000; width: 40px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>

        <div style="margin-top: 126px;position: fixed ;  margin-left: 20px; ">
            <p>รับรองว่าเป็นความจริงทุกประการ&nbsp;และมีความเห็นว่า
                <span style="border-bottom: 1px dotted #000000; width: 316px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>
        <div style="margin-top: 179px;position: fixed ; margin-left: -30px;">
            <p>
                <span style="border-bottom: 1px dotted #000000; width: 644px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>
        <div style="margin-top: 208px;position: fixed ; margin-left: -30px;">
            <p>
                <span style="border-bottom: 1px dotted #000000; width: 644px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>
        
        <div style="margin-top: 220px;position: fixed ; margin-left: 9.1cm;">
            <p>
                <span style="border-bottom: 1px dotted #000000; width: 120px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>พนักงานผู้ใช้ยานพาหนะ</p>
        </div>

        <div style="margin-top: 253px;position: fixed ; margin-left: 9.1cm;">
            <p>
                <span style="border-bottom: 1px dotted #000000; width: 40px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>/
                <span style="border-bottom: 1px dotted #000000; width: 40px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>/
                <span style="border-bottom: 1px dotted #000000; width: 40px; display: inline-block;">
                    <span style="margin-left: 14px; line-height: 0.6; display: block; text-align: center;">
                    </span>
                </span>
            </p>
        </div>









    </div>
</body>

</html>
