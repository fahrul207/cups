<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pendaftaran_model extends CI_Model
{

    public $table = 'pendaftaran';
    public $id = 'Id_Pendaftaran';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('Id_Pendaftaran', $q);
	$this->db->or_like('NIS', $q);
	$this->db->or_like('ID_Panitia', $q);
	$this->db->or_like('Tanggal_Pendaftaran', $q);
	$this->db->or_like('Code_Progdi', $q);
	$this->db->or_like('Pembuatan', $q);
	$this->db->or_like('Code_Pembuat', $q);
	$this->db->or_like('Pembaharuan', $q);
	$this->db->or_like('Code_Pembaharuan', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('Id_Pendaftaran', $q);
	$this->db->or_like('NIS', $q);
	$this->db->or_like('ID_Panitia', $q);
	$this->db->or_like('Tanggal_Pendaftaran', $q);
	$this->db->or_like('Code_Progdi', $q);
	$this->db->or_like('Pembuatan', $q);
	$this->db->or_like('Code_Pembuat', $q);
	$this->db->or_like('Pembaharuan', $q);
	$this->db->or_like('Code_Pembaharuan', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Pendaftaran_model.php */
/* Location: ./application/models/Pendaftaran_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-13 12:05:15 */
/* http://harviacode.com */