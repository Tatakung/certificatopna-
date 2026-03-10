@extends('layouts.user')
@section('title', 'รายละเอียด')

@section('content')
    <style>
        #now a {
            font-weight: 600;
        }


        /* Header */
        h2 {
            text-align: center;
            margin: 40px 0;
            font-weight: 600;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Detail Container */
        .detail-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: 0 auto;
        }

        .detail-container p {
            margin-bottom: 15px;
            font-size: 16px;
            color: #333;
        }

        /* Buttons */
        .btn {
            padding: 10px 20px;
            border-radius: 25px;
            font-size: 16px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            margin-right: 10px;
        }

        .btn-edit {
            background-color: #E49900;
            color: white;
            border: none;
        }

        .btn-edit:hover {
            background-color: #E49900;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .btn-history {
            background-color: #4CAF50;
            color: white;
            border: none;
            text-decoration: none;
            display: inline-block;
        }

        .btn-history:hover {
            background-color: #45a049;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .detail-container {
                padding: 20px;
            }

            .btn {
                display: block;
                width: 100%;
                margin-bottom: 10px;
            }
        }

        /* Modal Styles */
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

        .btn-close {
            color: white;
            opacity: 1;
        }

        .modal-body {
            padding: 30px;
        }

        .form-label {
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 10px 15px;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #127A0E;
            box-shadow: 0 0 0 0.2rem rgba(18, 122, 14, 0.25);
        }

        .modal-footer {
            border-top: none;
            padding: 20px;
        }

        .btn {
            border-radius: 8px;
            padding: 10px 20px;
            font-weight: 600;
            text-transform: uppercase;
            transition: all 0.3s ease;
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

        .breadcrumb {
            background-color: #f5f5f5;
            padding: 10px 20px;
            border-radius: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .breadcrumb-item.active {
            color: #605e5e;
        }

        .breadcrumb-item+.breadcrumb-item::before {
            content: "›";
            color: #757575;
        }

        #now a {
            color: #4caf50;
            font-weight: 600;
        }


        /* Responsive adjustments */
        @media (max-width: 768px) {
            .modal-dialog {
                margin: 10px;
            }

            .modal-body {
                padding: 20px;
            }
        }
    </style>

    <ol class="breadcrumb">
        <li class="breadcrumb-item" id="now"><a href="{{ route('admin.home') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" id="now"><a
                href="{{ route('userdetail', ['id' => $detail->id]) }}">รายละเอียด</a></li>
        <li class="breadcrumb-item active" aria-current="page">ประวัติขอใบอนุมัติ</li>
    </ol>





    <h2>รายละเอียด</h2>
    <div class="detail-container">
        <p>เลขประจำตัว : {{ $detail->numberid ?? 'ไม่ระบุ' }}</p>
        <p>ชื่อ : {{ $detail->prefix }}{{ $detail->name }} {{ $detail->lname }} </p>
        <p>ตำแหน่ง: {{ $detail->position }}</p>
        <p>ระดับ: {{ $detail->level }}</p>
        <p>สังกัด: {{ $detail->department }}</p>
        <p>แผนก: {{ $detail->section }}</p>
        <p>กอง: {{ $detail->division }}</p>
        <p>เบอร์ติดต่อ: {{ $detail->phone_number }}</p>
        <button class="btn btn-edit" type="button" data-toggle="modal" data-target="#test">แก้ไข</button>
        {{-- <button class="btn btn-history" type="button">ประวัติการขอใบอนุมัติ</button> --}}
        <a href="{{ route('historyuser', ['id' => $detail->id]) }}" class="btn btn-history">ประวัติการขอใบอนุมัติ</a>
    </div>
    {{-- ส่วนmodal --}}
    <div class="modal fade" id="test" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ต้องการแก้ไขข้อมูล?</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('updateuser', ['id' => $detail->id]) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="firstName" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control" id="firstName" name="firstName"
                                value="{{ $detail->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">นามสกุล</label>
                            <input type="text" class="form-control" id="lastName" name="lastName"
                                value="{{ $detail->lname }}">
                        </div>

                        <div class="mb-3">
                            <label for="position" class="form-label">ตำแหน่ง</label>
                            <select class="form-select" id="position" name="position">
                                <option value="ผอ.กยท.จ.ประจวบคีรีขันธ์"
                                    {{ $detail->position == 'ผอ.กยท.จ.ประจวบคีรีขันธ์' ? 'selected' : '' }}>
                                    ผอ.กยท.จ.ประจวบคีรีขันธ์</option>
                                <option value="ผช.ผอ.จ.ประจวบคีรีขันธ์"
                                    {{ $detail->position == 'ผช.ผอ.จ.ประจวบคีรีขันธ์' ? 'selected' : '' }}>
                                    ผช.ผอ.จ.ประจวบคีรีขันธ์</option>
                                <option value="หน.ธุรการและพัสดุ"
                                    {{ $detail->position == 'หน.ธุรการและพัสดุ' ? 'selected' : '' }}>หน.ธุรการและพัสดุ
                                </option>
                                <option value="หผ.พัฒนาและฝึกอบรม"
                                    {{ $detail->position == 'หผ.พัฒนาและฝึกอบรม' ? 'selected' : '' }}>หผ.พัฒนาและฝึกอบรม
                                </option>
                                <option value="ห.กองงานสนับสนุน"
                                    {{ $detail->position == 'ห.กองงานสนับสนุน' ? 'selected' : '' }}>ห.กองงานสนับสนุน
                                </option>

                                <option value="หผ.ปฏิบัติการ" {{ $detail->position == 'หผ.ปฏิบัติการ' ? 'selected' : '' }}>
                                    หผ.ปฏิบัติการ</option>
                                <option value="นักวิชาการส่งเสริมการเกษตร"
                                    {{ $detail->position == 'นักวิชาการส่งเสริมการเกษตร' ? 'selected' : '' }}>
                                    นักวิชาการส่งเสริมการเกษตร</option>
                                <option value="นักวิชาการเกษตร"
                                    {{ $detail->position == 'นักวิชาการเกษตร' ? 'selected' : '' }}>นักวิชาการเกษตร</option>
                                <option value="นักวิเคราะห์นโยบายและแผน"
                                    {{ $detail->position == 'นักวิเคราะห์นโยบายและแผน' ? 'selected' : '' }}>
                                    นักวิเคราะห์นโยบายและแผน</option>
                                <option value="นักวิชาการเงินและบัญชี"
                                    {{ $detail->position == 'นักวิชาการเงินและบัญชี' ? 'selected' : '' }}>
                                    นักวิชาการเงินและบัญชี</option>
                                <option value="พคย." {{ $detail->position == 'พคย.' ? 'selected' : '' }}>
                                    พคย.</option>
                            </select>
                        </div>



                        <div class="mb-3">
                            <label for="level" class="form-label">ระดับ</label>
                            <select class="form-select" id="level" name="level">
                                <option value="" {{ $detail->level == '' ? 'selected' : '' }}>กรุณาเลือกระดับ
                                </option>
                                <option value="1" {{ $detail->level == '1' ? 'selected' : '' }}>ระดับ 1</option>
                                <option value="2" {{ $detail->level == '2' ? 'selected' : '' }}>ระดับ 2</option>
                                <option value="3" {{ $detail->level == '3' ? 'selected' : '' }}>ระดับ 3</option>
                                <option value="4" {{ $detail->level == '4' ? 'selected' : '' }}>ระดับ 4</option>
                                <option value="5" {{ $detail->level == '5' ? 'selected' : '' }}>ระดับ 5</option>
                                <option value="6" {{ $detail->level == '6' ? 'selected' : '' }}>ระดับ 6</option>
                                <option value="7" {{ $detail->level == '7' ? 'selected' : '' }}>ระดับ 7</option>
                                <option value="8" {{ $detail->level == '8' ? 'selected' : '' }}>ระดับ 8</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="department" class="form-label">สังกัด</label>
                            <select class="form-select" id="department" name="department">
                                <option value="การยางแห่งประเทศไทยจังหวัดประจวบคีรีขันธ์"
                                    {{ $detail->department == 'การยางแห่งประเทศไทยจังหวัดประจวบคีรีขันธ์' ? 'selected' : '' }}>
                                    การยางแห่งประเทศไทยจังหวัดประจวบคีรีขันธ์</option>
                            </select>
                        </div>



                        <div class="mb-3">
                            <label for="section" class="form-label">แผนก</label>
                            <select class="form-select" id="section" name="section">
                                <option value="" {{ $detail->section == '' ? 'selected' : '' }}>
                                    กรุณาเลือกรายการ</option>
                                <option value="ปฏิบัติการ" {{ $detail->section == 'ปฏิบัติการ' ? 'selected' : '' }}>
                                    ปฏิบัติการ</option>
                                <option value="ธุรการและพัสดุ"
                                    {{ $detail->section == 'ธุรการและพัสดุ' ? 'selected' : '' }}>ธุรการและพัสดุ</option>
                                <option value="พัฒนาและฝึกอบรม"
                                    {{ $detail->section == 'พัฒนาและฝึกอบรม' ? 'selected' : '' }}>พัฒนาและฝึกอบรม</option>
                                <option value="แผนงานและข้อมูล"
                                    {{ $detail->section == 'แผนงานและข้อมูล' ? 'selected' : '' }}>แผนงานและข้อมูล</option>
                                <option value="บริหารกองทุนฯ" {{ $detail->section == 'บริหารกองทุนฯ' ? 'selected' : '' }}>
                                    บริหารกองทุนฯ</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="division" class="form-label">กอง</label>
                            <select class="form-select" id="division" name="division">
                                <option value="" {{ $detail->division == '' ? 'selected' : '' }}>
                                    กรุณาเลือกรายการ</option>
                                <option value="งานสนับสนุน" {{ $detail->division == 'งานสนับสนุน' ? 'selected' : '' }}>
                                    งานสนับสนุน</option>
                                <option value="ประสานนโยบายและวิชาการ"
                                    {{ $detail->division == 'ประสานนโยบายและวิชาการ' ? 'selected' : '' }}>
                                    ประสานนโยบายและวิชาการ</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">เบอร์ติดต่อ</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number"
                                value="{{ $detail->phone_number }}">
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">ยกเลิก</button>
                        <button type="submit" class="btn btn-success">บันทึก</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modalแสดงข้อความสำเร็จ-->
    <div class="modal fade" id="showupdate" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document"
            style="display: flex; align-items: center; min-height: calc(100vh - 20px);">
            <div class="modal-content">
                <br>
                <div class="modal-body">
                    <center>
                        <img src="{{ asset('images/success.png') }}" alt="Success Image" width="50ox" height="50px">
                    </center>
                    <p>
                        <center>ข้อมูลอัพเดตแล้ว</center>
                    </p>
                </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        @if (session('success'))
            // แสดง Modal หลังจาก 500 มิลลิวินาที
            setTimeout(function() {
                $('#showupdate').modal('show');

                // ตั้งเวลาให้ปิด Modal หลังจาก 2000 มิลลิวินาที (2 วินาที) หลังจากที่แสดง
                setTimeout(function() {
                    $('#showupdate').modal('hide');

                    // รีเฟรชหน้าเว็บหลังจากปิด Modal อีก 500 มิลลิวินาที
                    setTimeout(function() {
                        location.reload();
                    }, 500);
                }, 2000);
            }, 500);
        @endif
    </script>
@endsection
