<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">List Docking Space</h1>
    <br>
    <br><br>

    <table class="table">

        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col">Company Name</th>
                <th scope="col" width="15%">Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;
            foreach ($perusahaangalangan as $list) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $list['nama_perusahaan']; ?></td>
                    <td>
                        <a class="btn btn-warning rounded-pill pl-3 pr-3" href="<?= base_url('DockMon/profilgalangan/' . $list['id_perusahaan']); ?>">See More</a>
                    </td>
                </tr>
            <?php
            }
            if ($hitung == NULL) {
                echo '<tr>
                    <td colspan="8" class="text-center border-bottom">Data Kosong</td>
                </tr>';
            }
            ?>
        </tbody>

    </table>

</div>
<!-- /.container-fluid -->