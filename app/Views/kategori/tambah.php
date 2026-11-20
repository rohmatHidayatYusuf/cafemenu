
<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <h4 class="fw-bold mb-1">Tambah Kategori</h4>
    <p class="text-secondary mb-0">
        Tambahkan kategori baru untuk mengelompokkan menu cafe.
    </p>
</div>

<div class="content-card">

    <h5 class="fw-bold mb-4">Form Tambah Kategori</h5>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('kategori/simpan') ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label fw-semibold">
                Nama Kategori <span class="text-danger">*</span>
            </label>

            <input type="text"
                   name="nama_kategori"
                   class="form-control"
                   placeholder="Contoh: Coffee, Non-Coffee, Makanan"
                   value="<?= esc(old('nama_kategori')) ?>"
                   required>

            <small class="text-secondary">
                Masukkan nama kategori minimal 3 karakter.
            </small>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">
                Deskripsi
            </label>

            <textarea name="deskripsi"
                      class="form-control"
                      rows="4"
                      placeholder="Masukkan deskripsi kategori..."><?= esc(old('deskripsi')) ?></textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-coffee">
                <i class="bi bi-save me-1"></i> Simpan Kategori
            </button>

            <a href="<?= site_url('kategori') ?>"
               class="btn btn-light border">
                Batal
            </a>
        </div>
    </form>

</div>

<?= $this->endSection() ?>
