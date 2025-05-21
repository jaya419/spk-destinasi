<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Dashboard')</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <style>
    :root {
      --primary-color: #3498db;     /* Biru Cerah */
      --secondary-color: #2ecc71;   /* Hijau */
      --accent-color: #f1c40f;      /* Kuning */
      --light-color: #ecf0f1;
      --dark-color: #34495e;        /* Abu Kebiruan */
    }

    body {
      font-family: "Poppins", sans-serif;
      background-color: var(--light-color);
      color: var(--dark-color);
      min-height: 100vh;
    }

    .sidebar {
      width: 250px;
      background-color: var(--dark-color);
      position: fixed;
      top: 0;
      bottom: 0;
      left: 0;
      padding: 1rem;
      color: white;
      z-index: 1000;
    }

    .sidebar .brand {
      font-size: 1.5rem;
      font-weight: 700;
      margin-bottom: 2rem;
      display: flex;
      align-items: center;
    }

    .sidebar .nav-link {
      color: rgba(255, 255, 255, 0.8);
      font-weight: 500;
      margin-bottom: 0.5rem;
      display: flex;
      align-items: center;
      padding: 0.5rem 1rem;
      border-radius: 8px;
      transition: 0.3s;
    }

    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background-color: var(--primary-color);
      color: #fff;
    }

    .sidebar .nav-link i {
      margin-right: 0.75rem;
    }

    .content-wrapper {
      margin-left: 250px;
      padding: 2rem;
    }

    .card {
      border: none;
      border-radius: 12px;
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.05);
    }

    .card-header {
      background-color: var(--primary-color);
      color: white;
      border-radius: 12px 12px 0 0 !important;
      padding: 1rem 1.5rem;
      font-weight: 600;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-primary:hover {
        background-color: #2980b9;
        border-color: #2980b9;
    }

    .breadcrumb-item a {
      color: var(--secondary-color);
    }

    .breadcrumb-item.active {
      color: var(--primary-color);
    }

    .dropdown-toggle {
      color: var(--primary-color);
    }

    .alert-success {
      background-color: var(--secondary-color);
      border-color: var(--secondary-color);
      color: #fff;
    }

    .alert-danger {
      background-color: #e74c3c;
      border-color: #e74c3c;
      color: #fff;
    }

    .btn-close {
      filter: invert(1);
    }

    footer {
      background-color: var(--dark-color);
      color: white;
      text-align: center;
      padding: 1.5rem 0;
      margin-top: 2rem;
    }

    .footer-links a {
      color: rgba(255, 255, 255, 0.8);
      margin: 0 1rem;
      text-decoration: none;
    }

    .footer-links a:hover {
      color: white;
    }

    .social-icons a {
      color: white;
      font-size: 1.25rem;
      margin: 0 0.5rem;
    }

    .brand {
      font-size: 1rem;
      letter-spacing: 1px;
      text-transform: uppercase;
      color: #fff;
    }

    .brand .brand-text {
      font-size: 1.1rem;
      line-height: 1.2;
    }
  </style>
</head>
<body>

  <aside class="sidebar">
    <div class="brand d-flex align-items-center mb-4">
      <i class="fas fa-school fa-2x text-warning me-3"></i>
      <span class="brand-text fw-bold">SMAN 1 PARTENG</span>
    </div>

  <nav class="nav flex-column">
  <a href="{{ route('dashboard.index') }}" class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
    <i class="fas fa-home"></i> Dashboard
  </a>
  <a href="{{ route('criteria.index') }}" class="nav-link {{ request()->routeIs('criteria.*') ? 'active' : '' }}">
    <i class="fas fa-list-ol"></i> Kriteria
  </a>
  <a href="{{ route('students.index') }}" class="nav-link {{ request()->routeIs('students.*') ? 'active' : '' }}">
    <i class="fas fa-user-graduate"></i> Siswa
  </a>
  <a href="{{ route('penilaian.index') }}" class="nav-link {{ request()->routeIs('penilaian.index') ? 'active' : '' }}">
    <i class="fas fa-chart-bar"></i> Hasil
  </a>
</nav>

  </aside>

  <div class="content-wrapper">
    <nav class="bg-white shadow-sm rounded p-3 mb-4 d-flex justify-content-between align-items-center flex-wrap">
      <ol class="breadcrumb mb-0">
        <li class="breadcrumb-item">
          <a href="{{ route('dashboard.index') }}"><i class="fas fa-home" style="color: #34495e;"></i></a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          @yield("title", "Dashboard")
        </li>
      </ol>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fas fa-user-circle me-2 text-primary fs-5"></i> 
            <span class="fw-semibold">{{ Auth::user()->name ?? 'User' }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userDropdown">
       
            <li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item text-danger">
                  <i class="fas fa-sign-out-alt me-2"></i> Logout
                </button>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </nav>

    @if(session("success"))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="fas fa-check-circle me-2"></i> {{ session("success") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    @if(session("error"))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fas fa-exclamation-circle me-2"></i> {{ session("error") }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    @endif

    <div class="card">
      <div class="card-body">@yield("content")</div>
    </div> <br>

<footer class="footer mt-auto py-3 px-4" style="background-color: #f8f9fa; border-top: 1px solid #dee2e6;">
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
    <div class="mb-2 mb-md-0">
      <span class="text-muted small">&copy; {{ date('Y') }} <strong>SPK Siswa Berprestasi</strong> — SMAN 1 Parteng</span>
    </div>
    <div class="d-flex align-items-center gap-3">
      <a href="#" class="text-muted small text-decoration-none">About</a>
      <a href="#" class="text-muted small text-decoration-none">Help</a>
      <a href="#" class="text-muted small text-decoration-none">Privacy</a>
      <a href="#" class="text-muted fs-5"><i class="fab fa-facebook-f"></i></a>
      <a href="#" class="text-muted fs-5"><i class="fab fa-twitter"></i></a>
      <a href="#" class="text-muted fs-5"><i class="fab fa-instagram"></i></a>
    </div>
  </div>
</footer>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>