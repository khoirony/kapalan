<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Create Survey Schedule</h1>

    <div class="row ml-3">

        <div class="col-md-5">

            <form class="user" method="POST" action="<?= base_url('Superintendent/buatsurvey'); ?>" enctype="multipart/form-data">

                <div class="form-group">
                    <select class="form-select form-select-lg rounded-pill fs-6" id="kapal" name="kapal">
                        <?php
                        foreach ($kapal as $t) : ?>
                            <option value="<?= $t['id_kapal']; ?>"><?= $t['nama_kapal']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Survey Type" value="<?= set_value('jenis'); ?>">
                    <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" placeholder="Survey Date" value="<?= set_value('tanggal'); ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="kelas" name="kelas" placeholder="Classification Society" value="<?= set_value('kelas'); ?>">
                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Sertifikat</label>
                    <input type="file" id="sertifikat" name="sertifikat" class="form-control rounded-pill">
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