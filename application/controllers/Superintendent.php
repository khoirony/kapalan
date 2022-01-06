<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superintendent extends CI_Controller
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

        $data['title'] = 'Data Kapal';
        $data['user'] = $user;
        $data['kapal'] = $this->db->get_where('kapal', ['perusahaan' => $user['perusahaan']])->row_array();
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superintendent/kapal', $data);
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

            $data['title'] = 'Data Kapal';
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superintendent/tambahkapal', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_kapal' => htmlspecialchars($this->input->post('nama', true)),
                'imo' => htmlspecialchars($this->input->post('imo', true)),
                'perusahaan' => $user['perusahaan'],
                'tahun_pembuatan' => htmlspecialchars($this->input->post('tahun_pembuatan', true)),
                'tipe' => htmlspecialchars($this->input->post('tipe', true)),
                'material' => htmlspecialchars($this->input->post('material', true)),
                'loa' => htmlspecialchars($this->input->post('loa', true)),
                'lpp' => htmlspecialchars($this->input->post('lpp', true)),
                'breadth' => htmlspecialchars($this->input->post('breadth', true)),
                'draft' => htmlspecialchars($this->input->post('draft', true)),
                'tinggi' => htmlspecialchars($this->input->post('tinggi', true)),
                'dwt' => htmlspecialchars($this->input->post('dwt', true)),
            ];

            $this->db->insert('kapal', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your ship has been added</div>');
            redirect('superintendent/kapal');
        }
    }

    public function hapuskapal($id)
    {
        $where = array('id_kapal' => $id);
        $this->db->where($where);
        $this->db->delete('kapal');
        redirect('superintendent/kapal');
    }

    public function updatekapal($id)
    {
        $where = array('id' => $id);
        $this->form_validation->set_rules('nama', 'Nama Kapal', 'required');
        $this->form_validation->set_rules('imo', 'IMO', 'required|trim');
        $this->form_validation->set_rules('tahun_pembuatan', 'Tahun Pembuatan', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Tipe Kapal', 'required|trim');
        $this->form_validation->set_rules('material', 'Material Kapal', 'required');
        $this->form_validation->set_rules('lpp', 'LPP', 'required|trim');
        $this->form_validation->set_rules('breadth', 'Breadth', 'required|trim');
        $this->form_validation->set_rules('draft', 'Draft', 'required|trim');
        $this->form_validation->set_rules('tinggi', 'Tinggi', 'required|trim');
        $this->form_validation->set_rules('dwt', 'DWT', 'required|trim');

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Data Kapal';
            $data['id'] = $where;
            $data['user'] = $user;
            $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $where['id']])->row_array();
            $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superintendent/updatekapal', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_kapal' => htmlspecialchars($this->input->post('id', true)),
                'nama_kapal' => htmlspecialchars($this->input->post('nama', true)),
                'imo' => htmlspecialchars($this->input->post('imo', true)),
                'perusahaan' => $user['perusahaan'],
                'tahun_pembuatan' => htmlspecialchars($this->input->post('tahun_pembuatan', true)),
                'tipe' => htmlspecialchars($this->input->post('tipe', true)),
                'material' => htmlspecialchars($this->input->post('material', true)),
                'loa' => htmlspecialchars($this->input->post('loa', true)),
                'lpp' => htmlspecialchars($this->input->post('lpp', true)),
                'breadth' => htmlspecialchars($this->input->post('breadth', true)),
                'draft' => htmlspecialchars($this->input->post('draft', true)),
                'tinggi' => htmlspecialchars($this->input->post('tinggi', true)),
                'dwt' => htmlspecialchars($this->input->post('dwt', true)),
            ];

            $this->db->set($data);
            $this->db->where('id_kapal', $this->input->post('id'));
            $this->db->update('kapal');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your ship has been added</div>');
            redirect('superintendent/kapal');
        }
    }

    public function maintenance()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Riwayat Maintenance';
        $data['user'] = $user;
        $perusahaan = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();
        $data['kapal'] = $this->db->get_where('kapal', ['perusahaan' => $perusahaan['id_perusahaan']])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superintendent/maintenance', $data);
        $this->load->view('templates/footer');
    }

    public function buatlaporan()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Riwayat Maintenance';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('tanggal', 'Date', 'required|trim');
        $this->form_validation->set_rules('komponen', 'Ship Component', 'required|trim');
        $this->form_validation->set_rules('pembuat', 'Shipbuilder', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Ship Type', 'required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superintendent/buatlaporan', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kapal' => htmlspecialchars($this->input->post('kapal', true)),
                'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
                'komponen' => htmlspecialchars($this->input->post('komponen', true)),
                'pembuat' => htmlspecialchars($this->input->post('pembuat', true)),
                'tipe' => htmlspecialchars($this->input->post('tipe', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            ];

            $this->db->insert('maintenance', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your ship has been added</div>');
            redirect('superintendent/maintenance');
        }
    }

    public function editlaporan($id)
    {
        $where = array('id' => $id);
        $this->form_validation->set_rules('tanggal', 'Date', 'required|trim');
        $this->form_validation->set_rules('komponen', 'Ship Component', 'required|trim');
        $this->form_validation->set_rules('pembuat', 'Shipbuilder', 'required|trim');
        $this->form_validation->set_rules('tipe', 'Ship Type', 'required');
        $this->form_validation->set_rules('deskripsi', 'Description', 'required|trim');

        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Riwayat Maintenance';
        $data['user'] = $user;
        $maintenance = $this->db->get_where('maintenance', ['id_maintenance' => $where['id']])->row_array();
        $data['maintenance'] = $maintenance;
        $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $maintenance['kapal']])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superintendent/editlaporan', $data);
        $this->load->view('templates/footer');
    }

    public function updatedata()
    {
        $data = [
            'id_maintenance' => $this->input->post('id'),
            'kapal' => $this->input->post('kapal'),
            'tanggal' => $this->input->post('tanggal'),
            'komponen' => $this->input->post('komponen'),
            'pembuat' => $this->input->post('pembuat'),
            'tipe' => $this->input->post('tipe'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        $this->db->set($data);
        $this->db->where('id_maintenance', $this->input->post('id'));
        $this->db->update('maintenance');

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your ship has been added</div>');
        redirect('superintendent/maintenance');
    }

    public function hapuslaporan($id)
    {
        $where = array('id_maintenance' => $id);
        $this->db->where($where);
        $this->db->delete('maintenance');
        redirect('superintendent/maintenance');
    }

    public function survey()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Jadwal Survey';
        $data['user'] = $user;
        $perusahaan = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();
        $data['kapal'] = $this->db->get_where('kapal', ['perusahaan' => $perusahaan['id_perusahaan']])->row_array();
        $data['id'] = $this->input->post('kapal');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superintendent/survey', $data);
        $this->load->view('templates/footer');
    }

    public function buatsurvey()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Jadwal Survey';
        $data['user'] = $user;

        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Survey', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas Kapal', 'required');
        $this->form_validation->set_rules('sertifikat', 'Sertifikat', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superintendent/buatsurvey', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kapal' => htmlspecialchars($this->input->post('kapal', true)),
                'jenis' => htmlspecialchars($this->input->post('jenis', true)),
                'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
                'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                'sertifikat' => htmlspecialchars($this->input->post('sertifikat', true)),
            ];

            $this->db->insert('survey', $data);

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your ship has been added</div>');
            redirect('superintendent/survey');
        }
    }

    public function editsurvey($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Jadwal Survey';
        $data['user'] = $user;
        $survey = $this->db->get_where('survey', ['id_survey' => $where['id']])->row_array();
        $data['survey'] = $survey;
        $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $survey['kapal']])->row_array();

        $this->form_validation->set_rules('jenis', 'Jenis', 'required');
        $this->form_validation->set_rules('tanggal', 'Tanggal Survey', 'required|trim');
        $this->form_validation->set_rules('kelas', 'Kelas Kapal', 'required');
        $this->form_validation->set_rules('sertifikat', 'Sertifikat', 'required');

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superintendent/editsurvey', $data);
        $this->load->view('templates/footer');
    }

    public function updatesurvey()
    {
        $data = [
            'id_survey' => $this->input->post('id'),
            'kapal' => htmlspecialchars($this->input->post('kapal', true)),
            'jenis' => htmlspecialchars($this->input->post('jenis', true)),
            'tanggal' => htmlspecialchars($this->input->post('tanggal', true)),
            'kelas' => htmlspecialchars($this->input->post('kelas', true)),
            'sertifikat' => htmlspecialchars($this->input->post('sertifikat', true)),
        ];

        $this->db->set($data);
        $this->db->where('id_survey', $this->input->post('id'));
        $this->db->update('survey');

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your ship has been added</div>');
        redirect('superintendent/survey');
    }

    public function hapussurvey($id)
    {
        $where = array('id_survey' => $id);
        $this->db->where($where);
        $this->db->delete('survey');
        redirect('superintendent/survey');
    }

    public function ongoing()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Ongoing Project';
        $data['user'] = $user;

        $perusahaan = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();
        $data['repair'] = $this->db->get_where('repair', ['perusahaan' => $perusahaan['id_perusahaan']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superintendent/ongoing', $data);
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
        $this->load->view('superintendent/project', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('superintendent/progress', $data);
        $this->load->view('templates/footer');
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
        $this->load->view('superintendent/revisi', $data);
        $this->load->view('templates/footer');
    }

    public function ajukanrevisi()
    {
        $data = [
            'revisi' => $this->input->post('uraian')
        ];

        $this->db->set($data);
        $this->db->where('id_pekerjaan', $this->input->post('id'));
        $this->db->update('pekerjaan');
        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
        redirect('superintendent/project/' . $this->input->post('id_repair'));
    }

    public function cekhasil($id)
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
        $this->load->view('superintendent/cekhasil', $data);
        $this->load->view('templates/footer');
    }

    public function setujuihasil()
    {
        $pekerja = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $this->input->post('id')])->row_array();

        $this->db->where('id_pekerjaan', $this->input->post('id'));
        $this->db->delete('pekerjaan');

        unlink(FCPATH . 'assets/img/project/' . $pekerja['image']);

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
        redirect('superintendent/project/' . $this->input->post('id_repair'));
    }
}
