<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CafeSeeder extends Seeder
{
    public function run()
    {
        $db = \Config\Database::connect();

        // Data kategori
        $dataKategori = [
            [
                'nama_kategori' => 'Kopi',
                'deskripsi' => 'Berbagai pilihan minuman berbahan dasar kopi.'
            ],
            [
                'nama_kategori' => 'Non-Kopi',
                'deskripsi' => 'Minuman tanpa bahan dasar kopi.'
            ],
            [
                'nama_kategori' => 'Makanan',
                'deskripsi' => 'Berbagai pilihan makanan ringan dan berat.'
            ],
            [
                'nama_kategori' => 'Dessert',
                'deskripsi' => 'Aneka makanan penutup.'
            ],
        ];

        // Insert kategori jika belum tersedia
        foreach ($dataKategori as $kategori) {
            $existing = $db->table('kategori')
                ->where('nama_kategori', $kategori['nama_kategori'])
                ->get()
                ->getRowArray();

            if (!$existing) {
                $db->table('kategori')->insert($kategori);
            }
        }

        // Mengambil ID kategori
        $kategoriKopi = $db->table('kategori')
            ->where('nama_kategori', 'Kopi')
            ->get()->getRowArray()['id_kategori'];

        $kategoriNonKopi = $db->table('kategori')
            ->where('nama_kategori', 'Non-Kopi')
            ->get()->getRowArray()['id_kategori'];

        $kategoriMakanan = $db->table('kategori')
            ->where('nama_kategori', 'Makanan')
            ->get()->getRowArray()['id_kategori'];

        $kategoriDessert = $db->table('kategori')
            ->where('nama_kategori', 'Dessert')
            ->get()->getRowArray()['id_kategori'];

        // Data menu
        $dataMenu = [
            [
                'id_kategori' => $kategoriKopi,
                'nama_menu' => 'Espresso',
                'deskripsi' => 'Kopi espresso dengan cita rasa kuat.',
                'harga' => 18000,
                'status' => 'tersedia',
            ],
            [
                'id_kategori' => $kategoriKopi,
                'nama_menu' => 'Cappuccino',
                'deskripsi' => 'Perpaduan espresso, susu, dan foam.',
                'harga' => 25000,
                'status' => 'tersedia',
            ],
            [
                'id_kategori' => $kategoriKopi,
                'nama_menu' => 'Cafe Latte',
                'deskripsi' => 'Espresso dengan campuran susu.',
                'harga' => 27000,
                'status' => 'tersedia',
            ],
            [
                'id_kategori' => $kategoriNonKopi,
                'nama_menu' => 'Matcha Latte',
                'deskripsi' => 'Minuman matcha dengan susu segar.',
                'harga' => 28000,
                'status' => 'tersedia',
            ],
            [
                'id_kategori' => $kategoriNonKopi,
                'nama_menu' => 'Chocolate',
                'deskripsi' => 'Minuman cokelat dengan rasa manis.',
                'harga' => 25000,
                'status' => 'tersedia',
            ],
            [
                'id_kategori' => $kategoriMakanan,
                'nama_menu' => 'French Fries',
                'deskripsi' => 'Kentang goreng renyah.',
                'harga' => 20000,
                'status' => 'tersedia',
            ],
            [
                'id_kategori' => $kategoriMakanan,
                'nama_menu' => 'Chicken Rice',
                'deskripsi' => 'Nasi dengan ayam berbumbu.',
                'harga' => 32000,
                'status' => 'tersedia',
            ],
            [
                'id_kategori' => $kategoriDessert,
                'nama_menu' => 'Chocolate Cake',
                'deskripsi' => 'Kue cokelat lembut.',
                'harga' => 22000,
                'status' => 'tersedia',
            ],
        ];

        // Insert menu jika belum tersedia
        foreach ($dataMenu as $menu) {
            $existing = $db->table('menu')
                ->where('nama_menu', $menu['nama_menu'])
                ->get()
                ->getRowArray();

            if (!$existing) {
                $db->table('menu')->insert($menu);
            }
        }

        echo "Seeder CafeSeeder berhasil dijalankan.\n";
    }
}
