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
                <select class="form-select rounded-pill fs-6 fw-light" id="role" name="role" aria-label="Default select example">
                    <option value="1">Kapal 1</option>
                    <option value="2">Kapal 2</option>
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
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('owner/buatpekerjaan'); ?>">Tambah Pekerja</a>
        <a class="btn btn-primary rounded-pill pl-3 pr-3" href="<?= base_url('owner/buatrepair'); ?>">Buat Repair List</a>
    </div>
    <br><br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col" width="5%">No</th>
                <th scope="col" width="35%">Bidang</th>
                <th scope="col">Jenis</th>
                <th scope="col" class="text-center" width="20%">Pilihan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td class="text-center">
                    <btn class="btn btn-primary rounded-pill pl-3 pr-3">Edit</btn>
                    <btn class="btn btn-secondary rounded-pill pl-3 pr-3">Hapus</btn>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td class="text-center">
                    <btn class="btn btn-primary rounded-pill pl-3 pr-3">Edit</btn>
                    <btn class="btn btn-secondary rounded-pill pl-3 pr-3">Hapus</btn>
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>the Bird</td>
                <td>@twitter</td>
                <td class="text-center">
                    <btn class="btn btn-primary rounded-pill pl-3 pr-3">Edit</btn>
                    <btn class="btn btn-secondary rounded-pill pl-3 pr-3">Hapus</btn>
                </td>
            </tr>
        </tbody>
    </table>

</div>
<!-- /.container-fluid -->