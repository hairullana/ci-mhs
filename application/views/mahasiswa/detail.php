<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        <div class="card">
            <h5 class="card-header">Detail Data Mahasiswa</h5>
            <div class="card-body">
                <h5 class="card-title"><?= $mahasiswa['nama'] ?></h5>
                <p class="card-text"><?= $mahasiswa['nim'] ?></p>
                <p class="card-text"><?= $mahasiswa['email'] ?></p>
                <p class="card-text"><?= $mahasiswa['jurusan'] ?></p>
                <a href="<?= base_url(); ?>mahasiswa" class="btn btn-primary">Kembali</a>
            </div>
        </div>
        </div>
    </div>
</div>