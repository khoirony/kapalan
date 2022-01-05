<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pengguna</h1>
    <br>
    <?= $this->session->flashdata('msg');
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    } ?>
    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('AdminOwner/tambahuser'); ?>">Tambah Pengguna</a>
    </div>
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
            $query = "SELECT * FROM user where perusahaan = " . $user['perusahaan'];
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
                    if ($t['role_id'] == 2) {
                        continue;
                    }
            ?>
                    <tr>
                        <td><?= $no; ?> </td>
                        <td><?= $t['nama']; ?></td>
                        <td><?= $t['email']; ?></td>
                        <td><?= $t['no_telp']; ?></td>
                        <td><?= $t['jabatan']; ?></td>
                        <td>
                            <?php
                            echo anchor('adminowner/updateuser/' . $t['id'], '<div class="btn btn-sm btn-primary rounded-pill pl-3 pr-3"><i class="fas fa-edit"></i></div>');
                            echo anchor('adminowner/hapususer/' . $t['id'], '<div class=" btn btn-sm btn-secondary rounded-pill pl-3 pr-3"><i class="fas fa-trash-alt"></i></i></div>');
                            if ($t['active'] == 1) {
                                echo
                                anchor('adminowner/nonaktifkanuser/' . $t['id'], '<div class=" btn btn-sm btn-warning rounded-pill pl-3 pr-3"><i class="fas fa-lock-open"></i></div>');
                            } else {
                                echo anchor('adminowner/aktifkanuser/' . $t['id'], '<div class="btn btn-sm btn-danger rounded-pill pl-3 pr-3"><i class="fas fa-lock"></i></i></div>');
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