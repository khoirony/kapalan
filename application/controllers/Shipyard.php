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

        $data['title'] = 'Dashboard';
        $data['user'] = $user;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Shipyard/index', $data);
        $this->load->view('templates/footer');
    }

    public function perusahaan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Profil Perusahaan';
        $data['user'] = $user;
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Shipyard/perusahaan', $data);
        $this->load->view('templates/footer');
    }

    public function updateperusahaan($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['id' => $where['id']])->row_array();
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['id']])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('notelp', 'No Telp Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('nofax', 'Tipe Perusahaan', 'required|trim');
        $this->form_validation->set_rules('kodepos', 'Tipe Perusahaan', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profil Perusahaan';
            $data['user'] = $user;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Shipyard/updateperusahaan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_perusahaan' => htmlspecialchars($this->input->post('id', true)),
                'nama_perusahaan' => htmlspecialchars($this->input->post('nama', true)),
                'email_perusahaan' => htmlspecialchars($this->input->post('email', true)),
                'no_telp' => htmlspecialchars($this->input->post('notelp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'kota' => htmlspecialchars($this->input->post('kota', true)),
                'no_fax' => htmlspecialchars($this->input->post('nofax', true)),
                'kode_pos' => htmlspecialchars($this->input->post('kodepos', true)),
                'deskripsi_perusahaan' => $this->input->post('deskripsi'),
            ];

            $this->db->set($data);
            $this->db->where('id_perusahaan', $this->input->post('id'));
            $this->db->update('perusahaan');
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
            redirect('Shipyard/perusahaan');
        }
    }

    public function user()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Data Pengguna';
        $data['user'] = $user;
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Shipyard/user', $data);
        $this->load->view('templates/footer');
    }

    public function tambahuser()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Perusahaan', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered! '
        ]);
        $this->form_validation->set_rules('notelp', 'No Telp Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('role', 'Tipe Perusahaan', 'required|trim');

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

        if ($this->input->post('role') == 6) {
            $jabatan = 'Project Leader';
        } else if ($this->input->post('role') == 7) {
            $jabatan = 'QC / QA';
        } else if ($this->input->post('role') == 8) {
            $jabatan = 'Workshop Officer';
        } else if ($this->input->post('role') == 9) {
            $jabatan = 'Planning Department';
        }



        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah User';
            $data['user'] = $user;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Shipyard/tambahuser', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'perusahaan' => $user['perusahaan'],
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_telp' => htmlspecialchars($this->input->post('notelp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'jabatan' => $jabatan,
                'role_id' => htmlspecialchars($this->input->post('role', true)),
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
            redirect('Shipyard/user');
        }
    }

    public function hapususer($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('user');
        redirect('Shipyard/user');
    }

    public function aktifkanuser($id)
    {
        $data = [
            'active' => 1,
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');

        redirect('Shipyard/user');
    }

    public function nonaktifkanuser($id)
    {
        $data = [
            'active' => 0,
        ];

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');
        redirect('Shipyard/user');
    }

    public function updateuser($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['id' => $where['id']])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('notelp', 'No Telp Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('role', 'Tipe Perusahaan', 'required|trim');

        if ($this->input->post('role') == 6) {
            $jabatan = 'Project Leader';
        } else if ($this->input->post('role') == 7) {
            $jabatan = 'QC / QA';
        } else if ($this->input->post('role') == 8) {
            $jabatan = 'Workshop Officer';
        } else if ($this->input->post('role') == 9) {
            $jabatan = 'Planning Department';
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Pengguna';
            $data['user'] = $user;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Shipyard/updateuser', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id' => htmlspecialchars($this->input->post('id', true)),
                'perusahaan' => $user['perusahaan'],
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'no_telp' => htmlspecialchars($this->input->post('notelp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'jabatan' => $jabatan,
                'role_id' => htmlspecialchars($this->input->post('role', true)),
            ];

            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user');
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
            redirect('Shipyard/user');
        }
    }
}
