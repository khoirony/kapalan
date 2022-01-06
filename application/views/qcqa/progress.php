<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Progress Pengerjaan</h1>
    <br><br>
    <div class="row">
        <div class="col-md-5">
            <form class="user" method="POST" action="<?= base_url('Qcqa/updateprogress'); ?>">
                <input type="hidden" id="id" name="id" value="<?= $pekerja['id_pekerjaan']; ?>">
                <input type="hidden" id="id_repair" name="id_repair" value="<?= $pekerja['repair']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="" name="" value="<?= $kapal['nama_kapal']; ?>" disabled>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="" name="" value="<?= $pekerja['bidang']; ?>" disabled>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Jenis Pekerjaan" value="<?= $pekerja['jenis']; ?>">
                    <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user" id="date1" name="date1" value="<?= $pekerja['tgl_awal']; ?>" disabled>
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control form-control-user" id="date2" name="date2" value="<?= $pekerja['tgl_akhir']; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control form-control-user" id="uraian" name="uraian" placeholder="Uraian"><?= $pekerja['uraian']; ?></textarea>
                </div>
                <hr>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user" id="date1" name="date1" value="<?= $pekerja['tgl_awal']; ?>" disabled>
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control form-control-user" id="date2" name="date2" value="<?= $pekerja['tgl_akhir']; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control form-control-user" id="uraian" name="uraian" placeholder="Uraian Hasil Pengerjaan"><?= $pekerja['hasil_pengerjaan']; ?></textarea>
                </div>
                <div class="form-group">
                    Progress :
                    <div class="form-check">
                        <div class="row">
                            <div class="col">
                                <input class="form-check-input" type="radio" name="progress" id="progress" value="0" <?php
                                                                                                                        if ($pekerja['progress'] == 0) {
                                                                                                                            echo 'checked';
                                                                                                                        }
                                                                                                                        ?>>
                                <label class="form-check-label" for="progress1">
                                    Belum
                                </label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="radio" name="progress" id="progress" value="1" <?php
                                                                                                                        if ($pekerja['progress'] == 1) {
                                                                                                                            echo 'checked';
                                                                                                                        }
                                                                                                                        ?>>
                                <label class="form-check-label" for="progress1">
                                    Proses
                                </label>
                            </div>
                            <div class="col">
                                <input class="form-check-input" type="radio" name="progress" id="progress" value="2" <?php
                                                                                                                        if ($pekerja['progress'] == 2) {
                                                                                                                            echo 'checked';
                                                                                                                        }
                                                                                                                        ?>>
                                <label class="form-check-label" for="progress1">
                                    Selesai
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Update Progress</button>
            </form>
            <br>
        </div>
    </div>
</div>
<!-- /.container-fluid -->