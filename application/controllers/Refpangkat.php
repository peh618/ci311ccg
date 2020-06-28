<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

// deklarasi controller
// conrtler untuk crud pangkat dan golongan pegawai
class Refpangkat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Refpangkat_model'); //panggil model panggol
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
		$this->load->view('Referensi/Pangkat_list'); // tampil data form list
		$this->load->view('footer_list'); // tampil data footer list

	}

	// fungsi JSON
	public function json()
	{
		header('Content-Type:application/json');
		echo $this->Refpangkat_model->json();
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
			'back'   => site_url('refpangkat'),
			'action' => site_url('refpangkat/create_action'),
			'idpanggol' => set_value('idpanggol'),
			'kd_pangkat' => set_value('kd_pangkat'),
			'ur_pangkat' => set_value('ur_pangkat'),
			
		);
		// var_dump($rowAdm);
		// var_dump($data);
		// die;
		$this->load->view('header', $dataAdm); // tampilkan headaer
		$this->load->view('referensi/pangkat_form', $data); // tampil form create
		$this->load->view('footer'); //tampil footer

	}

	// Fungsi untuk melakukan aksi simpan data
	public function create_action()
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		// print_r($this->input->post()); 
		// die; //untuk lihat variable yang diposting 
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
				'kd_pangkat' => $this->input->post('kd_pangkat', TRUE),
				'ur_pangkat' => $this->input->post('ur_pangkat', TRUE),
				
			);
			// var_dump($data);
			// die;
			$this->Refpangkat_model->insert($data);
			// $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                // <h4><i class="icon fa fa-check"></i> Alert!</h4>
                // Create Record Success.
              // </div>');
			$this->session->set_flashdata('message', 'Create Record Success');
			redirect(site_url('refpangkat'));
		}
	}

// Fungsi menampilkan form Update Jurusan
    public function update($id) 
    {	
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
		// Menampilkan data berdasarkan id-nya yaitu username
		$rowAdm = $this->Users_model->get_by_id($this->session->userdata['username']);
		$dataAdm = array(	
				'wa'       => 'Web administrator',
				'univ'     => 'Universitas Langit Inspirasi',
				'username' => $rowAdm->username,
				'email'    => $rowAdm->email,
				'level'    => $rowAdm->level,
		);	
		
		// Menampilkan data berdasarkan id-nya yaitu jurusan
        $row = $this->Refpangkat_model->get_by_id($id);
		
		// Jika id-nya dipilih maka data jurusan ditampilkan ke form edit jurusan
        if ($row) {
			
            $data = array(
                'button' => 'Update',
				'back'   => site_url('refpangkat'),
                'action' => site_url('refpangkat/update_action'),
				'idpanggol' => set_value('idpanggol', $row->idpanggol), 
				'kd_pangkat' => set_value('kd_pangkat', $row->kd_pangkat),
				'ur_pangkat' => set_value('ur_pangkat', $row->ur_pangkat),
	    );
			$this->load->view('header',$dataAdm); // Menampilkan bagian header dan object data users 
            $this->load->view('Referensi/pangkat_form', $data); // Menampilkan form jurusan 
			$this->load->view('footer'); // Menampilkan bagian footer
        } 
		// Jika id-nya yang dipilih tidak ada maka akan menampilkan pesan 'Record Not Found'
		else {
            $this->session->set_flashdata('message', 'Record Not Found');
            // $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                // <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                // Record not found !!!
              // </div>');
            redirect(site_url('refpangkat'));
        }
    }
    
	// Fungsi untuk melakukan aksi update data
    public function update_action() 
    {
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}
		
        $this->_rules(); // Rules atau aturan bahwa setiap form harus diisi
		
		// Jika form jurusan belum diisi dengan benar 
		// maka sistem akan meminta user untuk menginput ulang
        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idpanggol', TRUE));
        } 
		// Jika form jurusan telah diisi dengan benar 
		// maka sistem akan melakukan update data jurusan kedalam database
		else {			
		    $data = array(
				'kd_pangkat' => $this->input->post('kd_pangkat',TRUE),
				'ur_pangkat' => $this->input->post('ur_pangkat',TRUE),
			);

            $this->Refpangkat_model->update($this->input->post('idpanggol', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
           // $this->session->set_flashdata('message', '<div class="alert alert-info alert-dismissible">
                // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                // <h4><i class="icon fa fa-info"></i> Alert!</h4>
                // Data Update Success !!!
              // </div>');
            redirect(site_url('refpangkat'));
        }
    }

	// Fungsi untuk melakukan aksi delete data berdasarkan id yang dipilih
	public function delete($id)
	{
		// Jika session data username tidak ada maka akan dialihkan kehalaman login			
		if (!isset($this->session->userdata['username'])) {
			redirect(base_url("login"));
		}

		// print_r($this->input->post($id)); 
		// print_r($id); 
		// die; //untuk lihat variable yang diposting 

		$row = $this->Refpangkat_model->get_by_id($id);
			// var_dump($row);
			// die;

		//jika id users yang dipilih tersedia maka akan dihapus
		if ($row) {
			$this->Refpangkat_model->delete($id);
			// $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                // <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                // Data delete Success !!!
              // </div>');
			$this->session->set_flashdata('message', 'Delete Record Success');
			redirect(site_url('Refpangkat'));
		}
		//jika id users yang dipilih tidak tersedia maka akan muncul pesan 'Record Not Found'
		else {
			$this->session->set_flashdata('message', 'Record Not Found');
			// $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                // <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                // <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                // Record not found !!!
              // </div>');
			redirect(site_url('Refpangkat'));
		}
	}

	// Fungsi rules atau aturan untuk pengisian pada form (create/input dan update)
	public function _rules()
	{

		$this->form_validation->set_rules('kd_pangkat', 'Pangkat', 'trim|required|max_length[4]');
		$this->form_validation->set_rules('ur_pangkat', 'Golongan', 'trim|required|max_length[45]');
		// $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email'); 
		// $this->form_validation->set_rules('ur_level', 'uraian level', 'trim|required');
		// $this->form_validation->set_rules('level', 'level', 'trim|required');
		// $this->form_validation->set_rules('blokir', 'blokir', 'trim|required');
		// $this->form_validation->set_rules('kd_bid', 'Kode Bidang', 'trim|required');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
	}
}
