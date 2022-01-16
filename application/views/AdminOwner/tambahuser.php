<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add New User</h1>
    <br>

    <div class="row">
        <div class="col-md-5">
            <form class="user" method="POST" action="<?= base_url('AdminOwner/tambahuser'); ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Name" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="User Email" value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="notelp" name="notelp" placeholder="User Phone Number" value="<?= set_value('notelp'); ?>">
                    <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="User Address" value="<?= set_value('alamat'); ?>">
                    <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <select class="form-select form-select-lg rounded-pill fs-6" id="role" name="role" aria-label="Default select example">
                        <option value="3">Superintendent</option>
                        <option value="4">Docking Monitoring</option>
                        <option value="5">Ship Manager</option>
                    </select>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                        <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Submit
                </button>
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->