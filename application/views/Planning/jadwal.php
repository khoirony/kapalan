<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Atur Jadwal</h1>

    <br>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Nama Kapal</th>
                <th scope="col">Jenis Survey</th>
                <th scope="col">Mulai</th>
                <th scope="col">Selesai</th>
                <th scope="col" class="text-center" width="20%">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM booking INNER JOIN kapal ON booking.kapal = kapal.id_kapal where booking.perusahaan_galangan = " . $user['perusahaan'];
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
                        <td><?= $t['jenis']; ?></td>
                        <td><?= $t['tgl_mulai']; ?></td>
                        <td><?= $t['tgl_akhir']; ?></td>
                        <td>
                            <?php
                            echo
                            anchor('planning/updatejadwal/' . $t['id_booking'], '<div class=" btn btn-sm btn-primary rounded-pill pl-3 pr-3">Ubah</div>');
                            if ($t['active'] == 1) {
                                echo
                                anchor('planning/unconfirm/' . $t['id_booking'], '<div class=" btn btn-sm btn-danger rounded-pill pl-3 pr-3">Confirmed</div>');
                            } else {
                                echo anchor('planning/confirm/' . $t['id_booking'], '<div class="btn btn-sm btn-warning rounded-pill pl-3 pr-3">Booked</div>');
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