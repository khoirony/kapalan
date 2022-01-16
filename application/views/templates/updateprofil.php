<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Perusahaan</h1>
    <br>
    <div class="row ml-3">
        <div class="col-md-5 pt-4">
            <form class="user" method="POST" action="" enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value="<?= $user['id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Pengguna" value="<?= $user['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email" value="<?= $user['email']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="notelp" name="notelp" placeholder="No Telp Perusahaan" value="<?= $user['no_telp']; ?>">
                    <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jabatan" name="jabatan" placeholder="No Telp Perusahaan" value="<?= $user['jabatan']; ?>" disabled>
                    <?= form_error('jabatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="perusahaan" name="perusahaan" placeholder="No Telp Perusahaan" value="<?= $perusahaan['nama_perusahaan']; ?>" disabled>
                    <?= form_error('perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="alamat" value="<?= $user['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <button type="submit" class="btn btn-primary btn-user rounded-pill btn-block">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->