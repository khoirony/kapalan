<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Buat Jadwal Survey</h1>

    <div class="row ml-3">
        <div class="col-md-5">
            <form class="user" method="POST" action="<?= base_url('Superintendent/buatsurvey'); ?>">
                <div class="form-group">
                    <select class="form-select form-select-lg rounded-pill fs-6" id="kapal" name="kapal">
                        <?php
                        $query = "SELECT * FROM kapal where perusahaan = " . $user['perusahaan'];
                        $Tampil = $this->db->query($query)->result_array();
                        foreach ($Tampil as $t) : ?>
                            <option value="<?= $t['id_kapal']; ?>"><?= $t['nama_kapal']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Jenis Survey" value="<?= set_value('jenis'); ?>">
                    <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" placeholder="Tanggal Survey" value="<?= set_value('tanggal'); ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="kelas" name="kelas" placeholder="Kelas Kapal" value="<?= set_value('kelas'); ?>">
                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="sertifikat" name="sertifikat" placeholder="Upload Sertifikat" value="<?= set_value('sertifikat'); ?>">
                    <?= form_error('sertifikat', '<small class="text-danger pl-3">', '</small>'); ?>
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