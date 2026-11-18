
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($title) ?></title>
</head>
<body>

    <h1>Dashboard Cafe</h1>

    <p>Selamat datang di Sistem Manajemen Menu Cafe.</p>

    <hr>

    <h3>Ringkasan Data</h3>

    <p>Total Menu: <?= esc($totalMenu) ?></p>
    <p>Total Kategori: <?= esc($totalKategori) ?></p>
    <p>Menu Tersedia: <?= esc($menuTersedia) ?></p>
    <p>Menu Habis: <?= esc($menuHabis) ?></p>

    <hr>

    <h3>5 Menu Terbaru</h3>

    <table border="1" cellpadding="10">
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
                        <td><?= esc($menu['nama_menu']) ?></td>
                        <td>Rp <?= number_format($menu['harga'], 0, ',', '.') ?></td>
                        <td><?= esc($menu['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Belum ada data menu.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>
