<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Request Booking</h1>


    <div class="row">

        <div class="col-md-5">
            <br><br><br>
            <form class="user" method="POST" action="<?= base_url('DockMon/addbooking'); ?>">

                <input type="hidden" id="galangan" name="galangan" value="<?= $galangan['id_galangan']; ?>">
                <input type="hidden" id="perusahaan_galangan" name="perusahaan_galangan" value="<?= $galangan['perusahaan']; ?>">
                <input type="hidden" id="perusahaan_kapal" name="perusahaan_kapal" value="<?= $kapal['perusahaan']; ?>">

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="gal" name="gal" value="<?= $galangan['nama_galangan']; ?>" disabled>
                </div>

                <div class="form-group">
                    <select class="form-select form-select-lg rounded-pill fs-6" id="kapal" name="kapal">
                        <?php
                        foreach ($listkapal as $k) : ?>
                            <option value="<?= $k['id_kapal']; ?>"><?= $k['nama_kapal']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="jenis" name="jenis" placeholder="Survey Type" value="<?= set_value('jenis'); ?>">
                    <?= form_error('jenis', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>

                <div class="form-group row">

                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <span class="ml-2">Start Date</span>
                        <input type="date" class="form-control form-control-user" id="tglawal" name="tglawal" placeholder="Tanggal Mulai">
                        <?= form_error('tglawal', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <div class="col-sm-6">
                        <span class="ml-2">Finish Date</span>
                        <input type="date" class="form-control form-control-user" id="tglakhir" name="tglakhir" placeholder="Tanggal Selesai">
                    </div>

                </div>

                <button type="submit" class="btn btn-primary btn-user btn-block">
                    Submit
                </button>

            </form>
            <br>
        </div>

        <div class="col-md-7">
            <div class="container pl-5 pr-5">
                <div id="calendar"></div>
            </div>

            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.8.0/main.js'></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var calendarEl = document.getElementById('calendar');
                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        initialView: 'dayGridMonth',
                        events: [<?php

                                    $query = "SELECT * FROM booking JOIN kapal ON booking.kapal = kapal.id_kapal where booking.galangan = " . $galangan['id_galangan'];
                                    $Tampil = $this->db->query($query)->result_array();
                                    foreach ($Tampil as $t) {
                                    ?> {
                                    title: '<?php echo $t['nama_kapal']; ?>', //menampilkan title dari tabel
                                    start: '<?php echo $t['tgl_mulai']; ?>', //menampilkan tgl mulai dari tabel
                                    end: '<?php echo $t['tgl_akhir']; ?>' //menampilkan tgl selesai dari tabel
                                },
                            <?php } ?>
                        ],
                        selectOverlap: function(event) {
                            return event.rendering === 'background';
                        }
                    });

                    calendar.render();
                });
            </script>

        </div>
    </div>
</div>
<!-- /.container-fluid -->