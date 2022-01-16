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
                <th scope="col">Company Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Position</th>
                <th scope="col" class="text-center" width="14%">Aksi</th>
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
                            echo anchor('SuperAdmin/lihatuser/' . $t['perusahaan'], '<div class="btn btn-sm btn-primary rounded-pill pl-3 pr-3">Lihat</div>');
                            if ($t['active'] == 1) {
                                echo
                                anchor('SuperAdmin/nonaktifkanuser/' . $t['id'], '<div class=" btn btn-sm btn-warning rounded-pill pl-3 pr-3"><i class="fas fa-lock-open"></i></div>');
                            } else {
                                echo anchor('SuperAdmin/aktifkanuser/' . $t['id'], '<div class="btn btn-sm btn-danger rounded-pill pl-3 pr-3"><i class="fas fa-lock"></i></i></div>');
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