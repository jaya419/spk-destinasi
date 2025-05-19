<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SPK Destinasi Wisata</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <!-- Animate.css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    :root {
      --primary-color: #4361ee;
      --secondary-color: #3f37c9;
      --accent-color: #4cc9f0;
      --light-color: #f8f9fa;
      --dark-color: #212529;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f7fa;
      color: var(--dark-color);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    
    .navbar-custom {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      letter-spacing: 0.5px;
    }
    
    .nav-link {
      font-weight: 500;
      padding: 0.5rem 1rem;
      margin: 0 0.25rem;
      transition: all 0.3s ease;
      position: relative;
    }
    
    .nav-link.active, .nav-link:hover {
      color: #fff !important;
      background-color: rgba(255, 255, 255, 0.15);
      border-radius: 8px;
    }
    
    .nav-link.active:after {
      content: '';
      position: absolute;
      bottom: -8px;
      left: 50%;
      transform: translateX(-50%);
      width: 6px;
      height: 6px;
      background-color: var(--accent-color);
      border-radius: 50%;
    }
    
    .container {
      flex: 1;
    }
    
    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      margin-bottom: 1.5rem;
    }
    
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 20px rgba(0, 0, 0, 0.1);
    }
    
    .card-header {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      border-radius: 12px 12px 0 0 !important;
      padding: 1rem 1.5rem;
      font-weight: 600;
    }
    
    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
      padding: 0.5rem 1.5rem;
      font-weight: 500;
      letter-spacing: 0.5px;
    }
    
    .btn-primary:hover {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
      transform: translateY(-2px);
    }
    
    .table {
      border-radius: 8px;
      overflow: hidden;
    }
    
    .table thead th {
      background-color: var(--primary-color);
      color: white;
      font-weight: 500;
    }
    
    footer {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: white;
      padding: 1.5rem 0;
      margin-top: 3rem;
    }
    
    .footer-links a {
      color: rgba(255, 255, 255, 0.8);
      margin: 0 1rem;
      text-decoration: none;
      transition: color 0.3s ease;
    }
    
    .footer-links a:hover {
      color: white;
    }
    
    .social-icons a {
      color: white;
      font-size: 1.25rem;
      margin: 0 0.5rem;
      transition: transform 0.3s ease;
    }
    
    .social-icons a:hover {
      transform: translateY(-3px);
    }
    
    /* Animation classes */
    .fade-in {
      animation: fadeIn 0.5s ease-in;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .navbar-brand {
        font-size: 1.25rem;
      }
      
      .nav-link {
        margin: 0.25rem 0;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand fw-semibold" href="{{ route('dashboard.index') }}">
      <i class="fas fa-map-marked-alt"></i> <span class="ms-1">SPK Wisata</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard.index') }}">
            <i class="fas fa-home"></i> <span class="d-lg-inline d-none">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('criteria.*') ? 'active' : '' }}" href="{{ route('criteria.index') }}">
            <i class="fas fa-sliders-h"></i> <span class="d-lg-inline d-none">Kriteria</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('destinations.*') ? 'active' : '' }}" href="{{ route('destinations.index') }}">
            <i class="fas fa-map"></i> <span class="d-lg-inline d-none">Destinasi</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('recomendasi.index') ? 'active' : '' }}" href="{{ route('recomendasi.index') }}">
            <i class="fas fa-star"></i> <span class="d-lg-inline d-none">Rekomendasi</span>
          </a>
        </li>

        <!-- User dropdown -->
<li class="nav-item dropdown ms-lg-2">
  <a class="nav-link dropdown-toggle d-flex align-items-center py-1 px-2" href="#" id="navbarDropdown" role="button" 
    data-bs-toggle="dropdown" aria-expanded="false">
    <i class="fas fa-user-circle fs-4 me-1"></i>
    <span class="d-lg-inline d-none"></span>
  </a>
  <ul class="dropdown-menu dropdown-menu-end mt-2" aria-labelledby="navbarDropdown" style="background-color: rgba(255, 255, 255, 0.8); backdrop-filter: blur(5px); border: 1px solid rgba(0,0,0,0.1); min-width: 160px;">
    <li>
      <form action="{{ route('logout') }}" method="POST" class="dropdown-item p-0">
        @csrf
        <button type="submit" class="btn btn-link text-dark w-100 text-start px- py-2 d-flex align-items-center">
          <i class="bi bi-box-arrow-right me-2 text-danger"></i>
          <span>Logout</span>
        </button>
      </form>
    </li>
  </ul>
</li>
    </div>
  </div>
</nav>


  <!-- Main Content -->
  <div class="container py-4 animate__animated animate__fadeIn">
    <!-- Breadcrumb -->
<nav aria-label="breadcrumb" class="mb-4">
    <ol class="breadcrumb bg-white p-3 rounded shadow-sm">
        <li class="breadcrumb-item">
            <a href="{{ route('dashboard.index') }}"><i class="fas fa-home"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            @yield('title', 'Dashboard')
        </li>
    </ol>
</nav>

    
    <!-- Flash Messages -->
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif
    
    <!-- Content -->
    <div class="card shadow-sm fade-in">
      <div class="card-body p-4">
        @yield('content')
      </div>
    </div>
  </div>

  <!-- Footer -->
  <footer class="mt-auto">
    <div class="container">
      <div class="row">
        <div class="col-md-6 text-center text-md-start">
          <p class="mb-0">&copy; 2023 SPK Destinasi Wisata. All rights reserved.</p>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <div class="footer-links d-inline-block">
            <a href="#">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms</a>
          </div>
          <div class="social-icons d-inline-block ms-md-3">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  
  <!-- Custom JS -->
  <script>
    // Add active class to current nav item
    document.addEventListener('DOMContentLoaded', function() {
      const navLinks = document.querySelectorAll('.nav-link');
      const currentUrl = window.location.pathname;
      
      navLinks.forEach(link => {
        if (link.getAttribute('href') === currentUrl) {
          link.classList.add('active');
        }
      });
      
      // Animate cards on scroll
      const animateOnScroll = function() {
        const cards = document.querySelectorAll('.card');
        
        cards.forEach(card => {
          const cardPosition = card.getBoundingClientRect().top;
          const screenPosition = window.innerHeight / 1.3;
          
          if (cardPosition < screenPosition) {
            card.classList.add('animate__animated', 'animate__fadeInUp');
          }
        });
      };
      
      window.addEventListener('scroll', animateOnScroll);
      animateOnScroll(); // Run once on page load
    });
  </script>
</body>
</html>