<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Kelengkapan_model extends CI_Model{
        public $table='tb_kelengkapan';
        public $id='id_kelengkapan';
        public $order='ASC';

        function read(){
            return $this->db->get($this->table)->result();
        }

        function insert($data){
            return $this->db->insert($this->table,$data);
        }

        function searchById($data){
            $this->db->where($this->id,$data);
            return $this->db->get($this->table)->row();
        }

        function searchByIdCamaba($data){
            $this->db->where('id_camaba',$data);
            return $this->db->get($this->table)->result();
        }

        function update($data,$id){
            $this->db->where($this->id, $id);
            $this->db->update($this->table,$data);
        }

        function delete($id){
            $this->db->where($this->id, $id);
            $this->db->delete($this->table);
        }

        function delete_penilaian($id){
            $this->db->where('id_kelengkapan', $id);
            $this->db->delete('tb_kelengkapan');
        }
    }
?>