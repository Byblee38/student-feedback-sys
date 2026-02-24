<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class PelaporanModel extends CI_Model {

    public function add($data){
        return $this->db->insert('input_aspirasi', $data);
    }

    public function read_all()
    {
        $this->db->select('i.*, k.nama_kategori, ifnull(a.status, "Menunggu") AS status');
        $this->db->from('input_aspirasi AS i');
        $this->db->join('kategori AS k', 'k.id_kategori = i.id_kategori');
        $this->db->join('aspirasi AS a', 'a.id_pelaporan = i.id_pelaporan', 'left');
        $this->db->group_by('i.id_pelaporan');
        $this->db->order_by('i.nis', 'DESC');
        $query = $this->db->get();
        return $query->result();
        
    }

    public function read_by_nis($nis)
    {
        $this->db->select('i.*, k.nama_kategori, ifnull(a.status, "Menunggu") AS status');
        $this->db->from('input_aspirasi AS i');
        $this->db->join('kategori AS k', 'k.id_kategori = i.id_kategori');
        $this->db->join('aspirasi AS a', 'a.id_pelaporan = i.id_pelaporan', 'left');
        $this->db->where('i.nis', $nis);
        $this->db->order_by('i.tanggal', 'DESC');
        $query = $this->db->get();
        return $query->result();
        
    }

    public function read_by_id($id)
    {
        $this->db->select('i.*, k.nama_kategori');
        $this->db->from('input_aspirasi AS i');
        $this->db->join('kategori AS k', 'k.id_kategori = i.id_kategori');
        $this->db->where('i.id_pelaporan', $id);
        $query = $this->db->get('input_aspirasi');
        return $query->row();
    }

    public function edit($id, $data)
    {
        $this->db->where('id_pelaporan', $id);
        return $this->db->update('input_aspirasi', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_pelaporan', $id);
        return $this->db->delete('input_aspirasi');
    }
}