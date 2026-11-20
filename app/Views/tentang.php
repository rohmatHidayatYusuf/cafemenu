<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<!-- Header Halaman -->
<div class="mb-4">
    <h3 class="fw-bold">Tentang Kami</h3>
    <p class="text-muted">
        Informasi mengenai kafe dan pengembangan website ini.
    </p>
</div>

<!-- Profil Cafe -->
<div class="content-card mb-4">
    <div class="row align-items-center g-4">
        <div class="col-md-5">
            <img src="https://images.unsplash.com/photo-1445116572660-236099ec97a0?w=900" alt="Interior Cafe"
                class="img-fluid rounded-3 w-100" style="height: 280px; object-fit: cover;">
        </div>

        <div class="col-md-7">
            <span class="badge bg-warning text-dark mb-3">
                Profil Kafe
            </span>

            <h2 class="fw-bold mb-3">
                <?= esc($namaCafe) ?>
            </h2>

            <p class="text-muted">
                <?= esc($deskripsi) ?>
            </p>

            <p class="text-muted">
                Kami berkomitmen memberikan pengalaman terbaik
                melalui pilihan menu makanan dan minuman yang berkualitas.
            </p>
        </div>
    </div>
</div>

<!-- Tujuan Website -->
<div class="content-card mb-4">
    <h5 class="fw-bold mb-3">
        <i class="bi bi-laptop me-2"></i>
        Tentang Website
    </h5>

    <p class="text-muted mb-0">
        <?= esc($tujuan) ?>
    </p>
</div>

<!-- Informasi Pembuat -->
<div class="content-card">
    <h5 class="fw-bold mb-3">
        <i class="bi bi-person-circle me-2"></i>
        Identitas Pembuat
    </h5>

    <div class="row">
        <div class="col-md-4 mb-3">
            <small class="text-muted d-block">Nama</small>
            <strong><?= esc($pembuat) ?></strong>
        </div>

        <div class="col-md-4 mb-3">
            <small class="text-muted d-block">NPM</small>
            <strong><?= esc($npm) ?></strong>
        </div>

        <div class="col-md-4 mb-3">
            <small class="text-muted d-block">Kelas</small>
            <strong><?= esc($kelas) ?></strong>
        </div>
    </div>
</div>

<?= $this->endSection() ?>