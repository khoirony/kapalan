<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Dock Space</h1>
    <br>

    <div class="row">
        <div class="col-md-5">
            <form class="user" method="POST" action="<?= base_url('shipyard/tambahdock'); ?>">
                <input type="hidden" id="iddock" name="iddock" value="<?= $user['id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="NamaDock" name="NamaDock" placeholder="Nama Dock" value="<?= set_value('NamaDock'); ?>">
                    <?= form_error('NamaDock', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="TipeDock" name="TipeDock" placeholder="Tipe Dock" value="<?= set_value('TipeDock'); ?>">
                    <?= form_error('TipeDock', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="Panjang" name="Panjang" placeholder="Panjang Dock" value="<?= set_value('Panjang'); ?>">
                    <?= form_error('Panjang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="Lebar" name="Lebar" placeholder="Lebar Dock" value="<?= set_value('Lebar'); ?>">
                    <?= form_error('Lebar', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="Draft" name="Draft" placeholder="Draft" value="<?= set_value('Draft'); ?>">
                    <?= form_error('Draft', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="dwt" name="dwt" placeholder="DWT" value="<?= set_value('dwt'); ?>">
                    <?= form_error('dwt', '<small class="text-danger pl-3">', '</small>'); ?>
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