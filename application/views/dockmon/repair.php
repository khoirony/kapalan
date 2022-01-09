<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Repair List</h1>

    <div class="row">
        <div class="col-2">
            Data kapal
        </div>
        <div class="col-3">
            <div class="form-group">
                <select class="form-select form-select-lg rounded-pill fs-6" id="role" name="role" aria-label="Default select example">
                    <?php
                    $query = "SELECT * FROM kapal INNER JOIN repair ON kapal.id_kapal = repair.kapal WHERE id_repair = " . $repair['id_repair'];
                    $Tampil = $this->db->query($query)->result_array();
                    foreach ($Tampil as $t) : ?>
                        <option value="<?= $t['id_kapal']; ?>"><?= $t['nama_kapal']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            Rencana Durasi <br>
            Pengerjaan
        </div>
        <div class="col-4">
            <div class="form-group row">
                <div class="col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user rounded-pill" id="date1" name="date1" placeholder="date1" value="<?= $repair['tgl_awal']; ?>">
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-user rounded-pill" id="date2" name="date2" placeholder="date2" value="<?= $repair['tgl_akhir']; ?>">
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
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('DockMon/tambahkerja/' . $repair['id_repair']); ?>">Tambah Pekerja</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="35%">Bidang</th>
                <th scope="col">Jenis</th>
                <th scope="col" width="17%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM pekerjaan where repair = " . $repair['id_repair'];
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
                        <td><?= $no; ?></td>
                        <td><?= $t['bidang']; ?></td>
                        <td><?= $t['jenis']; ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm rounded-pill pl-3 pr-3" href="<?= base_url('DockMon/editpekerja/' . $t['id_pekerjaan']); ?>">Edit</a>
                            <btn class=" btn btn-secondary btn-sm rounded-pill pl-3 pr-3">Hapus</btn>
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