<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Progress of Work</h1>
    <br><br>
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
                    <input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Type of Work" value="<?= $pekerja['jenis']; ?>">
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
                    <textarea type="text" class="form-control form-control-user" id="uraian" name="uraian" placeholder="Descriptin"><?= $pekerja['uraian']; ?></textarea>
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
                    <textarea type="text" class="form-control form-control-user" id="uraian" name="uraian" placeholder="Result Description"></textarea>
                </div>
                <div class="form-group">
                    Ket : <?php if ($pekerja['progress'] == 0) {
                                echo '<span class="badge bg-danger">Not Done</span>';
                            } else if ($pekerja['progress'] == 1) {
                                echo '<span class="badge bg-warning">Progress</span>';
                            } else {
                                echo '<span class="badge bg-success">Done</span>';
                            }
                            ?>
                    <div class="progress">
                        <?php if ($pekerja['progress'] == 0) {
                            echo '<div class="progress-bar" role="progressbar" aria-valuenow="3" style="width: 3%" aria-valuemin="0" aria-valuemax="100"></div>';
                        } else if ($pekerja['progress'] == 1) {
                            echo '<div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>';
                        } else {
                            echo '<div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>';
                        }
                        ?>
                    </div>
                </div>
            </form>
            <br>
        </div>
        <div class="col-md-7">
            <div class="container text-center">
                Work Progress Picture <br>
                <br>
                <img src="<?= base_url('assets/img/project/' . $pekerja['imgprogress']); ?>" alt="" class="img-thumbnail">
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->