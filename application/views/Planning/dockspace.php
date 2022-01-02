<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Galangan <?= $perusahaan['nama']; ?></h1>

    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('planning/tambahdock'); ?>">Tambah Dock</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Tipe</th>
                <th scope="col">Panjang</th>
                <th scope="col">Lebar</th>
                <th scope="col" class="text-center" width="18%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $queryGal = "SELECT * FROM galangan where perusahaan = " . $user['perusahaan'];
            $TampilG = $this->db->query($queryGal)->result_array();
            $cek = $this->db->query($queryGal)->row_array();
            $no = 1;
            if ($cek == 0) {
                echo '
                    <tr>
                        <td colspan="6"><center>Data Kosong</center></td>
                    </tr>
                ';
            } else {
                foreach ($TampilG as $g) {
            ?>
                    <tr>
                        <td><?= $no; ?> </td>
                        <td><?= $g['nama']; ?></td>
                        <td><?= $g['tipe']; ?></td>
                        <td><?= $g['panjang']; ?></td>
                        <td><?= $g['lebar']; ?></td>
                        <td>
                            <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('planning/editdock/' . $g['id']); ?>">Edit</a>
                            <a class="btn btn-secondary rounded-pill pl-3 pr-3" href="<?= base_url('planning/hapusdock/' . $g['id']); ?>">Hapus</a>
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