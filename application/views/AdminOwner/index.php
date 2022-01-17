<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>

    <!-- Content -->
    <div class="row text-white pt-3 pb-5 justify-content-center">
        <div class="card bg-secondary" style="width: 19rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h5 class="card-title">User</h5>
                <div class="display-4">
                    <?= --$hitunguser; ?>
                </div>
                <a href="<?= base_url('AdminOwner/user'); ?>">
                    <p class="card-text text-white">Lihat Detail <i class="fas fa-angle-double-right ml-2"></i></p>
                </a>
            </div>
        </div>

        <div class="card bg-info ml-5" style="width: 19rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-ship"></i>
                </div>
                <h5 class="card-title">Fleet</h5>
                <div class="display-4">
                    <?= $hitungkapal; ?>
                </div>
            </div>
        </div>

        <div class="card bg-success ml-5" style="width: 19rem;">
            <div class="card-body">
                <div class="card-body-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h5 class="card-title">Closest Survey</h5>
                <div class="display-4">
                    <?= $hitungsurvey['selisih']; ?> Days
                </div>
            </div>
        </div>
    </div>
    <!-- End Of Content -->


</div>
<!-- /.container-fluid -->