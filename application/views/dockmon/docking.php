<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cari Docking Space</h1>

    <div class="row">
        <div class="col-md-5">
            <form class="user" method="POST" action="<?= base_url('dockmon/caridock'); ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="lokasi" name="lokasi" placeholder="Lokasi">
                </div>
                <div class="form-group">
                    <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" placeholder="Tanggal">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="method" name="method" placeholder="Docking Method">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="kapal" name="kapal" placeholder="Data Kapal">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tipe" name="tipe" placeholder="Tipe Kapal">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="material" name="material" placeholder="Material Kapal">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="loa" name="loa" placeholder="Loa">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="lpp" name="lpp" placeholder="lpp">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="lebar" name="lebar" placeholder="Lebar">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tinggi" name="tinggi" placeholder="Tinggi">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="dwt" name="dwt" placeholder="DWT">
                </div>


                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Cari
                </button>
            </form>
            <br>
        </div>
    </div>

</div>
<!-- /.container-fluid -->