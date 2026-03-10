<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <style>
        body {
            font-family: Montserrat, sans-serif;
        }

        .navbar-brand {
            background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgZGF0YS1uYW1lPSJMYXllciAxIiBpZD0iTGF5ZXJfMSIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbD0id2hpdGUiIGQ9Ik01MDQuMzMsNDQ5Yy0xLjc3LTYuOC00NC43My0xNjcuNTItMTY0LjIxLTIzMi45MS00NC42NS0yNC40My05Ni4yLTQxLjQ1LTE0Ni01Ny45MUMxMTUsMTMyLjA4LDQwLjI5LDEwNy40MiwyNiw1OS42NWE2LjIyLDYuMjIsMCwwLDAtMTIsLjI0Yy0uOSwzLjUtMjEuNTMsODYuMzgsMTUuNjUsMTM3Ljk0LDE2LjgsMjMuMjksNDIuNjYsMzYuMzMsNzYuODUsMzguNzUsMi44OC4yLDUuNjEuNDIsOC40NC42Myw0LjE1LDE1LjE2LDIyLjE0LDYwLjYzLDg5LjYxLDY2LDEyLjI1LDEsMjQuMTcsMi4yNSwzNS45LDMuNjUsNC45MiwxNC4xNiwyNi44NCw1Ny42LDExNCw3My4wNyw2Mi43OCwxMS4xNCwxMTQsMzEuMTgsMTMxLjIxLDUxLjI1LDQuMzksMTIuNjgsNi41MywyMC42Miw2LjYzLDIxYTYuMiw2LjIsMCwwLDAsNiw0LjY1LDYuNTYsNi41NiwwLDAsMCwxLjU3LS4yQTYuMjMsNi4yMywwLDAsMCw1MDQuMzMsNDQ5Wk0zOS43NCwxOTAuNThDMTYsMTU3LjczLDE4Ljc1LDEwOC41MiwyMi41NSw4MS44M2MyNi4wNyw0MS40Myw5Mi4zNCw2My4zMSwxNjcuNjIsODguMTYsNDkuMzIsMTYuMjksMTAwLjMzLDMzLjEzLDE0NCw1NywzMS40NiwxNy4yMSw1Ny41Myw0MS44LDc4LjgsNjguNDRDMzcyLDI2OS4zOCwzMDUuNTgsMjM4LjIyLDEwNy4zNSwyMjQuMTgsNzcsMjIyLDU0LjI4LDIxMC43MywzOS43NCwxOTAuNThabTg4LjM2LDQ3LjY0YzIwMi4zOCwxNi40MiwyNTQuMzYsNTEuNDYsMjkyLjY0LDc3LjI4LDQuMzYsMi45NSw4LjU4LDUuOCwxMi44NCw4LjUxLDUuMDksNy43Nyw5LjgxLDE1LjU1LDE0LjE4LDIzLjIyLTM4LjM3LTE5Ljc4LTExNS42OS00MS40Mi0yMDEuMTktNTIuMTUtLjE0LDAtLjI5LDAtLjQ0LS4wNi0xMy4zOS0xLjY3LTI2Ljk0LTMuMTMtNDAuNjEtNC4yMkMxNTAuNDksMjg2LjQzLDEzMy4yMSwyNTMuNTMsMTI4LjEsMjM4LjIyWk0zNTYuNjMsMzY3LjY4Yy03MC44My0xMi41Ny05NC41MS00My43OS0xMDItNTkuMTEsMTEwLjI0LDE0Ljg3LDE5Mi43Nyw0Ni4yNywyMDUuNjEsNjIsNi43NSwxMy41NSwxMi4yOSwyNi4yNSwxNi44MSwzNy41QzQ1MS4xLDM5MS40OSw0MDcuOTQsMzc2Ljc4LDM1Ni42MywzNjcuNjhaIi8+PC9zdmc+");
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            width: 48px;
            height: 48px;
        }

        .navbar-nav .nav-item:hover {
            background-color: #E49900;
        }

        .navbar {
            background-color: #127A0E !important;
        }

        h2 {
            text-align: center;
            /* จัดให้ข้อความอยู่ตรงกลาง */
            margin-top: 30px;
            /* ทำให้ห่างจากขอบบน 30px */
        }

        /* Style ตาราง */
        .table-container {
            margin: auto;
            /* ควบคุมให้ตารางอยู่ตรงกลาง */
            width: 80%;
            /* กำหนดความกว้างของตาราง */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            /* เพิ่มเงาให้กับตาราง */
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            /* ลดขอบระหว่างเซลล์ */
        }

        .table th,
        .table td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
            text-align: left;            
        }

        .table th {
            background-color: #127A0E;
            /* สีพื้นหลังของหัวตาราง */
            color: rgb(255, 255, 255)
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
            /* สีพื้นหลังของแถวคู่ */
        }

        .detail-link {
            color: #127A0E;
            /* สีข้อความเมื่อปกติ */
            text-decoration: none;
            /* ไม่ให้มี underline */
            transition: color 0.3s;
            /* เพื่อให้มีการเปลี่ยนสีเรียบ Smooth */
        }

        .detail-link:hover {
            color: #E49900;
            /* สีข้อความเมื่อเม้าส์ hover */
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-md-auto gap-2">
                    <li class="nav-item rounded">
                        <a class="nav-link active" aria-current="page" href="{{route('formcer')}}"><i
                                class="bi bi-house-fill me-2"></i>+ขอใบอนุมัติเดินทาง</a>
                    </li>
                    <li class="nav-item rounded">
                        <a class="nav-link" href="#"><i class="bi bi-people-fill me-2"></i>About</a>
                    </li>
                    <li class="nav-item rounded">
                        <a class="nav-link" href="#"><i class="bi bi-telephone-fill me-2"></i>Contact</a>
                    </li>
                    <li class="nav-item dropdown rounded">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false"><i
                                class="bi bi-person-fill me-2"></i>Profile</a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Account</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            {{-- <li><a class="dropdown-item" href="#">Logout</a></li> --}}




                            {{-- ออกจากระบบ --}}
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                                    

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


 




มไทดำๆไนรเเเเเเเเเเเเ





</body>

</html>
