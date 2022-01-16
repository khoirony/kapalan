<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage User's Data</h1>
    <br>
    <?= $this->session->flashdata('msg');
    if (isset($_SESSION['msg'])) {
        unset($_SESSION['msg']);
    } ?>
    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('AdminOwner/tambahuser'); ?>">Add New User</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Position</th>
                <th scope="col" class="text-center" width="17%">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($listuser as $list) {
                if ($list['role_id'] == 2) {
                    continue;
                }
            ?>
                <tr>
                    <td><?= $no++; ?> </td>
                    <td><?= $list['nama']; ?></td>
                    <td><?= $list['email']; ?></td>
                    <td><?= $list['no_telp']; ?></td>
                    <td><?= $list['jabatan']; ?></td>
                    <td>
                        <?php
                        echo anchor('AdminOwner/updateuser/' . $list['id'], '<div class="btn btn-sm btn-primary rounded-pill pl-3 pr-3"><i class="fas fa-edit"></i></div>');
                        echo anchor('AdminOwner/hapususer/' . $list['id'], '<div class=" btn btn-sm btn-secondary rounded-pill pl-3 pr-3"><i class="fas fa-trash-alt"></i></i></div>');
                        if ($list['active'] == 1) {
                            echo
                            anchor('AdminOwner/nonaktifkanuser/' . $list['id'], '<div class=" btn btn-sm btn-warning rounded-pill pl-3 pr-3"><i class="fas fa-lock-open"></i></div>');
                        } else {
                            echo anchor('AdminOwner/aktifkanuser/' . $list['id'], '<div class="btn btn-sm btn-danger rounded-pill pl-3 pr-3"><i class="fas fa-lock"></i></i></div>');
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