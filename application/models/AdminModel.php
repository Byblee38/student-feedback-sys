<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_Model {

    public function add($data){
        return $this->db->insert('admin', $data);
    }

    public function read_all()
    {
        $query = $this->db->get('admin');
        return $query->result();
    }

    public function read_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('admin');
        return $query->row();
    }

    public function edit($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('admin', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('admin');
    }

    public function validate($username, $password)
    {
        //SELECT * FROM admin WHERE username=? AND password=? LIMIT 1
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $query = $this->db->get('admin', 1);
        return $query->row();
    }

}