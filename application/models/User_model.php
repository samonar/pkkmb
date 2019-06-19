<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

    public $table = 'tb_panitia';
    public $id = 'id';
    public $order = 'DESC';

    function read(){
        $this->db->not_like('jabatan_panitia', 'admin');
        return $this->db->get($this->table)->result();
    }

    function readPanitia(){
        $this->db->like('jabatan_panitia', 'pendamping');
        return $this->db->get($this->table)->result();
    }

    function insert($data){
        $this->db->insert($this->table,$data);
    }

    function update($data,$id){
        $this->db->where('id_panitia', $id);
        $this->db->update($this->table,$data);
    }
    
    function searchById($data){
        $this->db->where('id_panitia',$data);
        return $this->db->get($this->table)->row();
    }

    function delete($id){
        $this->db->where('id_panitia', $id);
        $this->db->delete($this->table);
    }
}

?>