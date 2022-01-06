<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Riwayat Maintenance</h1>
    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/buatlaporan'); ?>">Buat Laporan</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="15%">Date</th>
                <th scope="col">Nama Kapal</th>
                <th scope="col">Komponen</th>
                <th scope="col">Deskripsi</th>
                <th scope="col" class="text-center" width="18%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT * FROM maintenance JOIN kapal ON maintenance.kapal = kapal.id_kapal where kapal.perusahaan =" . $user['perusahaan'];
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
                        <td><?= $t['nama_kapal']; ?></td>
                        <td><?= $t['komponen']; ?></td>
                        <td><?= $t['deskripsi']; ?></td>
                        <td>
                            <a class="btn btn-sm btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/editlaporan/' . $t['id_maintenance']); ?>">Edit</a>
                            <a class="btn btn-sm btn-secondary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/hapuslaporan/' . $t['id_maintenance']); ?>">Hapus</a>
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