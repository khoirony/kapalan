<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Ongoing Project</h1>

    <div class="row">
        <div class="col-2">
            Ship Name
        </div>
        <div class="col-3">
            <div class="form-group">
                <select class="form-select form-select-lg rounded-pill fs-6" id="role" name="role" aria-label="Default select example">
                    <option value="<?= $kapal['id_kapal']; ?>"><?= $kapal['nama_kapal']; ?></option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-2">
            Work Duration <br>
            Planned
        </div>
        <div class="col-4">
            <div class="form-group row">
                <div class="col-sm-5 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user rounded-pill" id="date1" name="date1" placeholder="date1" value="<?= $repair['tgl_awal']; ?>" disabled>
                </div>
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-user rounded-pill" id="date2" name="date2" placeholder="date2" value="<?= $repair['tgl_akhir']; ?>" disabled>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div style="float: right;" class="mr-3">
        <?php
        if ($repair['selesai'] == 0) {
        ?>
            <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('ProjectLeader/selesairepair/' . $repair['id_repair']); ?>">Finish</a>
        <?php
        } else if ($repair['selesai'] == 1) {
        ?>
            <a class="btn btn-danger rounded-pill pl-3 pr-3" href="<?= base_url('ProjectLeader/batalkanrepair/' . $repair['id_repair']); ?>">Cancel</a>
        <?php
        }
        ?>

    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Field of Work</th>
                <th scope="col">Type of Work</th>
                <th scope="col">Description</th>
                <th scope="col" class="text-center" width="27%">Action</th>
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
                        <td><?= $t['uraian']; ?></td>
                        <td class="text-center">
                            <?php
                            if ($t['selesai'] == 0) {
                            ?>
                                <a class="btn btn-sm btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('ProjectLeader/progress/' . $t['id_pekerjaan']); ?>">Progress</a> <a class="btn btn-sm btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('ProjectLeader/upload/' . $t['id_pekerjaan']); ?>">Result</a> <a class="btn btn-sm btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('ProjectLeader/revisi/' . $t['id_pekerjaan']); ?>">Revision</a>
                            <?php
                            } else {
                            ?>
                                <a class="btn btn-sm btn-warning rounded-pill pl-3 pr-3" href="<?= base_url('ProjectLeader/selesai/' . $t['id_pekerjaan']); ?>">Finished</a>
                            <?php
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