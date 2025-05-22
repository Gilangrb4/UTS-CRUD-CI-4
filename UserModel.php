<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    // Konfigurasi Tabel Database
    protected $table            = 'users'; // Nama tabel yang terkait dengan model ini
    protected $primaryKey       = 'id'; // Nunci primer tabel
    protected $useAutoIncrement = true; // Gunakan auto-increment untuk primary key
    protected $returnType       = 'array';  // Format data yang dikembalikan (array/object)
    protected $useSoftDeletes   = false; // Tidak menggunakan soft delete
    protected $protectFields    = true; // Lindungi field agar hanya yang diizinkan saja
    protected $allowedFields    = ['username', 'password']; // Field yang boleh diisi

    // Pengaturan Insert/Update
    protected bool $allowEmptyInserts = false; // Larang insert data kosong
    protected bool $updateOnlyChanged = true; // Hanya update field yang berubah

    // Type Casting
    protected array $casts = []; // Konversi tipe data otomatis
    protected array $castHandlers = []; // Custom handler untuk type casting

    // Pengaturan Timestamp
    protected $useTimestamps = false; // Tidak menggunakan timestamp otomatis
    protected $dateFormat    = 'datetime'; // Format tanggal yang digunakan
    protected $createdField  = 'created_at'; // Field created_at (jika aktif)
    protected $updatedField  = 'updated_at'; // Field updated_at (jika aktif)
    protected $deletedField  = 'deleted_at'; // Field deleted_at (untuk soft delete)

    // Validasi Data
    protected $validationRules      = []; // Rules validasi (belum diatur)
    protected $validationMessages   = []; // Pesan error validasi custom
    protected $skipValidation       = false; // Jangan lewati validasi
    protected $cleanValidationRules = true; // Bersihkan rules validasi sebelum digunakan

    // Callbacks
    protected $allowCallbacks = true; // Aktifkan callback
    protected $beforeInsert   = []; // Fungsi sebelum insert data
    protected $afterInsert    = []; // Fungsi setelah insert data
    protected $beforeUpdate   = []; // Fungsi sebelum update data
    protected $afterUpdate    = []; // Fungsi setelah update data
    protected $beforeFind     = []; // Fungsi sebelum query find
    protected $afterFind      = []; // Fungsi setelah query find
    protected $beforeDelete   = []; // Fungsi sebelum delete data
    protected $afterDelete    = []; // Fungsi setelah delete data
}
