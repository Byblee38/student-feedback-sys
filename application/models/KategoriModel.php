<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class KategoriModel extends CI_Model {
    public function add($data){
        return $this->db->insert('kategori', $data);
    }

    public function read_all()
    {
        $query = $this->db->get('kategori');
        return $query->result();
    }

    public function read_by_id($id)
    {
        $this->db->where('id_kategori', $id);
        $query = $this->db->get('kategori');
        return $query->row();
    }

    public function edit($id, $data)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->update('kategori', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_kategori', $id);
        return $this->db->delete('kategori');
    }
}
