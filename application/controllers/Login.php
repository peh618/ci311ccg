<?php

/*****************************************************/
/* File        : Login.php                           */
/* Lokasi File : ./application/controllers/Login.php */
/* Copyright   : Yosef Murya & Badiyanto             */
/* Publish     : Penerbit Langit Inspirasi           */
/*---------------------------------------------------*/
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Login
class Login extends CI_Controller
{

    // Konstruktor	
    function __construct()
    {
        parent:: __construct();
        $this->load->helper('cookie');

        // Jika session data username dan password sesuai dengan yang ada didalam database 
        // maka halaman admin akan dibuka
        if ($this->session->userdata('username') and $this->session->userdata('password') and $this->session->userdata('level') == 'admin') {
            redirect(base_url('admin'));
        }
        $this->load->model(array('Login_model'));
    }

    // Fungsi untuk menampilkan halaman utama Login
    function index()
    {

        $this->load->view('login'); // Menampilkan halaman utama login
    }

    // Fungsi untuk melakukan proses login
    function proses()
    {
        // Melakukan validasi input username dan password
        $this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');

        // Jika validasi input username dan password bernilai false 
        // maka user/admin diminta melakukan input ulang
        if ($this->form_validation->run() == FALSE) {

            $this->load->view('login'); // Menampilkan halaman utama login
        }
        // Jika validasi input username dan password bernilai false 
        // maka user/admin diminta melakukan input ulang
        else {
            // Input username dan password dengan fungsi POST	
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            // Memberi nama variabel baru untuk input username dan password
            $user   = $username;
            $pass   = md5($password);

            // Melakukan cek ke database, apakah username dan password yang diinputkan cocok atau tidak
            $cek    = $this->Login_model->cek($user, $pass);

            // remeber me
               $uemail = $this->input->post("username");
               $upass  = $this->input->post("password");
            // remeber me
            // Jika username dan password yang diinputkan cocok 
           
            if ($cek->num_rows() > 0) {

                //Buat session username, email, dan level untuk nantinya ditampilkan
                foreach ($cek->result() as $qad) {
                        $sess_data['username'] = $qad->username;
                        $sess_data['email']    = $qad->email;
                        $sess_data['level']    = $qad->level;
                        $this->session->set_userdata($sess_data);
                }
                
                if ($sess_data['level'] == 'admin') {
                    
                    $this->session->set_flashdata('success', 'Login Berhasil !');
                    
                    if ($this->input->post("chkremember")) {
                        # code...
                        $cookieuem = array(
                                'name'   => 'uemail',
                                'value'  => $uemail,
                                'expire' => '86500',
                                // 'domain' => '.some-domain.com',
                                'path'   => '/',
                                // 'prefix' => 'myprefix_',
                                // 'secure' => TRUE
                                    );

                         $cookieup = array(
                                'name'   => 'upassword',
                                'value'  => $upass,
                                'expire' => '86500',
                                // 'domain' => '.some-domain.com',
                                'path'   => '/',
                                // 'prefix' => 'myprefix_',
                                // 'secure' => TRUE
                                    );
                        // $this->input->set_cookie('uemail', $uemail, 86500,'','/','', 'TRUE'); /* Create cookie for store emailid */
                        $this->input->set_cookie($cookieuem); /* Create cookie for store emailid */
                        // $this->input->set_cookie('upassword', $upass, 866500,'','/','', 'TRUE'); /* Create cookie for password */
                        $this->input->set_cookie($cookieup); /* Create cookie for password */
                    } else 
                    {
                      // remember
                        delete_cookie('uemail'); /* Delete email cookie */
                        delete_cookie('upassword'); /* Delete password cookie */
                    // remember  
                    }

                    redirect(base_url('admin'));
                } else {
                        
                    $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                    
                    redirect(base_url('login'));
                }
            }
            // Jika username dan password yang diinputkan tidak cocok 
            // maka akan muncul pesan 'Username atau Password yang anda masukkan salah'
            else {
                $this->session->set_flashdata('result_login', '<br>Username atau Password yang anda masukkan salah.');
                redirect(base_url('login'));
            }
        }
    }
}
/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
/* Please DO NOT modify this information : */
