<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ShipMan extends CI_Controller
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
        $this->load->view('ShipMan/index', $data);
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
        $this->load->view('ShipMan/perusahaan', $data);
        $this->load->view('templates/footer');
    }

    public function updateperusahaan($id)
    {
        $where = array('id' => $id);
        $user = $this->db->get_where('user', ['id' => $where['id']])->row_array();
        $data['user'] = $user;
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['id']])->row_array();

        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('notelp', 'No Telp Perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nofax', 'Tipe Perusahaan', 'required|trim');
        $this->form_validation->set_rules('kodepos', 'Tipe Perusahaan', 'required|trim');


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profil Perusahaan';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('ShipMan/updateperusahaan', $data);
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
                        unlink(FCPATH . 'assets/img/perusahaan/' . $old_logo);
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
                'kota' => htmlspecialchars($this->input->post('kota', true)),
                'no_fax' => htmlspecialchars($this->input->post('nofax', true)),
                'kode_pos' => htmlspecialchars($this->input->post('kodepos', true)),
                'deskripsi_perusahaan' => $this->input->post('deskripsi'),
            ];

            $this->db->set($data);
            $this->db->where('id_perusahaan', $this->input->post('id'));
            $this->db->update('perusahaan');
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
            redirect('ShipMan/perusahaan');
        }
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
        $this->load->view('ShipMan/ongoing', $data);
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
        $this->load->view('ShipMan/project', $data);
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
        $this->load->view('ShipMan/progress', $data);
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
        $this->load->view('ShipMan/revisi', $data);
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
        redirect('ShipMan/project/' . $this->input->post('id_repair'));
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
        $this->load->view('ShipMan/cekhasil', $data);
        $this->load->view('templates/footer');
    }

    public function setujuihasil()
    {
        $pekerja = $this->db->get_where('pekerjaan', ['id_pekerjaan' => $this->input->post('id')])->row_array();

        $data = [
            'selesai' => 1,
        ];

        $this->db->set($data);
        $this->db->where('id_pekerjaan', $this->input->post('id'));
        $this->db->update('pekerjaan');

        // $this->db->where('id_pekerjaan', $this->input->post('id'));
        // $this->db->delete('pekerjaan');

        // unlink(FCPATH . 'assets/img/project/' . $pekerja['image']);

        $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Updated Succesfully.</div>');
        redirect('ShipMan/project/' . $this->input->post('id_repair'));
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
        $this->load->view('ShipMan/selesai', $data);
        $this->load->view('templates/footer');
    }

    public function selesairepair($id)
    {

        $data = [
            'selesai' => 2,
        ];

        $this->db->set($data);
        $this->db->where('id_repair', $id);
        $this->db->update('repair');
        redirect('ShipMan/project/' . $id);
    }

    public function batalkanrepair($id)
    {

        $data = [
            'selesai' => 1,
        ];

        $this->db->set($data);
        $this->db->where('id_repair', $id);
        $this->db->update('repair');
        redirect('ShipMan/project/' . $id);
    }
}
