<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SuperAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Dashboard';
        $data['user'] = $user;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('SuperAdmin/index', $data);
        $this->load->view('templates/footer');
    }
    public function manage()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Manage User';
        $data['user'] = $user;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('SuperAdmin/manage', $data);
        $this->load->view('templates/footer');
    }

    public function lihatuser($id)
    {
        $where = array('id' => $id);

        $data['title'] = 'Manage User';
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $where['id']])->row_array();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('SuperAdmin/lihatuser', $data);
        $this->load->view('templates/footer');
    }

    public function aktifkanuser($id)
    {
        $data = [
            'active' => 1,
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');

        redirect('SuperAdmin/manage');
    }

    public function nonaktifkanuser($id)
    {
        $data = [
            'active' => 0,
        ];

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');
        redirect('SuperAdmin/manage');
    }
}
