<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>
    <div class="container">
        <label for="daterange">เลือกช่วงวันที่เดินทาง:</label>
        <input type="text" id="daterange" name="daterange" placeholder="เลือกวันที่เดินทาง" />
    </div>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                autoApply: true, // Automatically apply the selected date range
                autoUpdateInput: false, // Do not update the input field automatically
                minDate: moment(), // ไม่สามารถเลือกวันที่เป็นอดีตได้
                isInvalidDate: function(date) {
                    // ไม่สามารถเลือกวันเสาร์และวันอาทิตย์ได้
                    return (date.day() === 0 || date.day() === 6);
                },
                locale: {
                    format: 'YYYY-MM-DD',
                    daysOfWeek: ["อา.", "จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส."],
                    monthNames: [
                        "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                        "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                    ]
                }
            });

            $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD') + ' - ' + picker.endDate.format(
                    'YYYY-MM-DD'));
            });

            $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });
        });
    </script>


    <table>
        <tr>
            <td
                style="height: 25px; width: 130px; font-weight: bold; text-align: center; border-color: #000000; border: 1px solid;">
                วัน เดือน ปี </td>
            <td style="width: 200px; font-weight: bold; text-align: center; border-color: #000000; border: 1px solid;">
                ท้องที่หรือสถานที่ปฏิบัติงาน</td>
            <td style="width: 320px; font-weight: bold; text-align: center; border-color: #000000; border: 1px solid;">
                งานที่ปฏิบัติ</td>
        </tr>
        @foreach ($workassignment as $show)
            <tr>
                <td style="height: 25px; width: 130px; text-align: center;border: 1px solid;">
                    <?php
                    $thaiDate = \Carbon\Carbon::parse($show->date)
                        ->locale('th')
                        ->isoFormat('LL');
                    $thaiYear = (int) \Carbon\Carbon::parse($show->date)
                        ->addYears(543)
                        ->format('Y');
                    $thaiDateWithYear = str_replace((string) \Carbon\Carbon::parse($show->date)->year, (string) $thaiYear, $thaiDate);
                    ?>
                    {{ $thaiDateWithYear }}
                </td>
                <td style="width: 200px; border: 1px solid;">{{ $show->location }}</td>
                <td style="width: 320px;border: 1px solid;">{{ $show->task }}</td>
            </tr>
        @endforeach
        @php
            $row_count = count($workassignment);
            $remaining_rows = 12 - $row_count;
        @endphp

        @if ($travelapproval->transport !== 'รถยนต์' && $travelapproval->transport !== 'รถจักรยานยนต์')
            @for ($i = 0; $i < $remaining_rows - 1; $i++)
                <tr>
                    <td style="height: 25px; width: 130px; text-align: center;border: 1px solid;"></td>
                    <td style="width: 200px; border: 1px solid;"></td>
                    <td style="width: 320px;border: 1px solid;"></td>
                </tr>
            @endfor
            <tr>
                <td style="height: 25px; width: 130px; text-align: center;border: 1px solid;"></td>
                <td style="width: 200px; border: 1px solid;">หมายเหตุ: {{ $travelapproval->transport }}
                </td>
                <td style="width: 320px;border: 1px solid;"> ทะเบียน
                    {{ $travelapproval->vehicle_number }}
                </td>
            </tr>
        @else
            @for ($i = 0; $i < $remaining_rows; $i++)
                <tr>
                    <td style="height: 25px; width: 130px; text-align: center;border: 1px solid;"></td>
                    <td style="width: 200px; border: 1px solid;"></td>
                    <td style="width: 320px;border: 1px solid;"></td>
                </tr>
            @endfor
        @endif
    </table>









    <table border="1">
        <thead>
            <tr>
                <th
                    style="width: 100px; height: 40px; text-align: center; border: 1px solid #000000; border: 1px solid;">
                    ลำดับที่</th>
                <th style="width: 210px; text-align: center; border: 1px solid #000000; border: 1px solid;">
                    ชื่อ-สกุล</th>
                <th style="width: 190px; text-align: center; border: 1px solid #000000; border: 1px solid;">
                    ตำแหน่ง/ระดับ</th>
                <th style="width: 150px; text-align: center; border: 1px solid #000000; border: 1px solid;">
                    หมายเหตุ</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($travelapprovaldetail as $show)
                <tr>
                    <td style="height: 37px; text-align: center; border: 1px solid;">{{ $loop->index + 1 }}</td>
                    {{-- <td style="text-align: left;">{{$show->faculty_member_name}}</td> --}}
                    <td style="text-align: left; padding-left: 10px; border: 1px solid;">
                        {{ $show->faculty_member_name }}</td>
                    <td style="text-align: center; border: 1px solid;">
                        {{ $show->faculty_member_position }}&nbsp;/&nbsp;{{ $show->faculty_member_level }}</td>
                    <td style="text-align: center; border: 1px solid;"></td>
                </tr>
            @endforeach
            @for ($i = count($travelapprovaldetail); $i < 21; $i++)
                <tr>
                    <td style="height: px; text-align: center; border: 1px solid;"></td>
                    <td style="height: 37px; border: 1px solid;"></td>
                    <td style="height: 37px; border: 1px solid;"></td>
                    <td style="height: 37px; border: 1px solid;"></td>
                </tr>
            @endfor
        </tbody>
    </table>













</body>

</html>
