<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Repair List</h1>

    <br>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Ship Name</th>
                <th scope="col">Dock Name</th>
                <th scope="col">Survey Type</th>
                <th scope="col">Start Date</th>
                <th scope="col">Finish Date</th>
                <th scope="col" class="text-center" width="17%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM repair JOIN kapal ON repair.kapal = kapal.id_kapal JOIN galangan ON repair.galangan = galangan.id_galangan where repair.perusahaan_galangan = " . $user['perusahaan'];
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
                        <td><?= $no; ?> </td>
                        <td><?= $t['nama_kapal']; ?></td>
                        <td><?= $t['nama_galangan']; ?></td>
                        <td><?= $t['jenis']; ?></td>
                        <td><?= $t['tgl_awal']; ?></td>
                        <td><?= $t['tgl_akhir']; ?></td>
                        <td><?php
                            echo
                            anchor('ProjectLeader/seemore/' . $t['id_repair'], '<div class=" btn btn-sm btn-primary rounded-pill pl-3 pr-3">See More</div>');
                            ?>
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