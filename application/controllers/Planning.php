<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Planning extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }
    public function dockspace()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Dock Space';
        $data['user'] = $user;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('planning/dockspace', $data);
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
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user;
            $data['perusahaan'] = $this->db->get_where('perusahaan', ['id' => $user['id']])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('planning/tambahdock', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'perusahaan' => htmlspecialchars($this->input->post('idperusahaan', true)),
                'nama' => htmlspecialchars($this->input->post('NamaDock', true)),
                'tipe' => htmlspecialchars($this->input->post('TipeDock', true)),
                'panjang' => htmlspecialchars($this->input->post('Panjang', true)),
                'lebar' => htmlspecialchars($this->input->post('Lebar', true)),
                'draft' => htmlspecialchars($this->input->post('Draft', true)),
                'DWT' => htmlspecialchars($this->input->post('dwt', true)),
            ];

            $this->db->insert('galangan', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your Dock Space has been added</div>');
            redirect('planning/dockspace');
        }
    }

    public function editdock()
    {
        $this->form_validation->set_rules('NamaDock', 'Nama Dock', 'required');
        $this->form_validation->set_rules('TipeDock', 'Tipe Dock', 'required');
        $this->form_validation->set_rules('Panjang', 'Panjang Dock', 'required|trim');
        $this->form_validation->set_rules('Lebar', 'Lebar Dock', 'required|trim');
        $this->form_validation->set_rules('Draft', 'Draft', 'required|trim');
        $this->form_validation->set_rules('dwt', 'DWT', 'required|trim');



        if ($this->form_validation->run() == false) {
            $data['title'] = 'Edit Dock';
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user;
            $data['perusahaan'] = $this->db->get_where('perusahaan', ['id' => $user['id']])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('planning/editdock', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'perusahaan' => htmlspecialchars($this->input->post('idperusahaan', true)),
                'nama' => htmlspecialchars($this->input->post('NamaDock', true)),
                'tipe' => htmlspecialchars($this->input->post('TipeDock', true)),
                'panjang' => htmlspecialchars($this->input->post('Panjang', true)),
                'lebar' => htmlspecialchars($this->input->post('Lebar', true)),
                'draft' => htmlspecialchars($this->input->post('Draft', true)),
                'DWT' => htmlspecialchars($this->input->post('dwt', true)),
            ];

            $this->db->insert('galangan', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your Dock Space has been added</div>');
            redirect('planning/dockspace');
        }
    }

    public function jadwal()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Atur Jadwal';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('planning/jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function repair()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Repair List';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('planning/repair', $data);
        $this->load->view('templates/footer');
    }
}
