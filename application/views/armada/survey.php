<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Jadwal Survey</h1>

    <div class="row">
        <div class="col-5">
            <div class="form-inline">
                Data kapal :
                <div class="form-group ml-3">
                    <select class="form-select rounded-pill fs-6 fw-light" id="role" name="role" aria-label="Default select example">
                        <option value="1">Kapal 1</option>
                        <option value="2">Kapal 2</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div style="float: right;" class="mr-3">
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('armada/buatsurvey'); ?>">Buat Laporan</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="35%">Jenis Survey</th>
                <th scope="col">Due Period</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <td>2</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <td>3</td>
                <td>the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->