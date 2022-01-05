<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Perusahaan</h1>
    <br>
    <div class="row ml-3">
        <div class="col-md-5">
            <form class="user" method="POST" action="">
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

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Submit
                </button>
            </form>
            <br>
        </div>
    </div>
</div>
<!-- /.container-fluid -->