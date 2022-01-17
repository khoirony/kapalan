<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Request Booking</h1>
    <br>

    <div class="row">
        <div class="col-md-5">

            <form class="user" method="POST" action="">

                <input type="hidden" id="id" name="id" value="<?= $booking['id_booking']; ?>">
                <input type="hidden" id="jenis" name="jenis" value="<?= $booking['jenis']; ?>">

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="gal" name="gal" value="<?= $galangan['nama_galangan']; ?>" disabled>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="gal" name="gal" value="<?= $kapal['nama_kapal']; ?>" disabled>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="gal" name="gal" value="<?= $booking['jenis']; ?>" disabled>
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span class="ml-2">Start Date</span>
                        <input type="date" class="form-control form-control-user" id="tglawal" name="tglawal" placeholder="Tanggal Mulai" value="<?= $booking['tgl_mulai']; ?>">
                        <?= form_error('tglawal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="col-sm-6">
                        <span class="ml-2">Finish Date</span>
                        <input type="date" class="form-control form-control-user" id="tglakhir" name="tglakhir" placeholder="Tanggal Selesai" value="<?= $booking['tgl_akhir']; ?>">
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