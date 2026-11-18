
<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<!-- Hero Banner -->
<div class="hero">
    <div class="row align-items-center">
        <div class="col-md-8">
            <span class="badge rounded-pill mb-3"
                  style="background:#A17B5C;">
                CAFE MANAGEMENT SYSTEM
            </span>

            <h2>Selamat Datang di Dashboard!</h2>

            <p class="mb-4 text-white-50">
                Kelola menu makanan dan minuman cafe dengan mudah,
                cepat, dan terorganisir.
            </p>

            <a href="<?= site_url('menu') ?>"
               class="btn btn-light fw-semibold px-4">
                <i class="bi bi-cup-hot me-2"></i>
                Kelola Menu
            </a>
        </div>

        <div class="col-md-4 text-center d-none d-md-block">
            <i class="bi bi-cup-hot-fill hero-icon"></i>
        </div>
    </div>
</div>

<!-- Statistik -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h5 class="fw-bold mb-1">Ringkasan Data</h5>
        <small class="text-secondary">
            Informasi keseluruhan data cafe
        </small>
    </div>
</div>

<div class="row g-3 mb-4">

    <!-- Total Menu -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-secondary">Total Menu</small>
                    <h3 class="fw-bold mt-2 mb-0">
                        <?= esc($totalMenu) ?>
                    </h3>
                </div>
                <div class="stat-icon"
                     style="background:#F3E8DD;color:#8A5B3D;">
                    <i class="bi bi-cup-straw"></i>
                </div>
            </div>
            <small class="text-secondary d-block mt-3">
                Seluruh menu cafe
            </small>
        </div>
    </div>

    <!-- Total Kategori -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-secondary">Kategori</small>
                    <h3 class="fw-bold mt-2 mb-0">
                        <?= esc($totalKategori) ?>
                    </h3>
                </div>
                <div class="stat-icon"
                     style="background:#E8F0E5;color:#54804B;">
                    <i class="bi bi-tags"></i>
                </div>
            </div>
            <small class="text-secondary d-block mt-3">
                Jenis kategori menu
            </small>
        </div>
    </div>

    <!-- Menu Tersedia -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-secondary">Menu Tersedia</small>
                    <h3 class="fw-bold mt-2 mb-0">
                        <?= esc($menuTersedia) ?>
                    </h3>
                </div>
                <div class="stat-icon"
                     style="background:#E5F2E9;color:#32844D;">
                    <i class="bi bi-check-circle"></i>
                </div>
            </div>
            <small class="text-secondary d-block mt-3">
                Siap dipesan
            </small>
        </div>
    </div>

    <!-- Menu Habis -->
    <div class="col-12 col-sm-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <small class="text-secondary">Menu Habis</small>
                    <h3 class="fw-bold mt-2 mb-0">
                        <?= esc($menuHabis) ?>
                    </h3>
                </div>
                <div class="stat-icon"
                     style="background:#FBE8E5;color:#C15C4E;">
                    <i class="bi bi-x-circle"></i>
                </div>
            </div>
            <small class="text-secondary d-block mt-3">
                Tidak tersedia
            </small>
        </div>
    </div>

</div>

<!-- Tabel Menu Terbaru -->
<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Menu Terbaru</h5>
            <small class="text-secondary">
                Lima menu terakhir yang ditambahkan
            </small>
        </div>

        <a href="<?= site_url('menu') ?>"
           class="btn btn-coffee btn-sm">
            Lihat Semua <i class="bi bi-arrow-right ms-1"></i>
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Menu</th>
                    <th>Harga</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($menuTerbaru)): ?>

                    <?php $no = 1; ?>

                    <?php foreach ($menuTerbaru as $menu): ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td>
                                <div class="fw-semibold">
                                    <?= esc($menu['nama_menu']) ?>
                                </div>
                            </td>

                            <td class="fw-semibold">
                                Rp <?= number_format(
                                    (float) $menu['harga'],
                                    0, ',', '.'
                                ) ?>
                            </td>

                            <td>
                                <?php if ($menu['status'] == 'tersedia'): ?>
                                    <span class="badge rounded-pill text-bg-success">
                                        Tersedia
                                    </span>
                                <?php else: ?>
                                    <span class="badge rounded-pill text-bg-danger">
                                        Habis
                                    </span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <i class="bi bi-inbox fs-1 text-secondary"></i>
                            <p class="text-secondary mt-2 mb-0">
                                Belum ada data menu.
                            </p>
                        </td>
                    </tr>

                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>
