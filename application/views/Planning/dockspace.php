<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $perusahaan['nama_perusahaan']; ?> Dock Space</h1>

    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Planning/tambahdock'); ?>">Add Dock</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Dock Name</th>
                <th scope="col">Dock Type</th>
                <th scope="col">Length</th>
                <th scope="col">Width</th>
                <th scope="col" class="text-center" width="18%">Action</th>
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
                        <td><?= $g['nama_galangan']; ?></td>
                        <td><?= $g['tipe']; ?></td>
                        <td><?= $g['panjang']; ?></td>
                        <td><?= $g['lebar']; ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Planning/editdock/' . $g['id_galangan']); ?>">Edit</a>
                            <a class="btn btn-sm btn-secondary rounded-pill pl-3 pr-3" href="<?= base_url('Planning/hapusdock/' . $g['id_galangan']); ?>">Delete</a>
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