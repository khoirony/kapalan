<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->

    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Profil Perusahaan Galangan</h1>
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
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Nama Galangan</th>
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
                        <td>
                            <a class="btn btn-warning rounded-pill pl-3 pr-3" href="<?= base_url('dockmon/requestbooking/' . $t['id_galangan']); ?>">Booking</a>
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