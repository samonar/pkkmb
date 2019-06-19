<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camaba_model extends CI_Model{

    public $table = 'tb_camaba';
    public $id = 'id_camaba';
    public $order = 'DESC';

    private $_batchImport;
    public function setBatchImport($batchImport) {
        $this->_batchImport = $batchImport;
    } 
    // save data
    public function importData() {
        $data = $this->_batchImport;
        
        if($this->db->insert_batch('tb_camaba', $data))
        {
            // Code here after successful insert
            return true;   // to the controller
        }else {
            echo "failde";
        }
    }

    function read(){
        $this->db->join('tb_prodi','tb_camaba.id_prodi=tb_prodi.id_prodi');
        $this->db->join('tb_pleton','tb_camaba.id_pleton=tb_pleton.id_pleton');
        $this->db->order_by('tb_prodi.prodi','ASC');
        return $this->db->get($this->table)->result();
    }

    function readSortAsc(){
        $this->db->select('nama_camaba,nim');
        $this->db->join('tb_prodi','tb_camaba.id_prodi=tb_prodi.id_prodi');
        $this->db->join('tb_pleton','tb_camaba.id_pleton=tb_pleton.id_pleton');
        $this->db->order_by('nim','ASC');
        return $this->db->get($this->table)->result();
    }

    function insert($data){
        return $this->db->insert($this->table,$data);
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