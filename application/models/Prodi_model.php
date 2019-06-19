<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Prodi_model extends CI_Model{
        public $table='tb_prodi';
        public $id='id_prodi';
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

        function searchLike($data){
            $this->db->select('id_prodi');
            $this->db->like('prodi',$data);
            return $this->db->get($this->table);
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