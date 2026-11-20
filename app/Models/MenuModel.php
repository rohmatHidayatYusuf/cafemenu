<?php

namespace App\Models;

use CodeIgniter\Model;

class MenuModel extends Model
{
    protected $table = 'menu';
    protected $primaryKey = 'id_menu';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'id_kategori',
        'nama_menu',
        'deskripsi',
        'harga',
        'foto',
        'status'
    ];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getMenu()
    {
        return $this->select('menu.*, kategori.nama_kategori')
            ->join(
                'kategori',
                'kategori.id_kategori = menu.id_kategori'
            )
            ->orderBy('menu.id_menu', 'DESC')
            ->findAll();
    }

    public function getMenuById($id)
    {
        return $this->select('menu.*, kategori.nama_kategori')
            ->join(
                'kategori',
                'kategori.id_kategori = menu.id_kategori'
            )
            ->where('menu.id_menu', $id)
            ->first();
    }
}
