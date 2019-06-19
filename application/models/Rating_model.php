<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rating_model extends CI_Model{

    
    public $table='import';
        public $id='id_prodi';
        public $order='ASC';
    
  
    function ratingAtribut(){
        $this->db->select('tb_camaba.nama_camaba,tb_camaba.nim,');
        $this->db->select_sum('tb_atribut_kelengkapan.poin','atribut');
        $this->db->join('tb_camaba','tb_kelengkapan.id_camaba = tb_camaba.id_camaba','right');
        $this->db->join('tb_atribut_kelengkapan','tb_kelengkapan.id_atribut_kelengkapan = tb_atribut_kelengkapan.id_atribut_kelengkapan','left');
        $this->db->group_by(array("tb_camaba.nama_camaba", "tb_camaba.nim"));
        $this->db->order_by('nim','ASC');
        return $this->db->get('tb_kelengkapan')->result();
    }
    function ratingAktif(){
        $this->db->select('tb_camaba.nim,');
        $this->db->select_sum('tb_kategori_keaktifan.poin','aktif');
        $this->db->join('tb_camaba','tb_penilaian_keaktifan.id_camaba = tb_camaba.id_camaba','right');
        $this->db->join('tb_kategori_keaktifan','tb_penilaian_keaktifan.id_kategori_keaktifan = tb_kategori_keaktifan.id_kategori_keaktifan','left');
        $this->db->group_by(array("tb_camaba.nama_camaba", "tb_camaba.nim"));
        $this->db->order_by('nim','ASC');
        return $this->db->get('tb_penilaian_keaktifan')->result();
    }

    function ratingAbsensi(){
        $this->db->select_sum('tb_presensi.keterangan');
        $this->db->join('tb_camaba','tb_presensi.id_camaba = tb_camaba.id_camaba','right');
        $this->db->group_by(array("tb_camaba.nim"));
        $this->db->order_by('nim','ASC');
        return $this->db->get('tb_presensi')->result();
    }

    function insert($data){
        $this->db->insert_batch('import', $data);
    }

    function searchByNim($data){
        $this->db->where('nim',$data);
        $this->db->join('tb_prodi','tb_camaba.id_prodi=tb_prodi.id_prodi');
        $this->db->join('tb_pleton','tb_camaba.id_pleton=tb_pleton.id_pleton');
        return $this->db->get($this->table)->row();
    }

    function searchById($data){
        $this->db->where($this->id,$data);
        $this->db->join('tb_prodi','tb_camaba.id_prodi=tb_prodi.id_prodi');
        $this->db->join('tb_pleton','tb_camaba.id_pleton=tb_pleton.id_pleton');
        return $this->db->get($this->table)->row();
    }

    function update($data,$id){
        $this->db->where($this->id, $id);
        $this->db->update($this->table,$data);
    }

    function delete($id){
        $this->db->where('nim', $id);
        $this->db->delete($this->table);
    }

    function readById($id){
        $this->db->join('tb_prodi','tb_camaba.id_prodi=tb_prodi.id_prodi');
        $this->db->join('tb_pleton','tb_camaba.id_pleton=tb_pleton.id_pleton');
        $this->db->where('tb_camaba.id_prodi', $id);
        return $this->db->get($this->table)->result();
    }
}

?>