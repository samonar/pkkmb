<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info_model extends CI_Model{

    public $table = 'tb_info_pkkmb';
    public $id = 'id_info';
    public $order = 'DESC';

    function read(){
        $this->db->join('tb_panitia','tb_info_pkkmb.id_panitia=tb_panitia.id_panitia');
        return $this->db->get($this->table)->result();
    }

    function read_ById($id){
        $this->db->join('tb_panitia','tb_info_pkkmb.id_panitia=tb_panitia.id_panitia');
        $this->db->where($this->id,$id);
        return $this->db->get($this->table)->row();
    }

    public function readLimit($limit,$star){
        $this->db->join('tb_panitia','tb_info_pkkmb.id_panitia=tb_panitia.id_panitia');
        return $this->db->get($this->table,$limit,$star)->result();
    }

    function countInfo(){
        $this->db->join('tb_panitia','tb_info_pkkmb.id_panitia=tb_panitia.id_panitia');
        return $this->db->get($this->table)->num_rows();
    }

}

?>