<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Lihat data <?= $perusahaan['nama']; ?></h1>

    <div class="row">
        <div class="col-3">
            Nama Perusahaan
        </div>
        <div class="col-5">
            : <?= $perusahaan['nama']; ?>
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
            : <?= $perusahaan['alamat']; ?>
        </div>
    </div>



</div>
<!-- /.container-fluid -->