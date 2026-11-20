<?php

namespace App\Controllers;
use App\Models\MenuModel;
use App\Models\KategoriModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Menu extends BaseController
{
    protected $menuModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel();
        $this->kategoriModel = new KategoriModel();
    }

    // Menampilkan seluruh menu
    public function index()
    {
        $keyword = $this->request->getGet('keyword');

        $menu = $this->menuModel
            ->select('menu.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id_kategori = menu.id_kategori');

        if ($keyword) {
            $menu->like('menu.nama_menu', $keyword);
        }

        $data = [
            'title' => 'Data Menu',
            'menu' => $menu->orderBy('menu.id_menu', 'DESC')->findAll(),
            'keyword' => $keyword
        ];

        return view('menu/index', $data);
    }

    // Form tambah menu
    public function tambah()
    {
        $data = [
            'title' => 'Tambah Menu',
            'kategori' => $this->kategoriModel->findAll()
        ];

        return view('menu/tambah', $data);
    }

    // Menyimpan menu
    public function simpan()
    {
        $rules = [
            'id_kategori' => 'required|is_natural_no_zero|is_not_unique[kategori.id_kategori]',
            'nama_menu' => 'required|min_length[3]|max_length[100]',
            'harga' => 'required|decimal|greater_than[0]',
            'status' => 'required|in_list[tersedia,habis]',
            'foto' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $foto = $this->request->getFile('foto');
        $namaFoto = null;

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFoto = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/menu', $namaFoto);
        }

        $this->menuModel->save([
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_menu' => trim($this->request->getPost('nama_menu')),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $namaFoto,
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to(site_url('menu'))
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    // Form edit menu
    public function edit($id)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to(site_url('menu'))
                ->with('error', 'Data menu tidak ditemukan.');
        }

        $data = [
            'title' => 'Edit Menu',
            'menu' => $menu,
            'kategori' => $this->kategoriModel->findAll()
        ];

        return view('menu/edit', $data);
    }

    // Memperbarui menu
    public function update($id)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to(site_url('menu'))
                ->with('error', 'Data menu tidak ditemukan.');
        }

        $rules = [
            'id_kategori' => 'required|is_natural_no_zero|is_not_unique[kategori.id_kategori]',
            'nama_menu' => 'required|min_length[3]|max_length[100]',
            'harga' => 'required|decimal|greater_than[0]',
            'status' => 'required|in_list[tersedia,habis]',
            'foto' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png,image/webp]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $namaFoto = $menu['foto'];
        $foto = $this->request->getFile('foto');

        if ($foto && $foto->isValid() && !$foto->hasMoved()) {
            $namaFotoBaru = $foto->getRandomName();
            $foto->move(FCPATH . 'uploads/menu', $namaFotoBaru);

            if ($namaFoto && is_file(FCPATH . 'uploads/menu/' . $namaFoto)) {
                unlink(FCPATH . 'uploads/menu/' . $namaFoto);
            }

            $namaFoto = $namaFotoBaru;
        }

        $this->menuModel->update($id, [
            'id_kategori' => $this->request->getPost('id_kategori'),
            'nama_menu' => trim($this->request->getPost('nama_menu')),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'foto' => $namaFoto,
            'status' => $this->request->getPost('status')
        ]);

        return redirect()->to(site_url('menu'))
            ->with('success', 'Menu berhasil diperbarui.');
    }

    // Menghapus menu
    public function hapus($id)
    {
        $menu = $this->menuModel->find($id);

        if (!$menu) {
            return redirect()->to(site_url('menu'))
                ->with('error', 'Data menu tidak ditemukan.');
        }

        if ($menu['foto'] && is_file(FCPATH . 'uploads/menu/' . $menu['foto'])) {
            unlink(FCPATH . 'uploads/menu/' . $menu['foto']);
        }

        $this->menuModel->delete($id);

        return redirect()->to(site_url('menu'))
            ->with('success', 'Menu berhasil dihapus.');
    }
}
