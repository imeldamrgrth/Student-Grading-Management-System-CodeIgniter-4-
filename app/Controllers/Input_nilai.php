<?php

namespace App\Controllers;

use App\Models\NilaiModel;

class Input_nilai extends BaseController
{
    public function index()
    {
        $data_judul = [
            'title' => 'Input Nilai Mahasiswa'
        ];
        return view('input_nilai',$data_judul);
    }

    public function simpan()
    {
        $model = new NilaiModel();

        // Ambil inputan dari form
        $nilai_uts = $this->request->getVar('nilai_uts');
        $nilai_uas = $this->request->getVar('nilai_uas');
        $nilai_praktikum = $this->request->getVar('nilai_praktikum');
        
        // Hitung nilai akhir, grade, dan status
        $nilai_akhir = $model->hitungNilaiAkhir($nilai_uts, $nilai_uas, $nilai_praktikum);
        $grade = $model->hitungGrade($nilai_akhir);
        $status = $model->hitungStatus($grade);

        // Data yang akan disimpan
        $data = [
            'nama' => $this->request->getVar('nama'),
            'mata_kuliah' => $this->request->getVar('mata_kuliah'),
            'nilai_uts' => $nilai_uts,
            'nilai_uas' => $nilai_uas,
            'nilai_praktikum' => $nilai_praktikum,
            'nilai_akhir' => $nilai_akhir,
            'grade' => $grade,
            'status' => $status
        ];

        // Simpan data ke database
        $model->save($data);

        return redirect()->to('/data_mhs');
    }
}
