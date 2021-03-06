<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DockMon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function galangan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'List of Shipyard';
        $data['user'] = $user;
        $data['perusahaangalangan'] = $this->db->get_where('perusahaan', ['role_id' => 1])->result_array();
        $data['hitung'] = $this->db->get_where('perusahaan', ['role_id' => 1])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('DockMon/galangan', $data);
        $this->load->view('templates/footer');
    }

    public function profilgalangan($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'List of Shipyard';
        $data['user'] = $user;
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $where['id']])->row_array();
        $data['galangan'] = $this->db->get_where('galangan', ['perusahaan' => $where['id']])->result_array();
        $data['hitung'] = $this->db->get_where('galangan', ['perusahaan' => $where['id']])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('DockMon/profilgalangan', $data);
        $this->load->view('templates/footer');
    }

    public function requestbooking($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['galangan'] = $this->db->get_where('galangan', ['id_galangan' => $where['id']])->row_array();
        $data['kapal'] = $this->db->get_where('kapal', ['perusahaan' => $user['perusahaan']])->row_array();
        $data['listkapal'] = $this->db->get_where('kapal', ['perusahaan' => $user['perusahaan']])->result_array();

        $data['title'] = 'List of Shipyard';
        $data['user'] = $user;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('DockMon/requestbooking', $data);
        $this->load->view('templates/footer');
    }


    public function addbooking()
    {
        $this->form_validation->set_rules('jenis', 'Jenis Survey', 'required');
        $this->form_validation->set_rules('tglawal', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tglakhr', 'Tanggal Selesai', 'required');

        $data = [
            'id_booking' => NULL,
            'kapal' => $this->input->post('kapal'),
            'jenis' => $this->input->post('jenis'),
            'tgl_mulai' => $this->input->post('tglawal'),
            'tgl_akhir' => $this->input->post('tglakhir'),
            'galangan' => $this->input->post('galangan'),
            'perusahaan_galangan' => $this->input->post('perusahaan_galangan'),
            'perusahaan_kapal' => $this->input->post('perusahaan_kapal'),
            'active' => 1
        ];

        // $query = "DELETE FROM booking WHERE kapal = 0 AND galangan = " . $this->input->post('galangan');
        // $this->db->query($query)->row_array();

        $where = array('galangan' => $this->input->post('galangan'), 'kapal' => 0);
        $this->db->where($where);
        $this->db->delete('booking');

        $this->db->insert('booking', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! Galangan has been booked.</div>');
        redirect('DockMon/repairlist');
    }

    public function hapusbooking($id)
    {
        $where = array('id_booking' => $id);
        $booking = $this->db->get_where('booking', ['id_booking' => $id])->row_array();

        $this->db->where($where);
        $this->db->delete('booking');

        $query = "SELECT* FROM booking WHERE id_booking = " . $id;
        $cek = $this->db->query($query)->row_array();
        if ($cek == 0) {
            $data = [
                'galangan' => $booking['galangan'],
                'perusahaan_galangan' => $booking['perusahaan_galangan'],
            ];
            $this->db->insert('booking', $data);
        }


        redirect('DockMon/repairlist');
    }


    public function docking()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Find Docking Space';
        $data['user'] = $user;
        $data['kapal'] = $this->db->get_where('kapal', ['perusahaan' => $user['perusahaan']])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('DockMon/docking', $data);
        $this->load->view('templates/footer');
    }

    public function caridock()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Find Docking Space';
        $data['user'] = $user;

        $query = "SELECT DISTINCT galangan.nama_galangan, galangan.id_galangan, perusahaan.nama_perusahaan FROM galangan JOIN perusahaan ON galangan.perusahaan = perusahaan.id_perusahaan ";
        if ($this->input->post('tgl_awal') != NULL) {
            $query .= "JOIN booking ON galangan.id_galangan = booking.galangan WHERE booking.tgl_akhir < '" . $this->input->post('tgl_awal') . "' AND ";
        } else {
            $query .= "WHERE ";
        }
        if ($this->input->post('kota') != NULL) {
            $query .= "perusahaan.kota LIKE '" . $this->input->post('kota') . "%' AND ";
        }
        if ($this->input->post('tipe') != NULL) {
            $query .= "galangan.tipe LIKE '%" . $this->input->post('tipe') . "%'";
        }
        if ($this->input->post('panjang') != NULL) {
            $query .= " AND galangan.panjang >= " . $this->input->post('panjang');
        }
        if ($this->input->post('lebar') != NULL) {
            $query .= " AND galangan.lebar >= " . $this->input->post('lebar');
        }
        if ($this->input->post('dwt') != NULL) {
            $query .= " AND galangan.dwt >= " . $this->input->post('dwt');
        }

        $data['cari'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('DockMon/caridock', $data);
        $this->load->view('templates/footer');
    }

    public function repairlist()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Repair List';
        $data['user'] = $user;
        $query = "SELECT * FROM booking JOIN kapal ON booking.kapal = kapal.id_kapal JOIN galangan ON booking.galangan = galangan.id_galangan where booking.perusahaan_kapal = " . $user['perusahaan'];
        $data['listbooking'] = $this->db->query($query)->result_array();
        $data['hitung'] = $this->db->query($query)->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('DockMon/repairlist', $data);
        $this->load->view('templates/footer');
    }

    public function repair($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Repair List';
        $data['user'] = $user;
        $data['repair'] = $this->db->get_where('repair', ['id_repair' => $where['id']])->row_array();

        $data['listpekerja'] = $this->db->get_where('pekerjaan', ['repair' => $where['id']])->result_array();
        $data['hitungpekerja'] = $this->db->get_where('pekerjaan', ['repair' => $where['id']])->num_rows();

        $query = "SELECT * FROM kapal INNER JOIN repair ON kapal.id_kapal = repair.kapal WHERE id_repair = " . $id;
        $data['kapal'] = $this->db->query($query)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('DockMon/repair', $data);
        $this->load->view('templates/footer');
    }

    public function buatrepair($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['title'] = 'Repair List';
        $data['user'] = $user;
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();
        $booking = $this->db->get_where('booking', ['id_booking' => $where['id']])->row_array();
        $data['booking'] = $booking;
        $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $booking['kapal']])->row_array();
        $data['galangan'] = $this->db->get_where('galangan', ['id_galangan' => $booking['galangan']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('DockMon/buatrepair', $data);
        $this->load->view('templates/footer');
    }

    public function addrepair()
    {
        $data = [
            'id_repair' => $this->input->post('id'),
            'kapal' => $this->input->post('kapal'),
            'perusahaan' => htmlspecialchars($this->input->post('perusahaan', true)),
            'galangan' => htmlspecialchars($this->input->post('galangan', true)),
            'perusahaan_galangan' => htmlspecialchars($this->input->post('perusahaan_galangan', true)),
            'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            'jenis' => htmlspecialchars($this->input->post('jenis', true)),
            'tgl_awal' => htmlspecialchars($this->input->post('date1', true)),
            'tgl_akhir' => htmlspecialchars($this->input->post('date2', true)),
        ];

        $this->db->insert('repair', $data);

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your Dock Space has been added</div>');
        redirect('DockMon/repairlist');
    }

    public function tambahkerja($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['title'] = 'Repair List';
        $data['user'] = $user;
        $repair = $this->db->get_where('repair', ['id_repair' => $where['id']])->row_array();
        $data['repair'] = $repair;
        $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $repair['kapal']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('DockMon/tambahkerja', $data);
        $this->load->view('templates/footer');
    }

    public function additempekerja()
    {
        $data = [
            'kapal' => $this->input->post('kapal'),
            'tgl_awal' => htmlspecialchars($this->input->post('tgl_awal', true)),
            'tgl_akhir' => htmlspecialchars($this->input->post('tgl_akhir', true)),
            'bidang' => htmlspecialchars($this->input->post('bidang', true)),
            'jenis' => htmlspecialchars($this->input->post('jenis', true)),
            'uraian' => htmlspecialchars($this->input->post('uraian', true)),
            'repair' => htmlspecialchars($this->input->post('id_repair', true)),

        ];

        $this->db->insert('pekerjaan', $data);

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your Dock Space has been added</div>');
        redirect('DockMon/repair/' . $this->input->post('id_repair'));
    }

    public function editkerja($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['title'] = 'Repair List';
        $data['user'] = $user;
        $pekerja = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $where['id']])->row_array();
        $data['pekerja'] = $pekerja;
        $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $pekerja['kapal']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('DockMon/editkerja', $data);
        $this->load->view('templates/footer');
    }

    public function updatekerja()
    {
        $data = [
            'id_pekerjaan' => $this->input->post('id_pekerjaan'),
            'kapal' => $this->input->post('kapal'),
            'tgl_awal' => htmlspecialchars($this->input->post('tgl_awal', true)),
            'tgl_akhir' => htmlspecialchars($this->input->post('tgl_akhir', true)),
            'bidang' => htmlspecialchars($this->input->post('bidang', true)),
            'jenis' => htmlspecialchars($this->input->post('jenis', true)),
            'uraian' => htmlspecialchars($this->input->post('uraian', true)),
            'repair' => htmlspecialchars($this->input->post('id_repair', true)),
        ];

        $this->db->set($data);
        $this->db->where('id_pekerjaan', $this->input->post('id_pekerjaan'));
        $this->db->update('pekerjaan');

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your Dock Space has been added</div>');
        redirect('DockMon/repair/' . $this->input->post('id_repair'));
    }

    public function hapuspekerja($id)
    {
        $pekerja = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $id])->row_array();
        $where = array('id_pekerjaan' => $id);
        $this->db->where($where);
        $this->db->delete('pekerjaan');
        redirect('DockMon/repair/' . $pekerja['repair']);
    }

    public function accept($id)
    {
        $data = [
            'active' => 2,
        ];
        $this->db->set($data);
        $this->db->where('id_repair', $id);
        $this->db->update('repair');

        redirect('DockMon/repair/' . $id);
    }

    public function decline($id)
    {
        $data = [
            'active' => 1,
        ];

        $this->db->set($data);
        $this->db->where('id_repair', $id);
        $this->db->update('repair');
        redirect('DockMon/repair/' . $id);
    }

    public function profil()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'My Profil';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/profil', $data);
        $this->load->view('templates/footer');
    }

    public function updateprofil($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['id' => $where['id']])->row_array();
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('notelp', 'No Telp Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profil Perusahaan';
            $data['user'] = $user;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/updateprofil', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_telp' => htmlspecialchars($this->input->post('notelp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            ];

            $ubah = [
                'email' => $this->input->post('email'),
            ];
            $this->session->set_userdata($ubah);

            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user');
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
            redirect('DockMon/profil');
        }
    }
}
