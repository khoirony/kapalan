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

    public function index()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'List Galangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dockmon/galangan', $data);
        $this->load->view('templates/footer');
    }

    public function galangan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'List Galangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dockmon/galangan', $data);
        $this->load->view('templates/footer');
    }

    public function requestbooking($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['galangan'] = $this->db->get_where('galangan', ['id' => $where['id']])->row_array();
        $data['kapal'] = $this->db->get_where('data_kapal', ['perusahaan' => $user['perusahaan']])->row_array();

        $data['title'] = 'List Galangan';
        $data['user'] = $user;
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dockmon/requestbooking', $data);
        $this->load->view('templates/footer');
    }


    public function addbooking()
    {
        $this->form_validation->set_rules('jenis', 'Jenis Survey', 'required');
        $this->form_validation->set_rules('tglawal', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tglakhr', 'Tanggal Selesai', 'required');

        $data = [
            'id' => NULL,
            'kapal' => $this->input->post('kapal'),
            'jenis_survey' => $this->input->post('jenis'),
            'tgl_mulai' => $this->input->post('tglawal'),
            'tgl_akhir' => $this->input->post('tglakhir'),
            'galangan' => $this->input->post('galangan'),
        ];

        $this->db->insert('booking', $data);
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! Galangan has been booked.</div>');
        redirect('Dockmon/galangan');
    }


    public function docking()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Docking Space';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dockmon/docking', $data);
        $this->load->view('templates/footer');
    }

    public function caridock()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();



        $query = "SELECT * FROM galangan WHERE ";

        if ($this->input->post('kapal') != NULL) {
            $query .= "SELECT * FROM galangan WHERE";
        }

        $data['title'] = 'Docking Space';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dockmon/caridock', $data);
        $this->load->view('templates/footer');
    }


    public function booking()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Repair List';
        $data['user'] = $user;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dockmon/booking', $data);
        $this->load->view('templates/footer');
    }

    public function repair()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Repair List';
        $data['user'] = $user;
        $perusahaan = $this->db->get_where('perusahaan', ['id' => $user['perusahaan']])->row_array();
        $data['kapal'] = $this->db->get_where('data_kapal', ['perusahaan' => $perusahaan['id']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dockmon/repair', $data);
        $this->load->view('templates/footer');
    }

    public function buatrepair($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Repair List';
            $data['user'] = $user;
            $data['perusahaan'] = $this->db->get_where('perusahaan', ['id' => $user['perusahaan']])->row_array();
            $booking = $this->db->get_where('booking', ['booking_id' => $where['id']])->row_array();
            $data['booking'] = $booking;
            $data['kapal'] = $this->db->get_where('data_kapal', ['id' => $booking['kapal']])->row_array();
            $data['galangan'] = $this->db->get_where('galangan', ['id' => $booking['galangan']])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('dockmon/buatrepair', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => $this->input->post('id'),
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
            redirect('planning/booking');
        }
    }

    public function tambahkerja()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Repair List';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dockmon/tambahkerja', $data);
        $this->load->view('templates/footer');
    }
}
