<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keaktifan_model extends CI_Model{

    public $table = 'tb_kategori_keaktifan';
    public $id = 'id_kategori_keaktifan';
    public $order = 'ASC';

    function read(){
        return $this->db->get($this->table)->result();
    }

    function insert($data){
        $this->db->insert($this->table,$data);
    }

    function update($data,$id){
        $this->db->where($this->id, $id);
        $this->db->update($this->table,$data);
    }

    function update_penilaianKeaktifan($data,$id){
        $this->db->where('id_penilaian_keaktifan', $id);
        $this->db->update('tb_penilaian_keaktifan',$data);
    }
    
    function searchById($data){
        $this->db->where($this->id,$data);
        return $this->db->get($this->table)->row();
    }

    function delete($id){
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function delete_penilaian($id){
        $this->db->where('id_penilaian_keaktifan', $id);
        $this->db->delete('tb_penilaian_keaktifan');
    }

    function search_ByIdKeaktifan($id){
        $this->db->join('tb_kategori_keaktifan','tb_penilaian_keaktifan.id_kategori_keaktifan=tb_kategori_keaktifan.id_kategori_keaktifan');
        $this->db->where('tb_penilaian_keaktifan.id_penilaian_keaktifan',$id);
        return $this->db->get('tb_penilaian_keaktifan')->row();
        
    }

    function search_keaktifanByIdCamaba($id){
        $this->db->join('tb_kategori_keaktifan','tb_penilaian_keaktifan.id_kategori_keaktifan=tb_kategori_keaktifan.id_kategori_keaktifan');
        $this->db->where('tb_penilaian_keaktifan.id_camaba',$id);
        $this->db->order_by('waktu','ASC');
        return $this->db->get('tb_penilaian_keaktifan')->result();
    }
}

?>