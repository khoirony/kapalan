<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Dock Space</h1>
    <br>

    <div class="row">
        <div class="col-md-5">
            <form class="user" method="POST" action="">

                <input type="hidden" id="id" name="id" value="<?= $galangan['id_galangan']; ?>">
                <input type="hidden" id="idperusahaan" name="idperusahaan" value="<?= $perusahaan['id_perusahaan']; ?>">

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Dock Name" value="<?= $galangan['nama_galangan']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tipe" name="tipe" placeholder="Dock Type" value="<?= $galangan['tipe']; ?>">
                    <?= form_error('tipe', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="panjang" name="panjang" placeholder="Length" value="<?= $galangan['panjang']; ?>">
                    <?= form_error('panjang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="lebar" name="lebar" placeholder="Width" value="<?= $galangan['lebar']; ?>">
                    <?= form_error('lebar', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="draft" name="draft" placeholder="Draft" value="<?= $galangan['draft']; ?>">
                    <?= form_error('draft', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="dwt" name="dwt" placeholder="DWT" value="<?= $galangan['dwt']; ?>">
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