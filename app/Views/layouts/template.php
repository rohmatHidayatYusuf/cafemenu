
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= esc($title ?? 'Cafe Management') ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --coffee: #593D2B;
            --coffee-dark: #38271D;
            --cream: #F8F5F0;
            --accent: #C69C6D;
        }

        body {
            background: var(--cream);
            font-family: 'Segoe UI', sans-serif;
            color: #35271F;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: var(--coffee-dark);
            position: fixed;
            top: 0;
            left: 0;
            padding: 25px 18px;
            color: white;
            z-index: 1000;
        }

        .brand {
            font-size: 21px;
            font-weight: 700;
            letter-spacing: .5px;
            padding: 8px 12px 35px;
        }

        .brand i {
            color: var(--accent);
        }

        .menu-label {
            color: #B9A99C;
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 1.5px;
            padding: 10px 12px;
            margin-top: 10px;
        }

        .sidebar .nav-link {
            color: #D9CEC5;
            padding: 12px 14px;
            border-radius: 9px;
            margin-bottom: 7px;
            font-size: 14px;
            transition: .2s;
        }

        .sidebar .nav-link i {
            margin-right: 12px;
            font-size: 17px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background: #75533D;
            color: white;
        }

        .main-content {
            margin-left: 250px;
            padding: 25px 35px;
        }

        .topbar {
            background: white;
            border-radius: 12px;
            padding: 15px 22px;
            margin-bottom: 30px;
            box-shadow: 0 2px 12px rgba(0,0,0,.03);
        }

        .stat-card {
            border: none;
            border-radius: 14px;
            padding: 22px;
            background: white;
            box-shadow: 0 3px 15px rgba(0,0,0,.035);
            height: 100%;
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 12px;
            font-size: 22px;
        }

        .hero {
            background: linear-gradient(110deg, #493021, #876044);
            color: white;
            border-radius: 16px;
            padding: 32px;
            position: relative;
            overflow: hidden;
            margin-bottom: 28px;
        }

        .hero h2 {
            font-weight: 700;
        }

        .hero-icon {
            font-size: 100px;
            color: rgba(255,255,255,.18);
        }

        .content-card {
            background: white;
            border: none;
            border-radius: 14px;
            padding: 22px;
            box-shadow: 0 3px 15px rgba(0,0,0,.035);
        }

        .table th {
            color: #796B60;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: .5px;
            font-weight: 600;
            background: #FAF8F5;
            padding: 14px;
        }

        .table td {
            padding: 15px 14px;
            vertical-align: middle;
            font-size: 14px;
        }

        .btn-coffee {
            background: var(--coffee);
            color: white;
            border-radius: 8px;
            padding: 9px 17px;
        }

        .btn-coffee:hover {
            background: var(--coffee-dark);
            color: white;
        }

        footer {
            color: #95877D;
            font-size: 12px;
            text-align: center;
            padding: 25px 0 5px;
        }

        @media (max-width: 991px) {
            .sidebar {
                display: none;
            }

            .main-content {
                margin-left: 0;
                padding: 18px;
            }
        }
    </style>
</head>

<body>

    <!-- Sidebar Desktop -->
    <aside class="sidebar">
        <div class="brand">
            <i class="bi bi-cup-hot-fill"></i>
            CAFE MANAGEMENT
        </div>

        <div class="menu-label">MENU UTAMA</div>

        <nav class="nav flex-column">
            <a href="<?= site_url('/') ?>"
               class="nav-link <?= uri_string() == '' ? 'active' : '' ?>">
                <i class="bi bi-grid-1x2-fill"></i> Dashboard
            </a>

            <a href="<?= site_url('menu') ?>"
               class="nav-link <?= str_starts_with(uri_string(), 'menu') ? 'active' : '' ?>">
                <i class="bi bi-cup-straw"></i> Data Menu
            </a>

            <a href="<?= site_url('kategori') ?>"
               class="nav-link <?= str_starts_with(uri_string(), 'kategori') ? 'active' : '' ?>">
                <i class="bi bi-tags"></i> Data Kategori
            </a>

            <div class="menu-label">LAINNYA</div>

            <a href="<?= site_url('tentang') ?>"
               class="nav-link <?= str_starts_with(uri_string(), 'tentang') ? 'active' : '' ?>">
                <i class="bi bi-info-circle"></i> Tentang Kami
            </a>
        </nav>

        <div class="mt-auto pt-5 px-2">
            <div class="border-top border-secondary pt-3">
                <small class="text-white-50">
                    Cafe Management System<br>
                    Version 1.0
                </small>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="main-content">

        <!-- Topbar -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <div>
                <h6 class="mb-1 fw-bold">
                    <?= esc($title ?? 'Dashboard') ?>
                </h6>
                <small class="text-secondary">
                    Selamat datang di Cafe Management System
                </small>
            </div>

            <div class="d-flex align-items-center gap-2">
                <div class="rounded-circle d-flex align-items-center justify-content-center"
                     style="width:38px;height:38px;background:#F1E6DA;color:#593D2B;">
                    <i class="bi bi-person-fill"></i>
                </div>
                <div>
                    <div class="fw-semibold small">Administrator</div>
                    <small class="text-secondary">Admin Cafe</small>
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <?= $this->renderSection('content') ?>

        <footer>
            &copy; <?= date('Y') ?> Cafe Management System. All Rights Reserved.
        </footer>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
