<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Maintenance Report</h1>

    <div class="row ml-3">
        <div class="col-md-5">

            <form class="user" method="POST" action="<?= base_url('Superintendent/updatedata'); ?>">
                <input type="hidden" id="id" name="id" value="<?= $maintenance['id_maintenance']; ?>">
                <input type="hidden" id="kapal" name="kapal" value="<?= $maintenance['kapal']; ?>">

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tanggal" name="tanggal" placeholder="Date" value="<?= $kapal['nama_kapal']; ?>" disabled>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" placeholder="Date" value="<?= $maintenance['tanggal']; ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="komponen" name="komponen" placeholder="Ship Components" value="<?= $maintenance['komponen']; ?>">
                    <?= form_error('komponen', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="pembuat" name="pembuat" placeholder="Component Maker" value="<?= $maintenance['pembuat']; ?>">
                    <?= form_error('pembuat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tipe" name="tipe" placeholder="Component Type" value="<?= $maintenance['tipe']; ?>">
                    <?= form_error('tipe', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <textarea type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Description"><?= $maintenance['deskripsi']; ?></textarea>
                    <?= form_error('deskripsi', '<small class="text-danger pl-3">', '</small>'); ?>
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