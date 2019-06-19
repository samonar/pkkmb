<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pleton_model extends CI_Model{
        public $table='tb_pleton';
        public $id='id_pleton';
        public $order='ASC';

        function read(){
            $this->db->join('tb_panitia','tb_pleton.id_panitia=tb_panitia.id_panitia');
            return $this->db->get($this->table)->result();
        }

        function insert($data){
            return $this->db->insert($this->table,$data);
        }

        function searchById($data){
            $this->db->where($this->id,$data);
            return $this->db->get($this->table)->row();
        }

        function update($data,$id){
            $this->db->where($this->id, $id);
            $this->db->update($this->table,$data);
        }

        function delete($id){
            $this->db->where($this->id, $id);
            $this->db->delete($this->table);
        }
    }
?>