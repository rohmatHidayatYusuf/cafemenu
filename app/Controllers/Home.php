<?php

namespace App\Controllers;
use App\Models\MenuModel;
use App\Models\KategoriModel;

class Home extends BaseController
{
    public function index(): string
    {
        $menuModel = new MenuModel();
        $kategoriModel = new KategoriModel();

        $data = [
            'title' => 'Dashboard Cafe',

            // Menghitung jumlah data
            'totalMenu' => $menuModel->countAllResults(),
            'totalKategori' => $kategoriModel->countAllResults(),

            // Menghitung menu berdasarkan status
            'menuTersedia' => $menuModel
                ->where('status', 'tersedia')
                ->countAllResults(),

            'menuHabis' => $menuModel
                ->where('status', 'habis')
                ->countAllResults(),

            // Mengambil 5 menu terbaru
            'menuTerbaru' => $menuModel
                ->orderBy('id_menu', 'DESC')
                ->findAll(5),
        ];

        return view('home', $data);
    }
}
