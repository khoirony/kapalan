<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Repair List</h1>

    <div class="row">

        <div class="col-2">
            Ship Name
        </div>

        <div class="col-4">
            <div class="form-group">
                <input type="text" class="form-control form-control-user rounded-pill" id="kapal" name="kapal" value="<?= $kapal['nama_kapal']; ?>" readonly>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-2">
            Work Duration <br>
            Planned
        </div>

        <div class="col-4">
            <div class="row">
                <div class="col-sm-6">
                    <input type="date" class="form-control form-control-user rounded-pill" id="date1" name="date1" placeholder="date1" value="<?= $repair['tgl_awal']; ?>">
                </div>
                <div class="col-sm-6">
                    <input type="date" class="form-control form-control-user rounded-pill" id="date2" name="date2" placeholder="date2" value="<?= $repair['tgl_akhir']; ?>">
                </div>
            </div>
        </div>

    </div>
    <br>

    <div style="float: right;" class="mr-3">
        <?php
        if ($repair['active'] == 2) {
            echo
            anchor('DockMon/decline/' . $repair['id_repair'], '<div class=" btn btn-danger rounded-pill pl-3 pr-3">Decline</div>');
        } else if ($repair['active'] == 1) {
            echo
            anchor('DockMon/accept/' . $repair['id_repair'], '<div class="btn btn-warning rounded-pill pl-3 pr-3">Accept</div>');
        }
        ?>
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('DockMon/tambahkerja/' . $repair['id_repair']); ?>">Add Worker</a>
    </div>

    <br><br>

    <table class="table">

        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="35%">Field of Work</th>
                <th scope="col">Type of Work</th>
                <th scope="col" width="17%">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($listpekerja as $list) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $list['bidang']; ?></td>
                    <td><?= $list['jenis']; ?></td>
                    <td>
                        <a class="btn btn-primary btn-sm rounded-pill pl-3 pr-3" href="<?= base_url('DockMon/editkerja/' . $list['id_pekerjaan']); ?>">Edit</a>
                        <a class="btn btn-primary btn-sm rounded-pill pl-3 pr-3" href="<?= base_url('DockMon/hapuspekerja/' . $list['id_pekerjaan']); ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            if ($hitungpekerja == NULL) {
                echo '<tr>
                    <td colspan="8" class="text-center border-bottom">Data Kosong</td>
                </tr>';
            }
            ?>
        </tbody>

    </table>

</div>
<!-- /.container-fluid -->