<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sistem Rekomendasi Wisata</title>
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
        
        .login-container {
            width: 100%;
            max-width: 480px;
            padding: 0 20px;
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .login-card {
            background-color: white;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            padding: 2.5rem 2.5rem 2rem;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: none;
        }
        
        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        }
        
        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 6px;
            background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
            transition: height 0.3s ease;
        }
        
        .login-card:hover::before {
            height: 8px;
        }
        
        .login-logo {
            text-align: center;
            margin-bottom: 1.5rem;
            transition: transform 0.3s ease;
        }
        
        .login-card:hover .login-logo {
            transform: scale(1.02);
        }
        
        .login-logo i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 0.75rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
        }
        
        .login-logo h2 {
            font-weight: 700;
            color: var(--text-color);
            margin: 0;
            font-size: 1.8rem;
            letter-spacing: -0.5px;
        }
        
        .login-subtitle {
            text-align: center;
            color: var(--light-text);
            margin-bottom: 2rem;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }
        
        .login-card:hover .login-subtitle {
            color: var(--text-color);
        }
        
        .form-floating > label {
            color: var(--light-text);
            font-weight: 400;
            transition: all 0.3s ease;
        }
        
        .form-control {
            border-radius: 10px;
            padding: 1rem 1.25rem;
            border: 1.5px solid #e2e8f0;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            height: calc(3.5rem + 2px);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.15);
            transform: translateY(-1px);
        }
        
        .form-control:focus + label {
            color: var(--primary-color);
            transform: scale(0.85) translateY(-0.5rem) translateX(0.15rem);
        }
        
        .btn-login {
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
        
        .btn-login:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 7px 20px rgba(67, 97, 238, 0.3);
        }
        
        .register-link {
            text-align: center;
            margin-top: 2rem;
            font-size: 0.95rem;
            color: var(--light-text);
        }
        
        .register-link a {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            position: relative;
        }
        
        .register-link a:hover {
            color: var(--accent-color);
        }
        
        .register-link a::after {
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
        
        .register-link a:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }
        
        .alert {
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border: none;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            animation: fadeInDown 0.5s ease-out;
        }
        
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
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
        
        .forgot-password {
            text-align: right;
            margin-top: 0.5rem;
        }
        
        .forgot-password a {
            color: var(--light-text);
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.2s;
        }
        
        .forgot-password a:hover {
            color: var(--primary-color);
            text-decoration: underline;
        }
        
        @media (max-width: 576px) {
            .login-card {
                padding: 2rem 1.5rem;
            }
            
            .login-logo h2 {
                font-size: 1.5rem;
            }
            
            .btn-login {
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

    <div class="login-container">
        <div class="login-card">
            <div class="login-logo">
                <i class="bi bi-geo-alt-fill"></i>
                <h2>Selamat Datang Kembali!</h2>
            </div>

            <p class="login-subtitle">Masuk untuk menemukan rekomendasi wisata terbaik</p>

            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('status') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form action="{{ route('loginproccess') }}" method="POST">
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                           placeholder="Email" value="{{ old('email') }}" required>
                    <label for="email">Alamat Email</label>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-floating mb-3 position-relative">
                    <input type="password" name="password" id="password" 
                           class="form-control @error('password') is-invalid @enderror" 
                           placeholder="Password" required>
                    <label for="password">Password</label>
                    <i class="bi bi-eye-slash password-toggle" id="togglePassword"></i>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary btn-login">
                        <i class="bi bi-box-arrow-in-right me-2"></i> Masuk
                    </button>
                </div>

                <div class="register-link">
                    Belum punya akun? <a href="{{ route('auth.register') }}">Daftar sekarang</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Password toggle functionality
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        
        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('bi-eye');
            this.classList.toggle('bi-eye-slash');
        });
        
        // Add animation to form elements when page loads
        document.addEventListener('DOMContentLoaded', function() {
            const formElements = document.querySelectorAll('.form-control, .btn-login, .social-btn');
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