<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Update Survey Schedule</h1>

    <div class="row ml-3">
        <div class="col-md-5">

            <form class="user" method="POST" action="<?= base_url('Superintendent/updatesurvey'); ?>" enctype="multipart/form-data">

                <input type="hidden" id="id" name="id" value="<?= $survey['id_survey']; ?>">
                <input type="hidden" id="kapal" name="kapal" value="<?= $survey['kapal']; ?>">

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="tanggal" name="tanggal" placeholder="Date" value="<?= $kapal['nama_kapal']; ?>" disabled>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Jenis Survey" value="<?= $survey['jenis']; ?>">
                    <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="date" class="form-control form-control-user" id="tanggal" name="tanggal" placeholder="Tanggal Survey" value="<?= $survey['tanggal']; ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="kelas" name="kelas" placeholder="Kelas Kapal" value="<?= $survey['kelas']; ?>">
                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Sertifikat</label>
                    <input type="file" id="sertifikat" name="sertifikat" class="form-control rounded-pill">
                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Submit
                </button>
            </form>
            <br>
        </div>
        <div class="col-7 text-center">
            Sertifikat <br>
            <img src="<?= base_url('assets/img/survey/' . $survey['sertifikat']); ?>" alt="sertifikat" class="img-thumbnail">
        </div>
    </div>


</div>
<!-- /.container-fluid -->