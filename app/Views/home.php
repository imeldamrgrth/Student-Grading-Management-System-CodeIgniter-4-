<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container py-5">
    <!-- Seluruh konten dalam satu card -->
    <div class="card mb-4">
        <div class="card-body">
            <!-- Nama Universitas -->
            <div class="text-center mb-4">
                <h1 class="fw-bold">Universitas Gunadarma</h1>
                <p class="text-muted">Tempat belajar dengan kualitas pendidikan terbaik.</p>
            </div>

            <!-- Sejarah -->
            <div class="mb-4">
                <h3 class="fw-bold">Sejarah</h3>
                <p>
                    Universitas Gunadarma didirikan pada tahun 1980 dengan visi untuk menjadi pusat pendidikan terkemuka di Indonesia. Dengan komitmen untuk menciptakan generasi yang unggul, universitas ini terus berkembang dan berkontribusi pada kemajuan pendidikan nasional.
                </p>
            </div>

            <!-- Lokasi -->
            <div class="mb-4">
                <h3 class="fw-bold">Lokasi</h3>
                <p>
                    Universitas Gunadarma berlokasi di:
                </p>
                <p><i class="bi bi-geo-alt"></i> Jl. Margonda Raya No.100, Depok, Jawa Barat, Indonesia.</p>
            </div>

            <!-- Kontak -->
            <div class="mb-4">
                <h3 class="fw-bold">Kontak</h3>
                <ul class="list-unstyled">
                    <li><i class="bi bi-envelope"></i> Email: info@gunadarma.ac.id</li>
                    <li><i class="bi bi-telephone"></i> Telepon: +62 123 4567 890</li>
                    <li><i class="bi bi-globe"></i> Website: <a href="https://gunadarma.ac.id" class="text-decoration-none" target="_blank">gunadarma.ac.id</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection(); ?>
