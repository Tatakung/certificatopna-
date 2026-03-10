<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เข้าสู่ระบบ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;600&display=swap');
        
        body {
            background-image: url('/images/background.jpg');
            background-size: cover;
 
             height: 100vh;
            font-family: 'Prompt', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            background-color: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px;
            max-width: 400px;
            width: 90%;
            transition: all 0.3s ease;
        }
        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-header h2 {
            color: #333;
            font-weight: 600;
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .login-header p {
            color: #666;
            font-size: 0.9rem;
        }
        .form-control {
            border: none;
            border-bottom: 2px solid #E49900;
            border-radius: 0;
            padding: 12px 5px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background-color: transparent;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #127A0E;
        }
        .input-group-text {
            background-color: transparent;
            border: none;
            color: #E49900;
            font-size: 1.2rem;
        }
        .btn-login {
            background: linear-gradient(135deg, #E49900 0%, #FFC107 100%);
            border: none;
            border-radius: 30px;
            padding: 12px;
            font-weight: 600;
            font-size: 1rem;
            letter-spacing: 1px;
            transition: all 0.3s ease;
            margin-top: 20px;
        }
        .btn-login:hover {
            background: linear-gradient(135deg, #FFC107 0%, #E49900 100%);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(228, 153, 0, 0.4);
        }
        .modal-content {
            border-radius: 20px;
            border: none;
        }
        .modal-body {
            padding: 30px;
            text-align: center;
        }
        .modal-body img {
            width: 60px;
            height: 60px;
            margin-bottom: 20px;
        }
        .modal-body p {
            color: #333;
            font-size: 1rem;
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h2>ยินดีต้อนรับ</h2>
            <p>กรุณาเข้าสู่ระบบเพื่อดำเนินการต่อ</p>
        </div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input id="numberid" type="number" class="form-control" name="numberid" placeholder="เลขประจำตัว" required autocomplete="numberid" autofocus>
                </div>
            </div>
            <div class="mb-4">
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="รหัสผ่าน" required autocomplete="current-password">
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-login">เข้าสู่ระบบ</button>
            </div>
        </form>
    </div>

    <!-- Modal แสดงข้อความผิดพลาด -->
    <div class="modal fade" id="showerror" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <img src="{{ asset('images/exclamation.png') }}" alt="Error">
                    <p>ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง โปรดตรวจสอบ</p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        @if (session('error'))
            $(document).ready(function() {
                setTimeout(function() {
                    $('#showerror').modal('show');
                    setTimeout(function() {
                        $('#showerror').modal('hide');
                    }, 3000);
                }, 500);
            });
        @endif
    </script>
</body>
</html>