<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=2070&q=80') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(37, 99, 235, 0.6);
            z-index: -1;
        }

        .register-card {
            background: rgba(255,255,255,0.95);
            padding: 2rem;
            border-radius: 12px;
            max-width: 800px;
            width: 100%;
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .register-logo {
            text-align: center;
            margin-bottom: 1rem;
        }

        .register-logo i {
            font-size: 3rem;
            color: #3B82F6;
        }

        .register-logo h2 {
            font-weight: 700;
            font-size: 1.8rem;
        }

        .register-subtitle {
            text-align: center;
            color: #6B7280;
            margin-bottom: 1.5rem;
        }

        .form-floating > label {
            color: #6B7280;
        }

        .form-control {
            border-radius: 8px;
            height: calc(3.5rem + 2px);
            padding: 1rem 1.25rem;
            font-size: 0.95rem;
        }

        .form-control:focus {
            border-color: #3B82F6;
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
            background: white;
        }

        .btn-register {
            background: linear-gradient(135deg, #3B82F6, #8B5CF6);
            border: none;
            padding: 1rem;
            border-radius: 8px;
            color: white;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #6B7280;
        }

        .password-strength {
            height: 4px;
            background-color: #E5E7EB;
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.4s ease, background-color 0.4s ease;
        }

        .login-link {
            text-align: center;
            margin-top: 1rem;
            color: #6B7280;
        }

        .login-link a {
            color: #3B82F6;
            font-weight: 600;
            text-decoration: none;
        }

        @media (max-width: 768px) {
            .row.g-3 > .col-md-6 {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="register-card">
    <div class="register-logo">
        <i class="bi bi-award"></i>
        <h2>Sistem Pendukung Keputusan</h2>
    </div>
    <p class="register-subtitle">Buat akun anda untuk masuk ke sistem</p>

    <!-- Form -->
    <form action="{{ route('register.process') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nama Lengkap" required>
                    <label for="name">Nama Lengkap</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-floating">
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                    <label for="email">Alamat Email</label>
                </div>
            </div>
        </div>

        <div class="row g-3 mt-2">
            <div class="col-md-6 position-relative">
                <div class="form-floating">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                    <label for="password">Password</label>
                    <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
                </div>
                <div class="password-strength">
                    <div class="password-strength-bar" id="passwordStrengthBar"></div>
                </div>
            </div>
            <div class="col-md-6 position-relative">
                <div class="form-floating">
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Konfirmasi Password" required>
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <i class="bi bi-eye-slash password-toggle" id="toggleConfirmPassword"></i>
                </div>
            </div>
        </div>

        <div class="d-grid mt-4">
            <button type="submit" class="btn btn-register">
                <i class="bi bi-person-plus me-2"></i> Daftar Sekarang
            </button>
        </div>

        <div class="login-link mt-3">
            Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
        </div>
    </form>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function setupPasswordToggle(passwordId, toggleId) {
        const toggle = document.querySelector(toggleId);
        const password = document.querySelector(passwordId);

        toggle.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
    }

    setupPasswordToggle('#password', '#togglePassword');
    setupPasswordToggle('#password_confirmation', '#toggleConfirmPassword');

    const passwordInput = document.getElementById('password');
    const strengthBar = document.getElementById('passwordStrengthBar');

    passwordInput.addEventListener('input', function () {
        const password = this.value;
        let strength = 0;

        if (password.length >= 8) strength += 25;
        if (/[A-Z]/.test(password)) strength += 25;
        if (/[0-9]/.test(password)) strength += 25;
        if (/[^A-Za-z0-9]/.test(password)) strength += 25;

        strengthBar.style.width = strength + '%';

        if (strength < 50) {
            strengthBar.style.backgroundColor = '#EF4444';
        } else if (strength < 75) {
            strengthBar.style.backgroundColor = '#F59E0B';
        } else {
            strengthBar.style.backgroundColor = '#10B981';
        }
    });
</script>
</body>
</html>
