{{-- @extends('layouts.user')
@section('title', 'หน้าแรก')
@section('content')

<style>
    table {
        border-collapse: collapse;
        width: 100%; 
    }
    th, td {
        border: 1px solid black;
        padding: 8px; 
        text-align: center; 
    }
</style>

<table>
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>ค่าน้ำมัน</th>
            <th>ค่าไฟ</th>
            <th>ค่าทางด่วน</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>500</td>
            <td>800</td>
            <td>200</td>
        </tr>
        <tr>
            <td>2</td>
            <td>450</td>
            <td>750</td>
            <td>180</td>
        </tr>
        <tr>
            <td>3</td>
            <td>600</td>
            <td>820</td>
            <td>250</td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td id="totalTollCost"></td>
        </tr>
    </tbody>
</table>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let tollCostCells = document.querySelectorAll('tbody tr td:nth-child(4)');
        
        let totalTollCost = 0;
        tollCostCells.forEach(function(cell) {
            let cost = parseInt(cell.textContent);
            totalTollCost += isNaN(cost) ? 0 : cost;
        });

        document.getElementById('totalTollCost').textContent = totalTollCost;
    });
</script>

@endsection --}}

@extends('layouts.user')
@section('title', 'ขอใบอนุมัติเดินทาง')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 30px;
            margin-top: 30px;
        }

        h2,
        h4 {
            color: #007bff;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            color: #495057;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary.custom-button {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary.custom-button:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px);
        }

        .breadcrumb {
            background-color: transparent;
            padding: 10px 0;
        }

        .breadcrumb-item a {
            color: #6c757d;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .breadcrumb-item a:hover {
            color: #007bff;
        }

        #now a {
            color: #007bff;
            font-weight: 600;
        }

        .row {
            margin-bottom: 20px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
        }
    </style>

    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('homepage') }}">หน้าแรก</a></li>
                <li class="breadcrumb-item active" id="now"><a href="">ขออนุมัติเดินทาง</a></li>
            </ol>
        </nav>

        <h2>ขอใบอนุมัติเดินทาง</h2>

        <form action="{{ route('savedata') }}" method="POST">
            @csrf

            <!-- ส่วนของฟอร์ม -->
            <div class="row">
                <div class="col-md-4">
                    <label for="prefix" class="form-label">เรียน</label>
                    <select class="form-select" id="at" name="at" required>
                        <option value="" disabled selected>กรุณาเลือกรายการ</option>
                        <option value="ผอ.กยท.จ.ประจวบคีรีขันธ์">ผอ.กยท.จ.ประจวบคีรีขันธ์</option>
                        <option value="ผอ.กยท.ข.ภาคใต้ตอนบน">ผอ.กยท.ข.ภาคใต้ตอนบน</option>
                    </select>
                </div>
            </div>

            <!-- ข้อมูลส่วนตัว -->
            <div class="row">
                <div class="col-md-4">
                    <label for="prefix" class="form-label">คำนำหน้า</label>
                    <input type="text" class="form-control" id="prefix" name="prefix"
                        value="{{ Auth::user()->prefix }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="name" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ Auth::user()->name }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="lname" class="form-label">นามสกุล</label>
                    <input type="text" class="form-control" id="lname" name="lname"
                        value="{{ Auth::user()->lname }}" readonly>
                </div>
            </div>

            <!-- ตำแหน่งและสังกัด -->
            <div class="row">
                <div class="col-md-4">
                    <label for="position" class="form-label">ตำแหน่ง</label>
                    <input type="text" class="form-control" id="position" name="position"
                        value="{{ Auth::user()->position }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="level" class="form-label">ระดับ</label>
                    <input type="text" class="form-control" id="level" name="level"
                        value="{{ Auth::user()->level }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="department" class="form-label">สังกัด</label>
                    <input type="text" class="form-control" id="department" name="department"
                        value="{{ Auth::user()->department }}" readonly>
                </div>
            </div>

            <!-- ข้อมูลการติดต่อ -->
            <div class="row">
                <div class="col-md-4">
                    <label for="section" class="form-label">แผนก</label>
                    <input type="text" class="form-control" id="section" name="section"
                        value="{{ Auth::user()->section }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="division" class="form-label">กอง</label>
                    <input type="text" class="form-control" id="division" name="division"
                        value="{{ Auth::user()->division }}" readonly>
                </div>
                <div class="col-md-4">
                    <label for="phone_number" class="form-label">เบอร์ติดต่อ</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                        value="{{ Auth::user()->phone_number }}" readonly>
                </div>
            </div>


            <div class="row">
                <div class="col-md-4">
                    <label for="budget_reference" class="form-label">งบประมาณที่ใช้จ่ายจากมาตรา</label>
                    <select class="form-select" id="budget_reference" name="budget_reference" required>
                        <option value="" disabled selected>เลือกรายการ</option>
                        <option value="49(1)">49(1)</option>
                        <option value="49(2)">49(2)</option>
                        <option value="49(3)">49(3)</option>
                        <option value="49(4)">49(4)</option>
                        <option value="49(5)">49(5)</option>
                        <option value="49(6)">49(6)</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="action_plan" class="form-label">แผนปฏิบัติการ</label>
                    <div id="action_plan_container">
                        <input type="text" class="form-control" id="action_plan" name="action_plan"
                            placeholder="แผนปฏิบัติการ" required>
                    </div>
                </div>
                <div class="col-md-4" id="other_input_action_plan_div" style="display: none;">
                    <label for="other_input_action_plan" class="form-label">แผนปฏิบัติการอื่นๆ (โปรดระบุ)</label>
                    <input type="text" class="form-control" id="other_input_action_plan"
                        name="other_input_action_plan" placeholder="แผนปฏิบัติการ" maxlength="42">
                </div>

                <script>
                    document.getElementById('budget_reference').addEventListener('change', function() {
                        var actionPlanContainer = document.getElementById('action_plan_container');
                        var otherInputDiv = document.getElementById('other_input_action_plan_div');
                        otherInputDiv.style.display = 'none';
                        actionPlanContainer.innerHTML = '';

                        switch (this.value) {
                            case '49(1)':
                                actionPlanContainer.innerHTML = `
                                <select class="form-select" id="action_plan" name="action_plan" required>
                                    <option value="" disabled selected>เลือกรายการ</option>
                                    <option value="บริหารทั่วไป">บริหารทั่วไป</option>
                                    <option value="อื่นๆ">อื่นๆ (โปรดระบุ)</option>
                                </select>
                            `;
                                break;
                            case '49(2)':
                                actionPlanContainer.innerHTML = `
                                <select class="form-select" id="action_plan" name="action_plan" required>
                                    <option value="" disabled selected>เลือกรายการ</option>
                                    <option value="สนาม">สนาม</option>
                                    <option value="อื่นๆ">อื่นๆ (โปรดระบุ)</option>
                                </select>
                            `;
                                break;
                            case '49(3)':
                                actionPlanContainer.innerHTML = `
                                <select class="form-select" id="action_plan" name="action_plan" required>
                                    <option value="" disabled selected>เลือกรายการ</option>
                                    <option value="ประชาสัมพันธ์เพื่อเกษตรกร">ประชาสัมพันธ์เพื่อเกษตรกร</option>
                                    <option value="สนับสนุนด้านการตลาด">สนับสนุนด้านการตลาด</option>
                                    <option value="สร้างความเข้มแข็งให้กับเกษตรกรฯ">สร้างความเข้มแข็งให้กับเกษตรกรฯ</option>
                                    <option value="ส่งเสริมการทำสวนยางในรูปแบบแปลงใหญ่">ส่งเสริมการทำสวนยางในรูปแบบแปลงใหญ่</option>
                                    <option value="ขึ้นทะเบียนเกษตรกรฯ">ขึ้นทะเบียนเกษตรกรฯ</option>
                                    <option value="อื่นๆ">อื่นๆ (โปรดระบุ)</option>
                                </select>
                            `;
                                break;
                            case '49(4)':
                                actionPlanContainer.innerHTML = `
                                <select class="form-select" id="action_plan" name="action_plan" required>
                                    <option value="" disabled selected>เลือกรายการ</option>
                                    <option value="ถ่ายทอดเทคโนโลยี">ถ่ายทอดเทคโนโลยี</option>
                                    <option value="อื่นๆ">อื่นๆ (โปรดระบุ)</option>
                                </select>
                            `;
                                break;
                            case '49(5)':
                                actionPlanContainer.innerHTML = `
                                <select class="form-select" id="action_plan" name="action_plan" required>
                                    <option value="" disabled selected>เลือกรายการ</option>
                                    <option value="ส่งเสริมและพัฒนาอาชีพให้เกษตรกรฯ">ส่งเสริมและพัฒนาอาชีพให้เกษตรกรฯ</option>
                                    <option value="อื่นๆ">อื่นๆ (โปรดระบุ)</option>
                                </select>
                            `;
                                break;
                            case '49(6)':
                                actionPlanContainer.innerHTML = `
                                <select class="form-select" id="action_plan" name="action_plan" required>
                                    <option value="" disabled selected>เลือกรายการ</option>
                                    <option value="จัดสวัสดิการเพื่อเกษตรกรชาวสวนยาง">จัดสวัสดิการเพื่อเกษตรกรชาวสวนยาง</option>
                                    <option value="พัฒนาสถาบันเกษตรกรฯ">พัฒนาสถาบันเกษตรกรฯ</option>
                                    <option value="อื่นๆ">อื่นๆ (โปรดระบุ)</option>
                                </select>
                            `;
                                break;
                            default:
                                actionPlanContainer.innerHTML =
                                    '<input type="text" class="form-control" id="action_plan" name="action_plan" placeholder="แผนปฏิบัติการ" required>';
                        }

                        var actionPlan = document.getElementById('action_plan');
                        var other_input_action_plan_clearn = document.getElementById('other_input_action_plan');
                        if (actionPlan) {
                            actionPlan.addEventListener('change', function() {
                                if (this.value === 'อื่นๆ') {
                                    otherInputDiv.style.display = 'block';
                                } else {
                                    otherInputDiv.style.display = 'none';
                                    other_input_action_plan_clearn.value = '';
                                }
                            });
                        }
                    });
                </script>

                <div class="row">
                    <div class="col-md-4">
                        <label for="activity" class="form-label">กิจกรรม</label>
                        <select class="form-select" id="activity" name="activity" required>
                            <option value="" disabled selected>เลือกรายการ</option>
                            <option value="สำรวจสวน">สำรวจสวน</option>
                            <option value="ตรวจสวน">ตรวจสวน</option>
                            <option value="ประชาสัมพันธ์เพื่อเกษตรกร">ประชาสัมพันธ์เพื่อเกษตรกร</option>
                            <option value="งานบริการตลาดกลางยางพารา">งานบริการตลาดกลางยางพารา</option>
                            <option value="บริหารโครงการ">บริหารโครงการ</option>
                            <option value="พัฒนาด้านธุรกิจ เทคโนโลยีฯ">พัฒนาด้านธุรกิจ&nbsp;เทคโนโลยีฯ</option>
                            <option value="สำรวจข้อมูลยางพาราเพื่อจัดทำฐานข้อมูล">สำรวจข้อมูลยางพาราเพื่อจัดทำฐานข้อมูล
                            </option>
                            <option value="ถ่ายทอดเทคโนโลยีด้านการผลิตยาง">ถ่ายทอดเทคโนโลยีด้านการผลิตยาง</option>
                            <option value="ถ่ายทอดเทคโนโลยีด้านอุตสาหกรรมยางฯ">ถ่ายทอดเทคโนโลยีด้านอุตสาหกรรมยางฯ
                            </option>
                            <option value="สวัสดิการบรรเทาความเดือดร้อนฯ">สวัสดิการบรรเทาความเดือดร้อนฯ</option>
                            <option value="พัฒนาความรู้ด้านยางพาราฯ">พัฒนาความรู้ด้านยางพาราฯ</option>
                            <option value="บริหารทั่วไป">บริหารทั่วไป</option>
                            <option value="other_activity">อื่นๆ</option>
                        </select>
                    </div>
                    <div class="col-md-4" id="other_input_activity_div" style="display: none;">
                        <label for="other_input_activity" class="form-label">กิจกรรมอื่นๆ (โปรดระบุ)</label>
                        <input type="text" class="form-control" id="other_input_activity" name="other_input_activity"
                            placeholder="กิจกรรม" maxlength="32">
                    </div>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var selectactivity = document.getElementById('activity');
                            var showactioninputactivity = document.getElementById(
                                'other_input_activity_div');
                            var input_of_activity = document.getElementById('other_input_activity');

                            selectactivity.addEventListener('change', function() {
                                if (selectactivity.value === 'other_activity') {
                                    showactioninputactivity.style.display = "block";
                                    input_of_activity.setAttribute('required', 'required');
                                } else {
                                    showactioninputactivity.style.display = 'none';
                                    input_of_activity.removeAttribute('required');
                                    input_of_activity.value = '';
                                }
                            });
                        });
                    </script>
                </div>
            </div>


            <!-- วันที่เดินทาง -->
            <h4>ขออนุมัติเดินทาง</h4>
            <div class="row">
                <div class="col-md-4">
                    <label for="daterange" class="form-label">เลือกช่วงวันที่เดินทาง:</label>
                    <input type="text" class="form-control" id="daterange" name="daterange"
                        placeholder="เลือกวันที่เดินทาง" required />
                </div>
            </div>
            <div class="row" id="dateFields"></div>

            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <script type="text/javascript">
                $(function() {
                    $('input[name="daterange"]').daterangepicker({
                        opens: 'left',
                        autoApply: true,
                        autoUpdateInput: false,
                        minDate: moment(),
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
                        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' ถึง ' + picker.endDate.format(
                            'YYYY-MM-DD'));
                        generateDateFields(picker.startDate, picker.endDate);
                    });

                    $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
                        $(this).val('');
                    });

                    function generateDateFields(startDate, endDate) {
                        var dateFields = document.getElementById('dateFields');
                        dateFields.innerHTML = '';

                        var currentDate = new Date(startDate);
                        var end = new Date(endDate);
                        var dayNumber = 1;

                        while (currentDate <= end) {
                            var isHoliday =
                                false;

                            if (!isHoliday) {
                                if (dayNumber % 3 === 1) {
                                    createInputRow(dateFields);
                                }
                                createInput(currentDate, dateFields.lastChild, dayNumber);
                                dayNumber++;
                            }

                            currentDate.setDate(currentDate.getDate() + 1);
                        }
                    }

                    function createInputRow(container) {
                        var row = document.createElement('div');
                        row.classList.add('row');
                        container.appendChild(row);
                    }

                    function createInput(date, container, dayNumber) {
                        var dateCol = document.createElement('div');
                        dateCol.classList.add('col-md-2');
                        var dateLabel = document.createElement('label');
                        dateLabel.textContent = 'วันที่';
                        dateCol.appendChild(dateLabel);
                        var dateInput = document.createElement('input');
                        dateInput.type = 'date';
                        dateInput.name = 'date[]';
                        dateInput.classList.add('form-control');
                        dateInput.required = true;
                        dateInput.readOnly = true;
                        dateInput.value = formatDate(date);
                        dateCol.appendChild(dateInput);
                        container.appendChild(dateCol);
                        createLocationSelectors(container, dayNumber);

                        var taskCol = document.createElement('div');
                        taskCol.classList.add('col-md-4');
                        var taskLabel = document.createElement('label');
                        taskLabel.textContent = 'งานที่ปฏิบัติ';
                        taskCol.appendChild(taskLabel);
                        var taskInput = document.createElement('input');
                        taskInput.type = 'text';
                        taskInput.name = 'task[]';
                        taskInput.classList.add('form-control');
                        taskInput.required = true;
                        taskInput.placeholder = "งานที่ปฏิบัติ";
                        taskCol.appendChild(taskInput);
                        container.appendChild(taskCol);
                    }

                    function createLocationSelectors(container, dayNumber) {
                        var provinceCol = document.createElement('div');
                        provinceCol.classList.add('col-md-2');
                        var provinceLabel = document.createElement('label');
                        provinceLabel.textContent = 'สถานที่ปฏิบัติงาน';
                        provinceCol.appendChild(provinceLabel);
                        var provinceSelect = document.createElement('select');
                        provinceSelect.name = 'province[]';
                        provinceSelect.classList.add('form-select');
                        provinceSelect.required = true;
                        provinceSelect.innerHTML = '<option value="" selected disabled>เลือกจังหวัด</option>';
                        @foreach ($getprovince as $getprovince)
                            provinceSelect.innerHTML +=
                                '<option value="{{ $getprovince->name_th }}" data-id="{{ $getprovince->id }}">{{ $getprovince->name_th }}</option>';
                        @endforeach
                        provinceCol.appendChild(provinceSelect);
                        container.appendChild(provinceCol);

                        var ampCol = document.createElement('div');
                        ampCol.classList.add('col-md-2');
                        var ampLabel = document.createElement('label');
                        ampLabel.innerHTML = '&nbsp;';
                        ampCol.appendChild(ampLabel);
                        var ampSelect = document.createElement('select');
                        ampSelect.name = 'amp[]';
                        ampSelect.classList.add('form-select');
                        ampSelect.required = true;
                        ampSelect.innerHTML = '<option value="" selected disabled>เลือกอำเภอ</option>';
                        ampCol.appendChild(ampSelect);
                        container.appendChild(ampCol);

                        var disCol = document.createElement('div');
                        disCol.classList.add('col-md-2');
                        var disLabel = document.createElement('label');
                        disLabel.innerHTML = '&nbsp;';
                        disCol.appendChild(disLabel);
                        var disSelect = document.createElement('select');
                        disSelect.name = 'dis[]';
                        disSelect.classList.add('form-select');
                        disSelect.required = true;
                        disSelect.innerHTML = '<option value="" selected disabled>เลือกตำบล</option>';
                        disCol.appendChild(disSelect);
                        container.appendChild(disCol);

                        provinceSelect.addEventListener('change', function() {
                            var selectedOption = provinceSelect.options[provinceSelect.selectedIndex];
                            var selectedProvinceId = selectedOption.getAttribute('data-id');
                            ampSelect.innerHTML = '<option value="" selected disabled>เลือกอำเภอ</option>';
                            disSelect.innerHTML = '<option value="" selected disabled>เลือกตำบล</option>';
                            fetch('/sendprovince/' + selectedProvinceId)
                                .then(response => response.json())
                                .then(data => {
                                    data.forEach(dataamphures => {
                                        ampSelect.innerHTML += '<option value="' + dataamphures
                                            .name_th + '" data-id="' + dataamphures.id + '">' +
                                            dataamphures.name_th + '</option>';
                                    });
                                });
                        });

                        ampSelect.addEventListener('change', function() {
                            var selectedOption = ampSelect.options[ampSelect.selectedIndex];
                            var selectedAmpId = selectedOption.getAttribute('data-id');
                            disSelect.innerHTML = '<option value="" selected disabled>เลือกตำบล</option>';
                            fetch('/senddis/' + selectedAmpId)
                                .then(response => response.json())
                                .then(data => {
                                    data.forEach(senddatadis => {
                                        disSelect.innerHTML += '<option value="' + senddatadis.name_th +
                                            '">' + senddatadis.name_th + '</option>';
                                    });
                                });
                        });
                    }

                    function formatDate(date) {
                        var day = date.getDate();
                        var month = date.getMonth() + 1;
                        var year = date.getFullYear();
                        return year + '-' + (month < 10 ? '0' : '') + month + '-' + (day < 10 ? '0' : '') + day;
                    }
                });
            </script>
            <!-- จำนวนคนที่เดินทาง -->
            <div class="row">
                <div class="col-md-4">
                    <label for="faculty_count" class="form-label">จำนวนคนที่เดินทางไปปฏิบัติงานเป็นหมู่คณะ (คน)</label>
                    <input type="number" name="faculty_count" id="faculty_count" class="form-control"
                        placeholder="ระบุจำนวนคน (ถ้ามีโปรดระบุ)" min="1">
                </div>
            </div>
            <div id="facultyFields"></div>
            <script>
                var facultyCountInput = document.getElementById('faculty_count');
                var facultyFields = document.getElementById('facultyFields');
                var usersData = @json($users);


                facultyCountInput.addEventListener('input', generateFacultyFields);

                function generateFacultyFields() {
                    var count = parseInt(facultyCountInput.value, 10);
                    facultyFields.innerHTML = '';

                    for (var i = 1; i <= count; i++) {
                        createFacultyInputs(i, facultyFields);
                    }
                }


                function createFacultyInputs(index, container) {
                    var row = document.createElement('div');
                    row.classList.add('row');

                    var nameCol = document.createElement('div');
                    nameCol.classList.add('col-md-4');
                    var nameLabel = document.createElement('label');
                    nameLabel.textContent = 'ชื่อคนที่ ' + index + ':';
                    var nameSelect = document.createElement('select');
                    nameSelect.name = 'name_' + index;
                    nameSelect.id = 'nameSelect_' + index;
                    nameSelect.classList.add('form-control');
                    nameSelect.required = true;

                    var defaultOption = new Option("กรุณาเลือกรายชื่อ", "");
                    defaultOption.disabled = true;
                    defaultOption.selected = true;
                    nameSelect.appendChild(defaultOption);

                    usersData.forEach(function(user) {
                        if (!user.is_admin || user.is_admin != 1) {
                            var fullName = user.prefix + '' + user.name + ' ' + user.lname;
                            var option = new Option(fullName, user.id);
                            nameSelect.appendChild(option);

                        }
                    });
                    nameCol.appendChild(nameLabel);
                    nameCol.appendChild(nameSelect);
                    row.appendChild(nameCol);

                    var positionCol = document.createElement('div');
                    positionCol.classList.add('col-md-4');
                    var positionLabel = document.createElement('label');
                    positionLabel.textContent = 'ตำแหน่ง';
                    var positionInput = document.createElement('input');
                    positionInput.type = 'text';
                    positionInput.name = 'position_' + index;
                    positionInput.id = 'position_' + index;
                    positionInput.classList.add('form-control');
                    positionInput.required = true;
                    positionInput.readOnly = true;
                    positionCol.appendChild(positionLabel);
                    positionCol.appendChild(positionInput);
                    row.appendChild(positionCol);

                    var levelCol = document.createElement('div');
                    levelCol.classList.add('col-md-4');
                    var levelLabel = document.createElement('label');
                    levelLabel.textContent = 'ระดับ';
                    var levelInput = document.createElement('input');
                    levelInput.type = 'text';
                    levelInput.name = 'level_' + index;
                    levelInput.id = 'level_' + index;
                    levelInput.classList.add('form-control');
                    levelInput.required = true;
                    levelInput.readOnly = true;
                    levelCol.appendChild(levelLabel);
                    levelCol.appendChild(levelInput);
                    row.appendChild(levelCol);
                    container.appendChild(row);
                    nameSelect.addEventListener('change', function() {
                        updatePositionInput(index, this.value);
                    });
                }

                function updatePositionInput(index, userId) {
                    var positionInput = document.getElementById('position_' + index);
                    var levelInput = document.getElementById('level_' + index);
                    var user = usersData.find(user => user.id == userId);
                    positionInput.value = user ? user.position : '';
                    levelInput.value = user ? user.level : '';
                }
            </script>
            <!-- พาหนะที่ใช้ในการเดินทาง -->
            <h4>พาหนะที่ใช้ในการเดินทางไปปฏิบัติงาน</h4>
            <div class="row">
                <div class="col-md-3" id="select_transport">
                    <label for="transport" class="form-label">โปรดเลือกประเภท</label>
                    <select class="form-select" id="transport" name="transport" required>
                        <option value="" disabled selected>เลือกประเภทรถที่ใช้</option>
                        <option value="รถยนต์">รถยนต์</option>
                        <option value="รถจักรยานยนต์">รถจักรยานยนต์</option>
                        <option value="รถยนต์ สนง.">รถยนต์ สนง.</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="vehicle_number" class="form-label">หมายเลขทะเบียนรถ</label>
                    <input type="text" class="form-control" id="vehicle_number" name="vehicle_number"
                        placeholder="หมายเลขทะเบียน" required>
                    <select class="form-select" id="vehicle_number_company" name="vehicle_number_company"
                        style="display: none;">
                        <option value="" disabled selected>เลือกทะเบียนรถ</option>
                        <option value="ฮว-4536 กทม.">ฮว-4536 กทม.</option>
                        <option value="ฮฉ-8312 กทม.">ฮฉ-8312 กทม.</option>
                    </select>
                </div>
                <div class="col-md-3" style="display: none;" id="select_driver">
                    <label class="form-label">ผู้ขับ</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="driver" id="driver_damrong"
                            value="นายดำรงค์ สืบพันธ์">
                        <label class="form-check-label" for="driver_damrong">นายดำรงค์ สืบพันธ์</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="driver" id="driver_naruthep"
                            value="นายนฤเทพ หัทไทย">
                        <label class="form-check-label" for="driver_naruthep">นายนฤเทพ หัทไทย</label>
                    </div>
                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var selectTransport = document.getElementById('transport');
                    var showDriver = document.getElementById('select_driver');

                    var showvehicle_number = document.getElementById('vehicle_number');
                    var showvehicle_number_company = document.getElementById('vehicle_number_company');

                    var set_required_driver_damrong = document.getElementById('driver_damrong');
                    var set_required_driver_naruthep = document.getElementById('driver_naruthep');



                    selectTransport.addEventListener('change', function() {
                        if (selectTransport.value === 'รถยนต์ สนง.') {
                            showDriver.style.display = 'block';
                            showvehicle_number.style.display = 'none';
                            showvehicle_number_company.style.display = 'block';
                            showvehicle_number.value = '';
                            showvehicle_number_company.setAttribute('required',
                                'required');
                            showvehicle_number.removeAttribute('required');
                            set_required_driver_damrong.setAttribute('required', 'required');
                            set_required_driver_naruthep.setAttribute('required', 'required');

                        } else {
                            showvehicle_number_company.style.display = 'none';
                            showvehicle_number_company.selectedIndex = 0;

                            showvehicle_number.style.display = 'block';
                            showvehicle_number.value = '';
                            showDriver.style.display = 'none';
                            var carPaymentRadios = document.getElementsByName('car_office');
                            carPaymentRadios.forEach(function(radio) {
                                radio.checked = false;
                            });

                            var driverRadios = document.getElementsByName('driver');
                            driverRadios.forEach(function(radio) {
                                radio.checked = false;
                            });

                            set_required_driver_damrong.removeAttribute('required');
                            set_required_driver_naruthep.removeAttribute('required');
                            showvehicle_number_company.removeAttribute('required');
                            showvehicle_number.setAttribute('required', 'required');
                        }
                    });
                });
            </script>


            <h4>ขอพักแรม</h4>
            <p><small>กรณีที่ไม่ได้มีการพักแรมไม่ต้องระบุ</small></p>
            <div class="row">
                <div class="col-md-4">
                    <label for="sojourn" class="form-label">เลือกช่วงวันที่พักแรม:</label>
                    <input type="text" class="form-control" id="sojourn" name="sojourn"
                        placeholder="เลือกวันที่พักแรม" />
                </div>
            </div>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
            <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
            <script type="text/javascript">
                $(function() {
                    $('input[name="sojourn"]').daterangepicker({
                        opens: 'left',
                        autoApply: true,
                        autoUpdateInput: false,
                        minDate: moment(),
                        locale: {
                            format: 'YYYY-MM-DD',
                            daysOfWeek: ["อา.", "จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส."],
                            monthNames: [
                                "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                                "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                            ]
                        }
                    });

                    $('input[name="sojourn"]').on('apply.daterangepicker', function(ev, picker) {
                        $(this).val(picker.startDate.format('YYYY-MM-DD') + ' ถึง ' + picker.endDate.format(
                            'YYYY-MM-DD'));
                    });

                    $('input[name="sojourn"]').on('cancel.daterangepicker', function(ev, picker) {
                        $(this).val('');
                    });
                });
            </script>
            <!-- ค่าใช้จ่าย -->
            <h4>ค่าใช้จ่ายในการเดินทาง</h4>
            <div class="row">
                <div class="col-md-4">
                    <label for="vehicle_expenses" class="form-label">ค่าพาหนะ</label>
                    <input type="number" class="form-control" id="vehicle_expenses" name="vehicle_expenses"
                        placeholder="จำนวนเงิน" step="0.01" min="0">
                </div>
                <div class="col-md-4">
                    <label for="fuel_expenses" class="form-label">ค่าน้ำมัน</label>
                    <input type="number" class="form-control" id="fuel_expenses" name="fuel_expenses"
                        placeholder="จำนวนเงิน" step="0.01" min="0">
                </div>
                <div class="col-md-4">
                    <label for="food_expenses" class="form-label">หักค่าอาหาร</label>
                    <input type="number" class="form-control" id="food_expenses" name="food_expenses"
                        placeholder="จำนวนเงิน" step="0.01" min="0">
                </div>
            </div>
            <!-- ปุ่มยืนยัน -->
            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary custom-button">ยืนยันการขอใบอนุมัติ</button>
                </div>
            </div>
        </form>
    </div>
    @endsection
