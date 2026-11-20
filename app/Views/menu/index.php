<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Data Menu</h4>
        <p class="text-secondary mb-0">
            Kelola seluruh menu makanan dan minuman cafe.
        </p>
    </div>

    <a href="<?= site_url('menu/tambah') ?>" class="btn btn-coffee">
        <i class="bi bi-plus-lg me-1"></i> Tambah Menu
    </a>
</div>

<!-- Notifikasi -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <?= esc(session()->getFlashdata('success')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <?= esc(session()->getFlashdata('error')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="content-card">

    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <h5 class="fw-bold mb-0">Daftar Menu Cafe</h5>

        <form action="<?= site_url('menu') ?>" method="get" class="d-flex gap-2">
            <input type="text" name="keyword" class="form-control" placeholder="Cari nama menu..."
                value="<?= esc($keyword ?? '') ?>">

            <button type="submit" class="btn btn-coffee">
                <i class="bi bi-search"></i>
            </button>

            <?php if (!empty($keyword)): ?>
                <a href="<?= site_url('menu') ?>" class="btn btn-light border">
                    Reset
                </a>
            <?php endif; ?>
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Nama Menu</th>
                    <th>Kategori</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($menu)): ?>

                    <?php $no = 1; ?>

                    <?php foreach ($menu as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td>
                                <?php if (!empty($item['foto'])): ?>
                                    <img src="<?= base_url('uploads/menu/' . $item['foto']) ?>" alt="<?= esc($item['nama_menu']) ?>"
                                        width="60" height="50" style="object-fit:cover;border-radius:8px;">
                                <?php else: ?>
                                    <div class="rounded d-flex align-items-center justify-content-center"
                                        style="width:60px;height:50px;background:#F3E8DD;">
                                        <i class="bi bi-image text-secondary fs-4"></i>
                                    </div>
                                <?php endif; ?>
                            </td>

                            <td>
                                <div class="fw-semibold">
                                    <?= esc($item['nama_menu']) ?>
                                </div>
                                <small class="text-secondary">
                                    <?= esc($item['deskripsi'] ?: '-') ?>
                                </small>
                            </td>

                            <td>
                                <span class="badge rounded-pill" style="background:#F3E8DD;color:#79543B;">
                                    <?= esc($item['nama_kategori']) ?>
                                </span>
                            </td>

                            <td class="fw-semibold">
                                Rp <?= number_format((float) $item['harga'], 0, ',', '.') ?>
                            </td>

                            <td>
                                <?php if ($item['status'] == 'tersedia'): ?>
                                    <span class="badge text-bg-success">
                                        Tersedia
                                    </span>
                                <?php else: ?>
                                    <span class="badge text-bg-danger">
                                        Habis
                                    </span>
                                <?php endif; ?>
                            </td>

                            <td class="text-center">
                                <a href="<?= site_url('menu/edit/' . $item['id_menu']) ?>" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="<?= site_url('menu/hapus/' . $item['id_menu']) ?>" method="post" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                    <?= csrf_field() ?>

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>

                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="bi bi-cup-hot fs-1 text-secondary"></i>
                            <p class="text-secondary mt-2 mb-0">
                                <?= !empty($keyword)
                                    ? 'Menu tidak ditemukan.'
                                    : 'Belum ada data menu.' ?>
                            </p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?= $this->endSection() ?>