<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AdminOwner extends CI_Controller
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
        $data['hitunguser'] = $this->db->get_where('user', ['perusahaan' => $user['perusahaan']])->num_rows();
        $data['hitungkapal'] = $this->db->get_where('kapal', ['perusahaan' => $user['perusahaan']])->num_rows();
        $query = "SELECT datediff(tanggal, current_date()) as selisih FROM survey JOIN kapal ON survey.kapal = kapal.id_kapal where kapal.perusahaan =" . $user['perusahaan'] . " ORDER BY selisih ASC LIMIT 1";
        $data['hitungsurvey'] = $this->db->query($query)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('AdminOwner/index', $data);
        $this->load->view('templates/footer');
    }

    public function perusahaan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Company Profile';
        $data['user'] = $user;
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['id']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('AdminOwner/perusahaan', $data);
        $this->load->view('templates/footer');
    }

    public function updateperusahaan($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['id' => $where['id']])->row_array();
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('notelp', 'No Telp Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nofax', 'Tipe Perusahaan', 'required|trim');
        $this->form_validation->set_rules('kodepos', 'Tipe Perusahaan', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Company Profile';
            $data['user'] = $user;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('AdminOwner/updateperusahaan', $data);
            $this->load->view('templates/footer');
        } else {
            $upload_logo = $_FILES['logo']['name'];
            $upload_image1 = $_FILES['image1']['name'];
            $upload_image2 = $_FILES['image2']['name'];

            if ($upload_logo) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/perusahaan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('logo')) {
                    $old_logo = $data['perusahaan']['logo'];
                    if ($old_logo != 'default.jpg') {
                        unlink(FCPATH . './assets/img/perusahaan/' . $old_logo);
                    }
                    $new_logo = $this->upload->data('file_name');
                    $this->db->set('logo', $new_logo);
                    $this->db->where('id_perusahaan', $this->input->post('id'));
                    $this->db->update('perusahaan');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            if ($upload_image1) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/perusahaan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image1')) {
                    $old_image1 = $data['perusahaan']['image1'];
                    if ($old_image1 != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/perusahaan/' . $old_image1);
                    }
                    $new_image1 = $this->upload->data('file_name');
                    $this->db->set('image1', $new_image1);
                    $this->db->where('id_perusahaan', $this->input->post('id'));
                    $this->db->update('perusahaan');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            if ($upload_image2) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/perusahaan/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image2')) {
                    $old_image2 = $data['perusahaan']['image2'];
                    if ($old_image2 != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/perusahaan/' . $old_image2);
                    }
                    $new_image2 = $this->upload->data('file_name');
                    $this->db->set('image2', $new_image2);
                    $this->db->where('id_perusahaan', $this->input->post('id'));
                    $this->db->update('perusahaan');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'id_perusahaan' => htmlspecialchars($this->input->post('id', true)),
                'nama_perusahaan' => htmlspecialchars($this->input->post('nama', true)),
                'email_perusahaan' => htmlspecialchars($this->input->post('email', true)),
                'no_telp' => htmlspecialchars($this->input->post('notelp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'no_fax' => htmlspecialchars($this->input->post('nofax', true)),
                'kode_pos' => htmlspecialchars($this->input->post('kodepos', true)),
            ];

            $this->db->set($data);
            $this->db->where('id_perusahaan', $this->input->post('id'));
            $this->db->update('perusahaan');
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
            redirect('AdminOwner/perusahaan');
        }
    }

    public function user()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = "User's Data";
        $data['user'] = $user;
        $data['listuser'] = $this->db->get_where('user', ['perusahaan' => $user['perusahaan']])->result_array();
        $data['hitung'] = $this->db->get_where('user', ['perusahaan' => $user['perusahaan']])->num_rows();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('AdminOwner/user', $data);
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

        if ($this->input->post('role') == 3) {
            $jabatan = 'Superintendent';
        } else if ($this->input->post('role') == 4) {
            $jabatan = 'Docking Monitoring';
        } else if ($this->input->post('role') == 5) {
            $jabatan = 'Ship Manager';
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = "User's Data";
            $data['user'] = $user;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('AdminOwner/tambahuser', $data);
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
                'active' => 0
            ];
            $this->db->insert('user', $data);
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! New account has been created.</div>');
            redirect('AdminOwner/user');
        }
    }

    public function aktifkanuser($id)
    {
        $data = [
            'active' => 1,
        ];
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');

        redirect('AdminOwner/user');
    }

    public function nonaktifkanuser($id)
    {
        $data = [
            'active' => 0,
        ];

        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user');
        redirect('AdminOwner/user');
    }

    public function hapususer($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('user');
        redirect('AdminOwner/user');
    }

    public function updateuser($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['id' => $where['id']])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('notelp', 'No Telp Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('role', 'Tipe Perusahaan', 'required|trim');

        if ($this->input->post('role') == 3) {
            $jabatan = 'Superintendent';
        } else if ($this->input->post('role') == 4) {
            $jabatan = 'Docking Monitoring';
        } else if ($this->input->post('role') == 5) {
            $jabatan = 'Ship Manager';
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = "User's Data";
            $data['user'] = $user;

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('AdminOwner/updateuser', $data);
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
            redirect('AdminOwner/user');
        }
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
            redirect('AdminOwner/profil');
        }
    }
}
