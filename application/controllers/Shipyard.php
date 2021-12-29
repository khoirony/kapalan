<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shipyard extends CI_Controller
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
        $cekPerusahaan = "SELECT * FROM pemilik_galangan WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('shipyard/tambah');
        }

        $data['title'] = 'Shipyard';
        $data['user'] = $user;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shipyard/index', $data);
        $this->load->view('templates/footer');
    }

    public function perusahaan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_galangan WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('shipyard/tambah');
        }

        $data['title'] = 'Perusahaan Saya';
        $data['user'] = $user;
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id' => $user['id']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shipyard/perusahaan', $data);
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
            $this->load->view('shipyard/tambah', $data);
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
            $query = "UPDATE pemilik_galangan SET perusahaan =" . $user['id'] . " WHERE pengguna=" . $user['id'];

            $this->db->insert('perusahaan', $data);
            $this->db->query($query);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your company has been added</div>');
            redirect('shipyard/perusahaan');
        }
    }

    public function dockspace()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_galangan WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('shipyard/tambah');
        }

        $data['title'] = 'Galangan Saya';
        $data['user'] = $user;
        $data['galangan'] = $this->db->get_where('galangan', ['id' => $user['id']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('shipyard/dockspace', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdock()
    {
        $this->form_validation->set_rules('NamaDock', 'Nama Dock', 'required');
        $this->form_validation->set_rules('TipeDock', 'Tipe Dock', 'required');
        $this->form_validation->set_rules('Panjang', 'Panjang Dock', 'required|trim');
        $this->form_validation->set_rules('Lebar', 'Lebar Dock', 'required|trim');
        $this->form_validation->set_rules('Draft', 'Draft', 'required|trim');
        $this->form_validation->set_rules('dwt', 'DWT', 'required|trim');



        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Dock';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('shipyard/tambahdock', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => htmlspecialchars($this->input->post('iddock', true)),
                'nama' => htmlspecialchars($this->input->post('NamaDock', true)),
                'tipe' => htmlspecialchars($this->input->post('TipeDock', true)),
                'panjang' => htmlspecialchars($this->input->post('Panjang', true)),
                'lebar' => htmlspecialchars($this->input->post('Lebar', true)),
                'draft' => htmlspecialchars($this->input->post('Draft', true)),
                'DWT' => htmlspecialchars($this->input->post('dwt', true)),
            ];
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $query = "UPDATE pemilik_galangan SET galangan =" . $user['id'] . " WHERE pengguna=" . $user['id'];

            $this->db->insert('galangan', $data);
            $this->db->query($query);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your Dock Space has been added</div>');
            redirect('shipyard/dockspace');
        }
    }
}
