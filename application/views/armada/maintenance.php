<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Riwayat Maintenance</h1>

    <div class="row">
        <div class="col-5">
            <div class="form-inline">
                Data kapal :
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
    </div>
    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('armada/buatlaporan'); ?>">Buat Laporan</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="10%">Date</th>
                <th scope="col">Komponen</th>
                <th scope="col">Deskripsi</th>
                <th scope="col" class="text-center" width="18%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM maintenance where data_kapal = " . $kapal['id'];
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
                        <td><?= $t['tanggal']; ?></td>
                        <td><?= $t['komponen']; ?></td>
                        <td><?= $t['deskripsi']; ?></td>
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