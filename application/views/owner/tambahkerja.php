<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah Pekerjaan</h1>

    <div class="row ml-3">
        <div class="col-md-5">
            <form class="user" method="POST" action="<?= base_url('armada/tambahkerja'); ?>">
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama Kapal" value="<?= set_value('nama'); ?>">
                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" class="form-control form-control-user" id="date1" name="date1" placeholder="Tanggal Awal">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control form-control-user" id="date2" name="date2" placeholder="Tanggal Akhir">
                    </div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="bidang" name="bidang" placeholder="Pilih Bidang" value="<?= set_value('bidang'); ?>">
                    <?= form_error('bidang', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Jenis Pekerjaan" value="<?= set_value('jenis'); ?>">
                    <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                    <textarea type="text" class="form-control form-control-user" id="uraian" name="uraian" placeholder="Uraian Pekerjaan" value="<?= set_value('uraian'); ?>"></textarea>
                    <?= form_error('uraian', '<small class="text-danger pl-3">', '</small>'); ?>
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