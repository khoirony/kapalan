<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ajukan Revisi</h1>
    <br>
    <div class="row">
        <div class="col-md-5">
            <form class="user" method="POST" action="">
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
                <div class="form-group">
                    <textarea type="text" class="form-control form-control-user" id="uraian" name="uraian" placeholder="Alasan Pengajuan"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Ajukan Revisi</button>
            </form>
            <br>
        </div>
    </div>

</div>
<!-- /.container-fluid -->