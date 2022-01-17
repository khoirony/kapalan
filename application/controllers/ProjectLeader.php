<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProjectLeader extends CI_Controller
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
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ProjectLeader/index', $data);
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
        $this->load->view('ProjectLeader/repair', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('ProjectLeader/editkerja', $data);
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
        redirect('ProjectLeader/repair/' . $this->input->post('id_repair'));
    }

    public function hapuspekerja($id)
    {
        $pekerja = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $id])->row_array();
        $where = array('id_pekerjaan' => $id);
        $this->db->where($where);
        $this->db->delete('pekerjaan');
        redirect('ProjectLeader/repair/' . $pekerja['repair']);
    }

    public function accept($id)
    {
        $data = [
            'active' => 1,
        ];
        $this->db->set($data);
        $this->db->where('id_repair', $id);
        $this->db->update('repair');

        redirect('ProjectLeader/seemore/' . $id);
    }

    public function decline($id)
    {
        $data = [
            'active' => 0,
        ];

        $this->db->set($data);
        $this->db->where('id_repair', $id);
        $this->db->update('repair');
        redirect('ProjectLeader/seemore/' . $id);
    }

    public function seemore($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Repair List';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['repair'] = $this->db->get_where('repair', ['id_repair' => $where['id']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ProjectLeader/seemore', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('ProjectLeader/tambahkerja', $data);
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
        redirect('ProjectLeader/seemore/' . $this->input->post('id_repair'));
    }

    public function ongoing()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Ongoing Project';
        $data['user'] = $user;
        $perusahaan = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();
        $data['repair'] = $this->db->get_where('repair', ['perusahaan_galangan' => $perusahaan['id_perusahaan']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ProjectLeader/ongoing', $data);
        $this->load->view('templates/footer');
    }

    public function project($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Ongoing Project';
        $data['user'] = $user;
        $repair = $this->db->get_where('repair', ['id_repair' => $where['id']])->row_array();
        $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $repair['kapal']])->row_array();
        $data['repair'] = $repair;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ProjectLeader/project', $data);
        $this->load->view('templates/footer');
    }

    public function upload($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Ongoing Project';
        $data['user'] = $user;
        $pekerja = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $where['id']])->row_array();
        $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $pekerja['kapal']])->row_array();
        $data['repair'] = $this->db->get_where('repair', ['id_repair' => $pekerja['repair']])->row_array();
        $data['pekerja'] = $pekerja;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ProjectLeader/upload', $data);
        $this->load->view('templates/footer');
    }

    public function submitupload()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pekerjaan'] = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $this->input->post('id')])->row_array();
        $upload_image = $_FILES['image']['name'];

        if ($upload_image) {
            $config['allowed_types'] = 'gif|jpg|png|jpeg';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/project/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('image')) {
                $old_image = $data['pekerjaan']['image'];
                if ($old_image != 'default.jpg') {
                    unlink(FCPATH . 'assets/img/project/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('image', $new_image);
                $this->db->where('id_pekerjaan', $this->input->post('id'));
                $this->db->update('pekerjaan');
            } else {
                echo $this->upload->display_errors();
            }
        }
        redirect('ProjectLeader/project/' . $this->input->post('id_repair'));
    }

    public function revisi($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Ongoing Project';
        $data['user'] = $user;
        $pekerja = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $where['id']])->row_array();
        $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $pekerja['kapal']])->row_array();
        $data['repair'] = $this->db->get_where('repair', ['id_repair' => $pekerja['repair']])->row_array();
        $data['pekerja'] = $pekerja;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ProjectLeader/revisi', $data);
        $this->load->view('templates/footer');
    }

    public function setujuirevisi()
    {
        $data = [
            'setujui_revisi' => 1,
        ];

        $this->db->set($data);
        $this->db->where('id_pekerjaan', $this->input->post('id'));
        $this->db->update('pekerjaan');
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
        redirect('ProjectLeader/project/' . $this->input->post('id_repair'));
    }

    public function progress($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Ongoing Project';
        $data['user'] = $user;
        $pekerja = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $where['id']])->row_array();
        $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $pekerja['kapal']])->row_array();
        $data['repair'] = $this->db->get_where('repair', ['id_repair' => $pekerja['repair']])->row_array();
        $data['pekerja'] = $pekerja;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ProjectLeader/progress', $data);
        $this->load->view('templates/footer');
    }

    public function updateprogress()
    {
        $data = [
            'hasil_pengerjaan' => $this->input->post('uraian'),
            'progress' => $this->input->post('progress'),
        ];

        $this->db->set($data);
        $this->db->where('id_pekerjaan', $this->input->post('id'));
        $this->db->update('pekerjaan');
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
        redirect('ProjectLeader/project/' . $this->input->post('id_repair'));
    }

    public function setujuihasil($id)
    {

        $where = array('id' => $id);
        $pekerja = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $where['id']])->row_array();
        $repair = $this->db->get_where('repair', ['id_repair' => $pekerja['repair']])->row_array();
        $data = [
            'pl' => 1
        ];

        $this->db->set($data);
        $this->db->where('id_pekerjaan', $where['id']);
        $this->db->update('pekerjaan');
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
        redirect('ProjectLeader/project/' . $repair['id_repair']);
    }

    public function selesai($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Ongoing Project';
        $data['user'] = $user;
        $pekerja = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $where['id']])->row_array();
        $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $pekerja['kapal']])->row_array();
        $data['repair'] = $this->db->get_where('repair', ['id_repair' => $pekerja['repair']])->row_array();
        $data['pekerja'] = $pekerja;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('ProjectLeader/selesai', $data);
        $this->load->view('templates/footer');
    }

    public function selesairepair($id)
    {

        $data = [
            'selesai' => 1,
        ];

        $this->db->set($data);
        $this->db->where('id_repair', $id);
        $this->db->update('repair');
        redirect('ProjectLeader/project/' . $id);
    }
    public function batalkanrepair($id)
    {

        $data = [
            'selesai' => 0,
        ];

        $this->db->set($data);
        $this->db->where('id_repair', $id);
        $this->db->update('repair');
        redirect('ProjectLeader/project/' . $id);
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

            $this->db->set($data);
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('user');
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
            redirect('ProjectLeader/profil');
        }
    }
}
