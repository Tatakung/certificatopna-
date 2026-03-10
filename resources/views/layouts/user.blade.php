<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />






    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="main.css">



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

    <style>
        body {
            font-family: Montserrat, sans-serif;
        }

        .navbar-brand {
            /* background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjxzdmcgZGF0YS1uYW1lPSJMYXllciAxIiBpZD0iTGF5ZXJfMSIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHBhdGggZmlsbD0id2hpdGUiIGQ9Ik01MDQuMzMsNDQ5Yy0xLjc3LTYuOC00NC43My0xNjcuNTItMTY0LjIxLTIzMi45MS00NC42NS0yNC40My05Ni4yLTQxLjQ1LTE0Ni01Ny45MUMxMTUsMTMyLjA4LDQwLjI5LDEwNy40MiwyNiw1OS42NWE2LjIyLDYuMjIsMCwwLDAtMTIsLjI0Yy0uOSwzLjUtMjEuNTMsODYuMzgsMTUuNjUsMTM3Ljk0LDE2LjgsMjMuMjksNDIuNjYsMzYuMzMsNzYuODUsMzguNzUsMi44OC4yLDUuNjEuNDIsOC40NC42Myw0LjE1LDE1LjE2LDIyLjE0LDYwLjYzLDg5LjYxLDY2LDEyLjI1LDEsMjQuMTcsMi4yNSwzNS45LDMuNjUsNC45MiwxNC4xNiwyNi44NCw1Ny42LDExNCw3My4wNyw2Mi43OCwxMS4xNCwxMTQsMzEuMTgsMTMxLjIxLDUxLjI1LDQuMzksMTIuNjgsNi41MywyMC42Miw2LjYzLDIxYTYuMiw2LjIsMCwwLDAsNiw0LjY1LDYuNTYsNi41NiwwLDAsMCwxLjU3LS4yQTYuMjMsNi4yMywwLDAsMCw1MDQuMzMsNDQ5Wk0zOS43NCwxOTAuNThDMTYsMTU3LjczLDE4Ljc1LDEwOC41MiwyMi41NSw4MS44M2MyNi4wNyw0MS40Myw5Mi4zNCw2My4zMSwxNjcuNjIsODguMTYsNDkuMzIsMTYuMjksMTAwLjMzLDMzLjEzLDE0NCw1NywzMS40NiwxNy4yMSw1Ny41Myw0MS44LDc4LjgsNjguNDRDMzcyLDI2OS4zOCwzMDUuNTgsMjM4LjIyLDEwNy4zNSwyMjQuMTgsNzcsMjIyLDU0LjI4LDIxMC43MywzOS43NCwxOTAuNThabTg4LjM2LDQ3LjY0YzIwMi4zOCwxNi40MiwyNTQuMzYsNTEuNDYsMjkyLjY0LDc3LjI4LDQuMzYsMi45NSw4LjU4LDUuOCwxMi44NCw4LjUxLDUuMDksNy43Nyw5LjgxLDE1LjU1LDE0LjE4LDIzLjIyLTM4LjM3LTE5Ljc4LTExNS42OS00MS40Mi0yMDEuMTktNTIuMTUtLjE0LDAtLjI5LDAtLjQ0LS4wNi0xMy4zOS0xLjY3LTI2Ljk0LTMuMTMtNDAuNjEtNC4yMkMxNTAuNDksMjg2LjQzLDEzMy4yMSwyNTMuNTMsMTI4LjEsMjM4LjIyWk0zNTYuNjMsMzY3LjY4Yy03MC44My0xMi41Ny05NC41MS00My43OS0xMDItNTkuMTEsMTEwLjI0LDE0Ljg3LDE5Mi43Nyw0Ni4yNywyMDUuNjEsNjIsNi43NSwxMy41NSwxMi4yOSwyNi4yNSwxNi44MSwzNy41QzQ1MS4xLDM5MS40OSw0MDcuOTQsMzc2Ljc4LDM1Ni42MywzNjcuNjhaIi8+PC9zdmc+"); */
            background-image: url("{{ asset('images/logo.png') }}");

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
            background-color: #34a04b !important;
        }

        /* Navbar Styles */
        .navbar {
            background-color: #127A0E;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 0.5rem 1rem;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #ffffff;
        }

        .navbar-nav .nav-item {
            margin: 0 5px;
        }

        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link:focus {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .navbar-nav .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
        }

        .navbar-toggler {
            border: none;
            padding: 0.25rem 0.75rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba(255, 255, 255, 0.85)' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Dropdown Styles */
        .dropdown-menu {
            background-color: #ffffff;
            border: none;
            border-radius: 8px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .dropdown-item {
            color: #333;
            font-weight: 500;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s ease;
        }

        .dropdown-item:hover,
        .dropdown-item:focus {
            background-color: #f8f9fa;
            color: #127A0E;
        }

        .dropdown-divider {
            border-top-color: #e9ecef;
        }

        /* User Info Style */
        .navbar-nav .nav-item p.nav-link {
            margin-bottom: 0;
            color: #ffffff;
            font-weight: 600;
        }

        /* Responsive adjustments */
        @media (max-width: 991px) {
            .navbar-nav {
                padding-top: 1rem;
            }

            .navbar-nav .nav-item {
                margin: 5px 0;
            }
        }
    </style>
</head>

<body>

    @if (Auth::user() && Auth::user()->is_admin == 1)
        {{-- ทำอะไรสักอย่าง ถ้าผู้ใช้เป็น admin (is_admin == 1) --}}
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <p class="nav-link">
                            <i class="bi bi-person-circle me-2"></i>คุณคือ : Admin
                        </p>
                    </li>
                </ul>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-md-auto gap-2">
                        <li class="nav-item rounded">
                            <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}"><i
                                    class="bi bi-house-fill me-2"></i>หน้าแรก</a>
                        </li>
                        <li class="nav-item rounded">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('register') }}"><i></i>เพิ่มรายชื่อพนักงาน</a>
                        </li>
                        {{-- <li class="nav-item rounded">
                            <a class="nav-link" href="{{route('formcer')}}"><i class="bi bi-people-fill me-2"></i>ขอใบอนุมัติเดินทาง</a>
                        </li> --}}
                        {{-- <li class="nav-item rounded">
                            <a class="nav-link" href="#"><i class="bi bi-telephone-fill me-2"></i>Contact</a>
                        </li> --}}
                        <li class="nav-item dropdown rounded">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-fill me-2"></i>Profile
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right me-2"></i>{{ __('Logout') }}
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @elseif(Auth::user() && Auth::user()->is_admin == 0)
        {{-- ทำอะไรสักอย่าง ถ้าผู้ใช้ไม่ใช่ admin (is_admin == 0) --}}
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <p class="nav-link" style="margin-bottom: 0; color: #ffffff;">
                            {{ Auth::user()->prefix }}{{ Auth::user()->name }} {{ Auth::user()->lname }}
                            รหัสประจำตัวพนักงาน: {{ Auth::user()->numberid }}</p>
                    </li>
                </ul>


                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-md-auto gap-2">
                        <li class="nav-item rounded">
                            <a class="nav-link active" aria-current="page" href="{{ route('homepage') }}"><i
                                    class="bi bi-house-fill me-2"></i>หน้าแรก</a>
                        </li>
                        <li class="nav-item rounded">
                            <a class="nav-link active" aria-current="page"
                                href="{{ route('formcer') }}"><i></i>ขอใบอนุมัติเดินทาง</a>
                        </li>
                        {{-- <li class="nav-item rounded">
                            <a class="nav-link" href="{{route('formcer')}}"><i class="bi bi-people-fill me-2"></i>ขอใบอนุมัติเดินทาง</a>
                        </li> --}}
                        {{-- <li class="nav-item rounded">
                            <a class="nav-link" href="#"><i class="bi bi-telephone-fill me-2"></i>Contact</a>
                        </li> --}}
                        <li class="nav-item dropdown rounded">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false"><i></i>Profile</a>
                            {{-- class="bi bi-person-fill me-2" --}}
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- <li><a class="dropdown-item" href="#">Account</a></li> --}}
                                {{-- <li><a class="dropdown-item" href="#">Another action</a></li> --}}
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @endif





    @yield('content')

</body>

</html>
