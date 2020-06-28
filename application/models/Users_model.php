<?php

/******************************************************/
/* File        : Users_model.php                      */
/* Lokasi File : ./application/models/Users_model.php */
/* Copyright   : Yosef Murya & Badiyanto              */
/* Publish     : Penerbit Langit Inspirasi            */
/*----------------------------------------------------*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Users_model
class Users_model extends CI_Model
{

    // Property yang bersifat public   
    public $table = 'users';
    public $id = 'username';
    public $ids = 'id_user';
    public $order = 'ASC';

    // Konstrutor   
    function __construct()
    {
        parent::__construct();
    }

    // Tabel data dengan nama users
    function json()
    {
        $this->datatables->select('id_user,blokir,date_created,email,id_sessions,image,kd_bid,level,password,username');
        // $this->datatables->select('username,password,email,level,blokir');
        $this->datatables->from('users');  
    // onclick="deletedata(id)"
        $this->datatables->add_column('action', '<a href="users/read/$1" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a>  <a href="users/update/$1" class="btn btn-warning"  ><i class="fa fa-pencil" aria-hidden="true" ></i></a>  <a href="users/delete/$1" id="hapus" </a><button class="btn btn-danger tombol-hapus" ><i class="fa fa-trash"</i></button>','username');
        return $this->datatables->generate();
    // onclick="deletedata(id)" href="users/delete/$1"  onclick="deletedata(id)" ;; onclick="javascript: return confirm(\'Are You Sure ?\')" id="hapus-tombol" type="submit" <a href="users/delete/$1"    </a> ('."'".$person->id."'".') (".'"'.$ids->id.'"'.")
    }

    function json_asli()
    {
        $this->datatables->select('blokir,id,date_created,email,id_sessions,image,kd_bid,level,password,username');
        // $this->datatables->select('username,password,email,level,blokir');
        $this->datatables->from('users');  
        $this->datatables->add_column('action', anchor(site_url('users/read/$1'),'<button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button>')."  ".anchor(site_url('users/update/$1'),'<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>')."  ".anchor(site_url('users/delete/$1'),'<button type="button" class="btn btn-danger remove"><i class="fa fa-trash" aria-hidden="true"></i></button>','onclick="javascript: return confirm(\'Are You Sure ?\')"'), 'username');
        return $this->datatables->generate();
    }



    // Menampilkan semua data 
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // Menampilkan semua data berdasarkan id-nya
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // menampilkan jumlah data	
    function total_rows($q = NULL)
    {
        $this->db->like('username', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('level', $q);
        $this->db->or_like('kd_bid', $q);
        $this->db->or_like('blokir', $q);
        $this->db->or_like('id_sessions', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('username', $q);
        $this->db->or_like('username', $q);
        $this->db->or_like('password', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('level', $q);
        $this->db->or_like('kd_bid', $q);
        $this->db->or_like('blokir', $q);
        $this->db->or_like('id_sessions', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // Menambahkan data kedalam database
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // Merubah data kedalam database
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // Menghapus data kedalam database
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
}

/* End of file Users_model.php */
/* Location: ./application/models/Users_model.php */
/* Please DO NOT modify this information : */
