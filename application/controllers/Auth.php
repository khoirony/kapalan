<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		// $this->session->sess_destroy();
		if ($this->session->userdata('email')) {
			redirect('Auth/blocked');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('Auth/login');
			$this->load->view('templates/auth_footer');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['email' => $email])->row_array();

		if ($user) {
			if ($user['active'] == 1) {
				if (password_verify($password, $user['password'])) {
					$data = [
						'email' => $user['email'],
						'role_id' => $user['role_id']
					];
					$this->session->set_userdata($data);
					if ($user['role_id'] == 0) {
						redirect('SuperAdmin');
					} else if ($user['role_id'] == 1) {
						redirect('Shipyard');
					} else if ($user['role_id'] == 2) {
						redirect('AdminOwner');
					} else if ($user['role_id'] == 3) {
						redirect('Superintendent/kapal');
					} else if ($user['role_id'] == 4) {
						redirect('DockMon/galangan');
					} else if ($user['role_id'] == 5) {
						redirect('ShipMan');
					} else if ($user['role_id'] == 6) {
						redirect('ProjectLeader');
					} else if ($user['role_id'] == 7) {
						redirect('Qcqa');
					} else if ($user['role_id'] == 8) {
						redirect('WorkshopOfficer');
					} else if ($user['role_id'] == 9) {
						redirect('Planning/dockspace');
					} else {
						redirect('Auth/blocked');
					}
				} else {
					$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
					redirect('Auth');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Akun Belum Akif!</div>');
				redirect('Auth');
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
			redirect('Auth');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('Auth/blocked');
		}
		$this->form_validation->set_rules('nama', 'Nama Perusahaan', 'required');
		$this->form_validation->set_rules('email', 'Email Perusahaan', 'required|trim|valid_email|is_unique[user.email]', [
			'is_unique' => 'This email has already registered! '
		]);
		$this->form_validation->set_rules('notelp', 'No Telp Perusahaan', 'required|trim');
		$this->form_validation->set_rules('nofax', 'No Fax Perusahaan', 'required|trim');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('kodepos', 'Kode Pos', 'required|trim');
		$this->form_validation->set_rules('role', 'Tipe Perusahaan', 'required|trim');

		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Registrasi';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('Auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$perusahaan = [
				'nama_perusahaan' => htmlspecialchars($this->input->post('nama', true)),
				'email_perusahaan' => htmlspecialchars($this->input->post('email', true)),
				'no_telp' => htmlspecialchars($this->input->post('notelp', true)),
				'no_fax' => htmlspecialchars($this->input->post('nofax', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'kode_pos' => htmlspecialchars($this->input->post('kodepos', true)),
				'role_id' => htmlspecialchars($this->input->post('role', true)),
			];


			$this->db->insert('perusahaan', $perusahaan);
			$query = "SELECT * FROM perusahaan ORDER BY id_perusahaan DESC limit 1";
			$cekid = $this->db->query($query)->row_array();

			$user = [
				'perusahaan' => $cekid['id_perusahaan'],
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'no_telp' => htmlspecialchars($this->input->post('notelp', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'jabatan' => 'Admin',
				'role_id' => htmlspecialchars($this->input->post('role', true)),
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			];

			$this->db->insert('user', $user);
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
			redirect('Auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');
		$this->session->sess_destroy();

		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">You have been logged out</div>');
		redirect('Auth');
	}

	public function blocked()
	{
		$this->load->view('Auth/blocked');
	}

	public function home()
	{
		$this->load->view('Auth/index');
	}
}
