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
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Planning/dockspace', $data);
        $this->load->view('templates/footer');
    }

    public function tambahdock()
    {
        $this->form_validation->set_rules('nama', 'Nama Dock', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe Dock', 'required');
        $this->form_validation->set_rules('panjang', 'Panjang Dock', 'required|trim');
        $this->form_validation->set_rules('lebar', 'Lebar Dock', 'required|trim');
        $this->form_validation->set_rules('draft', 'Draft', 'required|trim');
        $this->form_validation->set_rules('dwt', 'DWT', 'required|trim');



        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dock Space';
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user;
            $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Planning/tambahdock', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'perusahaan' => htmlspecialchars($this->input->post('idperusahaan', true)),
                'nama_galangan' => htmlspecialchars($this->input->post('nama', true)),
                'tipe' => htmlspecialchars($this->input->post('tipe', true)),
                'panjang' => htmlspecialchars($this->input->post('panjang', true)),
                'lebar' => htmlspecialchars($this->input->post('lebar', true)),
                'draft' => htmlspecialchars($this->input->post('draft', true)),
                'DWT' => htmlspecialchars($this->input->post('dwt', true)),
            ];
            $this->db->insert('galangan', $data);

            $query = "SELECT * FROM galangan ORDER BY id_galangan DESC limit 1";
            $cekid = $this->db->query($query)->row_array();
            $book = [
                'perusahaan_galangan' => htmlspecialchars($this->input->post('idperusahaan', true)),
                'galangan' => $cekid['id_galangan'],
            ];
            $this->db->insert('booking', $book);



            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your Dock Space has been added</div>');
            redirect('Planning/dockspace');
        }
    }

    public function hapusdock($id)
    {
        $where = array('id_galangan' => $id);
        $this->db->where($where);
        $this->db->delete('galangan');
        redirect('Planning/dockspace');
    }

    public function editdock($id)
    {
        $where = array('id' => $id);
        $this->form_validation->set_rules('nama', 'Nama Dock', 'required');
        $this->form_validation->set_rules('tipe', 'Tipe Dock', 'required');
        $this->form_validation->set_rules('panjang', 'Panjang Dock', 'required|trim');
        $this->form_validation->set_rules('lebar', 'Lebar Dock', 'required|trim');
        $this->form_validation->set_rules('draft', 'Draft', 'required|trim');
        $this->form_validation->set_rules('dwt', 'DWT', 'required|trim');



        if ($this->form_validation->run() == false) {
            $data['title'] = 'Dock Space';
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $data['user'] = $user;
            $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $user['perusahaan']])->row_array();
            $data['galangan'] = $this->db->get_where('galangan', ['id_galangan' => $where['id']])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Planning/editdock', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_galangan' => $this->input->post('id'),
                'perusahaan' => htmlspecialchars($this->input->post('idperusahaan', true)),
                'nama_galangan' => htmlspecialchars($this->input->post('nama', true)),
                'tipe' => htmlspecialchars($this->input->post('tipe', true)),
                'panjang' => htmlspecialchars($this->input->post('panjang', true)),
                'lebar' => htmlspecialchars($this->input->post('lebar', true)),
                'draft' => htmlspecialchars($this->input->post('draft', true)),
                'DWT' => htmlspecialchars($this->input->post('dwt', true)),
            ];

            $this->db->set($data);
            $this->db->where('id_galangan', $this->input->post('id'));
            $this->db->update('galangan');

            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your Dock Space has been added</div>');
            redirect('Planning/dockspace');
        }
    }

    public function jadwal()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Atur Jadwal';
        $data['user'] = $user;

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Planning/jadwal', $data);
        $this->load->view('templates/footer');
    }

    public function updatejadwal($id)
    {
        $where = array('id' => $id);

        $this->form_validation->set_rules('tglawal', 'Tanggal Mulai', 'required');
        $this->form_validation->set_rules('tglakhir', 'Tanggal Selesai', 'required');


        if ($this->form_validation->run() == false) {
            $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $booking = $this->db->get_where('booking', ['id_booking' => $where['id']])->row_array();
            $data['booking'] = $booking;
            $data['galangan'] = $this->db->get_where('galangan', ['id_galangan' => $booking['galangan']])->row_array();
            $data['kapal'] = $this->db->get_where('kapal', ['id_kapal' => $booking['kapal']])->row_array();

            $data['title'] = 'List Galangan';
            $data['user'] = $user;
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('Planning/updatejadwal', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_booking' => $this->input->post('id'),
                'jenis' => $this->input->post('jenis'),
                'tgl_mulai' => $this->input->post('tglawal'),
                'tgl_akhir' => $this->input->post('tglakhir'),
            ];

            $this->db->set($data);
            $this->db->where('id_booking', $this->input->post('id'));
            $this->db->update('booking');
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! Galangan has been booked.</div>');
            redirect('Planning/jadwal');
        }
    }


    public function confirm($id)
    {
        $data = [
            'active' => 2,
        ];
        $this->db->set($data);
        $this->db->where('id_booking', $id);
        $this->db->update('booking');

        redirect('Planning/jadwal');
    }

    public function unconfirm($id)
    {
        $data = [
            'active' => 1,
        ];

        $this->db->set($data);
        $this->db->where('id_booking', $id);
        $this->db->update('booking');
        redirect('Planning/jadwal');
    }

    public function repair()
    {
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Repair List';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('Planning/repair', $data);
        $this->load->view('templates/footer');
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
            redirect('Planning/profil');
        }
    }
}
