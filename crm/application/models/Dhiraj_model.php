<?php
Class Dhiraj_model extends CI_Model { 

	public function __construct()
	{
	parent::__construct();
	}
	public function manage_group_master(){    
        $this->db->select('*');
        $this->db->from('myguests'); 
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
        return 2;
    }


    public function data_retrive_condition($id){    
        $this->db->select('*');
        $this->db->from('myguests'); 
        $this->db->where('id', $id);        
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }
        else{
            return 0;
        }
    }

    public function data_insert ($array){
        $data = array(
            'firstname' =>  $array['firstname'],
            'lastname' => $array['lastname'],
            'email' => $array['email'],
            'age' => $array['age']
         );
         $this->db->insert('myguests', $data); 
    }
  

    public function entry_update1($id) {
        $data = array( 
            'name' => $this->input->post('name'),
            'age' => $this->input->post('age'),
            'address' => $this->input->post('address')
        );

        $this->db->where('id', $id);
        $this->db->update('myguests', $data);
    }

    public function delete_iteam_row($array){
        $this->db->where('id', $array);
        $this->db->delete('myguests');
    }
}
?>