<?php
// app/Controllers/Tugas.php
namespace App\Controllers;
use App\Models\TugasModel;
use CodeIgniter\Controller;

class Tugas extends Controller {
    // menampilkan daftar tugas milik user yang sedang login
    public function index() {
        // mengambil semua tugas berdasarkan user_id dari session
        $model = new TugasModel();
        $data['tugas'] = $model->where('user_id', session()->get('user_id'))->findAll();
        return view('tugas/index', $data);
    }
    
    // proses penambahan tugas baru
    public function tambah() {
        if ($this->request->getMethod() === 'post') {
            $model = new TugasModel();
            // menyimpan daftar tugas baru ke database
            $model->save([
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
                'user_id' => session()->get('user_id'), // mengambil user_id dari session
            ]);
            return redirect()->to('/tugas');
        }
        // jika bukan POST tampilkan from tambah
        return view('tugas/tambah');
    }

    // proses pengeditan tugas
    public function edit($id) {
        $model = new TugasModel();
        // cek jika request method adalah POST (form submit)
        if ($this->request->getMethod() === 'post') {
            // update data tugas berdasarkan id
            $model->update($id, [
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'deadline' => $this->request->getPost('deadline'),
                'status' => $this->request->getPost('status'),
            ]);
            return redirect()->to('/tugas');
        }
        // Jika bukan POST, ambil data tugas dan tampilkan form edit
        $data['tugas'] = $model->find($id);
        return view('tugas/edit', $data);
    }

    // proses penghapusan tugas
    public function hapus($id) {
        $model = new TugasModel();
        // Menghapus tugas berdasarkan ID
        $model->delete($id);
        return redirect()->to('/tugas');
    }
}