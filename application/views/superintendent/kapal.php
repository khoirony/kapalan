<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ship Data <?= $perusahaan['nama_perusahaan']; ?></h1>
    <br>

    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/tambahkapal'); ?>">Add Ship</a>
    </div>

    <br><br>

    <table class="table">

        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Name</th>
                <th scope="col">Created</th>
                <th scope="col">Type</th>
                <th scope="col">Material</th>
                <th scope="col">LOA</th>
                <th scope="col">Width</th>
                <th scope="col" class="text-center" width="18%">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($kapal as $list) {
            ?>
                <tr>
                    <td><?= $no++; ?> </td>
                    <td><?= $list['nama_kapal']; ?></td>
                    <td><?= $list['tahun_pembuatan']; ?></td>
                    <td><?= $list['tipe']; ?></td>
                    <td><?= $list['material']; ?></td>
                    <td><?= $list['loa']; ?></td>
                    <td><?= $list['breadth']; ?></td>
                    <td>
                        <?= anchor('Superintendent/updatekapal/' . $list['id_kapal'], '<div class="btn btn-sm btn-primary rounded-pill pl-3 pr-3">Edit</div>'); ?>
                        <?= anchor('Superintendent/hapuskapal/' . $list['id_kapal'], '<div class=" btn btn-sm btn-secondary rounded-pill pl-3 pr-3">Delete</div>'); ?>
                    </td>
                </tr>
            <?php
            }
            if ($hitungkapal == NULL) {
                echo '<tr>
                    <td colspan="8" class="text-center border-bottom">Data Kosong</td>
                </tr>';
            }
            ?>
        </tbody>

    </table>

</div>
<!-- /.container-fluid -->