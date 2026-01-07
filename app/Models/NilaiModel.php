<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiModel extends Model
{
    protected $table      = 'nilai_mahasiswa'; // Nama tabel
    protected $primaryKey = 'id'; // Primary key
    protected $allowedFields = ['nama', 'mata_kuliah', 'nilai_uts', 'nilai_uas', 'nilai_praktikum', 'nilai_akhir', 'grade', 'status']; // Kolom yang diizinkan diinsert

    // Fungsi untuk menghitung nilai akhir
    public function hitungNilaiAkhir($nilai_uts, $nilai_uas, $nilai_praktikum)
    {
        return (0.35 * $nilai_uts) + (0.45 * $nilai_uas) + (0.20 * $nilai_praktikum);
    }

    // Fungsi untuk menghitung grade
    public function hitungGrade($nilai_akhir)
    {
        if ($nilai_akhir >= 81) return 'A';
        if ($nilai_akhir >= 61) return 'B';
        if ($nilai_akhir >= 41) return 'C';
        if ($nilai_akhir >= 21) return 'D';
        return 'E';
    }

    // Fungsi untuk menghitung status
    public function hitungStatus($grade)
    {
        if ($grade == 'A' || $grade == 'B') return 'Lulus';
        if ($grade == 'C') return 'Harus Mengikuti UM';
        return 'Tidak Lulus dan Wajib Mengulang';
    }
}
