<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Presensi_model extends CI_Model{
        public $table='tb_presensi';
        public $id='id_presensi';
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
            $this->db->order_by('waktu_presensi','ASC');
            return $this->db->get($this->table)->result();
        }

        function searchByIdPresensi($data){
            $this->db->where('id_presensi',$data);
            return $this->db->get($this->table)->row();
        }

        function update($data,$id){
            $this->db->where($this->id, $id);
            $this->db->update($this->table,$data);
        }

        function search_ByIdPresensi($id){
            $this->db->where($this->id,$id);
            return $this->db->get($this->table)->row();
        }

        function delete($id){
            $this->db->where($this->id, $id);
            $this->db->delete($this->table);
        }
    }
?>