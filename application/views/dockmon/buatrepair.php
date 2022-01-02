<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Buat Repair List</h1>

    <div class="row ml-3">
        <div class="col-md-5">
            <form class="user" method="POST" action="<?= base_url('dockmon/buatrepair'); ?>">
                <input type="hidden" id="id" name="id" value="<?= $booking['booking_id']; ?>">
                <input type="hidden" id="kapal" name="kapal" value="<?= $kapal['id']; ?>">
                <input type="hidden" id="perusahaan" name="perusahaan" value="<?= $perusahaan['id']; ?>">
                <input type="hidden" id="galangan" name="galangan" value="<?= $galangan['id']; ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="" name="" placeholder="" value="<?= $kapal['nama']; ?>" disabled>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="" name="" placeholder="" value="<?= $perusahaan['nama']; ?>" disabled>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="" name="" placeholder="" value="<?= $galangan['nama']; ?>" disabled>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="kelas" name="kelas" placeholder="Kelas Kapal" value="<?= set_value('kelas'); ?>">
                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Jenis Survey" value="<?= set_value('jenis'); ?>">
                    <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="date" class="form-control form-control-user" id="date1" name="date1" placeholder="Tanggal Awal" value="<?= $booking['tgl_mulai']; ?>">
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control form-control-user" id="date2" name="date2" placeholder="Tanggal Akhir" value="<?= $booking['tgl_akhir']; ?>">
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