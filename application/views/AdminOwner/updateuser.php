<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update User</h1>
    <br>

    <div class="row">
        <div class="col-md-5">
            <form class="user" method="POST" action="">
                <input type="hidden" id="id" name="id" placeholder="Id Kapal" value="<?= $user['id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Pengguna" value="<?= $user['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Pengguna" value="<?= $user['email']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="notelp" name="notelp" placeholder="No Telp pengguna" value="<?= $user['no_telp']; ?>">
                    <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat Pengguna" value="<?= $user['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <select class="form-select form-select-lg rounded-pill fs-6" id="role" name="role" aria-label="Default select example">
                        <option value="3">Superintendent</option>
                        <option value="4">Docking Monitoring</option>
                        <option value="5">Ship Manager</option>
                    </select>
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