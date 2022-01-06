<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal Survey</h1>

    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/buatsurvey'); ?>">Buat Laporan</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Nama Kapal</th>
                <th scope="col">Jenis Survey</th>
                <th scope="col">Due Period</th>
                <th scope="col">Kurang</th>
                <th scope="col" width='18%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT id_survey, jenis,tanggal, nama_kapal, datediff(tanggal, current_date()) as selisih FROM survey JOIN kapal ON survey.kapal = kapal.id_kapal where kapal.perusahaan =" . $user['perusahaan'];
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
                        <td><?= $t['nama_kapal']; ?></td>
                        <td><?= $t['jenis']; ?></td>
                        <td><?= $t['tanggal']; ?></td>
                        <td><?= $t['selisih']; ?> Hari</td>
                        <td>
                            <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/editsurvey/' . $t['id_survey']); ?>">Edit</a>
                            <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/hapussurvey/' . $t['id_survey']); ?>">Hapus</a>
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
<script>
    $('.form-check-input').on('click', function() {
        const kapalId = $(this).data('kapal');

        $.ajax({
            url: "<?= base_url('Superintendent/survey'); ?>",
            type: 'post',
            data: {
                kapalId: kapalId
            },
            success: function() {
                document.location.href = "<?= base_url('Superintendent/survey/') ?>" + kapalId;
            }
        });
    });
</script>
<!-- /.container-fluid -->