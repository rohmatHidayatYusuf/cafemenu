
<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <h4 class="fw-bold mb-1">Edit Kategori</h4>
    <p class="text-secondary mb-0">
        Perbarui informasi kategori cafe.
    </p>
</div>

<div class="content-card">

    <h5 class="fw-bold mb-4">Form Edit Kategori</h5>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('kategori/update/' . $kategori['id_kategori']) ?>"
          method="post">

        <?= csrf_field() ?>

        <div class="mb-3">
            <label class="form-label fw-semibold">
                Nama Kategori <span class="text-danger">*</span>
            </label>

            <input type="text"
                   name="nama_kategori"
                   class="form-control"
                   value="<?= esc(old('nama_kategori', $kategori['nama_kategori'])) ?>"
                   required>
        </div>

        <div class="mb-4">
            <label class="form-label fw-semibold">
                Deskripsi
            </label>

            <textarea name="deskripsi"
                      class="form-control"
                      rows="4"><?= esc(old('deskripsi', $kategori['deskripsi'])) ?></textarea>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-coffee">
                <i class="bi bi-save me-1"></i> Simpan Perubahan
            </button>

            <a href="<?= site_url('kategori') ?>"
               class="btn btn-light border">
                Batal
            </a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
