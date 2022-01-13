<!-- Begin Page Content -->
<div class="container-fluid pl-5 pr-5">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $perusahaan['nama_perusahaan']; ?></h1>
    <br>
    <div class="text-justify">
        <?= $perusahaan['deskripsi_perusahaan']; ?>
    </div>
    <div class="row">
        <div class="col-6">
            <div class="row pt-2">
                <div class="col-2">
                    Alamat
                </div>
                <div class="col-7">
                    : <?= $perusahaan['alamat']; ?>, <?= $perusahaan['kota']; ?>, <?= $perusahaan['kode_pos']; ?>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-2">
                    Email
                </div>
                <div class="col-5">
                    : <?= $perusahaan['email_perusahaan']; ?>
                </div>
            </div>
            <div class="row pt-2">
                <div class="col-2">
                    Phone
                </div>
                <div class="col-5">
                    : <?= $perusahaan['no_telp']; ?>
                </div>
            </div>
            <div class="row pt-2">
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
        <div class="col-6 text-center">
            <div id="carouselExampleControls" class="carousel carousel-dark slide" data-ride="carousel">
                <div class="carousel-inner">
                    <?php
                    if ($perusahaan['logo'] != NULL) {
                        echo '<div class="carousel-item active"><img src="' . base_url('assets/img/perusahaan/' . $perusahaan['logo']) . '" class="img-thumbnail" alt="logo" style="height: 200px"></div>';
                    }
                    ?>

                    <?php
                    if ($perusahaan['image1'] != NULL) {
                        echo '<div class="carousel-item"><img src="' . base_url('assets/img/perusahaan/' . $perusahaan['image1']) . '" class="img-thumbnail" alt="image1" style="height: 200px"></div>';
                    }
                    ?>

                    <?php
                    if ($perusahaan['image2'] != NULL) {
                        echo '<div class="carousel-item"><img src="' . base_url('assets/img/perusahaan/' . $perusahaan['image2']) . '" class="img-thumbnail" alt="image2" style="height: 200px"></div>';
                    }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        </div>
    </div>






</div>
<!-- /.container-fluid -->