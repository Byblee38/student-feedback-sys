<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SiswaModel extends CI_Model {

    public function add($data){
        return $this->db->insert('siswa', $data);
    }

    public function read_all()
    {
        $query = $this->db->get('siswa');
        return $query->result();
    }

    public function read_by_id($id)
    {
        $this->db->where('nis', $id);
        $query = $this->db->get('siswa');
        return $query->row();
    }

    public function edit($old_nis, $data)
    {
        $this->db->where('nis', $old_nis);
        return $this->db->update('siswa', $data);
    }

    public function delete($id)
    {
        $this->db->where('nis', $id);
        return $this->db->delete('siswa');
    }

    public function login($nis, $kelas)
    {
        $this->db->where('nis', $nis);
        $this->db->where('kelas', $kelas);
        $query = $this->db->get('siswa');
        return $query->row();
    }
}