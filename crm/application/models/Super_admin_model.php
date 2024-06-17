<?php
Class Super_Admin_Model extends CI_Model { 

    public function __construct()
    {
    parent::__construct();
    }
    // Group Master 
    public function manage_group_master(){    
        $this->db->select('*');
        $this->db->from('group_master'); 
        $this->db->order_by("gid",'DESC');
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }
    public function groupSubmit($data){
        $this->db->insert('group_master',$data);
        return $insert_id = $this->db->insert_id(); 
    }
    public function groupEdit($gid) { 
        $this->db->select('*');
        $this->db->from('group_master');
        $this->db->where('gid',$gid); 
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->row();
        }else{
            return 0;
        } 
    } 
    public function groupUpdate($gid,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('gid',$gid); 
        $this->db->update('group_master');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    }
    public function groupDelete($gid){
        $this->db->where('gid', $gid);
        $this->db->delete('group_master');
        return 1;
    }
    // manage Vehicle Master 
    public function product_master(){    
        $this->db->select('*');
        $this->db->from('product'); 
        $this->db->order_by("pid",'DESC');
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }
    public function productSubmit($data){
        $this->db->insert('product',$data);
        return $insert_id = $this->db->insert_id(); 
    }
    public function productDelete($pid){
        $this->db->where('pid', $pid);
        $this->db->delete('product');
        return 1;
    }
    public function productEdit($pid) {   
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('pid',$pid); 
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->row();
        }else{
            return 0;
        } 
    } 

    public function productUpdate($pid,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('pid',$pid); 
        $this->db->update('product');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    }
    // manage Customer Master 
    public function manage_customer(){    
        $this->db->select('*');
        $this->db->from('customer'); 
        $this->db->order_by("cid",'DESC');
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }
    public function customerSubmit($data){
    $this->db->insert('customer',$data);
    return $insert_id = $this->db->insert_id(); 
    }
    public function newCustomerSubmit($data){
    $this->db->insert('customer',$data);
    return $insert_id = $this->db->insert_id(); 
    }
    public function customerDelete($cid){
        $this->db->where('cid', $cid);
        $this->db->delete('customer');
        return 1;
    }
    public function customerEdit($cid) { 
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where('cid',$cid); 
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->row();
        }else{
            return 0;
        } 
    } 

    public function customerUpdate($cid,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('cid',$cid); 
        $this->db->update('customer');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    }
    public function billSubmit($data){
    $this->db->insert('bill_master',$data);
    return $insert_id = $this->db->insert_id(); 
    }
    public function itemdataSubmit($itemdata){
    $this->db->insert('itemlist',$itemdata);
    return $insert_id = $this->db->insert_id(); 
    }

    // Bill_tbl 
    public function manage_bill(){    
        $this->db->select('*');
        $this->db->from('bill_master'); 
        $this->db->order_by("billid",'DESC');
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }
    public function billDelete($bid){
        $this->db->where('bid', $bid);
        $this->db->delete('bill_master');
        return 1;
    }
    public function billItemDelete($bid){
        $this->db->where('bid', $bid);
        $this->db->delete('itemlist');
        return 1;
    }
    public function billPDF($bid){    
        $condition = "(bt.bid = '".$bid."')";
        $this->db->select('bt.*');
        $this->db->from('bill_master as bt');

        $this->db->where($condition);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->row();
        }else{
            return 0;
        } 
    } 
    public function itemDetails($bid){    
        $condition = "(il.bid = '".$bid."')";
        $this->db->select('il.*,il.pid as pid');
        $this->db->from('itemlist as il');
        $this->db->where($condition);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        } 
    } 
    public function customerDetails($cid){
        $condition = "(cid='".$cid."' )";
        $this->db->select('*');
        $this->db->from('customer');
        $this->db->where($condition);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        } 
    }





















         
        
         // maintenance table 
        public function manage_maintenance(){    
            $this->db->select('*');
            $this->db->from('maintenance_tbl'); 
            $this->db->order_by("mid",'DESC');
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        public function addmaintenance(){    
            $this->db->select('*');
            $this->db->from('maintenance_tbl'); 
            $this->db->order_by("mid",'DESC');
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        public function addmaintenanceSubmit($data){
            $this->db->insert('maintenance_tbl',$data);
            return $insert_id = $this->db->insert_id(); 
        }
        
         public function maintenanceDelete($mid){
            $this->db->where('mid', $mid);
            $this->db->delete('maintenance_tbl');
            return 1;
        }

        public function maintenanceEdit($mid) {  
            $this->db->select('*');
            $this->db->from('maintenance_tbl');
            $this->db->where('mid',$mid); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
         } 

        public function maintenanceUpdate($mid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('mid',$mid); 
            $this->db->update('maintenance_tbl');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }



       




        // manage Broker Master 
        public function manage_broker(){    
            $this->db->select('*');
            $this->db->from('broker_tbl'); 
            $this->db->order_by("brid",'DESC');
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }

        public function brokerDelete($brid){
            $this->db->where('brid', $brid);
            $this->db->delete('broker_tbl');
            return 1;
        }

        public function brokerSubmit($data){
            $this->db->insert('broker_tbl',$data);
            return $insert_id = $this->db->insert_id(); 
        }

        public function brokerEdit($brid) {  
            $this->db->select('*');
            $this->db->from('broker_tbl');
            $this->db->where('brid',$brid); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
         } 

        public function brokerUpdate($brid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('brid',$brid); 
            $this->db->update('broker_tbl');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }




        // order_booking_tbl 
        public function manage_order_booking(){    
            $this->db->select('*');
            $this->db->from('order_booking_tbl'); 
            $this->db->order_by("obid",'DESC');
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }


        public function paymentDeletedAfterOrderDelete($obid){
            $this->db->where('obid', $obid);
            $this->db->delete('payment_tbl');
            return 1;
        }



        public function orderBookingListDelete($obid){
            $this->db->where('obid', $obid);
            $this->db->delete('order_booking_list_tbl');
            return 1;
        }

        public function orderBookingSubmit($data){
            $this->db->insert('order_booking_tbl',$data);
            return $insert_id = $this->db->insert_id(); 
        }

        public function orderBookingEdit($obid) {  
            $this->db->select('*');
            $this->db->from('order_booking_tbl');
            //$this->db->join('order_booking_list_tbl as oblt', 'obt.obid = oblt.obid', 'left');
            $this->db->where('obid',$obid); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
         } 

         public function orderBookingListEdit($obid) {  
            $this->db->select('*');
            $this->db->from('order_booking_list_tbl');
            //$this->db->join('order_booking_list_tbl as oblt', 'obt.obid = oblt.obid', 'left');
            $this->db->where('obid',$obid); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
         } 

        public function orderBookingUpdate($obid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('obid',$obid); 
            $this->db->update('order_booking_tbl');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }

        public function bookingOrderListUpdate($oblistid,$bookingOrderList) {
            $this->db->set($bookingOrderList, FALSE); 
            $this->db->where('oblistid',$oblistid); 
            $this->db->update('order_booking_list_tbl');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }



        // Order Booking List tbl
        public function bookingOrderListSubmit($bookingOrderList){
        
           $this->db->insert('order_booking_list_tbl',$bookingOrderList);
           return $insert_id = $this->db->insert_id();
           
        }




        // Insert and update in one query in mysql codeigniter
    public function bookingOrderListAdd1($new_data){
        $this->db->insert('order_booking_list_tbl',$new_data);
           return $insert_id = $this->db->insert_id();
    }

    
    public function bookingOrderListUpdate1($oblistid,$data){
        $this->db->set($data, FALSE); 
            $this->db->where('oblistid',$oblistid); 
            $this->db->update('order_booking_list_tbl');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
    }







        




   




        public function show_Order_Booked_Pending_Detail_Test(){    
            $this->db->select('*');
            $this->db->from('order_booking_list_tbl'); 
            //$this->db->where('obid', $obid);
            //$this->db->order_by("oblistid",'DESC');
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }

        public function billEdit($blid) {  
            $this->db->select('*');
            $this->db->from('bill_tbl');
            $this->db->where('blid',$blid); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
         }

         public function billGenerated($blid) {  
            $this->db->select('obid');
            $this->db->from('bill_tbl');
            $this->db->where('blid',$blid); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
         } 

        public function billUpdate($blid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('blid',$blid); 
            $this->db->update('bill_tbl');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }




        


        // Payment table 
        public function manage_payment(){    
            $this->db->select('*');
            $this->db->from('payment_tbl'); 
            $this->db->order_by("pid",'DESC');
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }

        public function paymentDelete($pid){
            $this->db->where('pid', $pid);
            $this->db->delete('payment_tbl');
            return 1;
        }

        public function paymentSubmit($data){
            $this->db->insert('payment_tbl',$data);
            return $insert_id = $this->db->insert_id(); 
        }

        public function paymentEdit($pid) {  
            $this->db->select('*');
            $this->db->from('payment_tbl');
            $this->db->where('pid',$pid); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
         } 

        public function paymentUpdate($pid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('pid',$pid); 
            $this->db->update('payment_tbl');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }
 





















//////OLD Amit Code

   

    public function search_employee($title,$trainer_type){
        if ($trainer_type=="Samarthan") { 
            $this->db->like('fullname', $title , 'both');
            $this->db->order_by('aid', 'ASC');
            $this->db->where('status', '1');
            $this->db->limit(10);
            return $this->db->get('admin_login')->result();
        }elseif ($trainer_type=="Trainer") { 
            $this->db->like('traineer_name', $title , 'both');
            $this->db->order_by('tid', 'ASC');
            $this->db->where('status', '1');
            $this->db->limit(10);
            return $this->db->get('trainer_master')->result();
        }
    } 
     

    public function checkValueExist($table,$col_name,$vlu){
        $this->db->select('count(*) as cnt');
        $this->db->from($table); 
        $this->db->where($col_name, $vlu);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }
    


       
    public function num_of_salesGP_rows(){    
        $this->db->select('count(*) as cnt');
        $this->db->from('master_salesgp'); 
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }  
    public function salesGP_list($limit, $offset){    
        $this->db->select('*');
        $this->db->from('master_salesgp'); 
        $this->db->order_by('spgid','DESC'); 
        $this->db->limit($limit,$offset);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    } 
    public function salesGPSubmit($data) {
        $tt=$this->db->insert('master_salesgp',$data);
        return $tt; 
    }  
    public function salesGPDet($spgid){
        $condition = "(spgid='".$spgid."'  )";
            $this->db->select('*');
            $this->db->from('master_salesgp');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
    }  
    public function salesGPUpdate($spgid,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('spgid',$spgid); 
        $this->db->update('master_salesgp');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    }


    public function num_of_testdriveGP_rows(){    
        $this->db->select('count(*) as cnt');
        $this->db->from('master_testdrivegp'); 
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }  
    public function testdriveGP_list($limit, $offset){    
        $this->db->select('*');
        $this->db->from('master_testdrivegp'); 
        $this->db->order_by('spgid','DESC'); 
        $this->db->limit($limit,$offset);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    } 
    public function testdriveGPSubmit($data) {
        $tt=$this->db->insert('master_testdrivegp',$data);
        return $tt; 
    }  
    public function testdriveGPDet($spgid){
        $condition = "(spgid='".$spgid."'  )";
            $this->db->select('*');
            $this->db->from('master_testdrivegp');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
    }  
    public function testdriveGPUpdate($spgid,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('spgid',$spgid); 
        $this->db->update('master_testdrivegp');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    }



    public function num_of_empGP_rows(){    
        $this->db->select('count(*) as cnt');
        $this->db->from('master_empgp'); 
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }  
    public function empGP_list($limit, $offset){    
        $this->db->select('*');
        $this->db->from('master_empgp'); 
        $this->db->order_by('spgid','DESC'); 
        $this->db->limit($limit,$offset);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    } 
    public function empGPSubmit($data) {
        $tt=$this->db->insert('master_empgp',$data);
        return $tt; 
    }  
    public function empGPDet($spgid){
        $condition = "(spgid='".$spgid."'  )";
            $this->db->select('*');
            $this->db->from('master_empgp');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
    }  
    public function empGPUpdate($spgid,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('spgid',$spgid); 
        $this->db->update('master_empgp');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    }



    public function num_of_quotation_rows(){    
        $this->db->select('count(*) as cnt');
        $this->db->from('quotation'); 
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }  
    public function quotation_list($limit, $offset){    
        $this->db->select('*');
        $this->db->from('quotation'); 
        $this->db->order_by('qid','DESC'); 
        $this->db->limit($limit,$offset);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    } 
    public function quotaionSubmition($data) {
        $tt=$this->db->insert('quotation',$data);
        return $tt; 
    }  
    public function quotationPrint($spgid){
        $condition = "(qid='".$spgid."'  )";
            $this->db->select('*');
            $this->db->from('quotation');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
    }  

 
    
    public function employeeDropDownBranchWise($branch_id){ 
       /*$this->db->select('*')->from('admin_login');
       $this->db->where('FIND_IN_SET('.$branch_id.',branch)');
       $this->db->order_by('fullname','ASC');*/

      $query=  $this->db->query('SELECT * FROM admin_login WHERE FIND_IN_SET('.$branch_id.', branch) ORDER BY fullname ASC');
  
        if($query->num_rows()>0) { 
            return $query->result();
        }else{
            return 0;
        } 
    }

  
 
        public function actionWorkingPlan(){
            $wid = $this->uri->segment(3); 
            $this->db->select('*');
            $this->db->from('working_plan');
            $this->db->where("wid",$wid);  
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }

     
        public function show_distric($distric_id){
            $this->db->select('*');
            $this->db->from('block_table');
            $this->db->where('distric_id',$distric_id);
            $query=$this->db->get();   
            return $query->result();   
        }

        
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




        
        
        public function num_of_user_rows(){    
            $this->db->select('count(*) as cnt');
            $this->db->from('admin_login');   
            $this->db->where_not_in('user_type',"SuperAdmin"); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        } 


        public function manage_user(){    
            $this->db->select('*');
            $this->db->from('admin_login');  
            //$this->db->where('state_id',$state_id); 
            $this->db->where_not_in('user_type',"SuperAdmin");

            $this->db->order_by("aid",'DESC');

            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }

        public function userDelete($aid){
            $this->db->where('aid', $aid);
            $this->db->delete('admin_login');
            return 1;
        }

        public function userSubmit($data){
            $tt=$this->db->insert('admin_login',$data);
            return $tt; 
        }

        public function userkdet($aid) { 
            $aid = $this->uri->segment(3);  
            $this->db->select('*');
            $this->db->from('admin_login as al');
            $this->db->where('al.aid',$aid); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            // return $query->row_array();  // STANDS FOR ARRAY :- GIVES IN ARRAY
            return $query->row();// STANDS FOR OBJEcT :- GIVES IN OBJECT
            }else{
                return 0;
            } 
         } 

        public function userUpdate($aid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('aid',$aid); 
            $this->db->update('admin_login');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        } 




// item Group



        public function num_of_item_group_rows(){    
            $this->db->select('count(*) as cnt');
            $this->db->from('item_group');
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        } 


        public function manage_item_group(){    
            $this->db->select('*');
            $this->db->from('item_group'); 
            $this->db->order_by("igid",'DESC');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }

        public function itemGroupDelete($igid){
            $this->db->where('igid', $igid);
            $this->db->delete('item_group');
            return 1;
        }

        public function itemGroupNameExists($data) {            
            
            $this->db->select('item_group_name');
            $this->db->from('item_group');
            $this->db->where('item_group_name',$data['item_group_name']);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
        }

        public function itemGroupSubmit($data){
            $tt=$this->db->insert('item_group',$data);
            return $tt; 
        }

        public function itemGroupkdet($igid) { 
            $igid = $this->uri->segment(3);  
            $this->db->select('*');
            $this->db->from('item_group as ag');
            $this->db->where('ag.igid',$igid); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
         } 

        public function itemGroupUpdate($igid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('igid',$igid); 
            $this->db->update('item_group');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        } 




        // item Master



        public function num_of_item_master1_rows(){    
            $this->db->select('count(*) as cnt');
            $this->db->from('item_master');
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        } 


        public function manage_item1(){    
            $this->db->select('*');
            $this->db->from('item_master'); 
            $this->db->order_by("iid",'DESC');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }

        public function itemDelete($iid){
            $this->db->where('iid', $iid);
            $this->db->delete('item_master');
            return 1;
        }

        public function itemSubmit($data){
            $tt=$this->db->insert('item_master',$data);
            return $tt; 
        }

        public function itemkdet($iid) { 
            $iid = $this->uri->segment(3);  
            $this->db->select('*');
            $this->db->from('item_master');
            $this->db->where('item_master.iid',$iid); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
         } 

        public function itemUpdate($iid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('iid',$iid); 
            $this->db->update('item_master');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        } 





    public function num_of_saf_rows(){    
        $this->db->select('count(*) as cnt');
        $this->db->from('master_saf'); 
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }  
    public function saf_list($limit, $offset){    
        $this->db->select('*');
        $this->db->from('master_saf'); 
        $this->db->order_by('safid','DESC'); 
        $this->db->limit($limit,$offset);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }
    public function addSafSubmit($data) {
        $tt=$this->db->insert('master_saf',$data);
        return $tt; 
    } 
    
    public function getCustomerPandingSAF($custid){
        $condition = "(status='1' and customer_id='".$custid."' )";
            $this->db->select('*');
            $this->db->from('master_saf');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
    } 

    public function safDet($safid){
        $condition = "(safid='".$safid."'  )";
            $this->db->select('*');
            $this->db->from('master_saf');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
    }  
    public function safUpdate($safid,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('safid',$safid); 
        $this->db->update('master_saf');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    }
    public function carBooked($car_sid,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('car_sid',$car_sid); 
        $this->db->update('stock_car_det');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    }


        // MASTER ITEM START 
        public function manage_deliver_challen($limit, $offset){    
            $this->db->select('*');
            $this->db->from('manage_deliver_challen'); 
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        // FOR ORDER PAGINATION START
        public function num_of_deliver_challen_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('manage_deliver_challen');
            $query=$this->db->get();   
            return $query->result();   
        } 
        public function deliverChallenSubmit($data) {            
            $tt=$this->db->insert('manage_deliver_challen',$data);
            return $tt; 
        } 
        public function deliverChallenDetailSubmit($data) {            
            $tt=$this->db->insert('manage_delivery_challen_det',$data);
            return $tt; 
        } 



        // MASTER ITEM START 
        public function manage_city(){    
            $this->db->select('*');
            $this->db->from('city_table');
            $this->db->order_by('cid','DESC');
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        // FOR ORDER PAGINATION START
        public function num_of_city_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('city_table');
            $query=$this->db->get();   
            return $query->result();   
        } 

        public function cityNameExists($data) {            
            
            $this->db->select('city_name');
            $this->db->from('city_table');
            $this->db->where('city_name',$data['city_name']);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
        } 

        public function citySubmit($data) {            
            $tt=$this->db->insert('city_table',$data);
            return $tt; 
        }  
 
        public function citykDet($cid){
            $condition = "(cid='".$cid."'  )";
                $this->db->select('*');
                $this->db->from('city_table');
                $this->db->where($condition);
                $query=$this->db->get();   
                if($query->num_rows()>0) { 
                return $query->row();
                }else{
                    return 0;
                } 
        } 
        public function cityUpdate($cid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('cid',$cid); 
            $this->db->update('city_table');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        } 
        public function cityDelete($cid){
            $this->db->where('cid', $cid);
            $this->db->delete('city_table');
            return 1;
        } 




        // MASTER ITEM START 
        public function manage_cluster(){    
            $this->db->select('*');
            $this->db->from('cluster_table');
            $this->db->order_by('clid','DESC');
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        // FOR ORDER PAGINATION START
        public function num_of_cluster_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('cluster_table');
            $query=$this->db->get();   
            return $query->result();   
        } 
        public function clusterNameExists($data) {            
            
            $this->db->select('cluster_name');
            $this->db->from('cluster_table');
            $this->db->where('cluster_name',$data['cluster_name']);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
        } 
        public function clusterSubmit($data) {            
            $tt=$this->db->insert('cluster_table',$data);
            return $tt; 
        }  
 
        public function clusterkDet($clid){
            $condition = "(clid='".$clid."'  )";
                $this->db->select('*');
                $this->db->from('cluster_table');
                $this->db->where($condition);
                $query=$this->db->get();   
                if($query->num_rows()>0) { 
                return $query->row();
                }else{
                    return 0;
                } 
        } 
        public function clusterUpdate($clid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('clid',$clid); 
            $this->db->update('cluster_table');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        } 
        public function clusterDelete($clid){
            $this->db->where('clid', $clid);
            $this->db->delete('cluster_table');
            return 1;
        } 






       public function slc_form_list(){    
         
        $this->db->select('*');
        $this->db->from('elderly_table'); 

        $this->db->order_by('eid','DESC'); 
        $this->db->limit($limit,$offset);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    } 



    public function num_of_slc_form_enquiry_rows(){    
        $this->db->select('count(*) as cnt');
        $this->db->from('elderly_table');  

        // if($this->session->userdata('status')!='' && $this->session->userdata('status')!='status'){ 
        //     $this->db->where('status',$this->session->userdata('status') );  
        //  } 
        


    // $this->db->where( "(`shram_vibhag` IS NULL OR `kisan_samany` IS NULL OR `rajiv_gandhi_kisan` IS NULL OR `pds` IS NULL OR `manrega_k_antargat` IS NULL OR `pension_yojna` IS NULL OR `pradhan_mantri_aawas` IS NULL OR `dr_khubchand` IS NULL OR `mukhya_mantri` IS NULL OR `pay_jal_yojna` IS NULL)",NULL,FALSE);
     
         $this->db->order_by('eid','DESC');
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    } 



    public function slc_formDetail($eid){
        $condition = "(eid='".$eid."')";
            $this->db->select('*');
            $this->db->from('elderly_table');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->row();
            }else{
                return 0;
            } 
    }  
    public function slc_formUpdate($eid,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('eid',$eid); 
        $this->db->update('elderly_table');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    }


    public function slc_formDelete($eid){
            $this->db->where('eid', $eid);
            $this->db->delete('elderly_table');
            return 1;
        } 









        // MASTER ITEM START 
        public function manage_community_officer($limit, $offset){    
            $this->db->select('*');
            $this->db->from('community_officer_table');
            $this->db->order_by('coid','DESC');
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        // FOR ORDER PAGINATION START
        public function num_of_community_officer_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('community_officer_table');
            $query=$this->db->get();   
            return $query->result();   
        } 
        public function community_officerSubmit($data) {            
            $tt=$this->db->insert('community_officer_table',$data);
            return $tt; 
        }  
 
        public function community_officerkDet($coid){
            $condition = "(coid='".$coid."'  )";
                $this->db->select('*');
                $this->db->from('community_officer_table');
                $this->db->where($condition);
                $query=$this->db->get();   
                if($query->num_rows()>0) { 
                return $query->row();
                }else{
                    return 0;
                } 
        } 
        public function community_officerUpdate($coid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('coid',$coid); 
            $this->db->update('community_officer_table');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        } 
        public function community_officerDelete($coid){
            $this->db->where('coid', $coid);
            $this->db->delete('community_officer_table');
            return 1;
        } 










        


        public function export_attendance_list(){    
            $this->db->select('*');
            $this->db->from('employee_attendance as eatt'); 
            if($this->session->userdata('sel_branch')!='select'){
                $this->db->join('admin_login as al', 'eatt.aid = al.aid', 'left'); 
                $this->db->where('al.branch',$this->session->userdata('sel_branch'));
            } 
            $this->db->where('eatt.indate BETWEEN "'. date('Y-m-d', strtotime($this->session->userdata('sdate'))). '" and "'. date('Y-m-d', strtotime($this->session->userdata('edate'))).'"'); 
            if($this->session->userdata('empid')!='select'){
                $this->db->where_in('eatt.aid',$this->session->userdata('empid'));
            }   
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }

  
           
        
       





       // FOR PAGINATION START 
        public function num_of_WorkingPlan_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('working_plan');
            $this->db->where('aid',$this->session->userdata('aid'));
            $this->db->where("working_date BETWEEN '".$this->session->userdata('sdate')."' AND '".$this->session->userdata('edate')."'");
            $this->db->order_by('wid','DESC');
                $query=$this->db->get();   
            return $query->result();   
       } 
    // FOR PAGINATION END 
       public function manageWorkingPlanListing($limit, $offset) { $aid=$this->session->userdata('aid');
            $lcoid = $this->uri->segment(3);   
            $this->db->select('*');
            $this->db->from('working_plan');  
            $this->db->where('aid',$aid); 
            $this->db->where("working_date BETWEEN '".$this->session->userdata('sdate')."' AND '".$this->session->userdata('edate')."'");
            $this->db->order_by('wid','DESC');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
         }   
        public function searchWorkingPlan($start_date, $end_date) { 
            $lcoid = $this->uri->segment(3);
            $aid = $this->session->userdata('aid');  
            $this->db->select('*');
            $this->db->from('working_plan'); 
            //$this->db->join('lco_payment_detail', 'lco_payment_detail.lcoid = lco_registration.lcoid', 'left');
            $this->db->where('aid',$aid); 
            $this->db->where("working_date BETWEEN '".$start_date."' AND '".$end_date."'");
            $this->db->order_by('wid','DESC'); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
         } 


 
       // FOR PAGINATION START 
        public function num_of_EmpWorkingPlan_rows(){
            $this->db->select('count(*) as cnt'); 
            $this->db->from('working_plan as wp');  
            if($this->session->userdata('sel_branch')!='select'){
                $this->db->join('admin_login as al', 'wp.aid = al.aid', 'left'); 
                $this->db->where('al.branch',$this->session->userdata('sel_branch'));
            } 
            if($this->session->userdata('empid')!="select"){
                $this->db->where('wp.aid',$this->session->userdata('empid'));
            }
            if($this->input->post('status')!=''){
                $this->db->where('wp.status',$this->session->userdata('status'));
            } 
            $this->db->where("wp.working_date BETWEEN '".$this->session->userdata('sdate')."' AND '".$this->session->userdata('edate')."'");
            $this->db->order_by('wp.wid','DESC');
            $query=$this->db->get();   
            return $query->result();   
        } 
    // FOR PAGINATION END 
       public function manageEmpWorkingPlanListing($limit, $offset) { 
            $lcoid = $this->uri->segment(3);  
            $this->db->select('wp.*');
            $this->db->from('working_plan as wp'); 
  
            if($this->session->userdata('sel_branch')!='select'){
                $this->db->join('admin_login as al', 'wp.aid = al.aid', 'left'); 
                $this->db->where('al.branch',$this->session->userdata('sel_branch'));
            }
  
            if($this->session->userdata('empid')!="select"){
                $this->db->where('wp.aid',$this->session->userdata('empid'));
            }
            if($this->session->userdata('status')!="status"){
                $this->db->where('wp.status',$this->session->userdata('status'));
            } 
            $this->db->where("wp.working_date BETWEEN '".$this->session->userdata('sdate')."' AND '".$this->session->userdata('edate')."'"); 
            $this->db->order_by('wp.wid','DESC');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
         }   
        public function searchEmpWorkingPlan($status,$emp_id,$sdate, $edate) { 
            $lcoid = $this->uri->segment(3);  
            $this->db->select('*');
            $this->db->from('working_plan');  
            if(!empty($emp_id)){$this->db->where_in('aid',$emp_id);} 
            if(!empty($status)){$this->db->where('status',$status);} 
            $this->db->where("working_date BETWEEN '".$sdate."' AND '".$edate."'"); 
            $this->db->order_by('wid','DESC');
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        } 


        public function export_workingplan_list(){    
            $this->db->select('wp.*');
            $this->db->from('working_plan as wp');  
            if($this->session->userdata('sel_branch')!='select'){
                $this->db->join('admin_login as al', 'wp.aid = al.aid', 'left'); 
                $this->db->where('al.branch',$this->session->userdata('sel_branch'));
            } 
            if($this->session->userdata('empid')!="select"){
                $this->db->where('wp.aid',$this->session->userdata('empid'));
            }
            if($this->session->userdata('status')!="status"){
                $this->db->where('wp.status',$this->session->userdata('status'));
            } 
            $this->db->where("wp.working_date BETWEEN '".$this->session->userdata('sdate')."' AND '".$this->session->userdata('edate')."'"); 
            $this->db->order_by('wp.wid','ASC');  
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }


 

        public function export_your_workingplan_list(){    
            $this->db->select('*');
            $this->db->from('working_plan');  
            $this->db->where('aid',$this->session->userdata('aid')); 
            $this->db->where("working_date BETWEEN '".$this->session->userdata('sdate')."' AND '".$this->session->userdata('edate')."'"); 
            $this->db->order_by('wid','ASC');  
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        } 
 
       // FOR PAGINATION START 
        public function num_of_issue_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('stock_issue');  
            $query=$this->db->get();   
            return $query->result();   
        } 
    // FOR PAGINATION END  
        public function stockSubmit($data) {  
            $tt=$this->db->insert('stock_issue ',$data);
            return $tt; 
        } 
        public function managestock($limit, $offset){    
            $this->db->select('*');
            $this->db->from('stock_issue');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        } 

        public function workingPlanAddSubmit($data) {  
            $tt=$this->db->insert('working_plan',$data);
            return $tt; 
        }  

        public function workingPlaneActionSubmit($wid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('wid',$wid); 
            $this->db->update('working_plan');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }
//ALTER TABLE `working_plan` CHANGE `work_type` `work_type` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL, CHANGE `task` `task` TEXT CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL;
        public function checkIncompleteworkingPlan(){
            $this->db->select('count(*) as chk_plan');
            $this->db->from('working_plan');
            $this->db->where("status",0);
            $this->db->where("aid",$this->session->userdata('aid'));
            $this->db->order_by('wid','DESC');
            $query=$this->db->get();   
            return $query->result();   
        }



        // FOR VECHILE MANAGEMENT PAGINATION START
        public function num_of_vechile_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('vechile_management');
            $this->db->where("YEAR(created_date) = YEAR(CURDATE())");
            $query=$this->db->get();   
            return $query->result();   
        }
        // FOR VECHILE MANAGEMENT PAGINATION END 
        public function manageVechileManageListing($limit, $offset){    
            $this->db->select('*');
            $this->db->from('vechile_management');
            $this->db->where("YEAR(created_date) = YEAR(CURDATE())");
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }  
        public function vechileAddSubmit($data) {
            $tt=$this->db->insert('vechile_management',$data);
            return $tt; 
        }  

        // For VECHILE MANAGEMENT   ACTION  start 
        public function vechile_request($aid){
            $condition = "(status='0' and superior='".$aid."' and  YEAR(created_date) = YEAR(CURDATE()) )";
            $this->db->select('*');
            $this->db->from('vechile_management');
            $this->db->where($condition);
            $this->db->order_by('vid','DESC');
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }        
 

        public function vechile_det($bid){
         if($bid!=''){$condition = "(vid='".$bid."'  )"; }else{$condition="1=1";}
            $this->db->select('*');
            $this->db->from('vechile_management');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }        
// For Supereior VECHILE MANAGEMENT ACTION  End


        public function superiorVechileAction($vid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('vid',$vid); 
            $this->db->update('vechile_management');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return true;
            }
            else{ return false;  
            }
        }
 

/**/


        // FOR ORDER PAGINATION START
        public function num_of_LeaveDashbord_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('leave_management');
            $this->db->where("YEAR(created_date) = YEAR(CURDATE())");
            $this->db->where("status",0);
            $query=$this->db->get();   
            return $query->result();   
        }
        // FOR ORDER PAGINATION END 
     
         
// For Project Manage  START
    // FOR PAGINATION START 
    public function num_of_manage_project_rows(){
        $this->db->select('count(*) as cnt');
        $this->db->from('project_management'); 
        $query=$this->db->get();   
        return $query->result();   
    } 
    // FOR PAGINATION END  
    public function manage_project($limit, $offset){    
        $this->db->select('*');
        $this->db->from('project_management');
        $this->db->limit($limit,$offset);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }
    public function projectSubmit($data) {
        $tt=$this->db->insert('project_management',$data);
        return $tt; 
    }  
    public function projectDet($pid){
        $condition = "(pid='".$pid."'  )";
            $this->db->select('*');
            $this->db->from('project_management');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
    }  
    public function projectUpdate($pid,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('pid',$pid); 
        $this->db->update('project_management');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    } 
    // For Project Manage End


    public function rowise_branch($ro_id){
        $det='';
        $this->db->select('*');
        $this->db->from('branchoffice'); 
        $this->db->where('ro_id',$ro_id); 
        $this->db->where('branch_status','1'); 
        $query=$this->db->get(); 
        $det='<option value="">Select Branch</option>';
        foreach ($query->result() as $key => $value) {
             $det.='<option value="'.$value->branch_id.'">'.$value->branch_name.'</option>';
        }
        return $det;
    }





    // FOR PAGINATION START 
    public function num_of_regionaloffice_rows(){
        $this->db->select('count(*) as cnt');
        $this->db->from('regionaloffice'); 
        $query=$this->db->get();   
        return $query->result();   
    } 
    // FOR PAGINATION END 
    public function regionalOfficeSubmit($data) {
        $tt=$this->db->insert('regionaloffice',$data);
        return $tt; 
    }  
    public function regionalOfficeUpdate($ro_id,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('ro_id',$ro_id); 
        $this->db->update('regionaloffice');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    } 
    public function manageregionaloffice($limit, $offset){    
        $this->db->select('*');
        $this->db->from('regionaloffice');
        $this->db->limit($limit,$offset);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }  
    public function regionalOfficeDet($ro_id){
        $condition = "(ro_id='".$ro_id."'  )";
            $this->db->select('*');
            $this->db->from('regionaloffice');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
    }






    // FOR PAGINATION START 
    public function num_of_branchOffice_rows(){
        $this->db->select('count(*) as cnt');
        $this->db->from('branchoffice'); 
            $query=$this->db->get();   
        return $query->result();   
    } 
    // FOR PAGINATION END 
    public function branchOfficeSubmit($data) {
        $tt=$this->db->insert('branchoffice',$data);
        return $tt; 
    }  
    public function branchOfficeUpdate($branch_id,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('branch_id',$branch_id); 
        $this->db->update('branchoffice');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    } 
    public function managebranchOffice($limit, $offset){    
        $this->db->select('*');
        $this->db->from('branchoffice');
        $this->db->limit($limit,$offset);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }  
    public function branchOfficeDet($branch_id){
        $condition = "(branch_id='".$branch_id."'  )";
            $this->db->select('*');
            $this->db->from('branchoffice');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
    }
 

    // FOR PAGINATION START 
    public function num_of_expence_rows(){
        $this->db->select('count(*) as cnt');
        $this->db->from('manage_expence'); 
            $query=$this->db->get();   
        return $query->result();   
    }  
    // FOR PAGINATION END 
    public function expenceSubmit($data) {
        $tt=$this->db->insert('manage_expence',$data);
        return $tt; 
    }  
    public function expenceUpdate($exp_id,$data) {
        $this->db->set($data, FALSE); 
        $this->db->where('exp_id',$exp_id); 
        $this->db->update('manage_expence');
        $afftectedRows = $this->db->affected_rows(); 
        if($afftectedRows>0){
        return true;
        }
        else{ return false;  
        }
    } 
    public function manageexpence($limit, $offset){    
        $this->db->select('*');
        $this->db->from('manage_expence');
        $this->db->limit($limit,$offset);
        $query=$this->db->get();   
        if($query->num_rows()>0) { 
        return $query->result();
        }else{
            return 0;
        }
    }  
    public function expenceDet($exp_id){
        $condition = "(exp_id='".$exp_id."'  )";
            $this->db->select('*');
            $this->db->from('manage_expence');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
    }

 

             
        // MASTER GROUP START
        public function group_view($gid){
            $condition = "(gid='".$gid."'  )";
            $this->db->select('*');
            $this->db->from('manage_group');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }        
        public function group_delet($gid){
            $this->db->where('gid', $gid);
            $this->db->delete('manage_group');
            return 1;
        }        
        public function grouplist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('manage_group'); 
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        } 
        public function addgroupinsert($data) {            
            $tt=$this->db->insert('manage_group',$data);
            return $tt; 
        }  
        public function updategroup($gid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('gid',$gid); 
            $this->db->update('manage_group');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            }
        }
        // FOR ORDER PAGINATION START
           public function totel_group_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('manage_group');
            $query=$this->db->get();   
            return $query->result();   
           }
        // MASTER group ENd
     

  
        // MASTER Vechicle Class START
        public function vechicleClassView($vcid){
            $condition = "(vcid='".$vcid."'  )";
            $this->db->select('*');
            $this->db->from('manage_vechicle_class');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        }        
        public function vechicleClassDelet($vcid){
            $this->db->where('vcid', $vcid);
            $this->db->delete('manage_vechicle_class');
            return 1;
        }        
        public function vechicleClassList($limit, $offset){    
            $this->db->select('*');
            $this->db->from('manage_vechicle_class'); 
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        } 
        public function vechicleClassAdd($data) {            
            $tt=$this->db->insert('manage_vechicle_class',$data);
            return $tt; 
        }  
        public function vechicleClassUpdate($vcid,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('vcid',$vcid); 
            $this->db->update('manage_vechicle_class');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            }
        }
        // FOR ORDER PAGINATION START
           public function totel_vechicle_class_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('manage_vechicle_class');
            $query=$this->db->get();   
            return $query->result();   
           }
        // MASTER Vechicle Class ENd


 
        // MASTER TRAINING START 
        public function manage_req_training($limit, $offset){    
            $this->db->select('*');
            $this->db->from('project_training');
            $this->db->where('superior_id',$this->session->userdata('aid')); 
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        // FOR ORDER PAGINATION START
        public function num_of_req_training_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('project_training');
            $this->db->where('superior_id',$this->session->userdata('aid'));
            $query=$this->db->get();   
            return $query->result();   
        }
  
        public function manage_training($limit, $offset){    
            $this->db->select('*');
            $this->db->from('project_training');
            $this->db->where('project_creator',$this->session->userdata('aid')); 
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        // FOR ORDER PAGINATION START
        public function num_of_training_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('project_training');
            $this->db->where('project_creator',$this->session->userdata('aid'));
            $query=$this->db->get();   
            return $query->result();   
        } 
        public function trainingAddSubmit($data) {            
            $tt=$this->db->insert('project_training',$data);
            return $tt; 
        } 
        public function add_project_training_expences($data) { 
            $tt=$this->db->insert('project_training_expences',$data);
            return $tt; 
        } 
        public function update_project_training_expences($data,$pte_id) { 
            $this->db->set($data, FALSE); 
            $this->db->where('pte_id',$pte_id); 
            $this->db->update('project_training_expences');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            } 
        }   
        public function trainingUpdateSubmit($data,$pid) { 
            $this->db->set($data, FALSE); 
            $this->db->where('pid',$pid); 
            $this->db->update('project_training');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            } 
        } 
        public function trainingDet($pid){ 
                $this->db->select('*');
                $this->db->from('project_training');
                $this->db->where("pid",$pid);
                $query=$this->db->get();   
                if($query->num_rows()>0) { 
                return $query->result();
                }else{
                    return 0;
                } 
        } 
        public function trainingExp($pid){ 
                $this->db->select('*');
                $this->db->from('project_training_expences');
                $this->db->where("pid",$pid);
                $query=$this->db->get();   
                if($query->num_rows()>0) { 
                return $query->result();
                }else{
                    return 0;
                } 
        } 
        // MASTER TRAINING END 
  
        public function trainingReportAddSubmit($data){            
            $tt=$this->db->insert('project_training_report',$data);
            return $tt; 
        } 
        public function trainingReportUpdateSubmit($data,$ptr_id){
            $this->db->set($data, FALSE); 
            $this->db->where('ptr_id',$ptr_id); 
            $this->db->update('project_training_report');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
                return 1;
            }
            else{ return 0;  
            }
        }


        public function add_project_training_det($data){            
            $tt=$this->db->insert('project_training_report_det',$data);
            return $tt; 
        }
        public function update_project_training_det($data,$report_det){
            $this->db->set($data, FALSE); 
            $this->db->where('report_det',$report_det); 
            $this->db->update('project_training_report_det');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
                return 1;
            }
            else{ return 0;  
            }
        }

        // MASTER ITEM START 
        public function manage_item($limit, $offset){    
            $this->db->select('*');
            $this->db->from('manage_item'); 
            $this->db->limit($limit,$offset); 
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }
        // FOR ORDER PAGINATION START
        public function num_of_item_rows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('manage_item');
            $query=$this->db->get();   
            return $query->result();   
        } 
        public function additeminsert($data) {            
            $tt=$this->db->insert('manage_item',$data);
            return $tt; 
        } 
        public function itemview($item_id){
            $condition = "(item_id='".$item_id."'  )";
            $this->db->select('*');
            $this->db->from('manage_item');
            $this->db->where($condition);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            } 
        } 
        public function updateitem($item_id,$data) {
            $this->db->set($data, FALSE); 
            $this->db->where('item_id',$item_id); 
            $this->db->update('manage_item');
            $afftectedRows = $this->db->affected_rows(); 
            if($afftectedRows>0){
            return 1;
            }
            else{ return 0;  
            }
        }/*        
        public function group_delet($gid){
            $this->db->where('gid', $gid);
            $this->db->delete('manage_group');
            return 1;
        }
        
        // MASTER ITEM ENd
       
 */

public function show_employee_id($aid){
    $condition = "(aid='".$aid."'  )";
    $this->db->select('login_id');
    $this->db->from('admin_login');
    $this->db->where($condition);
    $query=$this->db->get();   
        if($query->num_rows()>0) { 
            return $query->result();
        }else{
            return 0;
        } 
}

public function show_item_det($item_id){
    $condition = "(item_id='".$item_id."'  )";
    $this->db->select('*');
    $this->db->from('manage_item');
    $this->db->where($condition);
    $query=$this->db->get();   
        if($query->num_rows()>0) { 
            return $query->result();
        }else{
            return 0;
        } 
}


  







































        
        
         
        
        
       
        public function employeeSearchList($title){
            $this->db->like('fullname', $title , 'both');
            $this->db->order_by('aid', 'ASC'); 
            return $this->db->get('admin_login')->result();  
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





 



           
            public function orderlist($limit, $offset){    
            $this->db->select('*');
            $this->db->from('order_table');
            $this->db->limit($limit,$offset);
            $query=$this->db->get();   
            if($query->num_rows()>0) { 
            return $query->result();
            }else{
                return 0;
            }
        }       
        // FOR ORDER PAGINATION START
           public function num_of_orderrows(){
            $this->db->select('count(*) as cnt');
            $this->db->from('order_table');
            $query=$this->db->get();   
            return $query->result();   
           }
        // FOR ORDER PAGINATION END
           
           
        
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
       



 


















 
 
}
?>
