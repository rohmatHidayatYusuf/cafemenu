
<?= $this->extend('layouts/template') ?>

<?= $this->section('content') ?>

<div class="mb-4">
    <h4 class="fw-bold mb-1">Edit Menu</h4>
    <p class="text-secondary mb-0">
        Perbarui informasi menu makanan atau minuman cafe.
    </p>
</div>

<div class="content-card">

    <h5 class="fw-bold mb-4">Form Edit Menu</h5>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('menu/update/' . $menu['id_menu']) ?>"
          method="post"
          enctype="multipart/form-data">

        <?= csrf_field() ?>

        <div class="row">

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">
                    Nama Menu <span class="text-danger">*</span>
                </label>

                <input type="text"
                       name="nama_menu"
                       class="form-control"
                       value="<?= esc(old('nama_menu', $menu['nama_menu'])) ?>"
                       required>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">
                    Kategori <span class="text-danger">*</span>
                </label>

                <select name="id_kategori" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>

                    <?php foreach ($kategori as $item): ?>
                        <option value="<?= $item['id_kategori'] ?>"
                            <?= old('id_kategori', $menu['id_kategori']) == $item['id_kategori'] ? 'selected' : '' ?>>
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
                    <input type="number"
                           name="harga"
                           class="form-control"
                           min="1"
                           step="0.01"
                           value="<?= esc(old('harga', $menu['harga'])) ?>"
                           required>
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label class="form-label fw-semibold">
                    Status Menu
                </label>

                <select name="status" class="form-select" required>
                    <option value="tersedia"
                        <?= old('status', $menu['status']) == 'tersedia' ? 'selected' : '' ?>>
                        Tersedia
                    </option>

                    <option value="habis"
                        <?= old('status', $menu['status']) == 'habis' ? 'selected' : '' ?>>
                        Habis
                    </option>
                </select>
            </div>

            <div class="col-12 mb-3">
                <label class="form-label fw-semibold">
                    Deskripsi
                </label>

                <textarea name="deskripsi"
                          class="form-control"
                          rows="4"><?= esc(old('deskripsi', $menu['deskripsi'])) ?></textarea>
            </div>

            <div class="col-12 mb-4">
                <label class="form-label fw-semibold">
                    Foto Menu
                </label>

                <?php if (!empty($menu['foto'])): ?>
                    <div class="mb-3">
                        <img src="<?= base_url('uploads/menu/' . $menu['foto']) ?>"
                             alt="<?= esc($menu['nama_menu']) ?>"
                             width="130"
                             height="100"
                             style="object-fit:cover;border-radius:10px;">
                        <p class="text-secondary small mt-2 mb-0">
                            Foto saat ini
                        </p>
                    </div>
                <?php endif; ?>

                <input type="file"
                       name="foto"
                       class="form-control"
                       accept="image/png,image/jpeg,image/webp">

                <small class="text-secondary">
                    Kosongkan jika tidak ingin mengganti foto. Maksimal 2 MB.
                </small>
            </div>

        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-coffee">
                <i class="bi bi-save me-1"></i> Simpan Perubahan
            </button>

            <a href="<?= site_url('menu') ?>"
               class="btn btn-light border">
                Batal
            </a>
        </div>

    </form>

</div>

<?= $this->endSection() ?>
