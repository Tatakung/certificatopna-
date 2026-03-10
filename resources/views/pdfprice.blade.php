<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ใบเบิกค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน</title>

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

        /* กำหนดขนาดของเนื้อหาให้เต็มหน้ากระดาษ A4 */
        html,
        body {
            font-style: normal;
            font-weight: bold;
            font-family: "THSarabunNew";
        }


        table {
            border-collapse: collapse;
            font-size: 18px;
            line-height: 10px;
            overflow: hidden;
            white-space: nowrap;
        }

        td,
        {
        border: 1px solid;
        font-size: 18px;
        line-height: 10px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        /* เพิ่มไว้สำหรับตัดข้อความที่เกินความกว้างของเซลล์ */
        }

        /* สร้างกรอบดำ กรอบหน้าแรก */
        .black-border {
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

        /* สร้างกรอบดำหน้าที่ 2 */
        .black-border-two {
            position: absolute;
            top: 8mm;
            left: 8mm;
            right: 8mm;
            bottom: 8mm;
            width: calc(100% - 40mm);
            height: calc(100% - 40mm);
            border: 1px solid #d72020;
            box-sizing: border-box;
            padding: 10mm;

        }


        /* เส้นตรง */
        .left-frame {
            position: absolute;
            top: 751px;
            left: 0;
            width: 45%;
            height: 121px;
            border-right: 1px solid rgb(0, 0, 0);
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
            top: 750px;
            left: 70px;
            right: 70px;
            height: 1px;
            background-color: #000000;
        }


        .black-border::after {
            content: "";
            position: absolute;
            top: 909px;
            left: 70px;
            right: 70px;
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
            text-align: right;
            margin-right: 10px;
            margin-top: -0.7cm;
            font-size: 18px;
        }

        .s {
            text-align: right;
            margin-right: 10px;
            margin-top: -0.7cm;
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
            /* margin-top: 1px;
            font-size: 18px; */
            margin-top: -90px;
            white-space: pre-line;
            font-size: 18px;
        }

        .work {
            /* text-align: left; */
            /* padding-left: 36px; */
            margin-top: -9px;
            font-size: 18px;
        }


        th,
        {
        /* font-family: 'Sarabun' !important; */
        text-align: center;
        border: 1px solid #000000;
        }

        .sheet-one {
            margin-top: 3px;
            margin-left: -4px;
            font-size: 18px;

        }

        .zxz {
            margin-top: -50px;
            text-align: left;
            padding-left: 70px;
            font-size: 18px;
        }

        .t-a {
            /* text-align: left; */
            /* margin-right: 1px; */
            margin-top: -20px;
            font-size: 18px;
        }

        .t-b {
            /* text-align: left; */
            /* margin-right: 1px; */
            margin-top: -20px;
            font-size: 18px;
        }

        .t-c {
            margin-left: 72px;
            margin-top: -10px;
            font-size: 18px;
        }

        .t-d {
            margin-top: -20px;
            font-size: 18px;
        }

        .t-e {
            margin-top: -20px;
            font-size: 18px;
        }

        .t-f {
            margin-top: -20px;
            font-size: 18px;
        }

        .t-g {
            margin-top: -20px;
            font-size: 18px;
        }

        .t-h {
            margin-top: -20px;
            font-size: 18px;
        }

        .t-i {
            margin-left: 72px;
            margin-top: -20px;
            font-size: 18px;
        }

        .t-j {
            /* margin-left: 72px ;  */
            margin-top: -20px;
            font-size: 18px;
        }

        .t-k {
            /* margin-left: 72px ;  */
            margin-top: -20px;
            font-size: 18px;
        }

        .t-l {
            margin-right:-3px; 
            text-align: right;
            margin-top: -20px;
            font-size: 20px;
            font-weight: bold;
            /* เพิ่มความหนาให้ตัวอักษร */
        }
        .t-m {
            margin-top: -20px;
            font-size: 18px;
        }
        .t-n {
            margin-left: 72px;
            margin-top: -20px;
            font-size: 18px;
        }
        .t-o {
            margin-left: 144px;
            margin-top: -15px;
            font-size: 20px;
            font-weight: bold;
        }
        .t-p {
            margin-top: -25px;
            font-size: 20px;
            font-weight: bold;
        }
        .sign {
            margin-left: 10.7cm;
            margin-top: -16px;
            position: fixed;
            font-size: 18px;
            
        }

        .budget {
            margin-top: -20px;
            font-size: 18px;
        }



        .right-a {
            font-size: 20px;
            text-align: center;
            margin-top: -20px;
        }

        .right-bracket {
            text-align: center;
            margin-top: -26px;
            font-size: 18px;
        }

        .right-line-a {
            margin-top: -19px;
            font-size: 18px;
            margin-left: 1px;
        }

        .right-line-as {
            margin-top: -19px;
            font-size: 18px;
            margin-left: 30px ; 
        }

        .right-line-ab {
            margin-top: -19px;
            font-size: 18px;
            margin-left: 9px;
        }
        .right-line-li{
            margin-top: -19px;
            font-size: 18px;
            margin-left:42px;
        }
        .right-line-lis{
            margin-top: -15px;
            font-size: 12px;
            margin-left:182px;
        }

        .right-line-b {
            margin-top: -15px;
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
            margin-left: 51px ; 
        }
        .left-bracket {
            margin-top: -18px;
            font-size: 18px;
            margin-left: 94px ; 
        }

        .left-line-c {
            margin-top: -18px;
            font-size: 18px;
            margin-left: 70px ; 

        }
        .left-line-e {
            /* text-align: center; */
            margin-top: -18px;
            margin-left: 102px;
            font-size: 18px;
        }

        .left-bracket-a {
            text-align: center;
            margin-top: -26px;
            font-size: 18px;
        }

        .left-line-f {
            text-align: center;
            margin-top: -26px;
            font-size: 18px;
        }

        .left-line-g {
            margin-top: -26px;
            font-size: 18px;
            text-align: center;
        }



        .left-line-h {
            /* text-align: center; */
            margin-top: -26px;
            margin-left: 1.93cm;
            font-size: 18px;
        }

        .left-bracket-i {
            text-align: center;
            margin-top: -26px;
            font-size: 18px;
        }

        .left-line-j {
            text-align: center;
            margin-top: -26px;
            font-size: 18px;
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
            margin-top: 25px;
            font-size: 18px;
        }

        .two-point-b {
            margin-left: 11.6cm;
            margin-top: -20px;
            position: fixed;
            font-size: 18px;
        }

        .two-point-c {
            position: fixed;
            text-align: right;
            margin-left: 11.1cm;
            margin-top: 10px;
            font-size: 18px;
        }

        .two-point-d {
            position: fixed;
            text-align: right;
            margin-left: 11.1cm;
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
            top: 3.72cm;
            left: 3cm;
            font-size: 18px;
        }

        .employee-faculty_count {
            position: fixed;
            top: 3.72cm;
            left: 12.1cm;
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
            color: #ee0b0b;
        }

        .travelapproval-action_plan {
            position: fixed;
            top: 16.84cm;
            left: 9.10cm;
            font-size: 14px;
            color: #ee0b0b;
        }

        .travelapproval-activity {
            position: fixed;
            top: 16.84cm;
            left: 16.82cm;
            font-size: 14px;
            color: #ee0b0b;
        }

        .two-point-b-employee-name {
            position: fixed;
            top: 23.59cm;
            left: 13.9cm;
            font-size: 18px;
        }

        .two-point-b-employee-position {
            position: fixed;
            top: 24.41cm;
            left: 14.4cm;
            font-size: 18px;
        }

        .na-date {
            position: fixed;
            top: 25.21cm;
            left: 14.4cm;
            font-size: 18px;
        }

        .Receipt-number {
            position: fixed;
            top: 0.79cm;
            right: 2cm;
            font-size: 18px;
        }

        #circlecar,
        #circlebike {
            position: relative;
            top: 5px;
        }
    </style>
</head>

<body>

    <!-- หน้าที่หนึ่ง -->
    <div class="black-border">

        <div class="header-a">
            <p>ใบเบิกค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน</p>
        </div>

        {{-- <div>
            <p>เลขรับที่.................../................</p>
        </div> --}}

        <div class="Receipt-number">
            <p>ส่วนที่ 1</p>
        </div>

        {{-- <span class="Receipt-number">เลขรับที่........../...........</span> --}}


        <div class="for">
            <p>การยางแห่งประเทศไทย................................................................</p>
        </div>

        <div class="s">
            <p>วันที่.......เดือน.................พ.ศ...........
            </p>
        </div>

        <div class="employee-info">
            <p> เรื่อง ขออนุมัติเบิกค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน
            </p>
        </div>

        <div class="datefordate">
            <p>เรียน..............................................................................</p>
        </div>


        <div class="zxz">
            <p>ตามคำสั่ง/บันทึก ที่
                ............................................................................ลงวันที่.........................................ได้รับอนุมัติให้
            </p>
        </div>
        <div class="t-a">
            <p>ข้าพเจ้า....................................................................................ตำแหน่ง..........................................................................ระดับ................
            </p>
        </div>

        <div class="t-b">
            <p>สังกัด............................พร้อมด้วยคณะ........คน
                เดินทางไปปฏิบัติงานตามที่ได้รับอนุมัติโดยออกเดินทางจาก</p>
        </div>

        <div style="font-size: 18px; margin-top: -20px;">
            <input type="radio" id="circlecar" name="vehicle" value="car">&nbsp;ที่อยู่&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="circlebike" name="vehicle" value="bike">&nbsp;สำนักงาน&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="circlebike" name="vehicle" value="bike">&nbsp;ประเทศไทย&nbsp;&nbsp;&nbsp;&nbsp;
            <span
                style="margin-left: 50px;">วันที่............เดือน...............................พ.ศ...................เวลา..................น.
                </< /span>
        </div>


        <div style="font-size: 18px ; margin-top: -11px;">
            และกลับถึง
            <input type="radio" id="circlecar" name="vehicle" value="car">&nbsp;ที่อยู่&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="circlebike" name="vehicle" value="bike">&nbsp;สำนักงาน&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="circlebike" name="vehicle" value="bike">&nbsp;ประเทศไทย&nbsp;&nbsp;&nbsp;&nbsp;
            <span
                style="margin-left: -9px;">วันที่............เดือน...............................พ.ศ...................เวลา..................น.
                </< /span>
        </div>

        <div class="t-c">
            <p>ข้าพเจ้าขอเบิกค่าใช้จ่ายในการเดินทางไปปฏิบัติงานสำหรับ <input type="radio" id="circlecar"
                    name="vehicle" value="car">&nbsp;ข้าพเจ้า
                <input type="radio" id="circlebike" name="vehicle" value="bike">&nbsp;คณะเดินทาง
                &nbsp;ดังนี้
            </p>
        </div>

        <div class="t-d">
            <p>ค่าเบี้ยเลี้ยง..................................................................................................จำนวน...........................วัน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวม............................บาท
            </p>
        </div>
        <div class="t-e">
            <p>ค่าเช่าที่พักประเภท......................................................................................จำนวน...........................วัน&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวม............................บาท
            </p>
        </div>
        <div class="t-f">
            <p>ค่าพาหนะ.................................................................................................................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวม............................บาท
            </p>
        </div>

        <div class="t-g">
            <p>ค่าขนย้ายสิ่งของส่วนตัว&nbsp;ระยะทาง................................กิโลเมตร&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวม............................บาท
            </p>
        </div>

        <div class="t-h">
            <p>ค่าพาหนะ&nbsp;&nbsp;กรณีใช้ยานพาหนะส่วนตัว <input type="radio" id="circlecar" name="vehicle"
                    value="car">&nbsp;รถยนต์
                <input type="radio" id="circlebike" name="vehicle" value="bike">&nbsp;รถจักรยานยนต์
                &nbsp;หมายเลขทะเบียน....................................................................
            </p>
        </div>

        <div class="t-i">
            <p>เงินชดเชย
                (ตามรายละเอียดประกอบการเบิกค่าใช้จ่ายในการเดินทางไปปฏิบัติงาน)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวม............................บาท
            </p>
        </div>


        <div class="t-j">
            <p>ค่าใช้จ่ายอื่นๆ............................................................................................................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวม............................บาท
            </p>
        </div>


        <div class="t-k">
            <p>หักค่าอาหารระหว่างการฝึกอบรม&nbsp;&nbsp;&nbsp;จำนวน...............................มื้อ&nbsp;&nbsp;&nbsp;&nbsp;มื้อละ.................บาท&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รวม............................บาท
            </p>
        </div>
        <div class="t-l">
            <p>รวมทั้งสิ้น............................บาท</p>
        </div>
        <div class="t-m">
            <p>จำนวนเงิน(ตัวอักษร).....................................................................................................................................</p>
        </div>

        <div class="t-n">
            <p>อนึ่ง&nbsp;การเดินทางไปปฏิบัติงานครั้งนี้&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ได้ยืมเงินทดรองจำนวนเงิน............................บาท</p>
        </div>

        <div style="font-size: 18px; margin-top: -20px;">
            จะต้อง
            <input type="radio" id="circlecar" name="vehicle" value="car">&nbsp;ส่งคืน&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="radio" id="circlebike" name="vehicle" value="bike">&nbsp;เบิกเพิ่ม&nbsp;&nbsp;&nbsp;&nbsp;
            <span
                style="margin-left: 20px;">จำนวนเงิน............................บาท
                </< /span>
        </div>

        <div class="t-o">
            <p>ข้าพเจ้าขอรับรองว่ารายการที่กล่าวมาข้างต้นเป็นความจริง&nbsp;&nbsp;พร้อมเอกสารประกอบการเบิกจ่าย</p>
        </div>

        <div class="t-p">
            <p>ที่ส่งมาด้วยจำนวน.......................ฉบับ&nbsp;รวมทั้งจำนวนเงินที่ขอเบิกถูกต้องตามข้อบังคับทุกประการ</p>
        </div>
























        <!-- กรอบฝั่งซ้าย -->
        <div class="side-frame left-frame">
            <div class="left-line-a">
                <p>ลงชื่อ...................................................................ผู้ขอรับเงิน</p>
            </div>

            

            <div class="left-bracket">
                <p>(.............................................................)</p>
            </div>

            <div class="left-line-c">
                <p>ตำแหน่ง.........................................................</p>
            </div>

            
            <div class="left-line-e">
                <p>.................../.................../...................</p>
            </div>

            
        </div>

        <!-- กรอบฝั่งขวา -->
        <div class="side-frame right-frame">
            <div class="right-a">
                <p>เห็นควรอนุมัติให้เบิกจ่ายได้</p>
            </div>

            <div class="right-line-a">
                <p>ลงชื่อ...........................................................ผู้บังคับบัญชา</p>
            </div>
            <div class="right-line-as">
                <p>(.............................................................)</p>
            </div>
            <div class="right-line-ab">
                <p>ตำแหน่ง.........................................................</p>
            </div>

            <div class="right-line-li">
                <p>.................../.................../...................</p>
            </div>

            <div class="right-line-lis">
                <p>กยท.-ฝกค.-กตจ./๒๕๕๙-๐๒</p>
            </div>




            
        </div>
    </div>






    <!-- หน้าที่สอง -->
    <div style="page-break-before: always;"></div> <!-- ใช้สร้างหน้าใหม่ -->
    <div class="black-border-two">
        <div class="two-header">
            <p>บัญชีรายชื่อผู้เดินทางไปปฏิบัติงานเป็นหมู่คณะ</p>
        </div>




        <div class="two-point-a">
            <p>ลงชื่อ....................................หัวหน้าคณะเดินทาง</p>
        </div>

        <div class="two-point-b">
            <p>(....................................................)</p>
        </div>


        <div class="two-point-c">
            <p>ตำแหน่ง...................................................</p>
        </div>



        <div class="two-point-d">
            <p>วันที่...........................................................</p>
        </div>

        <div>
            <p>้</p>
        </div>


    </div>

</body>

</html>
