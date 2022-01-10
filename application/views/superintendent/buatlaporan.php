<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Buat Laporan Maintenance</h1>

    <div class="row ml-3">
        <div class="col-md-5">
            <form class="user" method="POST" action="<?= base_url('Superintendent/buatlaporan'); ?>">
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
                    <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" placeholder="Date" value="<?= set_value('tanggal'); ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="komponen" name="komponen" placeholder="Ship Components" value="<?= set_value('komponen'); ?>">
                    <?= form_error('komponen', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="pembuat" name="pembuat" placeholder="Component Maker" value="<?= set_value('pembuat'); ?>">
                    <?= form_error('pembuat', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tipe" name="tipe" placeholder="Component Type" value="<?= set_value('tipe'); ?>">
                    <?= form_error('tipe', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control form-control-user" id="deskripsi" name="deskripsi" placeholder="Description" value="<?= set_value('deskripsi'); ?>"></textarea>
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