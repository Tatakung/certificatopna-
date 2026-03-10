{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .dotted-line {
            border-bottom: 1px dotted #000;
            min-width: 100px;
            display: inline-block;
            text-align: center;
        }
        .underline {
    position: relative;
    display: inline-block;
    min-width: 100px; 
    text-align: center;
}

.underline::after {
    content: "...................................................";
    position: absolute;
    bottom: -2px;
    left: 0;
    right: 0;
    z-index: -1;
    color: #000;
}

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
        }
    </style>
</head>

<body>
    <h1>ใบขออนุมัติการเดินทาง</h1>


    <div class="form-field">
        <span>ไปปฏิบัติราชการที่</span>
        <span class="dotted-line">{{ $data->department }}</span>
        <span>เพื่อไปปฏิบัติงาน</span>
        <span class="dotted-line">{{ $data->position }}</span>
        <span>จำนวนผู้ปฏิบัติงาน</span>
        <span class="dotted-line">{{ $data->level }}</span>
    </div>
    <div class="form-field">
        <span>ไปปฏิบัติราชการที่</span>
        <span class="dotted-line">
            @foreach ($datawork as $datawork)
                {{$datawork->location}}
            @endforeach
        </span>
        <span>เพื่อไปปฏิบัติงาน</span>
        <span class="dotted-line">
            @foreach ($dataworks as $datawork)
                {{$datawork->task}}
            @endforeach
        </span>
        <span>จำนวนผู้ปฏิบัติงาน</span>
        <span class="dotted-line"></span>
    </div>


</body>

</html> --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .dotted-line {
            border-bottom: 1px dotted #000;
            display: inline-block;
            white-space: nowrap;
            width: 100%;
            position: relative;
        }
        .dotted-line::after {
            content: "..................................................................................................";
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            white-space: nowrap;
            z-index: -1;
        }
        .container {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 600px;
        }
        .line-container {
            display: flex;
            align-items: center;
            width: 100%;
            margin-bottom: 5px;
        }
        .label {
            flex: 0 0 auto;
            margin-right: 5px;
            white-space: nowrap;
        }
        .text-container {
            flex: 1 1 auto;
            position: relative;
            white-space: pre-wrap;
            overflow: hidden;
        }
        .dots {
            border-bottom: 1px dotted #000;
            flex: 1 1 auto;
            white-space: nowrap;
            overflow: hidden;
        }
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
        html, body {
            font-style: normal;
            font-weight: bold;
            font-family: "THSarabunNew";
        }
    </style>
</head>
<body>
    <h1>ใบขออนุมัติการเดินทาง</h1>
    <div class="container">
        <div class="line-container">
            <span class="label">ไปปฏิบัติราชการที่</span>
            <div class="text-container">
                <span class="dotted-line">
                    @foreach ($datawork as $data)
                        {{$data->location}}
                    @endforeach
                </span>
            </div>
        </div>
        <div class="line-container">
            <span class="label">เพื่อไปปฏิบัติงาน</span>
            <div class="text-container">
                <span class="dotted-line">
                    @foreach ($dataworks as $data)
                        {{$data->task}}
                    @endforeach
                </span>
            </div>
        </div>
        <div class="line-container">
            <span class="label">จำนวนผู้ปฏิบัติงาน</span>
            <span class="dots"></span>
        </div>
    </div>
</body>
</html>
