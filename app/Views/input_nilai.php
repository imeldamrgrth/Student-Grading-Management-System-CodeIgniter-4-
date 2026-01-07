<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 80vh;">
        <div class="form-container col-md-5">
            <h2 class="text-center mb-4">Input Nilai</h2>
            <form action="simpan_nilai.php" method="POST">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="mb-3">
                    <label for="mataKuliah" class="form-label">Mata Kuliah</label>
                    <input type="text" class="form-control" id="mataKuliah" name="mata_kuliah" required>
                </div>
                <div class="mb-3">
                    <label for="nilaiUTS" class="form-label">Nilai UTS</label>
                    <input type="number" class="form-control" id="nilaiUTS" name="nilai_uts" required>
                </div>
                <div class="mb-3">
                    <label for="nilaiUAS" class="form-label">Nilai UAS</label>
                    <input type="number" class="form-control" id="nilaiUAS" name="nilai_uas" required>
                </div>
                <div class="mb-3">
                    <label for="nilaiPraktikum" class="form-label">Nilai Praktikum</label>
                    <input type="number" class="form-control" id="nilaiPraktikum" name="nilai_praktikum" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </form>
        </div>
    </div>
<?= $this->endSection(); ?>