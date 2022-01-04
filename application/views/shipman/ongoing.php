<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ongoing Project</h1>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Nama Kapal</th>
                <th scope="col">Nama Galangan</th>
                <th scope="col">Tanggal Mulai</th>
                <th scope="col">Tanggal Berakhir</th>
                <th scope="col" width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM repair JOIN kapal ON repair.kapal = kapal.id_kapal JOIN galangan ON repair.galangan = galangan.id_galangan";
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
                        <td><?= $t['nama_kapal']; ?></td>
                        <td><?= $t['nama_galangan']; ?></td>
                        <td><?= $t['tgl_awal']; ?></td>
                        <td><?= $t['tgl_akhir']; ?></td>
                        <td>
                            <?php
                            if ($t['active'] == 1) {
                                echo
                                anchor('shipman/project/' . $t['id_repair'], '<div class=" btn btn-sm btn-warning rounded-pill pl-3 pr-3">See Project</div>');
                            } else {
                                echo '<div class="btn btn-sm btn-secondary rounded-pill pl-3 pr-3">Waiting</div>';
                            }
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