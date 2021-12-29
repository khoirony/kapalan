<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kapal Saya</h1>

    <div class="row">
        <div class="col-3">
            Nama Kapal
        </div>
        <div class="col-5">
            : <?= $kapal['nama']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            IMO
        </div>
        <div class="col-5">
            : <?= $kapal['imo']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Milik Perusahaan
        </div>
        <div class="col-5">
            : <?= $perusahaan['nama']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Tahun Pembuatan Kapal
        </div>
        <div class="col-5">
            : <?= $kapal['tahun_pembuatan']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Tipe Kapal
        </div>
        <div class="col-5">
            : <?= $kapal['tipe']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Material Kapal
        </div>
        <div class="col-5">
            : <?= $kapal['material']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            LOA
        </div>
        <div class="col-5">
            : <?= $kapal['loa']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            LPP
        </div>
        <div class="col-5">
            : <?= $kapal['lpp']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Luas Kapal
        </div>
        <div class="col-5">
            : <?= $kapal['luas']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Draft
        </div>
        <div class="col-5">
            : <?= $kapal['draft']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            Tinggi Kapal
        </div>
        <div class="col-5">
            : <?= $kapal['tinggi']; ?>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-3">
            DWT
        </div>
        <div class="col-5">
            : <?= $kapal['dwt']; ?>
        </div>
    </div>


</div>
<!-- /.container-fluid -->