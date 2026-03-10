<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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

        html,
        body {
            font-style: normal;
            font-weight: bold;
            font-family: "THSarabunNew";
            margin: 0;
            padding: 0;
        }

        @page {
            size: landscape;
        }

        .header {
            text-align: center;
            padding-top: 20px;
        }

        .header-item {
            margin-bottom: 10px;
        }

        .header-item h3 {
            margin: 0;
        }

        #title {
            margin-bottom: 20px;
        }

        #department {
            margin-top: -10px;
        }

        #location {}

        .table-container {
            padding: 0 20px;
            /* เพิ่ม padding ซ้ายและขวา */
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 6px;
            /* text-align: center; */
            font-size: 16px;
        }

        th {
            background-color: #ffffff;
        }

        .merged-header {
            text-align: center;
        }

        .dotted-line {
            border-bottom: 1px dotted #000;
            min-width: 100px;
            display: inline-block;
            text-align: center;
            font-size: 18px;
        }

        .underline {
            position: relative;
            display: inline-block;
            min-width: 100px;
            text-align: center;
        }

        .underline::after {
            /* content: "..................................................."; */
            position: absolute;
            bottom: -2px;
            left: 0;
            right: 0;
            z-index: -1;
            color: #000;
        }

        .text-adjust {
            position: relative;
            top: 3px;
        }
    </style>
</head>

<body>
    {{-- <div class="header">
        <div id="title" class="header-item">
            <h3>ตารางประมาณการค่าใช้จ่ายในการเดินทาง</h3>
        </div>
        <div id="department" class="header-item">
            <h3>ส่วนงาน/หน่วยงาน</h3> 
        </div>
    </div> --}}
    <div style="text-align: center; margin-top: 30px; margin-bottom: 20px;">
        <span style="font-size: 18px; font-weight: bold;">ตารางประมาณการค่าใช้จ่ายในการเดินทาง</span>
    </div>


    <div class="form-field" style="text-align: center; margin-top: -15px;">
        <span style="font-size: 18px;">ส่วนงาน/หน่วยงาน</span>
        <span class="dotted-line underline">
            <span class="text-adjust">
                กยท. จังหวัดประจวบคีรีขันธ์
            </span>
        </span>
    </div>



    <div class="form-field" style="text-align: center;">
        <span style="font-size: 18px;">ท้องที่หรือสถานที่ปฏิบัติงาน</span>
        <span class="dotted-line underline">
            <span class="text-adjust">
                @php
                    $locations = $workAssignment
                        ->map(function ($assignment) {
                            return trim(strstr($assignment->location, 'อ.'));
                        })
                        ->implode(', ');
                @endphp
                {{ $locations }}
            </span>
        </span>
        <span>วันที่</span>
        <span class="dotted-line">
            <span class="text-adjust">
                @php

                    $dates = $workAssignment_date
                        ->map(function ($assignment) {
                            $date = \Carbon\Carbon::parse($assignment->date);
                            return $date->format('d') .
                                ' ' .
                                $date->locale('th')->isoFormat('MMM') .
                                ' ' .
                                $date->year +543 ;
                        })
                        ->unique()
                        ->values();

                    if ($dates->count() > 1) {
                        echo $dates->first() . ' - ' . $dates->last();
                    } else {
                        echo $dates->first();
                    }
                @endphp
            </span>
        </span>
    </div>


                                {{-- {{ \Carbon\Carbon::parse($order->created_at)->locale('th')->isoFormat('D MMM') }} 
                                {{ \Carbon\Carbon::parse($order->created_at)->year + 543 }}  --}}



    @php
        $list_sum = [];
        $list_one_thousand = [];
        $list_price = [];
    @endphp




    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th rowspan="2">ลำดับ</th>
                    <th rowspan="2">ชื่อ-สกุล</th>
                    <th rowspan="2">ตำแหน่ง/ระดับ</th>
                    <th colspan="3" class="merged-header">เบี้ยเลี้ยง</th>
                    <th colspan="3" class="merged-header">ค่าที่พัก</th>
                    <th class="merged-header">ค่าพาหนะ</th>
                    <th class="merged-header">ค่าน้ำมัน</th>
                    <th class="merged-header">หัก<br>ค่าอาหาร</th>
                    <th class="merged-header">รวมเป็น<br>เงิน</th>
                    <th class="merged-header">หมาย<br>เหตุ</th>
                </tr>
                <tr>
                    <th>อัตรา</th>
                    <th>จำนวน<br>วัน</th>
                    <th>จำนวนเงิน</th>
                    <th>อัตรา</th>
                    <th>จำนวน<br>วัน</th>
                    <th>จำนวนเงิน</th>
                    <th>(บาท)</th>
                    <th>เชื้อเพลิง<br>(บาท)</th>
                    <th>(บาท)</th>
                    <th>(บาท)</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;">1</td> {{-- คอลัม1 --}}
                    <td id="col" style="padding-left: 7px;">
                        {{ $travelapproval->prefix }}{{ $travelapproval->name }}&nbsp;{{ $travelapproval->lname }}</td>
                    {{-- คอลัม2 --}}
                    <td style="text-align: center;">{{ $travelapproval->position }}/{{ $travelapproval->level }}</td>
                    {{-- คอลัม3 --}}
                    <td style="text-align: center;">300</td> {{-- คอลัม4 --}}
                    <td style="text-align: center;"> {{-- คอลัม5 --}}
                        @if (empty($vacation_start_date) || empty($vacation_end_date))
                            0.5
                            @php
                                $days_with_half = 0.5;
                            @endphp
                        @else
                            @php
                                $start_date = \Carbon\Carbon::parse($vacation_start_date);
                                $end_date = \Carbon\Carbon::parse($vacation_end_date);
                                $days = $end_date->diffInDays($start_date) + 1; // บวก 1 เพื่อรวมวันที่เริ่มต้น
                                $days_with_half = $days + 0.5;
                            @endphp
                            {{ $days_with_half }}
                        @endif
                    </td>

                    <td style="text-align: center;">{{ 300 * $days_with_half }}</td> {{-- คอลัมน์ 6: คูณค่าจากคอลัมน์ 4 และ 5 --}}
                    <td style="text-align: center;">{{ number_format(1000, 0) }}</td> {{-- คอลัม7 --}}
                    <td style="text-align: center;"> {{-- คอลัม8 --}}
                        {{-- {{$travelapproval->vacation_start_date}}ถึง{{$travelapproval->vacation_end_date}} --}}
                        @if (empty($travelapproval->start_date) || empty($travelapproval->end_date))
                            -
                            @php
                                $days = 1;
                            @endphp
                        @else
                            @php
                                $start_date = \Carbon\Carbon::parse($travelapproval->vacation_start_date);
                                $end_date = \Carbon\Carbon::parse($travelapproval->vacation_end_date)->addDays(1);
                                $days = $end_date->diffInDays($start_date);

                            @endphp
                            {{ $days }}
                        @endif
                    </td style="text-align: center;">
                    {{-- <td style="text-align: center;">{{ number_format(1000 * $days, 0) }}</td> คอลัมน์ 9 --}}
                    <td style="text-align: center;">
                        @if ($vacation_start_date == null)
                            -
                        @else
                            {{ number_format(1000 * $days, 0) }}
                        @endif

                    </td> {{-- คอลัมน์ 9 --}}

                    <td style="text-align: center;"> {{-- คอลัมน์ 10 --}}
                        @if (is_null($travelapproval->vehicle_expenses))
                            -
                        @else
                            {{ number_format($travelapproval->vehicle_expenses, 0) }}
                        @endif
                    </td>
                    <td style="text-align: center;"> {{-- คอลัมน์ 11 --}}
                        @if (is_null($travelapproval->fuel_expenses))
                            -
                        @else
                            {{ number_format($travelapproval->fuel_expenses, 0) }}
                        @endif
                    </td>
                    <td style="text-align: center;"> {{-- คอลัมน์ 12 --}}
                        @if (is_null($travelapproval->food_expenses))
                            -
                        @else
                            {{ number_format($travelapproval->food_expenses, 0) }}
                        @endif
                    </td>

                    <td style="text-align: center;">
                        @php
                            $column_6_value =
                                empty($vacation_start_date) || empty($vacation_end_date)
                                    ? 0.5 * 300
                                    : 300 * $days_with_half;
                            $column_9_value =
                                empty($vacation_start_date) || empty($vacation_end_date) ? 0 : 1000 * $days;

                            $column_10_value = is_null($travelapproval->vehicle_expenses)
                                ? 0
                                : $travelapproval->vehicle_expenses;
                            $column_11_value = is_null($travelapproval->fuel_expenses)
                                ? 0
                                : $travelapproval->fuel_expenses;
                            $column_12_value = is_null($travelapproval->food_expenses)
                                ? 0
                                : $travelapproval->food_expenses;

                            $column_13_value_firts =
                                $column_6_value +
                                $column_9_value +
                                $column_10_value +
                                $column_11_value -
                                $column_12_value;
                        @endphp
                        {{ number_format($column_13_value_firts, 0) }}
                    </td>
                    <td style="text-align: center;"></td> {{-- คอลัมน์ 14 --}}
                </tr>

                @foreach ($travelapprovaldetail as $index => $detail)
                    <tr>
                        <td style="text-align: center;">{{ $index + 2 }}</td>
                        <td style="padding-left: 7px;">{{ $detail->faculty_member_name }}</td>
                        <td style="text-align: center;">
                            {{ $detail->faculty_member_position }}/{{ $detail->faculty_member_level }}</td>
                        <td style="text-align: center;">
                            @if ($detail->faculty_member_position == 'พคย.')
                                240
                            @else
                                300
                            @endif


                        </td>
                        <td style="text-align: center;">
                            @if (empty($vacation_start_date) || empty($vacation_end_date))
                                0.5
                            @else
                                @php
                                    $start_date = \Carbon\Carbon::parse($vacation_start_date);
                                    $end_date = \Carbon\Carbon::parse($vacation_end_date);
                                    $days = $end_date->diffInDays($start_date) + 1; // บวก 1 เพื่อรวมวันที่เริ่มต้น
                                    $days_with_half = $days + 0.5;
                                @endphp
                                {{ $days_with_half }}
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @php
                                $days_with_half_for_detail = isset($days_with_half) ? $days_with_half : 0.5;
                                $price =
                                    $detail->faculty_member_position == 'พคย.'
                                        ? 240 * $days_with_half_for_detail
                                        : 300 * $days_with_half_for_detail;
                                $list_price[] = $price;
                            @endphp
                            {{ $price }}
                        </td>

                        <td style="text-align: center;">{{ number_format(1000, 0) }}</td>
                        <td style="text-align: center;">
                            @if (empty($travelapproval->vacation_start_date) || empty($travelapproval->vacation_end_date))
                                -
                                @php
                                    $days = 1;
                                @endphp
                            @else
                                @php
                                    $start_date = \Carbon\Carbon::parse($travelapproval->vacation_start_date);
                                    $end_date = \Carbon\Carbon::parse($travelapproval->vacation_end_date)->addDays(1);
                                    $days = $end_date->diffInDays($start_date);
                                @endphp
                                {{ $days }}
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($vacation_start_date == null)
                                -
                            @else
                                {{ number_format(1000 * $days, 0) }}
                            @endif
                        </td> {{-- คอลัมน์ 9 --}}
                        <td style="text-align: center;">-</td>
                        <td style="text-align: center;">-</td>
                        <td style="text-align: center;">-</td>
                        <td style="text-align: center;">
                            @php
                                $column_6_value =
                                    $detail->faculty_member_position == 'พคย.'
                                        ? (isset($days_with_half)
                                            ? 240 * $days_with_half
                                            : 240 * 0.5)
                                        : (isset($days_with_half)
                                            ? 300 * $days_with_half
                                            : 300 * 0.5);

                                $column_9_value = empty($vacation_start_date) || empty($vacation_end_date) ? 0 : 1000 * $days;
                                $column_13_value = $column_6_value + $column_9_value;
                                // เก็บค่าใน $list_sum
                                $list_sum[] = $column_13_value;
                                $list_one_thousand[] = 1000 * $days;
                            @endphp
                            {{ number_format($column_13_value, 0) }}
                        </td>

                        <td style="text-align: center;"></td>
                    </tr>
                @endforeach





                @for ($i = count($travelapprovaldetail) + 2; $i <= 10; $i++)
                    <tr>
                        <td style="text-align: center;">&nbsp;</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                @endfor

                <tr>
                    <td colspan="3" style="text-align: center; font-weight: bold;">รวม</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">
                        @php
                            $total_sum_price = array_sum($list_price) + 300 * $days_with_half;
                        @endphp
                        {{ number_format($total_sum_price, 0) }}
                    </td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">-</td>
                    <td style="text-align: center;">
                        @if($vacation_start_date == null)
                        -
                        @else
                        @php
                        $total_sum_list_one_thousand = array_sum($list_one_thousand) + 1000 * $days;
                    @endphp
                    {{ number_format($total_sum_list_one_thousand, 0) }}
                        @endif
                     
                    </td>
                    <td style="text-align: center;">
                        @if (is_null($travelapproval->vehicle_expenses))
                            -
                        @else
                            {{ number_format($travelapproval->vehicle_expenses, 0) }}
                        @endif
                    </td>
                    <td style="text-align: center;">
                        @if (is_null($travelapproval->fuel_expenses))
                            -
                        @else
                            {{ number_format($travelapproval->fuel_expenses, 0) }}
                        @endif
                    </td>
                    <td style="text-align: center;">
                        @if (is_null($travelapproval->food_expenses))
                            -
                        @else
                            {{ number_format($travelapproval->food_expenses, 0) }}
                        @endif
                    </td>
                    <td style="text-align: center;">
                        @php
                            $total_sum = array_sum($list_sum) + $column_13_value_firts;
                        @endphp
                        {{ number_format($total_sum, 0) }}
                    </td>

                    <td style="text-align: center;"></td>
                </tr>
            </tbody>
        </table>
    </div>






</body>

</html>
