<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// Deklarasi pembuatan class Users_model
class Refpangkat_model extends CI_Model
{

    // Property yang bersifat public   
    public $table = 't_pangkat';
    public $id = 'idpanggol';
    public $order = 'desc';

    // Konstrutor   
    function __construct()
    {
        parent::__construct();
    }

    // Tabel data dengan nama pangkat
   
    function json()
    {
        $this->datatables->select('idpanggol,kd_pangkat,ur_pangkat');
        // $this->datatables->select('username,password,email,level,blokir');
        $this->datatables->from('t_pangkat');  
        $this->datatables->add_column('action', '<a href="Refpangkat/update/$1" class="btn btn-warning"  ><i class="fa fa-pencil" aria-hidden="true" ></i></a>  <a href="Refpangkat/delete/$1" id="hapus" </a><button class="btn btn-danger tombol-hapus" ><i class="fa fa-trash"</i></button>','idpanggol');
        return $this->datatables->generate();


    }
// onclick="javascript: return confirm(\'Are You Sure ?\')"

function json_asli()
    {
        $this->datatables->select('idpanggol,kd_pangkat,ur_pangkat');
        // $this->datatables->select('username,password,email,level,blokir');
        $this->datatables->from('t_pangkat');  
        $this->datatables->add_column('action',anchor(site_url('Refpangkat/update/$1'),'<button type="button" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></button>')."  ".anchor(site_url('Refpangkat/delete/$1') ,'<button type="button"  class="btn btn-danger remove"><i class="fa fa-trash" aria-hidden="true"></i></button>',''), 'idpanggol');
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
        $this->db->like('idpanggol', $q);
        $this->db->or_like('kd_pangkat', $q);
        $this->db->or_like('ur_pangkat', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // Menampilkan data dengan jumlah limit
    function get_limit_data($limit, $start = 0, $q = NULL)
    {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('idpanggol', $q);
        $this->db->or_like('kd_pangkat', $q);
        $this->db->like('ur_pangkat', $q);
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
