<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perusahaan Saya</h1>
    <br>
    <?= $this->session->flashdata('msg');
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    } ?>
    <br>
    <div class="row">
        <div class="col-3">
            Nama Perusahaan
        </div>
        <div class="col-5">
            : <?= $perusahaan['nama_perusahaan']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Email Perusahaan
        </div>
        <div class="col-5">
            : <?= $perusahaan['email']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Nomor Telp Perusahaan
        </div>
        <div class="col-5">
            : <?= $perusahaan['no_telp']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Nomor Fax Perusahaan
        </div>
        <div class="col-5">
            : <?= $perusahaan['no_fax']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Kode Pos Perusahaan
        </div>
        <div class="col-5">
            : <?= $perusahaan['kode_pos']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Alamat Perusahaan
        </div>
        <div class="col-5">
            : <?= $perusahaan['alamat']; ?>, <?= $perusahaan['kota']; ?>
        </div>
    </div>

    <br><br>
    <?php
    echo anchor('adminowner/updateperusahaan/' . $perusahaan['id_perusahaan'], '<div class="btn btn-sm btn-primary rounded-pill pl-3 pr-3">Update Perusahaan</div>');
    ?>



</div>
<!-- /.container-fluid -->