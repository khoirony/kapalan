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
			redirect('owner');
		}
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$data['title'] = 'Login';
			$this->load->view('templates/auth_header', $data);
			$this->load->view('auth/login');
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
			if (password_verify($password, $user['password'])) {
				$data = [
					'email' => $user['email'],
					'role_id' => $user['role_id']
				];
				$this->session->set_userdata($data);
				if ($user['role_id'] == 0) {
					redirect('superadmin');
				} else if ($user['role_id'] == 1) {
					redirect('shipyard');
				} else if ($user['role_id'] == 2) {
					redirect('AdminOwner');
				} else if ($user['role_id'] == 3) {
					redirect('Superintenden');
				} else if ($user['role_id'] == 4) {
					redirect('DockMon');
				} else if ($user['role_id'] == 5) {
					redirect('ShipMan');
				} else {
					$cekOwner = "SELECT * FROM pemilik_kapal WHERE pengguna=" . $user['id'];
					$hitung = $this->db->query($cekOwner)->num_rows();
					if ($hitung < 1) {
						$data = [
							'pengguna' => $user['id'],
						];
						$this->db->insert('pemilik_kapal', $data);
					}
					redirect('owner');
				}
			} else {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger" role="alert">Wrong Password!</div>');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Email is not registered!</div>');
			redirect('auth');
		}
	}

	public function registration()
	{
		if ($this->session->userdata('email')) {
			redirect('user');
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
			$this->load->view('auth/registration');
			$this->load->view('templates/auth_footer');
		} else {
			$perusahaan = [
				'nama' => htmlspecialchars($this->input->post('nama', true)),
				'email' => htmlspecialchars($this->input->post('email', true)),
				'no_telp' => htmlspecialchars($this->input->post('notelp', true)),
				'no_fax' => htmlspecialchars($this->input->post('nofax', true)),
				'alamat' => htmlspecialchars($this->input->post('alamat', true)),
				'kode_pos' => htmlspecialchars($this->input->post('kodepos', true)),
				'role_id' => htmlspecialchars($this->input->post('role', true)),
			];


			$this->db->insert('perusahaan', $perusahaan);
			$query = "SELECT * FROM perusahaan ORDER BY id DESC limit 1";
			$cekid = $this->db->query($query)->row_array();

			$user = [
				'id' => $cekid['id'],
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
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">You have been logged out</div>');
		redirect('auth');
	}

	public function blocked()
	{
		$this->load->view('auth/blocked');
	}
}
