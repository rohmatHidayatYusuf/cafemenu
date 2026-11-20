<?php

namespace App\Controllers;
use App\Models\KategoriModel;
use App\Models\MenuModel;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Kategori extends BaseController
{
    protected $kategoriModel;
    protected $menuModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        $this->menuModel = new MenuModel();
    }

    // Menampilkan seluruh kategori
    public function index()
    {
        $data = [
            'title' => 'Data Kategori',
            'kategori' => $this->kategoriModel
                ->orderBy('id_kategori', 'DESC')
                ->findAll()
        ];

        return view('kategori/index', $data);
    }

    // Menampilkan form tambah
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Kategori'
        ];

        return view('kategori/tambah', $data);
    }

    // Menyimpan kategori baru
    public function simpan()
    {
        $rules = [
            'nama_kategori' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama kategori wajib diisi.',
                    'min_length' => 'Nama kategori minimal 3 karakter.',
                    'max_length' => 'Nama kategori maksimal 100 karakter.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->kategoriModel->save([
            'nama_kategori' => trim($this->request->getPost('nama_kategori')),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to(site_url('kategori'))
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $kategori = $this->kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to(site_url('kategori'))
                ->with('error', 'Data kategori tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Kategori',
            'kategori' => $kategori
        ];

        return view('kategori/edit', $data);
    }

    // Memperbarui kategori
    public function update($id)
    {
        $kategori = $this->kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to(site_url('kategori'))
                ->with('error', 'Data kategori tidak ditemukan.');
        }

        $rules = [
            'nama_kategori' => [
                'rules' => 'required|min_length[3]|max_length[100]',
                'errors' => [
                    'required' => 'Nama kategori wajib diisi.',
                    'min_length' => 'Nama kategori minimal 3 karakter.',
                    'max_length' => 'Nama kategori maksimal 100 karakter.'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->kategoriModel->update($id, [
            'nama_kategori' => trim($this->request->getPost('nama_kategori')),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);

        return redirect()->to(site_url('kategori'))
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function hapus($id)
    {
        $kategori = $this->kategoriModel->find($id);

        if (!$kategori) {
            return redirect()->to(site_url('kategori'))
                ->with('error', 'Data kategori tidak ditemukan.');
        }

        // Cek apakah kategori masih digunakan oleh menu
        $jumlahMenu = $this->menuModel
            ->where('id_kategori', $id)
            ->countAllResults();

        if ($jumlahMenu > 0) {
            return redirect()->to(site_url('kategori'))
                ->with('error', 'Kategori tidak dapat dihapus karena masih digunakan oleh menu.');
        }

        $this->kategoriModel->delete($id);

        return redirect()->to(site_url('kategori'))
            ->with('success', 'Kategori berhasil dihapus.');
    }
}
