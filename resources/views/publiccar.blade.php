<!DOCTYPE html>
<html lang="en">

<head>
    {{-- <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> --}}
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ใบขออนุญาติขอใช้รถส่วนกลาง</title>

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
            font-size: 20px;
            line-height: 10px;
            overflow: hidden;
            white-space: nowrap;
        }

        td,
        {
        border: 1px solid;
        font-size: 20px;
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
            border: 1px solid #ffffff;
            box-sizing: border-box;
            padding: 10mm;

        }


        .header-a {
            margin-top: -0.9cm;
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
            margin-right: 2px;
            margin-top: -1.5cm;
            font-size: 19px;
        }

        .tfmm {
            position: fixed;
            top: 1.6cm;
            font-size: 21px;
            margin-left: 6.3cm;
        }

        /* .f-ft{
            position: fixed;
            top: 1.6cm;
            font-size: 21px;
            margin-left: 6.3cm;
    
        } */

        .logo_f {
            position: fixed;
            top: 1cm;
            font-size: 21px;
            margin-left: 0.6cm;
        }

        /* .tfmm {
            text-align: right;
            margin-right: 10px;
            margin-top: -5cm;
            font-size: 18px;
        } */
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
            margin-left: 60px;
            margin-top: 1cm;
            font-size: 20px;
        }

        .t-b {
            margin-top: -25px;
            font-size: 20px;
        }

        .t-c {
            /* margin-left: 72px; */
            margin-top: -25px;
            font-size: 20px;
        }

        .t-d {
            margin-left: 60px;
            margin-top: -10px;
            font-size: 20px;
        }

        .t-e {
            margin-top: -25px;
            font-size: 20px;
        }

        .t-e-e {
            margin-top: -25px;
            font-size: 20px;
        }

        .t-f {
            margin-top: -25px;
            font-size: 20px;
        }

        .t-f-ft {
            margin-top: -25px;
            font-size: 20px;
        }

        .t-g {
            margin-top: -20px;
            font-size: 20px;
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
            margin-right: -3px;
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
            margin-top: 16px;
            font-size: 20px;
        }

        .sign {
            margin-left: 3.6cm;
            margin-top: -56px;
            position: fixed;
            font-size: 20px;

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
            margin-left: 30px;
        }

        .right-line-ab {
            margin-top: -19px;
            font-size: 18px;
            margin-left: 9px;
        }

        .right-line-li {
            margin-top: -19px;
            font-size: 18px;
            margin-left: 42px;
        }

        .right-line-lis {
            margin-top: -15px;
            font-size: 12px;
            margin-left: 182px;
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
            text-align: right;
            margin-top: 50px;
            font-size: 20px;
        }

        .left-bracket {
            text-align: right;
            margin-top: -25px;
            font-size: 20px;
            margin-right: 70px;
        }

        .left-line-c {
            margin-top: -18px;
            font-size: 18px;
            margin-left: 70px;

        }

        .left-line-e {
            text-align: right;
            margin-top: -24px;
            font-size: 20px;
            margin-right: 72px;
        }

        .left-line-ff {

            text-align: right;
            margin-top: 30px;
            font-size: 20px;

        }

        .left-line-gg {
            text-align: right;
            margin-top: -24px;
            font-size: 20px;
            margin-right: 70px;
        }

        .left-line-hh {
            text-align: right;
            margin-top: -24px;
            font-size: 20px;
            margin-right: 72px;
        }

        .left-line-ii {
            text-align: right;
            margin-top: -24px;
            font-size: 20px;
            margin-right: 72px;
        }


        .ploy-a {
            position: fixed;
            top: 18.4cm;
            font-size: 20px;
            margin-left: 9cm;

        }

        .ploy-b {
            position: fixed;
            top: 19.1cm;
            font-size: 20px;
            margin-left: 10.2cm;
        }

        .ploy-c {
            position: fixed;
            top: 19.8cm;
            font-size: 20px;
            margin-left: 9cm;
        }

        .ploy-d {
            position: fixed;
            top: 20.5cm;
            font-size: 20px;
            margin-left: 10.4cm;
        }

        .kung-a {
            position: fixed;
            top: 21.9cm;
            font-size: 20px;
            margin-left: 9cm;
        }

        .kung-b {
            position: fixed;
            top: 22.6cm;
            font-size: 20px;
            margin-left: 10.2cm;
        }

        .kung-c {
            position: fixed;
            top: 23.3cm;
            font-size: 20px;
            margin-left: 9cm;
        }

        .kung-d {
            position: fixed;
            top: 24cm;
            font-size: 20px;
            margin-left: 10.2cm;
        }

        .kon-a {
            position: fixed;
            top: 25.4cm;
            font-size: 20px;
            margin-left: 9cm;

        }

        .kon-b {
            position: fixed;
            top: 26.1cm;
            font-size: 20px;
            margin-left: 10.2cm;
        }

        .kon-c {
            position: fixed;
            top: 26.8cm;
            font-size: 20px;
            margin-left: 9cm;
        }

        .kon-d {
            position: fixed;
            top: 27.5cm;
            font-size: 20px;
            margin-left: 10.4cm;
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
            margin-top: -50px;
            text-align: center;
            font-size: 23px;
            font-weight: bold;
        }

        .two-point-a {
            text-align: right;
            margin-top: 25px;
            font-size: 20px;
        }

        .success-a {
            text-align: right;
            margin-top: 15px;
            font-size: 20px;
        }

        .success-b {
            text-align: right;
            margin-top: -25px;
            font-size: 20px;
            margin-right: 4cm;
        }

        .success-c {
            margin-left: 60px;
            margin-top: -0.3cm;
            font-size: 20px;
        }

        .success-d {

            margin-top: -0.5cm;
            font-size: 20px;
        }

        .success-f {
            margin-top: -0.5cm;
            font-size: 20px;
        }

        .success-g {
            text-align: right;
            margin-top: 15px;
            font-size: 20px;
        }

        .success-h {
            text-align: right;
            margin-top: -25px;
            font-size: 20px;
            margin-right: 3.5cm;
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
            top: 3.4cm;
            left: 5cm;
            font-size: 19px;
        }

        .employee-name-two {
            position: fixed;
            top: 10.74cm;
            left: 12.5cm;
            font-size: 19px;
        }

        .employee-name-two-ft {
            position: fixed;
            top: 11.51cm;
            left: 12.9cm;
            font-size: 19px;
        }

        .employee-position {
            position: fixed;
            top: 3.4cm;
            left: 13.8cm;
            font-size: 19px;
        }

        .employee-location {
            position: fixed;
            top: 5.97cm;
            left: 6.4cm;
            font-size: 18px;
        }

        .employee-location-two {
            position: fixed;
            top: 6.7cm;
            left: 2.2cm;
            font-size: 18px;
        }

        .employee-section {
            position: fixed;
            top: 4.13cm;
            left: 3.2cm;
            font-size: 19px;
        }

        .employee-division {
            position: fixed;
            top: 4.13cm;
            left: 8.8cm;
            font-size: 19px;
        }

        .employee-k {
            position: fixed;
            top: 4.13cm;
            left: 16.4cm;
            font-size: 19px;
        }

        .employee-phone_number {
            position: fixed;
            top: 4.80cm;
            left: 5.8cm;
            font-size: 19px;
        }



        .employee-task {
            position: fixed;
            top: 6.7cm;
            left: 4.2cm;
            font-size: 18px;
        }

        .t-e-jj {
            position: fixed;
            top: 6.7cm;
            left: 4.2cm;
            font-size: 18px;
        }

        .employee-task-two {
            position: fixed;
            top: 8.7cm;
            left: 4.2cm;
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
            top: 12.72cm;
            left: 3cm;
            font-size: 18px;
        }

        .employee-faculty_count {
            position: fixed;
            top: 6.65cm;
            left: 17.9cm;
            font-size: 19px;
        }

        .employee-faculty_count-st {
            position: fixed;
            top: 7.35cm;
            left: 17.9cm;
            font-size: 19px;
        }

        .employee-faculty_count-st-ft {
            position: fixed;
            top: 7.35cm;
            left: 18.1cm;
            font-size: 19px;
        }

        .employee-faculty_count-st-q {
            position: fixed;
            top: 8.08cm;
            left: 18.05cm;
            font-size: 19px;
        }

        .employee-faculty_count-tf {
            position: fixed;
            top: 8.15cm;
            font-size: 20px;
        }

        .employee-faculty_count-tf-s {
            position: fixed;
            top: 8.90cm;
            font-size: 20px;
        }

        .travelapproval-start_date {
            position: fixed;
            top: 7.38cm;
            left: 3cm;
            font-size: 19px;
        }

        .travelapproval-start_date-yo {
            position: fixed;
            top: 8.09cm;
            left: 3.1cm;
            font-size: 19px;
        }

        .travelapproval-start_date-yo-u {
            position: fixed;
            top: 8.87cm;
            left: 3.1cm;
            font-size: 19px;
        }

        .travelapproval-start_date-fftt {
            position: fixed;
            top: 7.38cm;
            left: 4cm;
            font-size: 18px;
        }

        .travelapproval-start_date-fftt-p {
            position: fixed;
            top: 6.69cm;
            left: 4cm;
            font-size: 18px;
        }

        .travelapproval-start_date-fftt-yo {
            position: fixed;
            top: 8.1cm;
            left: 2cm;
            font-size: 18px;
        }

        .travelapproval-start_date-fftt-yo-test {
            position: fixed;
            top: 7.4cm;
            left: 2cm;
            font-size: 18px;
        }

        .travelapproval-start_date-fftt-yo-y {
            position: fixed;
            top: 7.38cm;
            left: 12.74cm;
            font-size: 18px;
        }

        .travelapproval-start_date-fftt-yo-y-u {
            position: fixed;
            top: 6.69cm;
            left: 12.54cm;
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
            top: 17.15cm;
            left: 11.25cm;
            font-size: 19px;
        }

        .travelapproval-driver {
            position: fixed;
            top: 17.15cm;
            left: 14.95cm;
            font-size: 19px;
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
            top: 17.15cm;
            left: 5.20cm;
            font-size: 19px;

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
            top: 0.1cm;
            right: 71px;
            font-size: 20px;
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
            <p>การยางแห่งประเทศไทย</p>
        </div>



        {{-- <div>
            <p>เลขรับที่.................../................</p>
        </div> --}}

        <div class="Receipt-number">
            <p>แบบ 1</p>
        </div>

        {{-- <span class="Receipt-number">เลขรับที่........../...........</span> --}}


        <div class="logo_f">
            <img src="{{ public_path('images/logo2.png') }}" alt="Logo" width="90px;" height: auto;>
        </div>



        <div class="for">
            <p>เลขที่........../..........</p>
        </div>

        <div class="tfmm">
            <p>ใบขออนุญาตขอใช้รถส่วนกลาง</p>
        </div>








        <div class="t-a">
            <p>ข้าพเจ้า.................................................................................ตำแหน่ง.................................................................
            </p>
        </div>

        <span class="employee-name">{{ $data->prefix }}{{ $data->name }} {{ $data->lname }}</span>

        <span class="employee-position">{{ $data->position }}</span>

        <div class="t-b">
            <p>แผนก.........................................................กอง.........................................................ฝ่าย.....................................................
            </p>
        </div>

        <span class="employee-section">{{ $data->section }}</span>
        <span class="employee-division">{{ $data->division }}</span>
        <span class="employee-phone_number">{{ $data->phone_number }}</span>
        <span class="employee-k">-</span>

        <div class="t-c">
            <p>หมายเลขโทรศัพท์ติดต่อ..........................................................................
            </p>
        </div>
        <div class="t-d">
            <p>ไปปฏิบัติราชการที่...............................................................................................................................................
            </p>
        </div>




        {{-- <span class="employee-department">{{ $datawork->location }}</span> --}}
        {{-- <div class="employee-location">
            @php
                $uniqueDatawork = $datawork->unique('location');
                $count = count($uniqueDatawork);
                $index = 0;
            @endphp

            @foreach ($uniqueDatawork as $work)
                {{ $work->location }}
                @if ($index < $count - 1)
                    ,
     
                @endif
                @php $index++; @endphp
            @endforeach
        </div> --}}
        {{-- <div class="employee-location">
            @php
              $uniqueDatawork = $datawork->unique('location');
              $count = count($uniqueDatawork);
              $index = 0;
            @endphp
          
            @foreach ($uniqueDatawork as $work)
              {{ $work->location }}
              @if ($index < $count - 1)
                @if ($currentLineCharacters >= $charactersPerLine)
                  <br>
                  @php $currentLineCharacters = 0; @endphp
                @endif
                ,
              @endif
              @php $index++; $currentLineCharacters += strlen($work->location); @endphp
            @endforeach
          
            <p>จำนวนตัวอักษรทั้งหมด: {{ $totalCharacters }}</p>
          </div> --}}




        {{-- {{$message}}
        {{$totalCharacters}} --}}


        {{-- <div class="employee-task">
            @php
                $uniqueDatawork = $datawork->unique('task');
                $count = count($uniqueDatawork);
                $index = 0;
            @endphp

            @foreach ($uniqueDatawork as $work)
                {{ $work->task }}
                @if ($index < $count - 2)
                    ,
            
                @endif
                @php $index++; @endphp
            @endforeach
        </div> --}}

        {{-- location --}}
        @if ($shortMessage && !$remainingMessage && !$remainingMessage_task)
            @if (!$remainingMessage_task)
                <div class="employee-location">
                    <p>{{ $shortMessage }}</p>
                </div>
                <div class="t-e">
                    <p>เพื่อปฏิบัติงาน.....................................................................................................................จำนวนผู้ปฏิบัติงาน................คน
                    </p>
                </div>
                <div class="t-f">
                    <p>ในวันที่...........................................................ออกเดินทางเวลา...............น.&nbsp;และกลับถึงสำนักงานประมาณเวลา...............น.</p>
                </div>
                <div class="employee-task">
                    <p>{{ $shortMessage_task }}</p>
                </div>
                <span class="employee-faculty_count">{{ $data->faculty_count ?? 0 }}</span>
                @php
                    $startDate = \Carbon\Carbon::parse($data->start_date);
                    $endDate = \Carbon\Carbon::parse($data->end_date);

                    $startFormatted =
                        $startDate->locale('th')->isoFormat('D MMM ') . $startDate->year + 543;
                    $endFormatted = $endDate->locale('th')->isoFormat('D MMM ') . $endDate->year + 543;

                    $isSameDay = $startDate->isSameDay($endDate);
                @endphp

                @if (!$isSameDay)
                    <span
                        class="travelapproval-start_date">{{ $startFormatted }}&nbsp;-&nbsp;{{ $endFormatted }}&nbsp;</span>
                @endif
            @endif
        @elseif ($shortMessage && $remainingMessage && $remainingMessage_task)
            <div class="t-e-e">
                <p>.............................................................................................................................................................................................
                </p>
            </div>
            <div class="t-f-ft">
                <p>เพื่อปฏิบัติงาน......................................................................................................................................................................
                </p>
            </div>
            <span class="employee-faculty_count-tf">
                <p>.................................................................................................................................................จำนวนผู้ปฏิบัติงาน.........คน.
                </p>
            </span>

            <span class="employee-faculty_count-tf-s">
                <p>ในวันที่...........................................................ออกเดินทางเวลา...............น.&nbsp;และกลับถึงสำนักงานประมาณเวลา...............น.</p>
            </span>
            <div class="employee-location">
                <p>{{ $shortMessage }}</p>
            </div>
            <div class="employee-location-two">
                <p>{{ $remainingMessage }}</p>
            </div>
            <div class="travelapproval-start_date-fftt">
                <p>{{ $shortMessage_task }}</p>
            </div>
            <div class="travelapproval-start_date-fftt-yo-y">
                <p>{{ $shortMessage_task_2 }}</p>
            </div>
            @if ($remainingMessage_task_2)
                <div class="travelapproval-start_date-fftt-yo">
                    <p>{{ $remainingMessage_task_2 }}</p>
                </div>
            @endif
            <span class="employee-faculty_count-st-q">{{ $data->faculty_count ?? 0 }}</span>
            {{-- <span
                class="travelapproval-start_date-yo-u">{{ \Carbon\Carbon::parse($data->start_date)->locale('th')->isoFormat('D MMMM ') }}{{ \Carbon\Carbon::parse($data->start_date)->addYears(543)->format('Y') }}&nbsp;-&nbsp;{{ \Carbon\Carbon::parse($data->end_date)->locale('th')->isoFormat('D MMMM ') }}{{ \Carbon\Carbon::parse($data->end_date)->addYears(543)->format('Y') }}&nbsp;</span> --}}
        
        
                @php
                $startDate = \Carbon\Carbon::parse($data->start_date);
                $endDate = \Carbon\Carbon::parse($data->end_date);
            
                $startFormatted = $startDate->locale('th')->isoFormat('D MMM ') . $startDate->year + 543;
                $endFormatted = $endDate->locale('th')->isoFormat('D MMM ') . $endDate->year + 543;
            
                $isSameDay = $startDate->isSameDay($endDate);
            @endphp
            
            @if(!$isSameDay)
                <span class="travelapproval-start_date-yo-u">{{ $startFormatted }}&nbsp;-&nbsp;{{ $endFormatted }}&nbsp;</span>
            @endif
            
        
        
        
        
                @elseif ($shortMessage && $remainingMessage && !$remainingMessage_task)
            {{-- ถ้ามีแถวแรกด้วย และ มีแถวสองด้วย  และแถวที่สองของ task ไม่มี --}}
            @if (!$remainingMessage_task)
                {{-- และถ้าไม่มีtaskแถวที่สอง --}}
                <div class="t-e-e">
                    <p>.............................................................................................................................................................................................
                    </p>
                </div>
                <div class="t-f-ft">
                    <p>เพื่อปฏิบัติงาน.....................................................................................................................จำนวนผู้ปฏิบัติงาน................คน
                    </p>
                </div>
                <span class="employee-faculty_count-tf">
                    <p>ในวันที่...........................................................ออกเดินทางเวลา...............น.&nbsp;และกลับถึงสำนักงานประมาณเวลา...............น.</p>
                </span>
                <div class="employee-location">
                    <p>{{ $shortMessage }}</p>
                </div>
                <div class="employee-location-two">
                    <p>{{ $remainingMessage }}</p>
                </div>
                <div class="travelapproval-start_date-fftt">
                    <p>{{ $shortMessage_task }}</p>
                </div>
                <span class="employee-faculty_count-st">{{ $data->faculty_count ?? 0 }}</span>
                {{-- <span
                    class="travelapproval-start_date-yo">{{ \Carbon\Carbon::parse($data->start_date)->locale('th')->isoFormat('D MMMM ') }}{{ \Carbon\Carbon::parse($data->start_date)->addYears(543)->format('Y') }}&nbsp;-&nbsp;{{ \Carbon\Carbon::parse($data->end_date)->locale('th')->isoFormat('D MMMM ') }}{{ \Carbon\Carbon::parse($data->end_date)->addYears(543)->format('Y') }}&nbsp;</span> --}}
          
                    @php
                    $startDate = \Carbon\Carbon::parse($data->start_date);
                    $endDate = \Carbon\Carbon::parse($data->end_date);
                
                    $startFormatted = $startDate->locale('th')->isoFormat('D MMM ') . $startDate->year + 543;
                    $endFormatted = $endDate->locale('th')->isoFormat('D MMM ') . $endDate->year + 543;
                
                    $isSameDay = $startDate->isSameDay($endDate);
                @endphp
                
                @if(!$isSameDay)
                    <span class="travelapproval-start_date-yo">{{ $startFormatted }}&nbsp;-&nbsp;{{ $endFormatted }}&nbsp;</span>
                @endif
                



                    @endif
        @elseif ($shortMessage && !$remainingMessage && $remainingMessage_task)
            <div class="t-e">
                <p>เพื่อปฏิบัติงาน......................................................................................................................................................................
                </p>
            </div>
            <div class="t-f">
                <p>.................................................................................................................................................จำนวนผู้ปฏิบัติงาน.........คน.
                </p>
            </div>
            <span class="employee-faculty_count-tf">
                <p>ในวันที่...........................................................ออกเดินทางเวลา...............น.&nbsp;และกลับถึงสำนักงานประมาณเวลา...............น.</p>
            </span>
            <div class="employee-location">
                <p>{{ $shortMessage }}</p>
            </div>
            <div class="travelapproval-start_date-fftt-p">
                <p>{{ $shortMessage_task }}</p>
            </div>
            <div class="travelapproval-start_date-fftt-yo-y-u">
                <p>{{ $shortMessage_task_2 }}</p>
            </div>
            @if ($remainingMessage_task_2)
                <div class="travelapproval-start_date-fftt-yo-test">
                    <p>{{ $remainingMessage_task_2 }}</p>
                </div>
            @endif
            {{-- <span
                class="travelapproval-start_date-yo">{{ \Carbon\Carbon::parse($data->start_date)->locale('th')->isoFormat('D MMMM ') }}{{ \Carbon\Carbon::parse($data->start_date)->addYears(543)->format('Y') }}&nbsp;-&nbsp;{{ \Carbon\Carbon::parse($data->end_date)->locale('th')->isoFormat('D MMMM ') }}{{ \Carbon\Carbon::parse($data->end_date)->addYears(543)->format('Y') }}&nbsp;</span> --}}

                @php
                $startDate = \Carbon\Carbon::parse($data->start_date);
                $endDate = \Carbon\Carbon::parse($data->end_date);
            
                $startFormatted = $startDate->locale('th')->isoFormat('D MMM ') . $startDate->year + 543;
                $endFormatted = $endDate->locale('th')->isoFormat('D MMM ') . $endDate->year + 543;
                $isSameDay = $startDate->isSameDay($endDate);
            @endphp
            
            @if(!$isSameDay)
                <span class="travelapproval-start_date-yo">{{ $startFormatted }}&nbsp;-&nbsp;{{ $endFormatted }}&nbsp;</span>
            @endif
            
                
            <span class="employee-faculty_count-st-ft">{{ $data->faculty_count ?? 0 }}</span>
        @endif



        {{-- {{$remainingMessage_task}} --}}
        {{-- 
        @if ($remainingMessage)
            <div class="employee-location-two">
                <p>แถวที่สอง: {{ $remainingMessage }}</p>
            </div>
        @endif --}}



        {{-- task --}}
        {{-- <div class="employee-task">
            <p>แถวแรก: {{ $shortMessage_task }}</p>
        </div>
        @if ($remainingMessage_task)
            <div class="employee-task-two">
                <p>แถวที่สอง: {{ $remainingMessage_task }}</p>
            </div>
        @endif --}}


        {{-- <div class="t-e">
            <p>เพื่อปฏิบัติงาน.....................................................................................................................จำนวนผู้ปฏิบัติงาน................คน
            </p>
        </div> --}}

        {{-- <span class="employee-faculty_count">{{ $data->faculty_count ?? 0 }}</span> --}}


        {{-- <div class="t-f">
            <p>ในวันที่.....................................................................ออกเดินทางเวลา..........น.&nbsp;และกลับถึงสำนักงานประมาณเวลา..........น.
            </p>
        </div> --}}





        {{-- <span
            class="travelapproval-start_date">{{ \Carbon\Carbon::parse($data->start_date)->locale('th')->isoFormat('D MMMM ') }}{{ \Carbon\Carbon::parse($data->start_date)->addYears(543)->format('Y') }}&nbsp;-&nbsp;{{ \Carbon\Carbon::parse($data->end_date)->locale('th')->isoFormat('D MMMM ') }}{{ \Carbon\Carbon::parse($data->end_date)->addYears(543)->format('Y') }}&nbsp;</span> --}}

        <span class="travelapproval-budget_reference">{{ $data->car_office }}</span>

        <span class="travelapproval-vehicle_number">{{ $data->vehicle_number }}</span>

        <span class="travelapproval-driver">{{ $data->driver }}</span>



        <div class="left-line-a">
            <p>(ลงชื่อ)...................................................................ผู้ขออนุญาต</p>
        </div>

        <span class="employee-name-two">{{ $data->prefix }}{{ $data->name }} {{ $data->lname }}</span>
        {{-- <span class="employee-name-two-ft">{{ $data->created_at }}</span> --}}
        <span
            class="employee-name-two-ft">{{ \Carbon\Carbon::parse($data->created_at)->locale('th')->isoFormat('D MMMM ') .(now()->year + 543) }}</span>


        <div class="left-bracket">
            <p>(.............................................................)</p>
        </div>

        <div class="left-line-e">
            <p>...........................................................</p>
        </div>

        <div class="left-line-ff">
            <p>(ลงชื่อ)...................................................................ผู้บังคับบัญชา</p>
        </div>

        <div class="left-line-gg">
            <p>(.............................................................)</p>
        </div>

        <div class="left-line-hh">
            <p>ตำแหน่ง.........................................................</p>
        </div>


        <div class="left-line-ii">
            <p>...........................................................</p>
        </div>



        <div class="t-p">
            <p>สมควรจ่ายรถยนต์......................................................เลขทะเบียน................................ผู้ขับ.................................................
            </p>
        </div>

        <table style="margin-top: 1cm;">
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


        {{-- <div class="side-frame left-frame">

        </div> --}}

        <div class="ploy-a">
            <p>(ลงชื่อ)...................................................................ผู้จ่ายรถ</p>
        </div>

        <div class="ploy-b">
            <p>(.............................................................)</p>
        </div>

        <div class="ploy-c">
            <p>ตำแหน่ง...............................................................</p>
        </div>


        <div class="ploy-d">
            <p>...........................................................</p>
        </div>


        <div class="kung-a">
            <p>(ลงชื่อ)................................หัวหน้าส่วนงาน/หัวหน้าหน่วยงาน</p>
        </div>

        <div class="kung-b">
            <p>(...................................................)/ผู้ที่ได้รับมอบหมาย</p>
        </div>

        <div class="kung-c">
            <p>ตำแหน่ง...............................................................</p>
        </div>


        <div class="kung-d">
            <p>...........................................................</p>
        </div>

        <div class="kon-a">
            <p>(ลงชื่อ)......................................................ผู้มีอำนาจอนุมัติ</p>
        </div>

        <div class="kon-b">
            <p>(.............................................................)</p>
        </div>

        <div class="kon-c">
            <p>ตำแหน่ง...............................................................</p>
        </div>


        <div class="kon-d">
            <p>...........................................................</p>
        </div>






    </div>


    <!-- หน้าที่สอง -->
    <div style="page-break-before: always;"></div> <!-- ใช้สร้างหน้าใหม่ -->
    <div class="black-border-two">
        <div class="two-header">
            <p>พนักงานควบคุมยานพาหนะบันทึกการปฏิบัติงาน</p>
        </div>

        <table>
            <!-- แถวสำหรับหัวข้อย่อย -->
            <tr>
                <td style="height: 50px; width: 50px; font-weight: bold; text-align: center; ">
                    ลำดับ
                </td>
                <td style="width: 101px; font-weight: bold; text-align: center; ">ออกจาก</td>
                <td style="width: 90px; font-weight: bold; text-align: center; ">เลขวัด<br>ระยะทาง
                </td>
                <td style="width: 57px; font-weight: bold; text-align: center;">เวลา</td>
                <td style="width: 101px; font-weight: bold; text-align: center;">ถึง</td>
                <td style="width: 90px; font-weight: bold; text-align: center;">เลขวัด<br>ระยะทาง
                </td>
                <td style="width: 67px; font-weight: bold; text-align: center;">เวลา</td>
                <td style="width: 92px; font-weight: bold; text-align: center;">ระยะทางที่ใช้
                </td>
            </tr>
            @for ($i = 0; $i < 19; $i++)
                <tr>
                    <td style="height:30px; width: 50px; font-weight: bold; text-align: center;">

                    </td>
                    <td style="width: 101px; font-weight: bold; text-align: center;"></td>
                    <td style="width: 90px; font-weight: bold; text-align: center; ">
                    </td>
                    <td style="width: 57px; font-weight: bold; text-align: center; "></td>
                    <td style="width: 101px; font-weight: bold; text-align: center; "></td>
                    <td style="width: 90px; font-weight: bold; text-align: center; ">
                    </td>
                    <td style="width: 67px; font-weight: bold; text-align: center; "></td>
                    <td style="width: 92px; font-weight: bold; text-align: center;">

                </tr>
            @endfor
        </table>


        <div class="two-point-a">
            <p>รวมระยะทางที่ใช้ปฏิบัติงาน..........................กม.</p>
        </div>

        <div class="success-a">
            <p>.......................................พนักงานควบคุมยานพาหนะ</p>
        </div>

        <div class="success-b">
            <p>............/............/............</p>
        </div>

        <div class="success-c">
            <p>รับรองว่าเป็นความจริงทุกประการ&nbsp;และมีความเห็นว่า..........................................................................................
            </p>
        </div>
        <div class="success-d">
            <p>..............................................................................................................................................................................................
            </p>
        </div>

        <div class="success-f">
            <p>..............................................................................................................................................................................................
            </p>
        </div>
        <div class="success-g">
            <p>.......................................พนักงานผู้ใช้ยานพาหนะ</p>
        </div>

        <div class="success-h">
            <p>............/............/............</p>
        </div>


    </div>

</body>

</html>
