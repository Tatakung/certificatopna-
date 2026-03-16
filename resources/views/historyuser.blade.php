@extends('layouts.user')
@section('title', 'ประวัติขอใบอนุมัติเดินทาง')
@section('content')
<style>
    /* Global Styles */
    body {
        background-color: #f4f7f6;
        font-family: 'Kanit', sans-serif;
    }

    /* Header Styles */
    h2 {
        text-align: center;
        margin: 40px 0;
        color: #333;
        font-weight: 600;
    }

    /* Alert Styles */
    .alert-info {
        background-color: #e8f5e9;
        border-color: #c8e6c9;
        color: #1b5e20;
        margin: 30px auto;
        width: 75%;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        font-size: 18px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .alert-info img {
        margin-right: 15px;
    }

    /* Table Styles */
    .table-container {
        margin: 30px auto;
        width: 80%;
        background-color: #ffffff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
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
        border-bottom: 1px solid #e0e0e0;
    }

    .table tr {
        transition: all 0.3s ease;
    }

    .table tr:nth-child(odd) {
        background-color: #f8f8f8;
    }

    .table tr:nth-child(even) {
        background-color: #ffffff;
    }

    .table tr:hover {
        background-color: #f1f8e9;
    }

    /* Link Styles */
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
</style>

<ol class="breadcrumb">
    <li class="breadcrumb-item" id="now"><a href="{{ route('admin.home') }}">หน้าแรก</a></li>
    <li class="breadcrumb-item active" id="now"><a href="{{ route('userdetail', ['uuid' => $finduser->uuid]) }}">รายละเอียด</a></li>
    <li class="breadcrumb-item active" id="now"><a href="">ประวัติขอใบอนุมัติ</a></li>
</ol>

<h2>ประวัติการขอใบอนุมัติเดินทาง</h2>

@if ($data->isEmpty())
    <div class="alert-info">
        <img src="{{ asset('images/history.png') }}" alt="History Icon" width="40" height="40">
        <p>{{ $finduser->prefix }}{{ $finduser->name }} {{ $finduser->lname }} ไม่มีประวัติการขอใบอนุมัติการเดินทาง</p>
    </div>
@else
    <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>วันที่ขออนุมัติ</th>
                    <th>รายละเอียด</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>
                            <?php
                            $thaiDate = \Carbon\Carbon::parse($item->created_at)
                                ->locale('th')
                                ->isoFormat('LL');
                            $thaiYear = (int) \Carbon\Carbon::parse($item->created_at)
                                ->addYears(543)
                                ->format('Y');
                            $thaiDateWithYear = str_replace((string) \Carbon\Carbon::parse($item->created_at)->year, (string) $thaiYear, $thaiDate);
                            ?>
                            {{ $thaiDateWithYear }}
                        </td>
                        <td>
                            <a href="{{ route('detail', ['uuid' => $item->uuid]) }}" class="detail-link">ดูรายละเอียด</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

@endsection
