<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Request Booking</h1>
    <br>

    <div class="row">
        <div class="col-md-5">
            <form class="user" method="POST" action="<?= base_url('dockmon/addbooking'); ?>">
                <input type="hidden" id="galangan" name="galangan" value="<?= $galangan['id_galangan']; ?>">
                <input type="hidden" id="perusahaan_galangan" name="perusahaan_galangan" value="<?= $galangan['perusahaan']; ?>">
                <input type="hidden" id="perusahaan_kapal" name="perusahaan_kapal" value="<?= $kapal['perusahaan']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="gal" name="gal" value="<?= $galangan['nama_galangan']; ?>" disabled>
                </div>
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
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span class="ml-2">Tanggal Mulai</span>
                        <input type="date" class="form-control form-control-user" id="tglawal" name="tglawal" placeholder="Tanggal Mulai">
                        <?= form_error('tglawal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="col-sm-6">
                        <span class="ml-2">Tanggal Selesai</span>
                        <input type="date" class="form-control form-control-user" id="tglakhir" name="tglakhir" placeholder="Tanggal Selesai">
                    </div>
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