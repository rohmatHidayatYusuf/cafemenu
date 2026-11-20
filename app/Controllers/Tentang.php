<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Tentang extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Tentang Kami',
            'namaCafe' => 'Kopi Senja',
            'deskripsi' => 'Kopi Senja merupakan sebuah kafe yang menyediakan berbagai pilihan makanan dan minuman dengan cita rasa berkualitas.',
            'tujuan' => 'Website ini dikembangkan untuk membantu pengelolaan data kategori dan menu kafe agar lebih mudah, terstruktur, dan efisien.',
            'pembuat' => 'Rohmat Hidayat Yusuf',
            'npm' => '24311138',
            'kelas' => 'SI 24 B',
        ];

        return view('tentang', $data);
    }
}
