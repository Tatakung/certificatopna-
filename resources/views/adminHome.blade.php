@extends('layouts.user')
<title>หน้าแรก</title>
@section('content')
<style>
    /* Typography */
    body {
        font-family: 'Kanit', sans-serif;
        line-height: 1.6;
    }

    h2 {
        text-align: center;
        margin-top: 30px;
        font-weight: 600;
        color: #333;
        margin-bottom: 30px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    /* Alert */
    .alert-info {
        background-color: #e8f5e9;
        border-color: #c8e6c9;
        color: #1b5e20;
        margin: auto;
        width: 75%;
        border-radius: 10px;
        padding: 20px;
        margin-top: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-size: 20px;
        transition: all 0.3s ease;
    }

    .alert-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }

    /* Table */
    .table-container {
        margin: auto;
        width: 80%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.15);
        border-radius: 10px;
        overflow: hidden;
        background: white;
        animation: fadeIn 0.5s ease-in-out;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th {
        background-color: #2e7d32;
        color: #ffffff;
        font-size: 16px;
        text-align: center;
        padding: 15px 20px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table td {
        text-align: center;
        padding: 15px 20px;
    }

    .table tr {
        transition: all 0.3s ease;
    }

    .table tr:nth-child(odd) {
        background-color: #f8f8f8;
    }

    .table tr:nth-child(even) {
        background-color: #fff;
    }

    .table tr:hover {
        background-color: #f1f8e9;
    }

    /* Detail Link */
    .detail-link {
        background-color: #4caf50;
        color: white;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-block;
        padding: 8px 15px;
        border-radius: 20px;
    }

    .detail-link:hover {
        background-color: #45a049;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    /* Breadcrumb */
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

    /* Animation */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .table-container {
            width: 95%;
        }
        
        .table td, .table th {
            padding: 10px;
        }
    }
</style>

    <ol class="breadcrumb">
        <li class="breadcrumb-item" id="now"><a href="{{ route('admin.home') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">รายละเอียด</li>
        <li class="breadcrumb-item active" aria-current="page">ประวัติขอใบอนุมัติ</li>
    </ol>


    <h2>รายชื่อพนักงาน</h2>
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>ตำแหน่ง</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $users)
                    @if ($users->is_admin !== 1)
                        <tr>
                            <td>{{ $users->prefix }}{{ $users->name }} {{ $users->lname }}</td>
                            <td>{{ $users->position }}</td>
                            <td>
                                <a href="{{ route('userdetail', ['id' => $users->id]) }}"
                                    class="detail-link">ดูรายละเอียด</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection