<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-5">
    <div style="background: rgba(255, 255, 255, 0.8); padding: 20px; border-radius: 10px;">
        <h1>Data Mahasiswa</h1>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Mata Kuliah</th>
                    <th>Nilai UTS</th>
                    <th>Nilai UAS</th>
                    <th>Nilai Praktikum</th>
                    <th>Nilai Akhir</th>
                    <th>Grade</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($nilai_mahasiswa)): ?>
                    <?php foreach ($nilai_mahasiswa as $mahasiswa): ?>
                        <tr>
                            <td><?= esc($mahasiswa['nama']); ?></td>
                            <td><?= esc($mahasiswa['mata_kuliah']); ?></td>
                            <td><?= esc($mahasiswa['nilai_uts']); ?></td>
                            <td><?= esc($mahasiswa['nilai_uas']); ?></td>
                            <td><?= esc($mahasiswa['nilai_praktikum']); ?></td>
                            <td><?= number_format($mahasiswa['nilai_akhir'], 2); ?></td>
                            <td><?= esc($mahasiswa['grade']); ?></td>
                            <td><?= esc($mahasiswa['status']); ?></td>
                            <td>
                                <button class="btn btn-warning btn-edit" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editModal" 
                                        data-id="<?= esc($mahasiswa['id']); ?>"
                                        data-nama="<?= esc($mahasiswa['nama']); ?>"
                                        data-mata-kuliah="<?= esc($mahasiswa['mata_kuliah']); ?>"
                                        data-nilai-uts="<?= esc($mahasiswa['nilai_uts']); ?>"
                                        data-nilai-uas="<?= esc($mahasiswa['nilai_uas']); ?>"
                                        data-nilai-praktikum="<?= esc($mahasiswa['nilai_praktikum']); ?>">
                                    Edit
                                </button>
                                <a href="<?= base_url('data_mhs/delete/' . $mahasiswa['id']); ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editForm" action="" method="post">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Data Mahasiswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editId" name="id">
                    <div class="mb-3">
                        <label for="editNama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="editNama" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="editMataKuliah" class="form-label">Mata Kuliah</label>
                        <input type="text" class="form-control" id="editMataKuliah" name="mata_kuliah" required>
                    </div>
                    <div class="mb-3">
                        <label for="editNilaiUTS" class="form-label">Nilai UTS</label>
                        <input type="number" class="form-control" id="editNilaiUTS" name="nilai_uts" required>
                    </div>
                    <div class="mb-3">
                        <label for="editNilaiUAS" class="form-label">Nilai UAS</label>
                        <input type="number" class="form-control" id="editNilaiUAS" name="nilai_uas" required>
                    </div>
                    <div class="mb-3">
                        <label for="editNilaiPraktikum" class="form-label">Nilai Praktikum</label>
                        <input type="number" class="form-control" id="editNilaiPraktikum" name="nilai_praktikum" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // Isi data pada modal edit
    document.querySelectorAll('.btn-edit').forEach(button => {
        button.addEventListener('click', function() {
            document.getElementById('editId').value = this.dataset.id;
            document.getElementById('editNama').value = this.dataset.nama;
            document.getElementById('editMataKuliah').value = this.dataset.mataKuliah;
            document.getElementById('editNilaiUTS').value = this.dataset.nilaiUts;
            document.getElementById('editNilaiUAS').value = this.dataset.nilaiUas;
            document.getElementById('editNilaiPraktikum').value = this.dataset.nilaiPraktikum;
            
            // Set action form ke endpoint update
            document.getElementById('editForm').action = <?= base_url('data_mhs/update'); ?>/${this.dataset.id};
        });
    });
</script>

<?= $this->endSection() ?>
