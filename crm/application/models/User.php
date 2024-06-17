<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{
	public function selectRow($tableName1)
	{
		$this->db->from($tableName1);
		return $this->db->get()->row();
	}

	public function joinAll($table_name2,$table_name3,$on,$where)
    {
        $this->db->select("*");
        $this->db->from($table_name2);
        $this->db->join($table_name3,$on);
        $this->db->where($where);
        $result=$this->db->get();
        return $result->result();
    }
	

	public function getRecruiterRowDataByJoinWhere($where)
    {
        $this->db->select("*");
        $this->db->from("admin");
        $this->db->where($where);
        return $this->db->get()->row();
    }
}