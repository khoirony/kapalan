<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800"><?= $perusahaan['nama_perusahaan']; ?></h1>
        <br>
        <div class="text-justify">
            <?= $perusahaan['deskripsi_perusahaan']; ?>
        </div>
        <div class="row pt-3">
            <div class="col-2">
                Alamat
            </div>
            <div class="col-7">
                : <?= $perusahaan['alamat']; ?>, <?= $perusahaan['kota']; ?>, <?= $perusahaan['kode_pos']; ?>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-2">
                Email
            </div>
            <div class="col-5">
                : <?= $perusahaan['email_perusahaan']; ?>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-2">
                Phone
            </div>
            <div class="col-5">
                : <?= $perusahaan['no_telp']; ?>
            </div>
        </div>
        <div class="row pt-3">
            <div class="col-2">
                Fax
            </div>
            <div class="col-5">
                : <?= $perusahaan['no_fax']; ?>
            </div>
        </div>

        <br><br>
        <?php
        echo anchor('Shipyard/updateperusahaan/' . $perusahaan['id_perusahaan'], '<div class="btn btn-sm btn-primary rounded-pill pl-3 pr-3">Update Perusahaan</div>');
        ?>
    </div>




</div>
<!-- /.container-fluid -->