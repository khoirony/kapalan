<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner extends CI_Controller
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

        $cekPerusahaan = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('owner/tambah');
        }

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/index', $data);
        $this->load->view('templates/footer');
    }

    public function perusahaan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('shipyard/tambah');
        }

        $data['title'] = 'Profil Perusahaan';
        $data['user'] = $user;
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id' => $user['id']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/perusahaan', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('NamaPerusahaan', 'Nama Perusahaan', 'required|trim');
        $this->form_validation->set_rules('AlamatPerusahaan', 'Alamat Perusahaan', 'required|trim');
        $this->form_validation->set_rules('EmailPerusahaan', 'Email Perusahaan', 'required|trim');
        $this->form_validation->set_rules('NoTelpPerusahaan', 'No Telp Perusahaan', 'required|trim');
        $this->form_validation->set_rules('NoFaxPerusahaan', 'No Fax Perusahaan', 'required|trim');
        $this->form_validation->set_rules('KodePosPerusahaan', 'Kode Pos Perusahaan', 'required|trim');



        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Perusahaan';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('owner/tambah', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => htmlspecialchars($this->input->post('idPerusahaan', true)),
                'nama' => htmlspecialchars($this->input->post('NamaPerusahaan', true)),
                'email' => htmlspecialchars($this->input->post('EmailPerusahaan', true)),
                'alamat' => htmlspecialchars($this->input->post('AlamatPerusahaan', true)),
                'no_telp' => htmlspecialchars($this->input->post('NoTelpPerusahaan', true)),
                'no_fax' => htmlspecialchars($this->input->post('NoFaxPerusahaan', true)),
                'kode_pos' => htmlspecialchars($this->input->post('KodePosPerusahaan', true)),
            ];
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $query = "UPDATE pemilik_kapal SET perusahaan =" . $user['id'] . " WHERE pengguna=" . $user['id'];

            $this->db->insert('perusahaan', $data);
            $this->db->query($query);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your company has been added</div>');
            redirect('owner/perusahaan');
        }
    }

    public function galangan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('owner/tambah');
        }

        $data['title'] = 'List Galangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/galangan', $data);
        $this->load->view('templates/footer');
    }

    public function docking()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('owner/tambah');
        }

        $data['title'] = 'Docking Space';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/docking', $data);
        $this->load->view('templates/footer');
    }

    public function repair()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('owner/tambah');
        }

        $data['title'] = 'Repair List';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/repair', $data);
        $this->load->view('templates/footer');
    }

    public function buatrepair()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('owner/tambah');
        }

        $data['title'] = 'Buat Repair List';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/buatrepair', $data);
        $this->load->view('templates/footer');
    }

    public function ongoing()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('owner/tambah');
        }

        $data['title'] = 'Ongoing Project';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('owner/ongoing', $data);
        $this->load->view('templates/footer');
    }
}
