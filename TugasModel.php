<?php

namespace App\Models;

use CodeIgniter\Model;

class TugasModel extends Model
{
    // Konfigurasi Tabel Database
    protected $table            = 'tugas'; // Nama tabel tugas di database
    protected $primaryKey       = 'id'; // Kolom primary key
    protected $useAutoIncrement = true; // Gunakan auto-increment untuk ID
    protected $returnType       = 'array'; // Hasil query dikembalikan sebagai array
    protected $useSoftDeletes   = false; // Tidak menggunakan fitur soft delete
    protected $protectFields    = true; // Proteksi field untuk mass assignment
    protected $allowedFields    = ['judul', 'deskripsi', 'deadline', 'status', 'user_id']; // Field yang boleh diisi

    // Pengaturan Insert/Update
    protected bool $allowEmptyInserts = false; // Tidak memperbolehkan insert data kosong
    protected bool $updateOnlyChanged = true; // Hanya update field yang berubah nilainya

    // Type Casting
    protected array $casts = []; // Konversi tipe data otomatis
    protected array $castHandlers = []; // Handler custom untuk type casting

    // Pengaturan Timestamp
    protected $useTimestamps = false; // Tidak menggunakan timestamp otomatis
    protected $dateFormat    = 'datetime'; // Format penyimpanan tanggal/waktu
    protected $createdField  = 'created_at'; // Nama field created_at (jika diaktifkan)
    protected $updatedField  = 'updated_at'; // Nama field updated_at (jika diaktifkan)
    protected $deletedField  = 'deleted_at'; // Nama field deleted_at (untuk soft delete)

    // Validation
    protected $validationRules      = []; // Rules validasi input
    protected $validationMessages   = []; // Pesan error validasi custom
    protected $skipValidation       = false; // Validasi tidak dilewati
    protected $cleanValidationRules = true; // Membersihkan rules validasi sebelum dipakai

    // Callbacks
    protected $allowCallbacks = true; // Mengaktifkan sistem callback
    protected $beforeInsert   = []; // Method yang dijalankan sebelum insert
    protected $afterInsert    = []; // Method yang dijalankan setelah insert
    protected $beforeUpdate   = []; // Method yang dijalankan sebelum update
    protected $afterUpdate    = []; // Method yang dijalankan setelah update
    protected $beforeFind     = []; // Method yang dijalankan sebelum query find
    protected $afterFind      = []; // Method yang dijalankan setelah query find
    protected $beforeDelete   = []; // Method yang dijalankan sebelum delete
    protected $afterDelete    = []; // Method yang dijalankan setelah delete
}
