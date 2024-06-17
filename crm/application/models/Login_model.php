<?php
Class Login_model extends CI_Model { 

	public function __construct()
	{
	parent::__construct();
	}
	
         
	
	// CODE FOR COMMON ADMIN LOGIN START
	public function common_admin_login($data)
    {  
       // $condition = "(login_id=" . "'" .$this->db->escape_str($data['user_name']). "' OR emailid=" . "'" .$this->db->escape_str($data['user_name']). "' )  AND user_type='" .$this->db->escape_str($data['user_type']). "' AND  user_password='". $this->db->escape_str($data['user_password'])."'"; 
        $condition = "(login_id=" . "'" .$this->db->escape_str($data['user_name']). "' OR emailid=" . "'" .$this->db->escape_str($data['user_name']). "' ) AND  user_password='". $this->db->escape_str($data['user_password'])."'"; 
        $this->db->select('*');
        $this->db->from('admin_login');
        $this->db->where($condition);
        $this->db->limit(1); 
        $query = $this->db->get();   
            if($query->num_rows() == 1) {
                return $query->result();
            }
            else
            {
                return 0;
            }
    }
	// CODE FOR COMMON ADMIN LOGIN END  
     
        
        public function check_value_exist($detail){     
             $table = $detail['table'];
             $coloumnname = $detail['coloumnname'];
             $test_type = $detail['test_type']; 
             $values = $detail['values'];   
             $query = $this->db->query('SELECT count(*) as cnt FROM '.$table.' WHERE '.$coloumnname.'="'.$values.'" AND test_type="'.$test_type.'"');     
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
            
        }
        
        
          
            
        
        
        public function check_slots($check_slots){
            $condition = "(pack_no='".$check_slots."')";
            $this->db->select('*');
            $this->db->from('chanellist');
            $this->db->where($condition);
            $query=$this->db->get();  
            $chk = $query->result(); 
            if($query->num_rows()>0) { 
                $this->db->set(array('pack_no'=>0), FALSE); 
                $this->db->where('pack_no',$check_slots); 
                $this->db->update('chanellist');
            }else{
                return 0;
            }
        }
               
        public function user_notifi_ajax(){
            $this->db->set(array('notifi_status'=>1), FALSE); 
            $this->db->where('notifi_status',0); 
            $this->db->update('user_registration');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }
         
        
        public function order_notifi_ajax(){
            $this->db->set(array('notifi_status'=>1), FALSE); 
            $this->db->where('notifi_status',0); 
            $this->db->update('order_table');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }
        

}
?>
