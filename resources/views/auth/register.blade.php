<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register | Sistem Rekomendasi Wisata</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4361ee;
            --primary-hover: #3a56d4;
            --secondary-color: #4895ef;
            --accent-color: #3f37c9;
            --text-color: #2b2d42;
            --light-text: #8d99ae;
            --light-bg: #f8f9fa;
            --success-color: #4cc9f0;
        }
        
        body {
            background: linear-gradient(135deg, #f0f9ff, #e0f2fe);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            animation: gradientShift 12s ease infinite;
            background-size: 200% 200%;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .register-container {
            width: 100%;
            max-width: 480px;
            padding: 0 20px;
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .register-card {
            background-color: white;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            padding: 2.5rem 2.5rem 2rem;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }
        
        .register-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }
        
        .register-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transition: height 0.3s ease;
        }
        
        .register-card:hover::before {
            height: 8px;
        }
        
        .register-logo {
            text-align: center;
            margin-bottom: 2rem;
            transition: transform 0.3s ease;
        }
        
        .register-card:hover .register-logo {
            transform: scale(1.02);
        }
        
        .register-logo i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 0.75rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        
        .register-logo h2 {
            font-weight: 700;
            color: var(--text-color);
            margin: 0;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
        }
        
        .register-logo p {
            color: var(--light-text);
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }
        
        .form-label {
            font-weight: 500;
            color: var(--text-color);
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
        }
        
        .form-label .required {
            color: #e63946;
            margin-left: 4px;
            font-size: 0.8rem;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 0.85rem 1.25rem;
            border: 1.5px solid #e2e8f0;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
            transform: translateY(-1px);
        }
        
        .input-group-text {
            background-color: var(--light-bg);
            border: 1.5px solid #e2e8f0;
            border-right: none;
            border-radius: 10px 0 0 10px !important;
        }
        
        .btn-register {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            border-radius: 10px;
            padding: 0.9rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            background-size: 200% auto;
            box-shadow: 0 4px 15px rgba(67, 97, 238, 0.2);
        }
        
        .btn-register:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(67, 97, 238, 0.3);
        }
        
        .login-link {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.95rem;
            color: var(--light-text);
        }
        
        .login-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .login-link a:hover {
            color: var(--accent-color);
        }
        
        .login-link a::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: -2px;
            left: 0;
            background-color: var(--primary-color);
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.3s ease;
        }
        
        .login-link a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }
        
        .invalid-feedback {
            font-size: 0.85rem;
            animation: shake 0.4s ease;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            20%, 60% { transform: translateX(-5px); }
            40%, 80% { transform: translateX(5px); }
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--light-text);
            z-index: 5;
            transition: color 0.2s;
            background: white;
            padding: 0 5px;
            border-radius: 50%;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .password-strength {
            height: 4px;
            background-color: #e2e8f0;
            border-radius: 2px;
            margin-top: 8px;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .password-strength-bar {
            height: 100%;
            width: 0;
            transition: width 0.4s ease, background-color 0.4s ease;
        }
        
        .password-hints {
            font-size: 0.8rem;
            color: var(--light-text);
            margin-top: 8px;
        }
        
        .password-hint {
            display: flex;
            align-items: center;
            margin-bottom: 4px;
            transition: color 0.3s ease;
        }
        
        .password-hint i {
            margin-right: 6px;
            font-size: 0.7rem;
        }
        
        .password-hint.valid {
            color: var(--success-color);
        }
        
        .divider {
            display: flex;
            align-items: center;
            margin: 1.5rem 0;
            color: var(--light-text);
            font-size: 0.9rem;
        }
        
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #e2e8f0;
            margin: 0 10px;
        }
        
        .social-login {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 1.5rem;
        }
        
        .social-btn {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e2e8f0;
            background: white;
            color: var(--text-color);
            transition: all 0.3s ease;
            font-size: 1.2rem;
        }
        
        .social-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .social-btn.google { color: #DB4437; }
        .social-btn.facebook { color: #4267B2; }
        .social-btn.twitter { color: #1DA1F2; }
        
        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .shape {
            position: absolute;
            opacity: 0.15;
            border-radius: 50%;
            animation: float 15s infinite linear;
        }
        
        .shape-1 {
            width: 100px;
            height: 100px;
            background: var(--primary-color);
            top: 10%;
            left: -30px;
            animation-delay: 0s;
        }
        
        .shape-2 {
            width: 150px;
            height: 150px;
            background: var(--secondary-color);
            bottom: -50px;
            right: -50px;
            animation-delay: 3s;
        }
        
        .shape-3 {
            width: 70px;
            height: 70px;
            background: var(--accent-color);
            top: 50%;
            right: 20%;
            animation-delay: 6s;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
            100% { transform: translateY(0) rotate(360deg); }
        }
        
        @media (max-width: 576px) {
            .register-card {
                padding: 2rem 1.5rem;
            }
            
            .register-logo h2 {
                font-size: 1.5rem;
            }
            
            .btn-register {
                padding: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
    </div>

    <div class="register-container">
        <div class="register-card">
            <div class="register-logo">
                <i class="bi bi-geo-alt-fill"></i>
                <h2>Daftar Akun</h2>
                <p>Mulai petualangan wisata Anda</p>
            </div>

            <form action="{{ route('register.process') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">
                        Nama Lengkap <span class="required">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                               value="{{ old('name') }}" placeholder="Masukkan nama lengkap" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">
                        Email <span class="required">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="contoh@email.com" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 position-relative">
                    <label for="password" class="form-label">
                        Password <span class="required">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" id="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               placeholder="Masukan password" required>
                        <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="password-strength">
                        <div class="password-strength-bar" id="passwordStrengthBar"></div>
                    </div>
                </div>

                <div class="mb-4 position-relative">
                    <label for="password_confirmation" class="form-label">
                        Konfirmasi Password <span class="required">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                        <input type="password" name="password_confirmation" id="password_confirmation" 
                               class="form-control" placeholder="Ketik ulang password" required>
                        <i class="bi bi-eye-slash password-toggle" id="toggleConfirmPassword"></i>
                    </div>
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-register">
                        <i class="bi bi-person-plus me-2"></i> Daftar Sekarang
                    </button>
                </div>

                <div class="login-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password toggle functionality
        function setupPasswordToggle(passwordId, toggleId) {
            const toggle = document.querySelector(toggleId);
            const password = document.querySelector(passwordId);
            
            toggle.addEventListener('click', function() {
                const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
                password.setAttribute('type', type);
                this.classList.toggle('bi-eye');
                this.classList.toggle('bi-eye-slash');
            });
        }
        
        setupPasswordToggle('#password', '#togglePassword');
        setupPasswordToggle('#password_confirmation', '#toggleConfirmPassword');
        
        // Password strength checker
        const passwordInput = document.getElementById('password');
        const strengthBar = document.getElementById('passwordStrengthBar');
        const hints = {
            length: document.getElementById('hintLength'),
            upper: document.getElementById('hintUpper'),
            number: document.getElementById('hintNumber'),
            special: document.getElementById('hintSpecial')
        };
        
        passwordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            // Check password length
            if (password.length >= 8) {
                strength += 25;
                hints.length.classList.add('valid');
                hints.length.innerHTML = '<i class="bi bi-check-circle"></i> Minimal 8 karakter';
            } else {
                hints.length.classList.remove('valid');
                hints.length.innerHTML = '<i class="bi bi-dash-circle"></i> Minimal 8 karakter';
            }
            
            // Check for uppercase letters
            if (/[A-Z]/.test(password)) {
                strength += 25;
                hints.upper.classList.add('valid');
                hints.upper.innerHTML = '<i class="bi bi-check-circle"></i> Huruf besar';
            } else {
                hints.upper.classList.remove('valid');
                hints.upper.innerHTML = '<i class="bi bi-dash-circle"></i> Huruf besar';
            }
            
            // Check for numbers
            if (/[0-9]/.test(password)) {
                strength += 25;
                hints.number.classList.add('valid');
                hints.number.innerHTML = '<i class="bi bi-check-circle"></i> Angka';
            } else {
                hints.number.classList.remove('valid');
                hints.number.innerHTML = '<i class="bi bi-dash-circle"></i> Angka';
            }
            
            // Check for special characters
            if (/[^A-Za-z0-9]/.test(password)) {
                strength += 25;
                hints.special.classList.add('valid');
                hints.special.innerHTML = '<i class="bi bi-check-circle"></i> Karakter khusus';
            } else {
                hints.special.classList.remove('valid');
                hints.special.innerHTML = '<i class="bi bi-dash-circle"></i> Karakter khusus';
            }
            
            // Update strength bar
            strengthBar.style.width = strength + '%';
            
            // Change color based on strength
            if (strength < 50) {
                strengthBar.style.backgroundColor = '#e63946';
            } else if (strength < 75) {
                strengthBar.style.backgroundColor = '#f4a261';
            } else {
                strengthBar.style.backgroundColor = '#2a9d8f';
            }
        });
        
        // Add animation to form elements when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const formElements = document.querySelectorAll('.form-control, .btn-register, .social-btn');
            formElements.forEach((el, index) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(20px)';
                el.style.animation = `fadeInUp 0.5s ease-out ${index * 0.1}s forwards`;
            });
            
            // Add keyframes dynamically
            const style = document.createElement('style');
            style.textContent = `
                @keyframes fadeInUp {
                    from { opacity: 0; transform: translateY(20px); }
                    to { opacity: 1; transform: translateY(0); }
                }
            `;
            document.head.appendChild(style);
        });
    </script>
</body>
</html>