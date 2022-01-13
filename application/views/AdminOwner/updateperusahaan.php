<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Perusahaan</h1>
    <br>
    <div class="row ml-3">
        <div class="col-md-5 pt-4">
            <form class="user" method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value="<?= $perusahaan['id_perusahaan']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Perusahaan" value="<?= $perusahaan['nama_perusahaan']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= $perusahaan['email_perusahaan']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="notelp" name="notelp" placeholder="No Telp Perusahaan" value="<?= $perusahaan['no_telp']; ?>">

                    <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nofax" name="nofax" placeholder="No Fax Perusahaan" value="<?= $perusahaan['no_fax']; ?>">
                    <?= form_error('nofax', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="kodepos" name="kodepos" placeholder="Kode Pos" value="<?= $perusahaan['kode_pos']; ?>">
                    <?= form_error('kodepos', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="alamat" value="<?= $perusahaan['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="kota" name="kota" placeholder="Kota" value="<?= $perusahaan['kota']; ?>">
                    <?= form_error('kota', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <label for="formFile" class="form-label">Upload Logo Perusahaan</label>
                    <input type="file" id="logo" name="logo" class="form-control rounded-pill">
                </div>
        </div>
        <div class="col-6 ml-5">
            <div class="form-group text-center">
                Deskripsi
                <textarea type="text" class="form-control form-control-user rounded mt-2" id="deskripsi" name="deskripsi" placeholder="Deskripsi" rows="15"><?= $perusahaan['deskripsi_perusahaan']; ?></textarea>
                <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label for="formFile" class="form-label">Upload Foto Perusahaan</label>
                <div class="row">
                    <div class="col-6">
                        <input type="file" id="image1" name="image1" class="form-control rounded-pill">
                    </div>
                    <div class="col-6">
                        <input type="file" id="image2" name="image2" class="form-control rounded-pill">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user rounded-pill btn-block">
                Submit
            </button>
        </div>
    </div>
</div>
<!-- /.container-fluid -->