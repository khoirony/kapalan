<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Repair List</h1>

    <br><br><br>
    <table class="table">

        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Ship Name</th>
                <th scope="col">Dock Name</th>
                <th scope="col">Survey Type</th>
                <th scope="col">Start</th>
                <th scope="col">Finish</th>
                <th scope="col" class="text-center" width="15%">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($listbooking as $list) {
            ?>
                <tr>
                    <td><?= $no++; ?> </td>
                    <td><?= $list['nama_kapal']; ?></td>
                    <td><?= $list['nama_galangan']; ?></td>
                    <td><?= $list['jenis']; ?></td>
                    <td><?= $list['tgl_mulai']; ?></td>
                    <td><?= $list['tgl_akhir']; ?></td>
                    <td class="text-center">
                        <?php
                        if ($list['active'] == 2) {
                            $quer = "SELECT * FROM repair where id_repair = " . $list['id_booking'];
                            $cekada = $this->db->query($quer)->row_array();
                            if (!$cekada) {
                                echo
                                anchor('DockMon/buatrepair/' . $list['id_booking'], '<div class="btn btn-sm btn-warning rounded-pill pl-3 pr-3">Create</div> ');
                            }
                        } else {
                            echo '<div class="btn btn-sm btn-secondary rounded-pill pl-3 pr-3">Waiting</div>';
                            echo  anchor('DockMon/hapusbooking/' . $list['id_booking'], '<div class="btn btn-sm btn-danger rounded-pill pl-3 pr-3">Cancel</div> ');
                        }

                        $sql = "SELECT * FROM repair where id_repair = " . $list['id_booking'];
                        $cek = $this->db->query($sql)->result_array();
                        foreach ($cek as $c) {
                            if ($c['id_repair'] == $list['id_booking']) {
                                echo
                                anchor('DockMon/repair/' . $c['id_repair'], '<div class="btn btn-sm btn-primary rounded-pill pl-3 pr-3">See</div>');
                            }
                        }
                        ?>
                    </td>
                </tr>
            <?php
            }
            if ($hitung == NULL) {
                echo '<tr>
                    <td colspan="8" class="text-center border-bottom">Data Kosong</td>
                </tr>';
            }
            ?>

        </tbody>

    </table>

</div>
<!-- /.container-fluid -->