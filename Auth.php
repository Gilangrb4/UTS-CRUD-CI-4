<?php

// app/Controllers/Auth.php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Auth extends Controller {
    // proses login user
    public function login() {
        helper(['form']); // load form helper
        // Cek jika request method POST (form submit)
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
            // Cari user berdasarkan username
            $user = $model->where('username', $this->request->getPost('username'))->first();
            // Verifikasi password jika user ditemukan
            if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
                // Buat session user
                session()->set(['user_id' => $user['id'], 'username' => $user['username']]);
                return redirect()->to('/tugas'); // Redirect ke halaman tugas
            }
            // Jika login gagal, kembali ke halaman login dengan pesan error
            return redirect()->back()->with('error', 'Login gagal');
        }
         // Tampilkan halaman login jika method GET
        return view('auth/login');
    }

    // proses registrasi user
    public function register() {
        helper(['form']); // load form helper
        // Cek jika request method POST (form submit)
        if ($this->request->getMethod() === 'post') {
            $model = new UserModel();
             // Siapkan data untuk disimpan
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            ];
            // Simpan data user baru
            $model->insert($data);
            return redirect()->to('/login'); // Redirect ke halaman login
        }
        // Tampilkan halaman registrasi jika method GET
        return view('auth/register');
    }

    // proses logout
    public function logout() {
        session()->destroy(); // Hapus semua session
        return redirect()->to('/login'); // Redirect ke halaman login
    }
}