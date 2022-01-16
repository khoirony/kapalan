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
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Name" value="<?= $user['nama']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="User Email" value="<?= $user['email']; ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="notelp" name="notelp" placeholder="User Phone Number" value="<?= $user['no_telp']; ?>">
                    <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="User Address" value="<?= $user['alamat']; ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <select class="form-select form-select-lg rounded-pill fs-6" id="role" name="role" aria-label="Default select example">
                        <option value="6">Project Leader</option>
                        <option value="7">QC/QA</option>
                        <option value="8">Workshop Officer</option>
                        <option value="9">Planning Department</option>
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