<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Worker</h1>
    <br>

    <div class="row">

        <div class="col-md-5">

            <form class="user" method="POST" action="<?= base_url('DockMon/updatekerja'); ?>">
                <input type="hidden" class="form-control form-control-user" id="id_repair" name="id_repair" value="<?= $pekerja['repair']; ?>">
                <input type="hidden" class="form-control form-control-user" id="id_pekerjaan" name="id_pekerjaan" value="<?= $pekerja['id_pekerjaan']; ?>">
                <input type="hidden" class="form-control form-control-user" id="kapal" name="kapal" value="<?= $pekerja['kapal']; ?>">
                <input type="hidden" class="form-control form-control-user" id="tgl_awal" name="tgl_awal" value="<?= $pekerja['tgl_awal']; ?>">
                <input type="hidden" class="form-control form-control-user" id="tgl_akhir" name="tgl_akhir" value="<?= $pekerja['tgl_akhir']; ?>">

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="" name="" value="<?= $kapal['nama_kapal']; ?>" disabled>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span class="ml-2">Start Date</span>
                        <input type="date" class="form-control form-control-user" id="" name="" value="<?= $pekerja['tgl_awal']; ?>" disabled>
                    </div>
                    <div class="col-sm-6">
                        <span class="ml-2">Finish Date</span>
                        <input type="date" class="form-control form-control-user" id="" name="" value="<?= $pekerja['tgl_akhir']; ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="bidang" name="bidang" placeholder="Field of Work" value="<?= $pekerja['bidang']; ?>">
                    <?= form_error('bidang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Type of Work" value="<?= $pekerja['jenis']; ?>">
                    <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <textarea type="text" class="form-control form-control-user" id="uraian" name="uraian" placeholder="Description"><?= $pekerja['uraian']; ?></textarea>
                    <?= form_error('uraian', '<small class="text-danger pl-3">', '</small>'); ?>
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