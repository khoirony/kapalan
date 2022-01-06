<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kapal <?= $perusahaan['nama_perusahaan']; ?></h1>
    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/tambahkapal'); ?>">Add Ship</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Type</th>
                <th scope="col">Material</th>
                <th scope="col">LOA</th>
                <th scope="col">Width</th>
                <th scope="col" class="text-center" width="18%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $queryGal = "SELECT * FROM kapal where perusahaan = " . $user['perusahaan'];
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
                        <td><?= $g['nama_kapal']; ?></td>
                        <td><?= $g['tahun_pembuatan']; ?></td>
                        <td><?= $g['tipe']; ?></td>
                        <td><?= $g['material']; ?></td>
                        <td><?= $g['loa']; ?></td>
                        <td><?= $g['breadth']; ?></td>
                        <td>
                            <?= anchor('Superintendent/updatekapal/' . $g['id_kapal'], '<div class="btn btn-sm btn-primary rounded-pill pl-3 pr-3">Update</div>'); ?>
                            <?= anchor('Superintendent/hapuskapal/' . $g['id_kapal'], '<div class=" btn btn-sm btn-secondary rounded-pill pl-3 pr-3">Delete</div>'); ?>
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