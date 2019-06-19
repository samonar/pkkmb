<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atribut_model extends CI_Model{

    public $table = 'tb_atribut_kelengkapan';
    public $id = 'id_atribut_kelengkapan';
    public $order = 'DESC';

    function read(){
        return $this->db->get($this->table)->result();
    }

    function readAtribut(){
        return $this->db->get('tb_atribut_kelengkapan')->result();
    }

    function insert($data){
        $this->db->insert($this->table,$data);
    }

    function update($data,$id){
        $this->db->where($this->id, $id);
        $this->db->update($this->table,$data);
    }
    function updateKelengkapan($data,$id){
        $this->db->where($this->id, $id);
        $this->db->update($this->table,$data);
    }
    
    function searchById($data){
        $this->db->where($this->id,$data);
        return $this->db->get($this->table)->row();
    }

    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }
    function search_ByIdCamaba($id){
        $this->db->join('tb_atribut_kelengkapan','tb_kelengkapan.id_atribut_kelengkapan=tb_atribut_kelengkapan.id_atribut_kelengkapan');
        $this->db->where('tb_kelengkapan.id_camaba',$id);
        $this->db->order_by('waktu','ASC');
        return $this->db->get('tb_kelengkapan')->result();
    }

    function search_ByIdKelengkapan($id){
        $this->db->join('tb_atribut_kelengkapan','tb_kelengkapan.id_atribut_kelengkapan=tb_atribut_kelengkapan.id_atribut_kelengkapan');
        $this->db->where('tb_kelengkapan.id_kelengkapan',$id);
        return $this->db->get('tb_kelengkapan')->row();
    }
}

?>