<?php

namespace App\Controllers;

use App\Models\NilaiModel;

class Data_mhs extends BaseController
{
    public function index()
    {
        $model = new NilaiModel();
        $data['nilai_mahasiswa'] = $model->findAll(); // Ambil semua data mahasiswa

        // Menambahkan data title
        $data['title'] = 'Data Mahasiswa'; // Berikan nilai untuk title

        return view('data_mhs', $data); // Kirim data ke view
    }
    public function delete($id)
    {
        $model = new NilaiModel();
        $model->delete($id); // Hapus data berdasarkan ID
        return redirect()->to('/data_mhs');
    }

    public function edit($id)
    {
        $model = new NilaiModel();
        $data['mahasiswa'] = $model->find($id); // Ambil data berdasarkan ID
        $data['title'] = 'Edit Data Mahasiswa'; // Judul halaman

        // Jika data tidak ditemukan, tampilkan 404
        if (!$data['mahasiswa']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Data dengan ID $id tidak ditemukan.");
        }

        return view('edit_mahasiswa', $data); // Tampilkan view edit
    }

    public function update($id)
    {
        $model = new NilaiModel();

        // Validasi data
        $this->validate([
            'nama' => 'required',
            'mata_kuliah' => 'required',
            'nilai_uts' => 'required|numeric',
            'nilai_uas' => 'required|numeric',
            'nilai_praktikum' => 'required|numeric',
        ]);

        // Ambil data dari request
        $nilai_uts = $this->request->getPost('nilai_uts');
        $nilai_uas = $this->request->getPost('nilai_uas');
        $nilai_praktikum = $this->request->getPost('nilai_praktikum');

        // Hitung nilai akhir
        $nilai_akhir = (0.35 * $nilai_uts) + (0.45 * $nilai_uas) + (0.20 * $nilai_praktikum);

        // Tentukan grade
        if ($nilai_akhir >= 81) {
            $grade = 'A';
            $status = 'Lulus';
        } elseif ($nilai_akhir >= 61) {
            $grade = 'B';
            $status = 'Lulus';
        } elseif ($nilai_akhir >= 41) {
            $grade = 'C';
            $status = 'Harus Mengikuti UM';
        } elseif ($nilai_akhir >= 21) {
            $grade = 'D';
            $status = 'Tidak Lulus dan Wajib Mengulang';
        } else {
            $grade = 'E';
            $status = 'Tidak Lulus dan Wajib Mengulang';
        }

        // Data yang akan disimpan
        $data = [
            'nama' => $this->request->getPost('nama'),
            'mata_kuliah' => $this->request->getPost('mata_kuliah'),
            'nilai_uts' => $nilai_uts,
            'nilai_uas' => $nilai_uas,
            'nilai_praktikum' => $nilai_praktikum,
            'nilai_akhir' => $nilai_akhir,
            'grade' => $grade,
            'status' => $status,
        ];

        // Update data di database
        $model->update($id, $data);

        // Redirect ke halaman data mahasiswa dengan pesan sukses
        return redirect()->to('/data_mhs')->with('success', 'Data berhasil diperbarui.');
    }
}
