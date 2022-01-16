<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Register Your Company</h1>
                        </div>
                        <br>
                        <form class="user" method="POST" action="<?= base_url('Auth/registration'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Company Name" value="<?= set_value('nama'); ?>">
                                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Company Email" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="notelp" name="notelp" placeholder="Company Phone Number" value="<?= set_value('notelp'); ?>">
                                <?= form_error('notelp', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nofax" name="nofax" placeholder="Company Fax Number" value="<?= set_value('nofax'); ?>">
                                <?= form_error('nofax', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Company Address" value="<?= set_value('alamat'); ?>">
                                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="kodepos" name="kodepos" placeholder="Post Code" value="<?= set_value('kodepos'); ?>">
                                <?= form_error('kodepos', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <select class="form-select form-select-lg rounded-pill fs-6" id="role" name="role" aria-label="Default select example">
                                    <option value="1">Shipyard</option>
                                    <option value="2">Ship Owner</option>
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
                                Register Account
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url('Auth'); ?>">Already have an account? Login!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>