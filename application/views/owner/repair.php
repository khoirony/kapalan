<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Repair List</h1>

    <div class="row">
        <div class="col-2">
            Data kapal
        </div>
        <div class="col-3 align-self-start">
            <div class="form-group ml-3">
                <select class="form-select form-select-lg rounded-pill fs-6" id="role" name="role" aria-label="Default select example">
                    <?php
                    $query = "SELECT * FROM data_kapal where perusahaan = " . $user['id'];
                    $Tampil = $this->db->query($query)->result_array();
                    foreach ($Tampil as $t) : ?>
                        <form method="POST" action="<?= base_url('armada/maintenance'); ?>">
                            <option value="<?= $t['nama']; ?>"><?= $t['nama']; ?></option>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>
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
                    <input type="text" class="form-control form-control-user" id="date1" name="date1" placeholder="date1">
                </div> -
                <div class="col-sm-5">
                    <input type="text" class="form-control form-control-user" id="date2" name="date2" placeholder="date2">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('owner/tambahkerja'); ?>">Tambah Pekerja</a>
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('owner/buatrepair'); ?>">Buat Repair List</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="35%">Bidang</th>
                <th scope="col">Jenis</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM pekerjaan where kapal = " . $kapal['id'];
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
                            <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('shipyard/editdock/' . $g['id']); ?>">Edit</a>
                            <btn class=" btn btn-secondary rounded-pill pl-3 pr-3">Hapus</btn>
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