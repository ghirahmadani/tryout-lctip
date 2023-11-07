<?php
defined('BASEPATH') OR exit('No direct script access allowed');
    class Feedback_model extends CI_Model {
        public function getAll()
        {
            $query = $this->db->get("feedback");
            return $query->result();
        }

        public function getById($id){
            $this->db->where('id', $id);
            $query = $this->db->get("feedback");
            return $query->row();
        }

        public function save_insert($data){
            $simpan = $this->db->insert("feedback" , $data);

            if($simpan){
                return true;
            }else{
                return false;
            }
        }

        public function save_delete($id){
            $this->db->where('id', $id);
            $del = $this->db->delete("feedback");

            if($del){
                return true;
            }else{
                return false;
            }
        }

        public function save_update($id, $data){
            $this->db->where('id', $id);
            $update = $this->db->update("feedback", $data);

            if($update){
                return true;
            }else{
                return false;
            }
        }
    }
?>