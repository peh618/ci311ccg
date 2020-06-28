<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
        $this->load->model('Users_model');
        if (!isset($this->session->userdata['username'])) {
            redirect(base_url("login"));
        }
    }

    public function index()
    {

        // menampilkan data user

        date_default_timezone_set("ASIA/JAKARTA");
        $row = $this->Users_model->get_by_id($this->session->userdata['username']);

        $data = array(
            'title' => 'Administrator',
            'wa'       => 'Web administrator',
            'univ'     => 'Perwakilan BPKP Prov Kaltim',
            'username' => $row->username,
            'email'      => $row->email,
            'level'       => $row->level,
            'date_created' => $row->date_created,
            'image' => $row->image,
            'kd_bid' => $row->kd_bid,
        );
        // var_dump($data);
        // die;

        $this->load->view('beranda', $data); // Menampilkan halaman utama admin

    }

    // Fungsi melakukan logout
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('login'));
    }
}
