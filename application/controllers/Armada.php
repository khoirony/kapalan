<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Armada extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }

    public function kapal()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('owner/tambah');
        }

        $data['title'] = 'Data Kapal';
        $data['user'] = $user;
        $data['kapal'] = $this->db->get_where('data_kapal', ['perusahaan' => $user['id']])->row_array();
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id' => $user['id']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('armada/kapal', $data);
        $this->load->view('templates/footer');
    }

    public function tambahkapal()
    {
        $this->form_validation->set_rules('nama', 'Nama Kapal', 'required');
        $this->form_validation->set_rules('imo', 'IMO', 'required|trim');
        $this->form_validation->set_rules('tahun_pembuatan', 'Tahun Pembuatan', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe Kapal', 'required|trim');
        $this->form_validation->set_rules('material', 'Material Kapal', 'required');
        $this->form_validation->set_rules('lpp', 'LPP', 'required|trim');
        $this->form_validation->set_rules('luas', 'Luas', 'required|trim');
        $this->form_validation->set_rules('draft', 'Draft', 'required|trim');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required|trim');
        $this->form_validation->set_rules('dwt', 'DWT', 'required|trim');

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        if ($this->form_validation->run() == false) {

            $data['title'] = 'Tambah Kapal';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['perusahaan'] = $this->db->get_where('perusahaan', ['id' => $user['id']])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('armada/tambahkapal', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'imo' => htmlspecialchars($this->input->post('imo', true)),
                'perusahaan' => $user['id'],
                'tahun_pembuatan' => htmlspecialchars($this->input->post('tahun_pembuatan', true)),
                'tipe' => htmlspecialchars($this->input->post('tipe', true)),
                'material' => htmlspecialchars($this->input->post('material', true)),
                'loa' => htmlspecialchars($this->input->post('loa', true)),
                'lpp' => htmlspecialchars($this->input->post('lpp', true)),
                'luas' => htmlspecialchars($this->input->post('luas', true)),
                'draft' => htmlspecialchars($this->input->post('draft', true)),
                'tinggi' => htmlspecialchars($this->input->post('tinggi', true)),
                'dwt' => htmlspecialchars($this->input->post('dwt', true)),
            ];

            $this->db->insert('data_kapal', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your ship has been added</div>');
            redirect('armada/kapal');
        }
    }

    public function maintenance()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('owner/tambah');
        }

        $data['title'] = 'Riwayat Maintenance';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('armada/maintenance', $data);
        $this->load->view('templates/footer');
    }

    public function survey()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $cekPerusahaan = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
        $cek = $this->db->query($cekPerusahaan)->row_array();
        if ($cek['perusahaan'] == 0) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Please Add Your Company First</div>');
            redirect('owner/tambah');
        }

        $data['title'] = 'Jadwal Survey';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('armada/survey', $data);
        $this->load->view('templates/footer');
    }
}
