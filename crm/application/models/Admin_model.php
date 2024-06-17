<?php
Class Admin_Model extends CI_Model { 

	public function __construct()
	{
	parent::__construct();
	}
	
        
	
	// CODE FOR ADMIN LOGIN START
	public function admin_login($data)
	{ 
	$condition = "(mobile=" . "'" .$this->db->escape_str($data['user_name']). "' OR emailid=" . "'" .$this->db->escape_str($data['user_name']). "' ) AND  pass= BINARY'". $this->db->escape_str($data['user_password'])."'";  
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
	// CODE FOR ADMIN LOGIN END
        
        
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
        
        
        public function lcolist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('lco_registration');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        
        /*      
        public function lcolist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('lco_registration'); 
            $this->db->join('lco_payment_detail', 'lco_payment_detail.lcoid = lco_registration.lcoid', 'left');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
         */
        
        
        
        
        public function showservics($sid){    
            $this->db->select('*');
            $this->db->from('services_type');
            $this->db->where('business_typ',$sid); 
            $query=$this->db->get(); 
            $output='';
            foreach($query->result() as $row)
            {
             $output .= '<option value="'.$row->sid.'">'.$row->services_type.'</option>';
            }
            return $output;
        }
        
        // FOR PAGINATION START
           
             public function num_of_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('lco_registration');
            $query=$this->db->get();   
            return $query->result();   
           } 
        // FOR PAGINATION END
           
           
        
           
        // FOR PAGINATION START
           public function totel_business_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('chanellist');
            $query=$this->db->get();   
            return $query->result();  
           }
           
            public function addchanelinsert($data) {
            $tt=$this->db->insert('chanellist',$data);
            return $tt; 
            } 
        
        
        // FOR PAGINATION END
           
        
        public function addelcoinsert($data) {  
            $tt=$this->db->insert('lco_registration',$data);
            return $tt; 
        }
        
        
        public function lcoupdate($vid,$data) { 
            $this->db->set($data, FALSE); 
            $this->db->where('lcoid',$vid); 
            $this->db->update('lco_registration');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }
        
        
        
         public function lco_payment_detail($limit, $offset) { 
            $lcoid = $this->uri->segment(3);
            $this->db->select('*');
            $this->db->from('lco_registration'); 
            $this->db->join('lco_payment_detail', 'lco_payment_detail.lcoid = lco_registration.lcoid', 'left');
            $this->db->where('lco_registration.lcoid',$lcoid); 
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
         } 
           // FOR PAGINATION START 
            public function num_of_payment_rows($vid){
            $this->db->select('count(*) as cnt');
            $this->db->from('lco_payment_detail');
            $this->db->where('lcoid',$vid);
            $query=$this->db->get();   
            return $query->result();   
           } 
        // FOR PAGINATION END
           
           
           
        
         public function add_lco_payment($data,$lcoid) {
            $tt=$this->db->insert('lco_payment_detail',$data);
            return $lcoid; 
        } 
        
        
        
        
         public function packslist() {
             $condition = "(status='1')"; 
            $this->db->select('*');
            $this->db->from('packs');
            $this->db->where($condition);
            $query=$this->db->get();    
            return $query->result();  
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
         
        public function check_lco($mobile,$emailid){
            $condition = "(mobile='".$mobile."' OR emailid='".$emailid."')";
            $this->db->select('*');
            $this->db->from('lco_registration');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return 1;
            }else{
                return 0;
            }
        }
        
        
        public function lco_view($vid){
            $condition = "(lcoid='".$vid."'  )";
            $this->db->select('*');
            $this->db->from('lco_registration');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }
        
 
        public function chanel_view($bid){
        if($bid!=''){$condition = "(chid='".$bid."'  )"; }else{$condition="1=1";}
            $this->db->select('*');
            $this->db->from('chanellist');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }
        
        
        
         public function delet_chanel($bid){
            if($bid!=''){$condition = "(chid='".$bid."'  )"; }else{$condition="1=1";}
            $this->db->select('*');
            $this->db->from('chanellist');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }
        
         public function chanel_del_action($bid){
            $this -> db ->where('chid', $bid);
            $this -> db ->delete('chanellist'); 
            return true;
        }
        
        
        public function chanellist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('chanellist');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        
        public function addbusinessinsert($data) {
            $tt=$this->db->insert('chanellist',$data);
            return $tt; 
        } 
         
        
        public function updatechanel($bid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('chid',$bid); 
            $this->db->update('chanellist');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }
        
        public function showallbusiness($bid=''){ 
            $val= $bid ? : $this->uri->segment(3);
            $condition = "(status=1 OR bid='". $val."')"; 
            $this->db->select('*');
            $this->db->from('chanellist');
            $this->db->where($condition); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        
        
        
        
        
         public function addbanner($data) {
            $tt=$this->db->insert('banner',$data);
            return $tt; 
        } 
        
        public function updatebanner($bid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('banner_id',$bid); 
            $this->db->update('banner');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }
        
          
        public function banner_del($bid){
        if($bid!=''){$condition = "(banner_id='".$bid."'  )"; }else{$condition="1=1";}
            $this->db->select('*');
            $this->db->from('banner');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }
        
        
        public function banner_del_action($bid){
            $this -> db ->where('banner_id', $bid);
            $this -> db ->delete('banner'); 
            return true;
        }
        
        
        public function services_view($sid){
            $condition = "(sid='".$sid."'  )";
            $this->db->select('*');
            $this->db->from('services_type');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }
        
       
        
        public function serviceslist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('services_type');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        
        public function addservicesinsert($data) {
            $tt=$this->db->insert('services_type',$data);
            return $tt; 
        } 
        
        public function updateservicestype($sid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('sid',$sid); 
            $this->db->update('services_type');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }
        
         
        
           
           
         
        // FOR PAGINATION START
           public function totel_bunner_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('banner');
            $query=$this->db->get();   
            return $query->result();//$query->num_rows();  
           }
            public function bunnerlist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('banner');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        // FOR PAGINATION END
          
           

        
        // FOR ORDER PAGINATION START
           public function num_of_orderrows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('order_table');
            $query=$this->db->get();   
            return $query->result();   
           }
        // FOR ORDER PAGINATION END
           
           
           
           
           
           
           
        public function userlist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('user_registration');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        /*
        public function num_user_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('user_registration');
            $query=$this->db->get();   
            return $query->result();   
        }
        */
        
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
        
        
        
        
        
        
        
        public function broadcastlist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('broadcast');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        
         public function addbroadcastinsert($data) {
            $tt=$this->db->insert('broadcast',$data);
            return $tt; 
        }  
        
         
         public function showalllco() {
             $condition = "(status='1')"; 
            $this->db->select('*');
            $this->db->from('lco_registration');
            $this->db->where($condition);
            $query=$this->db->get();    
            return $query->result();  
        }

        // MASTER TEST START
        public function test_view($bid){
            $condition = "(tid='".$bid."'  )";
            $this->db->select('*');
            $this->db->from('test');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }        
        public function test_delet($tid){
            $this->db->where('tid', $tid);
            $this->db->delete('test');
            return 1;
        }        
        public function testlist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('test');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }        
        public function addtestinsert($data) {            
            $tt=$this->db->insert('test',$data);
            return $tt; 
        }  
        public function updatetest($bid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('tid',$bid); 
            $this->db->update('test');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            }
        }
        // FOR ORDER PAGINATION START
           public function totel_test_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('test');
            $query=$this->db->get();   
            return $query->result();   
           }


           public function test_list($test_type){
            $this->db->select('*');
            $this->db->from('test');
            $this->db->where('test_type',$test_type); 
            $this->db->order_by('order_no');
            $query=$this->db->get();   
            return $query->result();   
           }



           
           public function show_test_values($tid){
            $this->db->select('*');
            $this->db->from('test');
            $this->db->where('tid',$tid);
            $query=$this->db->get();   
            return $query->result();   
           }


        // MASTER TEST ENd

             
        // MASTER doctor START
        public function doctor_view($bid){
            $condition = "(did='".$bid."'  )";
            $this->db->select('*');
            $this->db->from('doctor');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }        
        public function doctor_delet($did){
            $this->db->where('did', $did);
            $this->db->delete('doctor');
            return 1;
        }        
        public function doctorlist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('doctor'); 
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }

        public function adddoctorinsert($data) {            
            $tt=$this->db->insert('doctor',$data);
            return $tt; 
        }  
        public function updatedoctor($bid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('did',$bid); 
            $this->db->update('doctor');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            }
        }
        // FOR ORDER PAGINATION START
           public function totel_doctor_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('doctor');
            $query=$this->db->get();   
            return $query->result();   
           }
        // MASTER doctor ENd
       
 
        // MASTER refer_by START
        public function refer_by_view($bid){
            $condition = "(rid='".$bid."'  )";
            $this->db->select('*');
            $this->db->from('refer_by');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }        
        public function refer_by_delet($rid){
            $this->db->where('rid', $rid);
            $this->db->delete('refer_by');
            return 1;
        }        
        public function refer_bylist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('refer_by'); 
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }        
        public function addrefer_byinsert($data) {            
            $tt=$this->db->insert('refer_by',$data);
            return $tt; 
        }  
        public function updaterefer_by($bid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('rid',$bid); 
            $this->db->update('refer_by');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            }
        }

        
        //  MASTER refer_by START
           public function totel_refer_by_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('refer_by');
            $query=$this->db->get();   
            return $query->result();   
           }
        // MASTER refer_by END
       

        // MASTER IPD Start       
        public function add_ipd_insert($data) {
            $tt=$this->db->insert('ipd_table',$data);
            return $tt; 
        }
        public function add_ipd_detail($data) {
            $tt=$this->db->insert('ipd_detail',$data);
            return $tt; 
        }
        public function add_payment($data) {
            $tt=$this->db->insert('payment_detail',$data);
            return $tt; 
        }  
        public function update_payment($pid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('pid',$pid); 
            $this->db->update('payment_detail');
            $afftectedRows = $this->db->affected_rows(); 
                if($afftectedRows>0){
                    return 1;
                }
                else{ 
                    return 0;  
                }
        }



/*  UPDATE QUERIES FOR IPD START */

        public function updateipd($ipd_id,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('ipd_id',$ipd_id); 
            $this->db->update('ipd_table');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            }
        }
        public function update_ipd_detail($ipd_det_id,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('ipd_det_id',$ipd_det_id); 
            $this->db->update('ipd_detail');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            }
        }
       
        public function ipd_listing($limit, $offset){    
            $this->db->select('*');
            $this->db->from('ipd_table'); 
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
            // FOR PAGINATION START
        public function totel_ipd_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('ipd_table');
            $query=$this->db->get();   
            return $query->result();//$query->num_rows();  
        }
        // FOR PAGINATION END 
        public function ipd_view_edit($ipd_id){
            $condition = "(ipd_id='".$ipd_id."'  )";
            $this->db->select('*');
            $this->db->from('ipd_table');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
                return $query->result();
            }else{
                return 0;
            } 
        } 
        public function ipd_search_listing($ipd_search,$ipd_date){    
            $this->db->select('*');
            $this->db->from('ipd_table');  
            $this->db->like('patient_name',$ipd_search); 
            if (!empty($ipd_date)) {
                $this->db->where('created_date', $ipd_date);
            } 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
                return $query->result();
            }else{
                return 0;
            }
        }

        public function get_ipd_detail($ipd_id){
            $condition = "(ipd_id='".$ipd_id."'  )";
            $this->db->select('*');
            $this->db->from('ipd_detail');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }

        public function delete_ipd($ipd_id){ 
            $this->db->where('ipd_id', $ipd_id); 
            $this->db->delete('ipd_table');

            $this->db->where('ipd_or_opd_id', $ipd_id);
            $this->db->where('pay_table',"IPD");
            $this->db->delete('payment_detail'); 
            return true;
        }


/*  END   PAST NOW  */













        
        // MASTER IPD END  

        // MASTER OPD Start       
        public function add_opd_insert($data) {
            $tt=$this->db->insert('opd_table',$data);
            return $tt; 
        } 
        public function updateopd($opd_id,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('opd_id',$opd_id); 
            $this->db->update('opd_table');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            }
        }
       
        public function opd_listing($limit, $offset){    
            $this->db->select('*');
            $this->db->from('opd_table'); 
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        public function opd_search_listing($opd_search,$opd_date){    
            $this->db->select('*');
            $this->db->from('opd_table');  
            $this->db->like('patient_name',$opd_search);  
            if (!empty($opd_date)) {
                $this->db->where('created_date', $opd_date);
            } 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }


        

            // FOR PAGINATION START
        public function totel_opd_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('opd_table');
            $query=$this->db->get();   
            return $query->result();//$query->num_rows();  
        }
        // FOR PAGINATION END 
        public function opd_view_edit($opd_id){
            $condition = "(opd_id='".$opd_id."'  )";
            $this->db->select('*');
            $this->db->from('opd_table');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        } 
        public function delete_opd($opd_id){  

            $this->db->where('opd_id', $opd_id); 
            $this->db->delete('opd_table');
 
            $this->db->where('ipd_or_opd_id', $opd_id);
            $this->db->where('pay_table',"OPD");
            $this->db->delete('payment_detail'); 
            return true;
        }


        public function payment_detail($opd_id,$pay_table,$pay_mode){ 
            $this->db->select('*');
            $this->db->from('payment_detail'); 
            $this->db->where('ipd_or_opd_id',$opd_id); 
            $this->db->where('pay_table',$pay_table); 
             $this->db->where('pay_mode',$pay_mode);  
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        




 // MASTER OPD END 
        //  EXPORT EXCEL START

        /*
        $condition = " (ipd_table.created_date between '".$start_date."' and '".$end_date."') and pay_table='IPD'"; 
            $this->db->select('*');
            $this->db->from('ipd_table');
            $this->db->join('payment_detail', 'payment_detail.ipd_or_opd_id = ipd_table.ipd_id', 'left');
            $this->db->where($condition);
            $query=$this->db->get();   
            return $query->result();  
        */
           public function ipd_report_export($start_date,$end_date){
            //echo $start_date." , ".$end_date; exit();
            $this->db->select('ipd_table.ipd_id, ipd_table.patient_name,ipd_table.created_date, ipd_table.patient_name, ipd_table.netamount, payment_detail.pay_mode,payment_detail.amount,payment_detail.pid');
            $this->db->from('ipd_table');
            $this->db->join('payment_detail', 'payment_detail.ipd_or_opd_id = ipd_table.ipd_id', 'left');
            $this->db->where("pay_table",'IPD');
            $this->db->where("ipd_table.created_date between '".$start_date."' and '".$end_date."'");
            $query=$this->db->get();   
            return $query->result();   
           }

           public function opd_report_export($start_date,$end_date){
            //echo $start_date." , ".$end_date; exit();
            $this->db->select('opd_table.opd_id, opd_table.patient_name,opd_table.created_date, opd_table.patient_name,payment_detail.pay_mode,payment_detail.amount,payment_detail.pid');
            $this->db->from('opd_table');
            $this->db->join('payment_detail', 'payment_detail.ipd_or_opd_id = opd_table.opd_id', 'left');
            $this->db->where("payment_detail.pay_table",'OPD');
            $this->db->where("opd_table.created_date between '".$start_date."' and '".$end_date."'");
            $query=$this->db->get();   
            return $query->result();   
           }


        //EXPORT EXCEL END
       






































            public function count_total_lco(){
            $this->db->select('count(*) as cnt');
            $this->db->from('lco_registration');
            $query=$this->db->get();   
            return $query->result();   
           }
           
           public function totel_broadcast_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('broadcast');
            $query=$this->db->get();   
            return $query->result();   
           }
        // FOR ORDER PAGINATION END  Pincode    
           
        
        
           
           
            public function count_total_channel(){
                $this->db->select('count(*) as cnt');
                $this->db->from('chanellist'); 
                $query=$this->db->get();   
                return $query->result();   
            }
 
}
?>
