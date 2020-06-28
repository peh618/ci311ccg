<?php

/****************************************************/
/* File        : Menu_model.php                     */
/* Lokasi File : ./application/models/Menu_model.php */
/* Copyright   : Yosef Murya & Badiyanto            */
/* Publish     : Penerbit Langit Inspirasi          */
/*--------------------------------------------------*/

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Menu_model
class Menu_model extends CI_Model
{
    // Property yang bersifat public
    // public $table = 'menu';
    public $table = 'menu';
    public $id = 'id_menu';
    public $main_menu = 'main_menu';
    public $order = 'DESC';

    // Konstrutor  
    function __construct()
    {
        parent::__construct();
    }

    // Tabel data dengan nama menu
    function json1()
    {
        $this->datatables->select('id_menu,nama_menu,link,icon,main_menu');
        // $this->datatables->from('menu');
        $this->datatables->from('menu'); //kalau pakai data di tabel menua
        $this->datatables->add_column('action', '<a href="menu/update/$1" class="btn btn-success"  ><i class="fa fa-pencil" aria-hidden="true" ></i></a>  <a href="menu/delete/$1" id="hapus" </a><button class="btn btn-danger tombol-hapus" ><i class="fa fa-trash"</i></button>','id_menu');
        return $this->datatables->generate();
    }

    function json()
    {
        $this->datatables->select('id_menu,nama_menu,link,icon,main_menu');
        // $this->datatables->from('menu');
        $this->datatables->from('menu'); //kalau pakai data di tabel menua
        $this->datatables->add_column('action', anchor(site_url('menu/update/$1'), '<button type="button" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></button>') . "  " . anchor(site_url('menu/delete/$1'), '<button type="button" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button>', 'id="hapus"'), 'id_menu');
        return $this->datatables->generate();
    }
    // onclick="javasciprt: return confirm(\'Are You Sure ?\')"
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
        $this->db->like('id_menu', $q);
        $this->db->or_like('nama_menu', $q);
        $this->db->or_like('link', $q);
        $this->db->or_like('icon', $q);
        $this->db->or_like('main_menu', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_menu', $q);
        $this->db->or_like('nama_menu', $q);
        $this->db->or_like('link', $q);
        $this->db->or_like('icon', $q);
        $this->db->or_like('main_menu', $q);
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

/* End of file Menu_model.php */
/* Location: ./application/models/Menu_model.php */
/* Please DO NOT modify this information : */
