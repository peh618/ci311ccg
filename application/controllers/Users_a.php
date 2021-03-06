<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

// deklarasi controller

class Users extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Users_model'); //panggil model user
		$this->load->library('form_validation'); //panggil model validasi
		// $this->load->helper(array('form')); // Memanggil form dan url yang terdapat pada helper
		$this->load->library('Datatables'); // panggil ignited datatables
		$this->load->library('upload'); // panggil library upload foto
	}

	// buat index file

	public function index()
	{
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"), 'refresh');
		}

		// tampilkan data berdasarkan id username pada session

		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		// date_default_timezone_set("ASIA/JAKARTA");
		$dataAdm = array(
			'title' => 'Administrator',
			'wa'       => 'Web administrator',
			'univ'     => 'Perwakilan BPKP Prov Kaltim',
			'username' => $rowAdm->username,
			'email'      => $rowAdm->email,
			'level'       => $rowAdm->level,
			'date_created' => $rowAdm->date_created,
			'image' => $rowAdm->image,
			'kd_bid' => $rowAdm->kd_bid,
		);


		// tampil halaman view

		$this->load->view('header_list', $dataAdm); // tampilkan halaman header untuk list
		$this->load->view('Users/Users_list'); // tampil data form list
		$this->load->view('footer_list'); // tampil data footer list

	}

	// fungsi JSON
	public function json()
	{
		header('Content-Type:application/json');
		echo $this->Users_model->json();
	}

	// menampilkan fungsi create
	public function create()
	{
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url('login'), 'refresh');
		}

		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		date_default_timezone_set("ASIA/JAKARTA");
		$dataAdm = array(
			'title' => 'Administrator',
			'wa'       => 'Web administrator',
			'univ'     => 'Perwakilan BPKP Prov Kaltim',
			'username' => $rowAdm->username,
			'email'      => $rowAdm->email,
			'level'       => $rowAdm->level,
			'date_created' => $rowAdm->date_created,
			'image' => $rowAdm->image,
			'kd_bid' => $rowAdm->kd_bid,
		);

		// Menampung data yang diinputkan
		$data = array(
			'button' => 'Create',
			'back'   => site_url('users'),
			'action' => site_url('users/create_action'),
			'username' => set_value('username'),
			'password' => set_value('password'),
			'email' => set_value('email'),
			'ur_level' => set_value('ur_level'),
			// 'level' => set_value('level'),
			'blokir' => set_value('blokir'),
			'kd_bid' => set_value('kd_bid'),
			// 'image' => set_value('image'),
		);
		// var_dump($rowAdm);
		// var_dump($data);
		// die;
		$this->load->view('header', $dataAdm); // tampilkan headaer
		$this->load->view('users/users_form', $data); // tampil form create
		$this->load->view('footer'); //tampil footer

	}

	// Fungsi untuk melakukan aksi simpan data
	public function create_action()
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		// print_r($this->input->post()); die; untuk lihat variable yang diposting 
		$this->_rules(); // Rules atau aturan bahwa setiap form harus diisi

		// Jika form users belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		}
		// Jika form users telah diisi dengan benar 
		// maka sistem akan menyimpan kedalam database
		else {

			$data = array(
				'blokir' => $this->input->post('blokir', TRUE),
				'date_created' => date_format(date_create(), "Y/m/d"),
				'email' => $this->input->post('email', TRUE),
				'id_sessions' => md5($this->input->post('password', TRUE)),
				'image' => 'default.jpg',
				'kd_bid' => $this->input->post('kd_bid', true),
				'level' => $this->input->post('ur_level', TRUE),
				'password' => md5($this->input->post('password', TRUE)),
				'username' => $this->input->post('username', TRUE),
			);
			// var_dump($data);
			// die;
			$this->Users_model->insert($data);
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('users'));
		}
	}

	// Fungsi menampilkan form users
	public function update($id)
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(
			'title' 		=> 'Administrator',
			'wa'       		=> 'Web administrator',
			'univ'     		=> 'Perwakilan BPKP Prov Kaltim',
			'username' 		=> $rowAdm->username,
			'email'     	=> $rowAdm->email,
			'level'       	=> $rowAdm->level,
			'date_created'	=> $rowAdm->date_created,
			'image' 		=> $rowAdm->image,
			'kd_bid' 		=> $rowAdm->kd_bid,
		);
		// Menampilkan data berdasarkan id-nya yaitu username
		$row = $this->Users_model->get_by_id($id);
		// var_dump($row);
		// die;

		// Jika id-nya dipilih maka data tahun akademik semester ditampilkan ke form edit users
		if ($row) {
			$data = array(
				'button' 	=> 'Update',
				'back'   	=> site_url('users'),
				'action' 	=> site_url('users/update_action'),
				'username'	 => set_value('username', $row->username),
				'password' 	=> set_value('password', $row->password),
				'email' 	=> set_value('email', $row->email),
				'ur_level' 	=> set_value('level', $row->level),
				'blokir' 	=> set_value('blokir', $row->blokir),
				'image' 	=>	set_value('image', $row->image),
				'kd_bid' 	=>	set_value('kd_bid', $row->kd_bid),
			);

			// var_dump($data);
			// die;
			$this->load->view('header', $dataAdm); // Menampilkan bagian header dan object data users
			// $this->load->view('users/users_form', $data); // Menampilkan form tahun akademik semester
			$this->load->view('users/users_edita', $data); // Menampilkan form tahun akademik semester
			$this->load->view('footer'); // Menampilkan bagian footer
		}
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('users'));
		}
	}

	public function update_action()
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
			// print_r($this->input->post());
			// die;

		// Rules atau aturan bahwa setiap form harus diisi
		$this->_rules();

		// Jika form users belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
		if ($this->form_validation->run() == FALSE) {
			$this->update($this->input->post('username', TRUE));
		}
		// Jika form users telah diisi dengan benar 
		// maka sistem akan melakukan update data tahun akademik semester kedalam database
		else {

			// konfigurasi untuk upload photo
			
					// menampung data input
					$data = array(
						'blokir' => $this->input->post('blokir', TRUE),
						'date_created' => date_format(date_create(), "Y/m/d"),
						'email' => $this->input->post('email', TRUE),
						'id_sessions' => md5($this->input->post('password', TRUE)),
						'image' => 'default.jpg',
						// 'image' => $dataimage,
						'kd_bid' => $this->input->post('kd_bid', true),
						'level' => $this->input->post('ur_level', TRUE),
						'password' => md5($this->input->post('password', TRUE)),
						'username' => $this->input->post('username', TRUE),
					);

					// var_dump($data);
					// die;
					$this->Users_model->update($this->input->post('username', TRUE), $data);
					// $this->User_model->update($data);
					$this->session->set_flashdata('message', 'Update Record Success');
					redirect(site_url('users'));
				}
			
	}  // akhir


	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
	public function delete($id)
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		$row = $this->Users_model->get_by_id($id);

		//jika id users yang dipilih tersedia maka akan dihapus
		if ($row) {
			$this->Users_model->delete($id);
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('users'));
		}
		//jika id users yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
			$this->session->set_flashdata('message', 'Record Not Found');
			redirect(site_url('users'));
		}
	}

	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
	public function _rules()
	{

		$this->form_validation->set_rules('username', 'username', 'trim|required');
		$this->form_validation->set_rules('password', 'password', 'trim|required');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('ur_level', 'uraian level', 'trim|required');
		// $this->form_validation->set_rules('level', 'level', 'trim|required');
		$this->form_validation->set_rules('blokir', 'blokir', 'trim|required');
		$this->form_validation->set_rules('kd_bid', 'Kode Bidang', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}
