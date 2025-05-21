<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #3B82F6;
            --primary-hover: #2563EB;
            --secondary-color: #6366F1;
            --accent-color: #8B5CF6;
            --text-color: #1F2937;
            --light-text: #6B7280;
            --light-bg: #F9FAFB;
            --success-color: #10B981;
            --card-bg: rgba(255, 255, 255, 0.95);
        }
        
        body {
            background: url('https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
            position: relative;
        }
        
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(37, 99, 235, 0.6);
            z-index: -1;
        }
        
        .login-container {
            width: 100%;
            max-width: 450px;
            padding: 0 20px;
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .login-card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            padding: 2.5rem;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .login-card::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(
                to bottom right,
                rgba(255, 255, 255, 0.1),
                rgba(255, 255, 255, 0)
            );
            transform: rotate(30deg);
            pointer-events: none;
        }
        
        .login-logo {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .login-logo i {
            font-size: 3.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
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
        }
        
        .form-floating > label {
            color: var(--light-text);
            font-weight: 400;
        }
        
        .form-control {
            border-radius: 8px;
            padding: 1rem 1.25rem;
            border: 1px solid #E5E7EB;
            background: #F9FAFB;
            transition: all 0.3s ease;
            font-size: 0.95rem;
            height: calc(3.5rem + 2px);
        }
        
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(59, 130, 246, 0.25);
            background: white;
        }
        
        .form-control:focus + label {
            color: var(--primary-color);
        }
        
        .btn-login {
            background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
            border: none;
            border-radius: 8px;
            padding: 1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            font-size: 1rem;
            letter-spacing: 1px;
            color: white;
            margin-top: 1rem;
        }
        
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 130, 246, 0.3);
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
        }
        
        .register-link a:hover {
            color: var(--accent-color);
            text-decoration: underline;
        }
        
        .alert {
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: none;
        }
        
        .password-toggle {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: var(--light-text);
            z-index: 5;
            background: white;
            padding: 0 5px;
            border-radius: 50%;
        }
        
        .password-toggle:hover {
            color: var(--primary-color);
        }
        
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }
        
        .floating-element {
            position: absolute;
            opacity: 0.1;
            animation: float 15s infinite linear;
        }
        
        .element-1 {
            width: 100px;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%233B82F6"><path d="M12 2L2 7v10l10 5 10-5V7L12 2z"/></svg>') no-repeat;
            top: 10%;
            left: -30px;
            animation-delay: 0s;
        }
        
        .element-2 {
            width: 150px;
            height: 150px;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="%238B5CF6"><path d="M12 2L4 12l8 10 8-10z"/></svg>') no-repeat;
            bottom: -50px;
            right: -50px;
            animation-delay: 3s;
        }
        
        @keyframes float {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(180deg); }
            100% { transform: translateY(0) rotate(360deg); }
        }
        
        .invalid-feedback {
            color: #EF4444;
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }
        
        @media (max-width: 576px) {
            .login-card {
                padding: 2rem 1.5rem;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(5px);
            background: rgba(255, 255, 255, 0.9);
            margin: 0 15px;
            width: calc(100% - 30px);
            max-width: none;
        }
            
            .login-logo h2 {
                font-size: 1.5rem;
            }
            
            .btn-login {
                padding: 0.9rem;
            }
            
            .login-logo i {
                font-size: 3rem;
            }
        }
    </style>
</head>
<body>
    <div class="floating-elements">
        <div class="floating-element element-1"></div>
        <div class="floating-element element-2"></div>
    </div>

    <div class="login-container">
        <div class="login-card">
            <div class="login-logo">
                <i class="bi bi-award"></i>
                <h2>Login Admin</h2>
            </div>

            <p class="login-subtitle">Login untuk masuk ke sistem</p>

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
            const formElements = document.querySelectorAll('.form-control, .btn-login');
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