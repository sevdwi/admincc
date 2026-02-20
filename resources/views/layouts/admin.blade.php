<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin ‒ @yield('title')</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <!-- Select2 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

 <style>
    :root {
      --bg-main: #f8fafc;          /* putih lembut */
      --bg-sidebar: #ffffff;
      --bg-header: #ffffff;
      --bg-card: #ffffff;

      --accent-orange: #f97316;    /* orange */
      --accent-green: #22c55e;     /* hijau */
      --accent-orange-soft: #fff7ed;
      --accent-green-soft: #ecfdf5;

      --text-main: #0f172a;
      --text-muted: #64748b;

      --border-soft: #e5e7eb;
      --radius: 14px;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(180deg, #F7DB91, #f8fafc);
      color: var(--text-main);
    }

    /* Sidebar */
    .sidebar {
      background: linear-gradient(180deg, #F2A65A, #f8fafc);
      min-height: 100vh;
      padding: 1.5rem 1rem;
      border-right: 1px solid var(--border-soft);
    }

    .sidebar .nav-link {
      color: var(--text-main);
      padding: .75rem 1rem;
      border-radius: var(--radius);
      margin-bottom: 6px;
      transition: all .25s ease;
      font-weight: 500;
    }

    .sidebar .nav-link:hover {
      background: var(--accent-orange-soft);
      color: var(--accent-orange);
    }

    .sidebar .nav-link.active {
      background: linear-gradient(135deg, var(--accent-orange), var(--accent-green));
      color: #fff;
      box-shadow: 0 6px 18px rgba(249,115,22,.35);
    }

    /* Header */
    .header {
      background: #ffffff;
      border-bottom: 1px solid var(--border-soft);
    }

    /* Card */
    .card {
      background: var(--bg-card);
      border-radius: var(--radius);
      border: 1px solid var(--border-soft);
      box-shadow: 0 10px 25px rgba(0,0,0,.05);
      transition: all .25s ease;
    }

    .card:hover {
      transform: translateY(-3px);
      box-shadow: 0 16px 32px rgba(0,0,0,.08);
    }

    /* Accent Card (optional) */
    .card-accent {
      background:
        linear-gradient(135deg,
          rgba(249,115,22,.12),
          rgba(34,197,94,.12)
        ),
        #ffffff;
      border: 1px solid rgba(249,115,22,.25);
    }

    /* Table */
    table.dataTable {
      border-radius: var(--radius);
      overflow: hidden;
      border: 1px solid var(--border-soft);
    }

    table thead {
      background: linear-gradient(135deg, var(--accent-orange), var(--accent-green));
      color: #fff;
    }

    table tbody tr:hover {
      background: #f8fafc;
    }

    /* Buttons */
    .btn-accent {
      background: linear-gradient(135deg, var(--accent-orange), var(--accent-green));
      border: none;
      color: #fff;
      border-radius: 10px;
      padding: 8px 16px;
      font-weight: 600;
      box-shadow: 0 6px 16px rgba(249,115,22,.35);
      transition: all .25s;
    }

    .btn-accent:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 24px rgba(249,115,22,.45);
    }

    /* Form */
    .form-control,
    .form-select {
      background: #ffffff;
      border-radius: 10px;
      border: 1px solid var(--border-soft);
    }

    .form-control:focus,
    .form-select:focus {
      border-color: var(--accent-green);
      box-shadow: 0 0 0 .2rem rgba(34,197,94,.2);
    }
  </style>
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

  @stack('styles')
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <aside class="sidebar">
      <div class="mb-4 text-white">
        <h4>Admin Panel</h4>
      </div>
      <nav class="nav flex-column">
        <a href=" " class="nav-link active"><span class="icon"><i class="fa fa-chart-pie"></i></span> Dashboard</a>
        <a href=" " class="nav-link"><span class="icon"><i class="fa fa-building"></i></span> Data Ormas</a>
        <a href="#" class="nav-link"><span class="icon"><i class="fa fa-tags"></i></span> Kategori</a>
        <a href=" " class="nav-link"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
           <span class="icon"><i class="fa fa-right-from-bracket"></i></span> Logout
        </a>
        <form id="logout-form" action="" method="POST" class="d-none">@csrf</form>
      </nav>
    </aside>

    <div class="main-content flex-grow-1">
      <div class="header">
        <!-- <h5 class="mb-0">@yield('title')</h5> -->
      </div>
      <div class="content-wrapper" style="margin-left: 1%;">
        @yield('admin-content')
      </div>
    </div>
  </div>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

  <!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  @stack('scripts')
</body>
</html>
