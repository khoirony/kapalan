<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Find Docking Space</h1>

    <div class="row">

        <div class="col-md-5">

            <form class="user" method="POST" action="<?= base_url('DockMon/caridock'); ?>">

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="kota" name="kota" placeholder="City">
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        Start Date
                        <input type="date" class="form-control form-control-user" id="tgl_awal" name="tgl_awal" placeholder="Tanggal Awal">
                    </div>
                    <div class="col-sm-6">
                        Finish Date
                        <input type="date" class="form-control form-control-user" id="tgl_akhir" name="tgl_akhir" placeholder="Tanggal Selesai">
                    </div>
                </div>

                <div class=" form-group">
                    <div class="form-group">
                        <div class="form-group">
                            <select class="form-select form-select-lg rounded-pill fs-6" id="tipe" name="tipe">
                                <option value="Floating Dock">Floating Dock</option>
                                <option value="Graving Dock">Graving Dock</option>
                                <option value="Rampway">Rampway</option>
                                <option value="Helling Dock">Helling Dock</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="lebar" name="lebar" placeholder="Width">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="panjang" name="panjang" placeholder="Length">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="dwt" name="dwt" placeholder="DWT">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Find
                </button>

            </form>
            <br>
        </div>

    </div>

</div>
<!-- /.container-fluid -->