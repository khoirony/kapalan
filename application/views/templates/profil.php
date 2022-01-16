<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>
    <br>

    <div class="row">
        <div class="col-5">
            <div class="text-center">
                <img src="<?= base_url('assets/img/perusahaan/' . $perusahaan['logo']); ?>" class="img-thumbnail" alt="image1" style="height: 200px">
            </div>
        </div>
        <div class="col-5">
            <div class="row pt-2">
                <div class="col-3">
                    Nama
                </div>
                <div class="col-7">
                    : <?= $user['nama']; ?>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-3">
                    Email
                </div>
                <div class="col-7">
                    : <?= $user['email']; ?>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-3">
                    Phone
                </div>
                <div class="col-7">
                    : <?= $user['no_telp']; ?>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-3">
                    Jabatan
                </div>
                <div class="col-7">
                    : <?= $user['jabatan']; ?>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-3">
                    Perusahaan
                </div>
                <div class="col-7">
                    : <?= $perusahaan['nama_perusahaan']; ?>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-3">
                    Alamat
                </div>
                <div class="col-7">
                    : <?= $user['alamat']; ?>
                </div>
            </div>

        </div>
    </div>
    <br><br>
    <?php
    $role_id = $this->session->userdata('role_id');
    if ($role_id == 1) {
        $url = 'Shipyard';
    } else if ($role_id == 2) {
        $url = 'AdminOwner';
    } else if ($role_id == 3) {
        $url = 'Superintendent';
    } else if ($role_id == 4) {
        $url = 'DockMon';
    } else if ($role_id == 5) {
        $url = 'ShipMan';
    } else if ($role_id == 6) {
        $url = 'ProjectLeader';
    } else if ($role_id == 7) {
        $url = 'Qcqa';
    } else if ($role_id == 8) {
        $url = 'WorkshopOfficer';
    } else if ($role_id == 9) {
        $url = 'Planning';
    } else if ($role_id == 0) {
        $url = 'SuperAdmin';
    } else {
        $url = 'Auth';
    }
    echo anchor($url . '/updateprofil/' . $user['id'], '<div class="btn btn-sm btn-primary rounded-pill pl-3 pr-3 ml-5">Update Profile</div>');
    ?>





</div>
<!-- /.container-fluid -->