@extends('layouts.user')
@section('title', 'เพิ่มรายชื่อพนักงาน')
@section('content')
<style>
    /* Typography */
    body {
        font-family: 'Kanit', sans-serif;
        line-height: 1.6;
        color: #333;
    }

    h2 {
        text-align: center;
        margin: 40px 0;
        font-weight: 600;
        color: #127A0E;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Form Container */
    .form-container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 30px;
        margin: 30px auto;
        max-width: 900px;
    }

    /* Form Elements */
    .form-label {
        font-weight: 600;
        color: #333;
        margin-bottom: 8px;
    }

    .form-control, .form-select {
        border-radius: 8px;
        border: 1px solid #ced4da;
        padding: 10px 15px;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

    .form-control:focus, .form-select:focus {
        border-color: #127A0E;
        box-shadow: 0 0 0 0.2rem rgba(18, 122, 14, 0.25);
    }

    /* Button */
    .btn-create {
        background-color: #127A0E;
        border: none;
        color: white;
        padding: 12px 24px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
    }

    .btn-create:hover {
        background-color: #0f6a0c;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Alert Info */
    .alert-info {
        background-color: #e8f5e9;
        border-color: #c8e6c9;
        color: #1b5e20;
        border-radius: 8px;
        padding: 20px;
        margin: 30px auto;
        max-width: 900px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
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

   

    /* Modal */
    .modal-content {
        border: none;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
    }

    .modal-header {
        background-color: #127A0E;
        color: white;
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
        padding: 20px;
    }

    .modal-title {
        font-weight: bold;
        font-size: 1.2rem;
    }

    .modal-body {
        padding: 30px;
    }

    .modal-footer {
        border-top: none;
        padding: 20px;
    }

    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
        color: #212529;
    }

    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }

    .btn-success {
        background-color: #127A0E;
        border-color: #127A0E;
    }

    .btn-success:hover {
        background-color: #0f6a0c;
        border-color: #0f6a0c;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .form-container, .alert-info {
            padding: 20px;
            margin: 20px 10px;
        }

        .btn-create {
            width: 100%;
        }
    }
</style>
    <ol class="breadcrumb">
        <li class="breadcrumb-item" id="now"><a href="{{ route('admin.home') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item" id="now"><a href="">เพิ่มรายชื่อพนักงาน</a></li>
    </ol>
    <h2>เพิ่มรายชื่อพนักงาน</h2>
    <div class="form-container">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="container">
                <div class="row">


                </div>
                <div class="row mb-4">
                    <div class="col-md-4">
                        <label for="prefix" class="form-label">คำนำหน้า</label>
                        <select class="form-select" id="prefix" name="prefix" required>
                            <option value="" disabled selected>กรุณาเลือกรายการ</option>
                            <option value="นาย">นาย</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="นาง">นาง</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="name" class="form-label">ชื่อ</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="ชื่อ"
                            required>
                    </div>
                    <div class="col-md-4">
                        <label for="lname" class="form-label">นามสกุล</label>
                        <input type="text" class="form-control" id="lname" name="lname" placeholder="นามสกุล"
                            required>
                    </div>
                </div>
                <div class="row mb-4">

                    <div class="col-md-4">
                        <label for="numberid" class="form-label">รหัสประจำตัวพนักงาน</label>
                        <input type="number" class="form-control" id="numberid" name="numberid"
                            placeholder="กรอกรหัสประจำตัวพนักงาน" >
                    </div>
                    <script>
                        document.getElementById('numberid').addEventListener('input', function(e) {
                            let input = e.target.value.replace(/\D/g, ''); // ลบตัวอักษรที่ไม่ใช่ตัวเลขทั้งหมด
                            if (input.length > 4) {
                                input = input.substring(0, 4); // จำกัดความยาวไม่เกิน 4 ตัวอักษร
                            }
                            e.target.value = input;
                        });
                    </script>
                    <div class="col-md-4">
                        <label for="position" class="form-label">ตำแหน่ง</label>
                        <select class="form-select" id="position" name="position" required>
                            <option value="" disabled selected>กรุณาเลือกรายการ</option>
                            <option value="ผอ.กยท.จ.ประจวบคีรีขันธ์">&nbsp;ผอ.กยท.จ.ประจวบคีรีขันธ์ </option>
                            <option value="ผช.ผอ.จ.ประจวบคีรีขันธ์">&nbsp;ผช.ผอ.จ.ประจวบคีรีขันธ์</option>
                            <option value="หน.ธุรการและพัสดุ">&nbsp;หน.ธุรการและพัสดุ</option>
                            <option value="หผ.พัฒนาและฝึกอบรม">&nbsp;หผ.พัฒนาและฝึกอบรม</option>
                            <option value="ห.กองงานสนับสนุน">&nbsp;ห.กองงานสนับสนุน</option>
                            <option value="หผ.ปฏิบัติการ">&nbsp;หผ.ปฏิบัติการ</option>
                            <option value="นักวิชาการส่งเสริมการเกษตร">&nbsp;นักวิชาการส่งเสริมการเกษตร</option>
                            <option value="นักวิชาการเกษตร">&nbsp;นักวิชาการเกษตร</option>
                            <option value="นักวิเคราะห์นโยบายและแผน">&nbsp;นักวิเคราะห์นโยบายและแผน</option>
                            <option value="นักวิชาการเงินและบัญชี">&nbsp;นักวิชาการเงินและบัญชี</option>
                            <option value="พคย.">&nbsp;พคย.</option>

                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="level" class="form-label">ระดับ</label>
                        <select class="form-select" id="level" name="level" >
                            <option value="ทำไร" disabled selected>กรุณาเลือกรายการ</option>
                            <option value="1">ระดับ 1</option>
                            <option value="2">ระดับ 2</option>
                            <option value="3">ระดับ 3</option>
                            <option value="4">ระดับ 4</option>
                            <option value="5">ระดับ 5</option>
                            <option value="6">ระดับ 6</option>
                            <option value="7">ระดับ 7</option>
                            <option value="8">ระดับ 8</option>
                        </select>
                    </div>
                </div>




                <div class="row mb-4">



                    <div class="col-md-4">
                        <label for="department" class="form-label">สังกัด</label>
                        <select class="form-select" id="department" name="department" required>
                            <option value="" disabled selected>กรุณาเลือกรายการ</option>
                            <option value="การยางแห่งประเทศไทยจังหวัดประจวบคีรีขันธ์">
                                &nbsp;การยางแห่งประเทศไทยจังหวัดประจวบคีรีขันธ์
                            </option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="section" class="form-label">แผนก</label>
                        <select class="form-select" id="section" name="section">
                            <option value="" disabled selected>กรุณาเลือกรายการ</option>
                            <option value="ปฏิบัติการ">ปฏิบัติการ</option>
                            <option value="ธุรการและพัสดุ">ธุรการและพัสดุ</option>
                            <option value="พัฒนาและฝึกอบรม">พัฒนาและฝึกอบรม</option>
                            <option value="แผนงานและข้อมูล">แผนงานและข้อมูล</option>
                            <option value="บริหารกองทุนฯ">บริหารกองทุนฯ</option>

                        </select>
                    </div>

                    <div class="col-md-4">
                        <label for="division" class="form-label">กอง</label>
                        <select class="form-select" id="division" name="division">
                            <option value="" disabled selected>กรุณาเลือกรายการ</option>
                            <option value="งานสนับสนุน">งานสนับสนุน</option>
                            <option value="ประสานนโยบายและวิชาการ">ประสานนโยบายและวิชาการ</option>


                        </select>
                    </div>

                </div>

                <div class="row">


                    <div class="col-md-4">
                        <label for="phone_number" class="form-label">เบอร์ติดต่อ</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number"
                            placeholder="เบอร์ติดต่อ" required>
                    </div>
                    <script>
                        document.getElementById('phone_number').addEventListener('input', function(e) {
                            let input = e.target.value.replace(/\D/g, ''); // ลบตัวอักษรที่ไม่ใช่ตัวเลขทั้งหมด
                            let formattedInput = '';

                            if (input.length > 0) {
                                formattedInput = input.substring(0, 3);
                            }
                            if (input.length >= 4) {
                                formattedInput += '-' + input.substring(3, 6);
                            }
                            if (input.length >= 7) {
                                formattedInput += '-' + input.substring(6, 10);
                            }

                            e.target.value = formattedInput;
                        });
                    </script>



                </div>

                <div class="row mt-4">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-create" type="submit">ยืนยัน</button>
                    </div>
                </div>
            </div>
        </form>
    </div>



    {{-- modal --}}
    <div class="modal fade" id="create" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="font-weight: bold; background-color: #127A0E; color: white;">
                    <h5 class="modal-title" id="confirmModalLabel">ยืนยันการเพิ่มพนักงาน</h5>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="modal-body">
                        คุณต้องการเพิ่มพนักงานใช่หรือไม่?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modalแสดงข้อความสำเร็จ-->
    <div class="modal fade" id="showsuccessss" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body text-center">
                    <img src="{{ asset('images/success.png') }}" alt="Success Image" width="100" height="100" class="mb-3">
                    <h4>เพิ่มพนักงานสำเร็จ</h4>
                </div>
            </div>
        </div>
    </div>

    <script>
        @if (session('success'))
            // แสดง Modal หลังจาก 500 มิลลิวินาที
            setTimeout(function() {
                $('#showsuccessss').modal('show');

                // ตั้งเวลาให้ปิด Modal หลังจาก 2000 มิลลิวินาที (2 วินาที) หลังจากที่แสดง
                setTimeout(function() {
                    $('#showsuccessss').modal('hide');

                    // รีเฟรชหน้าเว็บหลังจากปิด Modal อีก 500 มิลลิวินาที
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                }, 2000);
            }, 500);
        @endif
    </script>
    <div class="alert-info">
        <p>หลังจากเพิ่มรายชื่อพนักงานเรียบร้อยแล้ว
            พนักงานสามารถเข้าสู่ระบบได้โดยใช้"รหัสประจำตัวพนักงาน"และ"รหัสผ่าน"เป็นเลขเดียวกัน
        </p>
    </div>

@endsection
