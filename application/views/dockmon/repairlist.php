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
                <th scope="col">Nama Kapal</th>
                <th scope="col">Nama Galangan</th>
                <th scope="col">Jenis Survey</th>
                <th scope="col">Mulai</th>
                <th scope="col">Selesai</th>
                <th scope="col" class="text-center" width="15%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM booking JOIN kapal ON booking.kapal = kapal.id_kapal JOIN galangan ON booking.galangan = galangan.id_galangan where booking.perusahaan_kapal = " . $user['perusahaan'];
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
                        <td><?= $t['tgl_mulai']; ?></td>
                        <td><?= $t['tgl_akhir']; ?></td>
                        <td>
                            <?php
                            if ($t['active'] == 2) {
                                $quer = "SELECT * FROM repair where id_repair = " . $t['id_booking'];
                                $cekada = $this->db->query($quer)->row_array();
                                if (!$cekada) {
                                    echo
                                    anchor('DockMon/buatrepair/' . $t['id_booking'], '<div class="btn btn-sm btn-warning rounded-pill pl-3 pr-3">Create</div> ');
                                }
                            } else {
                                echo '<div class="btn btn-sm btn-secondary rounded-pill pl-3 pr-3">Waiting</div>';
                            }

                            $sql = "SELECT * FROM repair where id_repair = " . $t['id_booking'];
                            $cek = $this->db->query($sql)->result_array();
                            foreach ($cek as $c) {
                                if ($c['id_repair'] == $t['id_booking']) {
                                    echo
                                    anchor('DockMon/repair/' . $c['id_repair'], '<div class="btn btn-sm btn-primary rounded-pill pl-3 pr-3">See</div>');
                                }
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