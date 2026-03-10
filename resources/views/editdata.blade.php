@extends('layouts.user')

@section('content')
<h2>แก้ไขรายละเอียดใบอนุมัติเดินทาง</h2>
{{-- <form action="{{ route('update', ['id' => $travelApproval->id]) }}" method="POST"> --}}
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <label for="prefix" class="form-label">คำนำหน้า</label>
                <input type="text" class="form-control" name="prefix" value="{{ $travelApproval->prefix }}">
            </div>
            <div class="col-md-4">
                <label for="name" class="form-label">ชื่อ</label>
                <input type="text" class="form-control" name="name" value="{{ $travelApproval->name }}">
            </div>
            <div class="col-md-4">
                <label for="lname" class="form-label">นามสกุล</label>
                <input type="text" class="form-control" name="lname" value="{{ $travelApproval->lname }}">
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <label for="prefix" class="form-label">ตำแหน่ง</label>
                <input type="text" class="form-control" name="prefix" value="{{ $travelApproval->position }}">
            </div>
            <div class="col-md-4">
                <label for="name" class="form-label">ระดับ</label>
                <input type="text" class="form-control" name="name" value="{{ $travelApproval->level }}">
            </div>
            <div class="col-md-4">
                <label for="lname" class="form-label">สังกัด</label>
                <input type="text" class="form-control" name="lname" value="{{ $travelApproval->department }}">
            </div>
        </div>


        <!-- เพิ่มฟิลด์อื่น ๆ ตามต้องการ -->

        <div class="row">
            <div class="col-md-4">
                <label for="section" class="form-label">แผนก</label>
                <input type="text" class="form-control" name="section" value="{{ $travelApproval->section }}">
            </div>
            <div class="col-md-4">
                <label for="division" class="form-label">กอง</label>
                <input type="text" class="form-control" name="division" value="{{ $travelApproval->division }}">
            </div>
            <div class="col-md-4">
                <label for="phone_number" class="form-label">เบอร์ติดต่อ</label>
                <input type="text" class="form-control" name="phone_number" value="{{ $travelApproval->phone_number }}">
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <label for="daterange" class="form-label">เลือกช่วงวันที่เดินทาง:</label>
                <input type="text" class="form-control" id="daterange" name="daterange" placeholder="เลือกวันที่เดินทาง" value="{{ $travelApproval->daterange }}" required />
            </div>
        </div>

        <h4>ขออนุมัติเดินทาง</h4>

        <div class="row">
            <div class="col-md-4">
                <label for="daterange" class="form-label">เลือกช่วงวันที่เดินทาง:</label>
                <input type="text" class="form-control" id="daterange" name="daterange" placeholder="เลือกวันที่เดินทาง" required
                    value="{{ $travelApproval->start_date . ' ถึง ' . $travelApproval->end_date }}" />
            </div>
        </div>
        
        <div class="row" id="dateFields"></div>
        
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/moment/min/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left',
                    autoApply: true,
                    autoUpdateInput: false,
                    minDate: moment(),
                    isInvalidDate: function (date) {
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
        
                $('input[name="daterange"]').on('apply.daterangepicker', function (ev, picker) {
                    $(this).val(picker.startDate.format('YYYY-MM-DD') + ' ถึง ' + picker.endDate.format('YYYY-MM-DD'));
                    generateDateFields(picker.startDate, picker.endDate);
                });
        
                $('input[name="daterange"]').on('cancel.daterangepicker', function (ev, picker) {
                    $(this).val('');
                });

                function generateDateFields(startDate, endDate) {
                    var dateFields = document.getElementById('dateFields');
                    dateFields.innerHTML = '';

                    var currentDate = new Date(startDate);
                    var end = new Date(endDate);
                    var dayNumber = 1;

                    while (currentDate <= end) {
                        var isWeekend = currentDate.getDay() === 0 || currentDate.getDay() === 6;
                        var isHoliday =
                            false; // ตรวจสอบว่าเป็นวันหยุดหรือไม่ ให้ตั้งค่าเป็น true หากมีเงื่อนไขที่เช็ควันหยุด

                        if (!isWeekend && !isHoliday) {
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
                                        .name_th +
                                        '" data-id="' + dataamphures.id + '">' + dataamphures
                                        .name_th + '</option>';
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
                                        '">' +
                                        senddatadis.name_th + '</option>';
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
        
























        <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
    </div>
</form>
@endsection
