<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Survey Schedule</h1>
    <br>

    <div class="form-group col-4">
        <form action="<?= base_url('Superintendent/pilihkapalsurvey') ?>" method="POST">
            <select class="form-select form-select-lg rounded-pill fs-6" id="kapal" name="kapal" onchange="this.form.submit();">
                <?php
                foreach ($kapal as $t) : ?>
                    <option value="<?= $t['id_kapal']; ?>" <?php
                                                            if ($t['id_kapal'] == $pilih['kapal']) {
                                                                echo 'selected';
                                                            }
                                                            ?>><?= $t['nama_kapal']; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>

    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/buatsurvey'); ?>">Add New Survey</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Ship Name</th>
                <th scope="col">Survey type</th>
                <th scope="col">Due Period</th>
                <th scope="col">Days Remaining</th>
                <th scope="col" width='18%'>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($survey as $list) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $list['nama_kapal']; ?></td>
                    <td><?= $list['jenis']; ?></td>
                    <td><?= $list['tanggal']; ?></td>
                    <td><?= $list['selisih']; ?> Days</td>
                    <td>
                        <a class="btn btn-sm btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/editsurvey/' . $list['id_survey']); ?>">Edit</a>
                        <a class="btn btn-sm btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('Superintendent/hapussurvey/' . $list['id_survey']); ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            if ($hitungsurvey == NULL) {
                echo '<tr>
                    <td colspan="8" class="text-center border-bottom">Data Kosong</td>
                </tr>';
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