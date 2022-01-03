<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal Survey</h1>


    <form method="POST" action="">
        <div class="form-group row">
            <div class="col-md-1 mb-3 mb-sm-0 pl-3">
                Kapal :
            </div>
            <div class="col-md-2">
                <select class="form-select form-select-lg rounded-pill fs-6" id="kapal" name="kapal">
                    <?php
                    $query = "SELECT * FROM kapal where perusahaan = " . $user['perusahaan'];
                    $Tampil = $this->db->query($query)->result_array();
                    foreach ($Tampil as $t) : ?>
                        <option value="<?= $t['id_kapal']; ?>"><?= $t['nama_kapal']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary rounded-pill btn-user btn-block">Pilih</button>
            </div>
        </div>
    </form>

    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('superintendent/buatsurvey'); ?>">Buat Laporan</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="35%">Jenis Survey</th>
                <th scope="col">Due Period</th>
                <th scope="col" width='18%'>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if ($id > 0) {
                $query = "SELECT * FROM survey where dkapal = " . $id;
            } else {
                $query = "SELECT * FROM survey where kapal = " . $kapal['id_kapal'];
            }
            echo $id;

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
                        <td><?= $t['jenis']; ?></td>
                        <td><?= $t['tanggal']; ?></td>
                        <td>
                            <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('superintendent/editsurvey/' . $t['id_survey']); ?>">Edit</a>
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
<script>
    $('.form-check-input').on('click', function() {
        const kapalId = $(this).data('kapal');

        $.ajax({
            url: "<?= base_url('superintendent/survey'); ?>",
            type: 'post',
            data: {
                kapalId: kapalId
            },
            success: function() {
                document.location.href = "<?= base_url('superintendent/survey/') ?>" + kapalId;
            }
        });
    });
</script>
<!-- /.container-fluid -->