<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <h4 class="fw-bold mb-1">Tambah Menu</h4>
    <p class="text-secondary mb-0">
        Tambahkan makanan atau minuman baru ke dalam daftar menu cafe.
    </p>
</div>

<div class="content-card">

    <h5 class="fw-bold mb-4">Form Tambah Menu</h5>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if (empty($kategori)): ?>
        <div class="alert alert-warning">
            Belum ada kategori. Silakan tambahkan kategori terlebih dahulu.
            <a href="<?= site_url('kategori/tambah') ?>">Tambah kategori</a>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('menu/simpan') ?>" method="post" enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">
                    Nama Menu <span class="text-danger">*</span>
                </label>

                <input type="text" name="nama_menu" class="form-control" placeholder="Contoh: Cappuccino"
                    value="<?= esc(old('nama_menu')) ?>" required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">
                    Kategori <span class="text-danger">*</span>
                </label>

                <select name="id_kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>

                    <?php foreach ($kategori as $item): ?>
                        <option value="<?= $item['id_kategori'] ?>" <?= old('id_kategori') == $item['id_kategori'] ? 'selected' : '' ?>>
                            <?= esc($item['nama_kategori']) ?>
                        </option>
                    <?php endforeach; ?>

                </select>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">
                    Harga <span class="text-danger">*</span>
                </label>

                <div class="input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="number" name="harga" class="form-control" placeholder="Contoh: 25000" min="1"
                        step="0.01" value="<?= esc(old('harga')) ?>" required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">
                    Status Menu
                </label>

                <select name="status" class="form-select" required>
                    <option value="tersedia" <?= old('status', 'tersedia') == 'tersedia' ? 'selected' : '' ?>>
                        Tersedia
                    </option>

                    <option value="habis" <?= old('status') == 'habis' ? 'selected' : '' ?>>
                        Habis
                    </option>
                </select>
            </div>

            <div class="col-12 mb-3">
                <label class="form-label fw-semibold">
                    Deskripsi
                </label>

                <textarea name="deskripsi" class="form-control" rows="4"
                    placeholder="Masukkan deskripsi menu..."><?= esc(old('deskripsi')) ?></textarea>
            </div>

            <div class="col-12 mb-4">
                <label class="form-label fw-semibold">
                    Foto Menu
                </label>

                <input type="file" name="foto" class="form-control" accept="image/png,image/jpeg,image/webp">

                <small class="text-secondary">
                    Format JPG, JPEG, PNG, atau WEBP. Maksimal 2 MB.
                </small>
            </div>

        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-coffee" <?= empty($kategori) ? 'disabled' : '' ?>>
                <i class="bi bi-save me-1"></i> Simpan Menu
            </button>

            <a href="<?= site_url('menu') ?>" class="btn btn-light border">
                Batal
            </a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>