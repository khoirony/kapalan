<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Riwayat Maintenance</h1>
    <br>

    <div class="form-group col-4">
        <form action="<?= base_url('Superintendent/pilihkapal') ?>" method="POST">
            <select class="form-select form-select-lg rounded-pill fs-6" id="kapal" name="kapal" onchange="this.form.submit();">
                <?php
                foreach ($kapal as $t) : ?>
                    <option value="<?= $t['id_kapal']; ?>" <?php if ($t['id_kapal'] == $pilih['kapal']) {
                                                                echo 'selected';
                                                            } ?>><?= $t['nama_kapal']; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>

    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/buatlaporan'); ?>">Add Report</a>
    </div>

    <br><br>

    <table class="table">

        <thead class="thead-dark">
            <tr>
                <th scope="col" width="15%">Date</th>
                <th scope="col">Ship Name</th>
                <th scope="col">Component</th>
                <th scope="col">Description</th>
                <th scope="col" class="text-center" width="18%">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($maintenance as $list) {
            ?>
                <tr>
                    <td><?= $list['tanggal']; ?></td>
                    <td><?= $list['nama_kapal']; ?></td>
                    <td><?= $list['komponen']; ?></td>
                    <td><?= $list['deskripsi']; ?></td>
                    <td>
                        <a class="btn btn-sm btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/editlaporan/' . $list['id_maintenance']); ?>">Edit</a>
                        <a class="btn btn-sm btn-secondary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/hapuslaporan/' . $list['id_maintenance']); ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            if ($hitungmaintenance == NULL) {
                echo '<tr>
                    <td colspan="8" class="text-center border-bottom">Data Kosong</td>
                </tr>';
            }
            ?>
        </tbody>

    </table>

</div>
<!-- /.container-fluid -->