<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    <div class="col-sm-4">
        <label for="province" class="form-label">จังหวัด</label>
        <select name="province" id="province" class="form-control shadow-sm  bg-body-tertiary rounded">
            <option value="" selected disabled>กรุณาเลือกจังหวัด</option>
            @foreach ($getprovince as $getprovince)
                <option value="{{ $getprovince->name_th }}" data-id="{{ $getprovince->id }}">{{ $getprovince->name_th }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-sm-4">
        <label for="amp" class="form-label">อำเภอ</label>
        <select class="form-control shadow-sm  bg-body-tertiary rounded" id="amp" name="amp">
        </select>
    </div>
    <div class="col-sm-4">
        <label for="amp" class="form-label">ตำบล</label>
        <select class="form-control shadow-sm  bg-body-tertiary rounded" id="dis" name="dis">
        </select>
    </div>

    <!--เลือกอำเภอ -->
    <script>
        var selectprovince = document.getElementById('province'); //เลือกจังหวัดเสร็จ
        selectprovince.addEventListener('change', function() {
            var selectedOption = selectprovince.options[selectprovince.selectedIndex];
            var selectedProvinceId = selectedOption.getAttribute(
            'data-id'); // ดึงค่า id ของจังหวัดที่เลือกจาก data-id
            fetch('/sendprovince/' + selectedProvinceId)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // ดูค่าที่ API คืนมาทั้งหมดใน console
                    var showamphures = document.getElementById('amp'); //แสดงข้อมูลอำเภอ

                    showamphures.innerHTML = '<option value="" selected disabled>เลือกอำเภอ</option>';
                    data.forEach(dataamphures => {
                        showamphures.innerHTML += '<option value="' + dataamphures.name_th + '" data-id="' + dataamphures.id + '">' + dataamphures.name_th + '</option>';



                    });
                });
        });
    </script>

    <!--เลือกตำบล -->
    <script>
        var selectdis = document.getElementById('amp'); //เลือกอำเภอเสร็จ
        selectdis.addEventListener('change', function() {
            var selectedOption = selectdis.options[selectdis.selectedIndex];
            var selectedDisId = selectedOption.getAttribute(
            'data-id'); // ดึงค่า id ของจังหวัดที่เลือกจาก data-id
            fetch('/senddis/' + selectedDisId)
                .then(response => response.json())
                .then(data => {
                    console.log(data); // ดูค่าที่ API คืนมาทั้งหมดใน console
                    var showdis = document.getElementById('dis'); //แสดงข้อมูลตำบล

                    showdis.innerHTML = '<option value="" selected disabled>เลือกตำบล</option>';
                    data.forEach(senddatadis => {
                        showdis.innerHTML += '<option value="' + senddatadis.id + '">' +senddatadis.name_th + '</option>';
                    });
                });
        });
    </script>











































    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">











    <!--ดึงไซส์-->
    {{-- <script>
        var selecttype = document.getElementById('dress_type') //เลือกประเภทชุด
        var selectcode = document.getElementById('dress_code') //เลือกประเภทชุด 
        selectcode.addEventListener('change', function() {
            fetch('/get/sizename/' + selecttype.value + '/' + selectcode.value)
                .then(response => response.json())
                .then(data => {
                    // console.log(data); // ดูค่าที่ API คืนมาทั้งหมดใน console

                    var showsizename = document.getElementById('dress_size'); //แสดงดรอปดาวไซส์นะ
                    showsizename.innerHTML = '<option value=""> เลือกไซส์ </option>';

                    data.forEach(sizename => {
                        showsizename.innerHTML += '<option value=" ' + sizename + ' "> ' + sizename +
                            ' </option>';
                    });
                });
            document.getElementById('imageshow').src = '';
        });
    </script> --}}

</body>

</html>
