<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="container">
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
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Nama Galangan</th>
                <th scope="col">Panjang</th>
                <th scope="col">Lebar</th>
                <th scope="col">DWT</th>
                <th scope="col" width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM galangan where perusahaan = " . $perusahaan['id_perusahaan'];
            $Tampil = $this->db->query($query)->result_array();
            $cek = $this->db->query($query)->row_array();
            $no = 1;
            if ($cek == 0) {
                echo '
                    <tr>
                        <td colspan="6"><center>Data Kosong</center></td>
                    </tr>
                ';
            } else {
                foreach ($Tampil as $t) {
            ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $t['nama_galangan']; ?></td>
                        <td><?= $t['panjang']; ?> M</td>
                        <td><?= $t['lebar']; ?> M</td>
                        <td><?= $t['dwt']; ?></td>
                        <td>
                            <a class="btn btn-warning rounded-pill pl-3 pr-3" href="<?= base_url('DockMon/requestbooking/' . $t['id_galangan']); ?>">Booking</a>
                        </td>
                    </tr>
            <?php
                    $no++;
                }
            }
            ?>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->