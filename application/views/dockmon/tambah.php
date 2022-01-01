<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add Your Company</h1>
    <br>

    <div class="row">
        <div class="col-md-5">
            <?= $this->session->flashdata('msg');
            if (isset($_SESSION['msg'])) {
                unset($_SESSION['msg']);
            } ?>

            <form class="user" method="POST" action="<?= base_url('owner/tambah'); ?>">
                <input type="hidden" id="idPerusahaan" name="idPerusahaan" value="<?= $user['id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="NamaPerusahaan" name="NamaPerusahaan" placeholder="Nama Perusahaan" value="<?= set_value('NamaPerusahaan'); ?>">
                    <?= form_error('NamaPerusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="AlamatPerusahaan" name="AlamatPerusahaan" placeholder="Alamat Perusahaan" value="<?= set_value('AlamatPerusahaan'); ?>">
                    <?= form_error('AlamatPerusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="EmailPerusahaan" name="EmailPerusahaan" placeholder="Email Perusahaan" value="<?= set_value('EmailPerusahaan'); ?>">
                    <?= form_error('EmailPerusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="NoTelpPerusahaan" name="NoTelpPerusahaan" placeholder="No Telp Perusahaan" value="<?= set_value('name'); ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="NoFaxPerusahaan" name="NoFaxPerusahaan" placeholder="No Fax Perusahaan" value="<?= set_value('NoFaxPerusahaan'); ?>">
                    <?= form_error('NoFaxPerusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="KodePosPerusahaan" name="KodePosPerusahaan" placeholder="Kode Pos Perusahaan" value="<?= set_value('KodePosPerusahaan'); ?>">
                    <?= form_error('KodePosPerusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
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