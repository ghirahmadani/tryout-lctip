<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Topic_model extends CI_Model {
        public function getAll()
        {
            $query = $this->db->get("topik");
            return $query->result();
        }

        public function getById($id){
            $this->db->where('id', $id);
            $query = $this->db->get("topik");
            return $query->row();
        }

        public function getByWhere($where,$value){
            $this->db->where($where, $value);
            $query = $this->db->get("topik");
            return $query->result();
        }

        public function save_insert($data){
            $simpan = $this->db->insert("topik" , $data);

            if($simpan){
                return true;
            }else{
                return false;
            }
        }

        public function save_delete($id){
            $this->db->where('id', $id);
            $del = $this->db->delete("topik");

            if($del){
                return true;
            }else{
                return false;
            }
        }

        public function save_update($id, $data){
            $this->db->where('id', $id);
            $update = $this->db->update("topik", $data);

            if($update){
                return true;
            }else{
                return false;
            }
        }
    }
?>