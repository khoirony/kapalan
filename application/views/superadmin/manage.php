<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage User</h1>
    <br>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Nomor Telp</th>
                <th scope="col">Jabatan</th>
                <th scope="col" class="text-center" width="17%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM user where role_id = 1 OR role_id = 2";
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
                        <td><?= $t['nama']; ?></td>
                        <td><?= $t['email']; ?></td>
                        <td><?= $t['no_telp']; ?></td>
                        <td><?= $t['jabatan']; ?></td>
                        <td>
                            <?php
                            if ($t['active'] == 1) {
                                echo
                                anchor('superadmin/nonaktifkanuser/' . $t['id'], '<div class="btn btn-danger rounded-pill pl-3 pr-3">Nonaktifkan</div>');
                            } else {
                                echo anchor('superadmin/aktifkanuser/' . $t['id'], '<div class=" btn btn-warning rounded-pill pl-3 pr-3">Aktifkan</div>');
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