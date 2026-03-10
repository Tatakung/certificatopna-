@extends('layouts.user')
@section('title', 'หน้าแรก')
@section('content')
    <style>
        body {
            font-family: 'Kanit', sans-serif;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin: -25px;
            color: #343a40;
            font-weight: 600;
            font-size: 23px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .alert-info {
            background-color: #e9ecef;
            border: none;
            color: #495057;
            margin: 30px auto;
            width: 75%;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            font-size: 1.2rem;
            text-align: center;
            transition: all 0.3s ease;
        }

        .alert-info:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .alert-info img {
            width: 60px;
            height: 60px;
            margin-bottom: 15px;
        }

        .table-container {
            margin: 30px auto;
            width: 100%;
            background-color: #ffffff;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            animation: fadeIn 0.5s ease-in-out;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            background-color: #127A0E;
            color: #ffffff;
            font-size: 1.1rem;
            text-align: center;
            padding: 15px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .table td {
            text-align: center;
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            font-size: 1rem;
        }

        .table tr:last-child td {
            border-bottom: none;
        }

        .table tr:nth-child(odd) {
            background-color: #f8f8f8;
        }

        .table tr:nth-child(even) {
            background-color: #ffffff;
        }

        .table tr:hover {
            background-color: #f1f8e9;
            transition: background-color 0.3s ease;
        }

        .detail-link {
            background-color: #4caf50;
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            padding: 8px 15px;
            border-radius: 50px;
            font-weight: 500;
        }

        .detail-link:hover {
            background-color: #E49900;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>

    <ol class="breadcrumb">
        <li class="breadcrumb-item" id="now"><a href="{{ route('homepage') }}">หน้าแรก</a></li>
        <li class="breadcrumb-item active" aria-current="page">รายละเอียด</li>
    </ol>

    <div class="container">
        <h2>ประวัติการขอใบอนุมัติเดินทาง</h2>

        @if ($data->isEmpty())
            <div class="alert-info">
                <img src="{{ asset('images/history.png') }}" alt="ไม่มีประวัติ">
                <p>ไม่มีประวัติการขอใบอนุมัติการเดินทาง</p>
            </div>
        @else
            <div class="table-container">
                <table class="table">
                    <thead>
                        <tr>
                            <th>วันที่ขออนุมัติ</th>
                            <th>ดูรายละเอียด</th>
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
                                    <a href="{{ route('detail', ['id' => $item->id]) }}"
                                        class="detail-link">ดูรายละเอียด</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        @endif
    </div>


@endsection
