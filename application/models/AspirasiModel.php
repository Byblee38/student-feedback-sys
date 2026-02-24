<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AspirasiModel extends CI_Model {
    public function add($data){
        return $this->db->insert('aspirasi', $data);
    }

    public function read_all()
    {
        $query = $this->db->get('aspirasi');
        return $query->result();
    }

    public function read_by_id($id)
    {
        $this->db->where('id_aspirasi', $id);
        $query = $this->db->get('aspirasi');
        return $query->row();
    }

    public function edit($id, $data)
    {
        $this->db->where('id_aspirasi', $id);
        return $this->db->update('aspirasi', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_aspirasi', $id);
        return $this->db->delete('aspirasi');
    }
}
