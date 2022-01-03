<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Cari Docking Space</h1>

    <div class="row">
        <div class="col-md-5">
            <form class="user" method="POST" action="<?= base_url('dockmon/caridock'); ?>">
                <div class="form-group">
                    <div class="form-group">
                        <select class="form-select form-select-lg rounded-pill fs-6" id="kota" name="kota">
                            <?php
                            $query = "SELECT * FROM perusahaan WHERE role_id = 1";
                            $Tampil = $this->db->query($query)->result_array();
                            foreach ($Tampil as $t) : ?>
                                <option value="<?= $t['kota']; ?>"><?= $t['kota']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        Tgl mulai
                        <input type="date" class="form-control form-control-user" id="tgl_awal" name="tgl_awal" placeholder="Tanggal Awal">
                    </div>
                    <div class="col-sm-6">
                        Tgl Selesai
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
                    <input type="text" class="form-control form-control-user" id="lebar" name="lebar" placeholder="Lebar">
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="panjang" name="panjang" placeholder="Panjang">
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