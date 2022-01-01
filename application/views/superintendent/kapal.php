<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Perusahaan <?= $perusahaan['nama']; ?></h1>
    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('superintendent/tambahkapal'); ?>">Tambah Kapal</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tahun Buat</th>
                <th scope="col">Tipe</th>
                <th scope="col">Material</th>
                <th scope="col">Luas</th>
                <th scope="col">Tinggi</th>
                <th scope="col" class="text-center" width="18%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $queryGal = "SELECT * FROM data_kapal where perusahaan = " . $user['perusahaan'];
            $TampilG = $this->db->query($queryGal)->result_array();
            $cek = $this->db->query($queryGal)->row_array();
            $no = 1;
            if ($cek == 0) {
                echo '
                    <tr>
                        <td colspan="8"><center>Data Kosong</center></td>
                    </tr>
                ';
            } else {
                foreach ($TampilG as $g) {
            ?>
                    <tr>
                        <td><?= $no; ?> </td>
                        <td><?= $g['nama']; ?></td>
                        <td><?= $g['tahun_pembuatan']; ?></td>
                        <td><?= $g['tipe']; ?></td>
                        <td><?= $g['material']; ?></td>
                        <td><?= $g['luas']; ?></td>
                        <td><?= $g['tinggi']; ?></td>
                        <td>
                            <?= anchor('superintendent/updatekapal/' . $g['id'], '<div class="btn btn-primary rounded-pill pl-3 pr-3">Edit</div>'); ?>
                            <?= anchor('superintendent/hapuskapal/' . $g['id'], '<div class=" btn btn-secondary rounded-pill pl-3 pr-3">Hapus</div>'); ?>
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