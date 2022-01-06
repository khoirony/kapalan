<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Hasil Pencarian</h1>
    <br>
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
            $query = "SELECT * FROM galangan JOIN perusahaan ON galangan.perusahaan = perusahaan.id_perusahaan ";

            if ($this->input->post('tgl_awal') != NULL) {
                $query .= "JOIN booking ON galangan.id_galangan = booking.galangan WHERE booking.active = 0 AND booking.tgl_akhir < '" . $this->input->post('tgl_awal') . "' AND ";
            } else {
                $query .= "WHERE ";
            }

            if ($this->input->post('kota') != NULL) {
                $query .= "perusahaan.kota LIKE '" . $this->input->post('kota') . "%' AND ";
            }

            if ($this->input->post('tipe') != NULL) {
                $query .= "galangan.tipe LIKE '%" . $this->input->post('tipe') . "%'";
            }
            if ($this->input->post('panjang') != NULL) {
                $query .= " AND galangan.panjang >= " . $this->input->post('panjang');
            }
            if ($this->input->post('lebar') != NULL) {
                $query .= " AND galangan.lebar >= " . $this->input->post('lebar');
            }
            if ($this->input->post('dwt') != NULL) {
                $query .= " AND galangan.dwt >= " . $this->input->post('dwt');
            }

            $Tampil = $this->db->query($query)->result_array();
            $cek = $this->db->query($query)->row_array();
            $no = 1;
            if ($cek == 0) {
                echo '
                        <tr>
                            <td colspan="6"><center>Data Tidak Ditemukan</center></td>
                        </tr>
                    ';
            } else {
                foreach ($Tampil as $t) {
            ?>
                    <tr>

                        <td><?= $no; ?></td>
                        <td><?= $t['nama_galangan']; ?></td>
                        <td>
                            <a class="btn btn-warning rounded-pill pl-3 pr-3" href="<?= base_url('DockMon/requestbooking/' . $t['id_galangan']); ?>">Booking</a>
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