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

        $data['title'] = 'List Galangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

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

        $data['title'] = 'List Galangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $where['id']])->row_array();

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

        $data['title'] = 'List Galangan';
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

        $data['title'] = 'Docking Space';
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

        $data['title'] = 'Docking Space';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

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
        $perusahaan = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();
        $data['kapal'] = $this->db->get_where('kapal', ['perusahaan' => $perusahaan['id_perusahaan']])->row_array();
        $data['repair'] = $this->db->get_where('repair', ['id_repair' => $where['id']])->row_array();

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
}
