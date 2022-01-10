<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <!-- Content -->
    <div class="row text-white pt-3 pb-5 justify-content-center">
        <div class="card bg-info" style="width: 19rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-ship"></i>
                </div>
                <h5 class="card-title">Jumlah Galangan</h5>
                <div class="display-4">
                    <?php
                    $query = 'SELECT* FROM galangan WHERE perusahaan =' . $user['perusahaan'];
                    $cek = $this->db->query($query)->num_rows();
                    echo $cek;
                    ?>
                </div>
            </div>
        </div>

        <div class="card bg-success ml-5" style="width: 19rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h5 class="card-title">Jumlah Booking</h5>
                <div class="display-4">
                    <?php
                    $query = 'SELECT* FROM booking WHERE perusahaan_galangan =' . $user['perusahaan'] . " AND kapal != 0";
                    $cek = $this->db->query($query)->num_rows();
                    echo $cek;
                    ?>
                </div>
            </div>
        </div>

        <div class="card bg-secondary ml-5" style="width: 19rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-spinner"></i>
                </div>
                <h5 class="card-title">Jumlah Ongoing Project</h5>
                <div class="display-4">
                    <?php
                    $query = 'SELECT* FROM repair WHERE perusahaan_galangan =' . $user['perusahaan'];
                    $cek = $this->db->query($query)->num_rows();
                    echo $cek;
                    ?>
                </div>
                <a href="<?= base_url('Qcqa/ongoing'); ?>">
                    <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>
    </div>
    <!-- End Of Content -->


</div>
<!-- /.container-fluid -->