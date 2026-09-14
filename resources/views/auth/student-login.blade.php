<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login - Hexa's Education</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
            overflow: hidden;
            max-width: 400px;
            width: 100%;
        }

        .login-header {
            background: #2c3e50;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .login-header h1 {
            font-size: 28px;
            margin-bottom: 10px;
        }

        .login-header p {
            font-size: 14px;
            opacity: 0.9;
        }

        .login-body {
            padding: 40px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #555;
            font-weight: 500;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .form-group input:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        .login-btn {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .alert {
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-danger {
            background: #fee;
            color: #c33;
            border: 1px solid #fcc;
        }

        .alert-success {
            background: #efe;
            color: #3c3;
            border: 1px solid #cfc;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 25px;
            border-radius: 12px;
            width: 90%;
            max-width: 450px;
            text-align: left;
            box-shadow: 0 10px 40px rgba(0,0,0,0.2);
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 18px;
        }

        .btn-secondary {
            padding: 10px 18px;
            border: 2px solid #e0e0e0;
            background: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }

        .btn-danger {
            padding: 10px 18px;
            border: none;
            background: #dc3545;
            color: #fff;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Student Login</h1>
            <p>Enter your credentials to access your tests</p>
        </div>
        
        <div class="login-body">
            @if(!empty($error_message))
                <div class="alert alert-danger">
                    {{ $error_message }}
                </div>
            @elseif(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('student.login.submit') }}" method="POST">
                @csrf

                <input type="hidden" name="force_login" id="force_login" value="0">
                
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" 
                           id="username" 
                           name="username" 
                           placeholder="Enter your username"
                           value="{{ $prefill_username ?? old('username') }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           placeholder="Enter your password"
                           value="{{ $prefill_password ?? '' }}"
                           required>
                </div>

                <button type="submit" class="login-btn">Login</button>
            </form>

            <div class="back-link">
                <!-- <a href="/">← Back to Home</a> -->
            </div>
        </div>
    </div>

    <div id="sessionConflictModal" class="modal">
        <div class="modal-content">
            <h3 style="margin-bottom: 10px; color: #2c3e50;">Already Logged In</h3>
            <p style="color: #555; font-size: 14px; line-height: 1.5;">
                This account is already logged in on another PC.
                <br>
                If you press <strong>OK</strong>, this PC will be logged in and the other PC will be logged out.
            </p>

            <div class="modal-actions">
                <button type="button" class="btn-secondary" onclick="closeConflictModal()">Cancel</button>
                <button type="button" class="btn-danger" onclick="confirmForceLogin()">OK</button>
            </div>
        </div>
    </div>

    <script>
        function closeConflictModal() {
            const m = document.getElementById('sessionConflictModal');
            if (m) m.style.display = 'none';
        }

        function confirmForceLogin() {
            const force = document.getElementById('force_login');
            if (force) force.value = '1';
            const form = document.querySelector('form[action="{{ route('student.login.submit') }}"]');
            if (form) form.submit();
        }

        document.addEventListener('DOMContentLoaded', function() {
            const conflict = {{ (!empty($session_conflict)) ? 'true' : 'false' }};
            if (conflict) {
                const m = document.getElementById('sessionConflictModal');
                if (m) m.style.display = 'block';
            }
        });
    </script>
</body>
</html>
