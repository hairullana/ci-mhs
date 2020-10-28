<div class="container">

    <div class="row mt-3">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    Tambah Data Mahasiswa
                </div>
                <!-- jika ada validasi error -->
                <div class="card-body">

                    <!-- tidak dipakai -->
                    <!-- <?php if ( validation_errors() ) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?= validation_errors(); ?>
                        </div>
                    <?php endif; ?> -->
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                            <small class="form-text text-danger"><?= form_error('nama'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="nim">NIM</label>
                            <input type="text" class="form-control" id="nim" name="nim">
                            <small class="form-text text-danger"><?= form_error('nim'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select class="form-control" id="jurusan" name="jurusan">
                                <!-- pengkondisian untuk option selected jurusan -->
                                <?php foreach ( $jurusan as $jur ) : ?>
                                    <?php if ( $jur == $mahasiswa["jurusan"] ) : ?>
                                        <option value="<?= $jur ?>" selected><?= $jur ?></option>
                                    <?php else : ?>
                                        <option value="<?= $jur ?>"><?= $jur ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="Submit" name="tambahData" class="btn btn-primary float-right">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>