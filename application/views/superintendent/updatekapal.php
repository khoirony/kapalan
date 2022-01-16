<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Ship Data</h1>
    <br>

    <div class="row ml-3">
        <div class="col-md-5">
            <form class="user" method="POST" action="">

                <input type="hidden" id="id" name="id" value="<?= $kapal['id_kapal']; ?>">

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Ship Name" value="<?= $kapal['nama_kapal']; ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="imo" name="imo" placeholder="IMO" value="<?= $kapal['imo']; ?>">
                    <?= form_error('imo', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="perusahaan" name="perusahaan" placeholder="<?= $perusahaan['nama_perusahaan']; ?>" value="<?= $perusahaan['nama_perusahaan']; ?>" disabled>
                    <?= form_error('perusahaan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tahun_pembuatan" name="tahun_pembuatan" placeholder="Production Year" value="<?= $kapal['tahun_pembuatan']; ?>">
                    <?= form_error('tahun_pembuatan', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tipe" name="tipe" placeholder="Ship Type" value="<?= $kapal['tipe']; ?>">
                    <?= form_error('tipe', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="material" name="material" placeholder="Ship Material" value="<?= $kapal['material']; ?>">
                    <?= form_error('material', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="loa" name="loa" placeholder="LOA" value="<?= $kapal['loa']; ?>">
                    <?= form_error('loa', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="lpp" name="lpp" placeholder="LPP" value="<?= $kapal['lpp']; ?>">
                    <?= form_error('lpp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="breadth" name="breadth" placeholder="Breadth" value="<?= $kapal['breadth']; ?>">
                    <?= form_error('breadth', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="draft" name="draft" placeholder="Draft" value="<?= $kapal['draft']; ?>">
                    <?= form_error('draft', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tinggi" name="tinggi" placeholder="Height" value="<?= $kapal['tinggi']; ?>">
                    <?= form_error('tinggi', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="dwt" name="dwt" placeholder="DWT" value="<?= $kapal['dwt']; ?>">
                    <?= form_error('dwt', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Submit
                </button>
            </form>
            <br>
        </div>
    </div>
</div>
<!-- /.container-fluid -->