<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Data Kategori</h4>
        <p class="text-secondary mb-0">
            Kelola kategori makanan dan minuman cafe.
        </p>
    </div>

    <a href="<?= site_url('kategori/tambah') ?>" class="btn btn-coffee">
        <i class="bi bi-plus-lg me-1"></i> Tambah Kategori
    </a>
</div>

<!-- Notifikasi -->
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show">
        <i class="bi bi-check-circle me-2"></i>
        <?= esc(session()->getFlashdata('success')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show">
        <i class="bi bi-exclamation-circle me-2"></i>
        <?= esc(session()->getFlashdata('error')) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="content-card">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold mb-0">Daftar Kategori</h5>
        <span class="badge rounded-pill text-bg-secondary">
            Total: <?= count($kategori) ?> Kategori
        </span>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead>
                <tr>
                    <th width="70">No</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th width="150" class="text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($kategori)): ?>

                    <?php $no = 1; ?>

                    <?php foreach ($kategori as $item): ?>
                        <tr>
                            <td><?= $no++ ?></td>

                            <td class="fw-semibold">
                                <?= esc($item['nama_kategori']) ?>
                            </td>

                            <td>
                                <?= esc($item['deskripsi'] ?: '-') ?>
                            </td>


                            <td class="text-center">
                                <a href="<?= site_url('kategori/edit/' . $item['id_kategori']) ?>"
                                    class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil-square"></i>
                                </a>

                                <form action="<?= site_url('kategori/hapus/' . $item['id_kategori']) ?>" method="post"
                                    class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">

                                    <?= csrf_field() ?>

                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>

                        <!-- Modal Konfirmasi Hapus -->
                        <div class="modal fade" id="hapus<?= $item['id_kategori'] ?>" tabindex="-1">

                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content border-0 rounded-4">

                                    <div class="modal-body text-center p-4">
                                        <div class="text-danger mb-3">
                                            <i class="bi bi-exclamation-circle" style="font-size:50px;"></i>
                                        </div>

                                        <h5 class="fw-bold">
                                            Hapus Kategori?
                                        </h5>

                                        <p class="text-secondary">
                                            Apakah kamu yakin ingin menghapus
                                            kategori
                                            <strong>
                                                <?= esc($item['nama_kategori']) ?>
                                            </strong>?
                                        </p>

                                        <div class="d-flex justify-content-center gap-2">
                                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">
                                                Batal
                                            </button>

                                            <form action="<?= site_url('kategori/hapus/' . $item['id_kategori']) ?>"
                                                method="post">
                                                <?= csrf_field() ?>

                                                <button type="submit" class="btn btn-danger">
                                                    Ya, Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>
                        <td colspan="4" class="text-center py-5">
                            <i class="bi bi-tags fs-1 text-secondary"></i>
                            <p class="text-secondary mt-2">
                                Belum ada kategori.
                            </p>
                        </td>
                    </tr>

                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>