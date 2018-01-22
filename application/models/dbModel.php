<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DbModel extends CI_Model {
	public function insertAll($data){
			$this->db->insert('visitors_comments',$data);
            }
            public function getMessages(){
              $query=$this->db->query("select * from visitors_comments");  
                 return $query->result();
            }
		public function insertbeatDetails($data){
			$this->db->insert('beatscollections',$data);
            }
            public function getbeatDetails(){
              $query=$this->db->query("select * from beatscollections");  
                 return $query->result();
            }
			 public function getsomebeatDetails(){
              $query=$this->db->query("select * from beatscollections ORDER BY id desc LIMIT 3");  
                 return $query->result();
            }
}