<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if ( ! function_exists('checkValueExistance'))
    {
           function checkValueExistance($table,$whereCol,$whereId) 
           {  
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT count(*) as count FROM ".$table." WHERE ".$whereCol."='".$whereId."'");  
             $result= $query->result(); 
             if(!empty($result)){
                     return $result;   
             }else{ 
                     return 0;
                  } 
       }
    } 


// group List Dropdown
if ( ! function_exists('groupDropdown'))
{
function groupDropdown($filename="") 
{  
$CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
$query = $CI->db->query("SELECT gid,group_name FROM group_master WHERE status='Active' ORDER BY group_name ASC");  
$result1= $query->result(); 
    if(!empty($result1)){
      foreach ($result1 as $key => $value) {
        if($filename == $value->gid){
          $selected=' selected';
        }else{$selected='';}
        $result.='<option value="'.$value->gid.'"  '.$selected.' >'.$value->group_name.'</option>';
        }
        return $result;   
        }else{ 
           return "";
        } 
    }
}

if ( ! function_exists('groupDetail'))
{
    function groupDetail($filename="") 
    {  
    $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
    $query = $CI->db->query("SELECT * FROM group_master WHERE gid='".$filename."'");  
    $result= $query->row(); 
        if(!empty($result)){
        return $result;   
        }else{ 
        return 0;
        } 
    }
}
// Customer List  Dropdown
if(!function_exists('showCustomerDetail')){
function showCustomerDetail($cid){ 
$CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION 
$query = $CI->db->query("SELECT * FROM customer  WHERE cid='".$cid."'");
    $result= $query->row(); 
        if(!empty($result)){
            return $result;   
        }else{ return 0; } 
    }
}
// Product List  Dropdown
if(!function_exists('showItemDetails')){
function showItemDetails($pid){ 
$CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION 
$query = $CI->db->query("SELECT * FROM product WHERE pid='".$pid."'");
    $result= $query->row(); 
        if(!empty($result)){
            return $result;   
        }else{ return 0; } 
    }
}
// Product List Dropdown
if ( ! function_exists('productDropdown'))
{
function productDropdown($filename="") 
{  
$CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
$query = $CI->db->query("SELECT pid,product_name FROM product WHERE status='Active' ORDER BY product_name ASC");  
$result1= $query->result(); 
    if(!empty($result1)){
      foreach ($result1 as $key => $value) {
        if($filename == $value->pid){
          $selected=' selected';
        }else{$selected='';}
        $result.='<option value="'.$value->pid.'"  '.$selected.' >'.$value->product_name.'</option>';
        }
        return $result;   
        }else{ 
           return "";
        } 
    }
}
if(!function_exists('productDetail'))
{
    function productDetail($filename="") 
    {  
    $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
    $query = $CI->db->query("SELECT * FROM product WHERE pid='".$filename."'");  
    $result= $query->row(); 
        if(!empty($result)){
        return $result;   
        }else{ 
        return 0;
        } 
    }
}

// Customer List  Dropdown
if(!function_exists('ItemDetail')){
function ItemDetail($filename){ 
$CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION 
$query = $CI->db->query("SELECT * FROM product WHERE pid='".$filename."'");
    $result= $query->row(); 
        if(!empty($result)){
            return $result;   
        }else{ return 0; } 
    }
}
// if ( ! function_exists('vehicleListOfOrderBooking'))
// {
//        function vehicleListOfOrderBooking($filename="") 
//        {  
//          $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
//          $query = $CI->db->query("SELECT * FROM vehicle_tbl WHERE bhid='".$filename."'");  
//          $result= $query->row(); 
//          if(!empty($result)){
//                  return $result;   
//          }else{ 
//                  return 0;
//               } 
//    }
// }



// Customer List  Dropdown
if(!function_exists('customerDropdown'))
{
   function customerDropdown($filename="") 
   {  
    $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
    $query = $CI->db->query("SELECT  * FROM customer WHERE statusCustomer='Active' ORDER BY customerName ASC");  
    $result1= $query->result(); 
        if(!empty($result1)){
          foreach ($result1 as $key => $value) {
        if($filename == $value->cid){
          $selected=' selected';
        }else{$selected='';}
        $result.='<option value="'.$value->cid.'"  '.$selected.' >'.$value->customerName.'</option>';
        }
        return $result;   
        }else{ 
        return "";
        } 
    }
}
if(!function_exists('customerDetail'))
{
    function customerDetail($filename="") 
    {  
    $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
    $query = $CI->db->query("SELECT * FROM customer WHERE cid='".$filename."'");  
    $result= $query->row(); 
        if(!empty($result)){
        return $result;   
        }else{ 
        return 0;
        } 
    }
}




// Broker  List  Dropdown
if ( ! function_exists('brokerDropdown'))
    {
           function brokerDropdown($filename="") 
           {  
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT  brid,brokerName FROM broker_tbl WHERE statusBroker='Active' ORDER BY brokerName ASC");  
             $result1= $query->result(); 
                if(!empty($result1)){
                  foreach ($result1 as $key => $value) {
                    if($filename == $value->brid){
                      $selected=' selected';
                    }else{$selected='';}
                    $result.='<option value="'.$value->brid.'"  '.$selected.' >'.$value->brokerName.'</option>';
                  }
                     return $result;   
                }else{ 
                       return "";
                    } 
              }
    }

    if ( ! function_exists('brokerDetail'))
{
       function brokerDetail($filename="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
         $query = $CI->db->query("SELECT * FROM broker_tbl WHERE brid='".$filename."'");  
         $result= $query->row(); 
         if(!empty($result)){
                 return $result;   
         }else{ 
                 return 0;
              } 
   }
}



     if ( ! function_exists('orderBookingDetail'))
{
       function orderBookingDetail($filename="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
         $query = $CI->db->query("SELECT * FROM order_booking_tbl WHERE obid='".$filename."'");  
         $result= $query->row(); 
         if(!empty($result)){
                 return $result;   
         }else{ 
                 return 0;
              } 
   }
}




if ( ! function_exists('billDetail'))
{
       function billDetail($filename="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
         $query = $CI->db->query("SELECT * FROM bill_tbl WHERE blid='".$filename."'");  
         $result= $query->row(); 
         if(!empty($result)){
                 return $result;   
         }else{ 
                 return 0;
              } 
   }
}







//show Pending Booking No. List Dropdown with customer


if ( ! function_exists('showPendingBookingNoList'))
{
 function showPendingBookingNoList($filename="",$selected="",$cuid="",$statusBill="") 
 {  
   $CI =& get_instance();  
   $result=""; 

   if(!empty($cuid)){$cuid=" cuid='".$cuid."'";}else{$cuid='1=1';}
   if(!empty($statusBill)){$statusBill=" statusBill='".$statusBill."'";}else{$statusBill='1=1';}
   
     $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
     $query = $CI->db->query("SELECT * FROM order_booking_tbl WHERE ".$cuid." AND ".$statusBill." ORDER BY orderBookingNo ASC ");

   //$query = $CI->db->query("SELECT * FROM distric_table  WHERE ".$condition); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->obid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->obid.'"  '.$selected.'>'.$value->orderBookingNo.'  </option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
} 





    if ( ! function_exists('showOrderBookedDetailTest')){
      function showOrderBookedDetailTest($obid){ 
        //$a=array();
        $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION 
        $result=""; $sno=1;
        $query = $CI->db->query("SELECT * FROM order_booking_list_tbl  WHERE obid='".$obid."'");

        $result1= $query->result();

        if(!empty($result1)){
        foreach ($result1 as $key => $value) { 

        //$a[$key]=$value->aid; 

          $result='<tr><td style="text-align:center;"><label>'.$sno.'</label></td> 
          <td style="text-align:center;">'.$value->containerNo.'</td>
          <td style="text-align:center;">'.$value->otherPartyInvoiceNo.'</td>
          <td style="text-align:center;">'.$value->bookingSACNo.'</td>
          <td style="text-align:center;"><label>'.number_format($value->bookingInvoiceAmt,2).'</label></td> </tr>';
                       $sno++;  }
                        

        }
        else{
          $result='<tr><td colspan="5" style="text-align:center; color:#ff0000;"> Booking Order Empty </td></tr>';
        }
          return $result;  
      }
    }  





    if ( ! function_exists('showPendingBookingNoListDetails'))
{
       function showPendingBookingNoListDetails($filename="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
         $query = $CI->db->query("SELECT obt.*, obid.* FROM order_booking_tbl as obt JOIN order_booking_list_tbl as obid ON obt.blid=obid.blid WHERE obid='".$obid."'");  
         $result= $query->row(); 
         if(!empty($result)){
                 return $result;   
         }else{ 
                 return 0;
              } 
   }
}




if ( ! function_exists('showPendingBillNoList'))
{
 function showPendingBillNoList($filename="",$selected="",$cuid="",$statusPayment="") 
 {  
   $CI =& get_instance();  
   $result=""; 

   if(!empty($cuid)){$cuid=" cuid='".$cuid."'";}else{$cuid='1=1';}
   if(!empty($statusPayment)){$statusPayment=" statusPayment='".$statusPayment."'";}else{$statusPayment='1=1';}
   
     $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
     $query = $CI->db->query("SELECT * FROM bill_tbl WHERE ".$cuid." AND ".$statusPayment." ORDER BY billNo ASC ");

   //$query = $CI->db->query("SELECT * FROM distric_table  WHERE ".$condition); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->blid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->blid.'"  '.$selected.'>'.$value->billNo.'  </option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
}



// jQuery.parseJSON(result); echo json_encode(showBillDetail($blid)[0]); 
if ( ! function_exists('showPendingBillNoListDetails')){
      function showPendingBillNoListDetails($blid){ 
        $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION 
        //$query = $CI->db->query("SELECT * FROM bill_tbl as bt   WHERE blid='".$blid."'");

        $query = $CI->db->query("SELECT bill_tbl.*,customer_tbl.*,order_booking_tbl.* FROM bill_tbl JOIN customer_tbl ON bill_tbl.cuid=customer_tbl.cuid JOIN order_booking_tbl ON bill_tbl.obid=order_booking_tbl.obid WHERE bill_tbl.blid='".$blid."'");
         $result= $query->result(); 
         if(!empty($result)){
                 return $result;   
         }else{ return 0; } 
      }
    }



    if ( ! function_exists('showPendingBillNoList'))
{
       function showPendingBillNoList($filename="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
         $query = $CI->db->query("SELECT bill_tbl.*,customer_tbl.*,order_booking_tbl.* FROM bill_tbl JOIN customer_tbl ON bill_tbl.cuid=customer_tbl.cuid JOIN order_booking_tbl ON bill_tbl.obid=order_booking_tbl.obid WHERE bill_tbl.blid='".$filename."'");  
         $result= $query->row(); 
         if(!empty($result)){
                 return $result;   
         }else{ 
                 return 0;
              } 
   }
}















































//////OLD Amit Code


if ( ! function_exists('vechicle_class_listtest'))
    {
     function vechicle_class_list($filename="") 
     {  
       $CI =& get_instance();  
       $selected=''; $result=""; 
       $query = $CI->db->query("SELECT * FROM manage_vechicle_class WHERE status='1' ORDER BY vcid DESC"); 
       $result1= $query->result(); 
       if(!empty($result1)){
            foreach ($result1 as $key => $value) {
              if($filename == $value->vcid){
                $selected=' selected';
              }else{$selected='';}
              $result.='<option value="'.$value->vcid.'"  '.$selected.' >'.$value->vechicle_class_name.'</option>';
            }
               return $result;   
       }else{ 
               return "";
            } 
      }
    }


 if ( ! function_exists('cluster_list_dropdown'))
{
 function cluster_list_dropdown($filename="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 

   if($cid!=""){$condition=' cid='.$cid;}else{$condition=' 1=1';}
   if($status!=""){$condition.=' AND status='.$status;}

                $CI->db->select('cluster_name');
                $CI->db->from('cluster_table as clt');
                $CI->db->join('city_table as ct', 'clt.cid=ct.cid', 'left');
                $CI->db->where($condition);
                $CI->db->order_by('cluster_name','ASC');
                $query=$CI->db->get();

   //$query = $CI->db->query("SELECT cluster_name FROM cluster_table as clt LEFT JOIN city_table ct ON clt.cid=ct.cid WHERE ".$condition); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->cid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<input type="radio"  name="clusterElderlyLives" value="'.$value->cluster_name.'">'.$value->cluster_name.'  ';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
} 


 
if ( ! function_exists('cluster_list_detail'))
    {
           function cluster_list($filename="") 
           {  
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT cluster_name FROM cluster_table as clt LEFT JOIN city_table ct ON clt.cid=ct.cid WHERE clt.cid='".$filename."'"); 
 
             $result= $query->result(); 
             if(!empty($result)){
                     return $result;   
             }else{ 
                     return 0;
                  } 
       }
    } 


    

if ( ! function_exists('number_converted_into_words'))
{
 function number_converted_into_words(float $number) 
 {  
   $CI =& get_instance();   
    $decimal = round($number - ($no = floor($number)), 2) * 100;
    $hundred = null;
    $digits_length = strlen($no);
    $i = 0;
    $str = array();
    $words = array(0 => '', 1 => 'One', 2 => 'Two',
        3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
        7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
        10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
        13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
        16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
        19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
        40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
        70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $i < $digits_length ) {
        $divider = ($i == 2) ? 10 : 100;
        $number = floor($no % $divider);
        $no = floor($no / $divider);
        $i += $divider == 10 ? 1 : 2;
        if ($number) {
            $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
            $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
            $str [] = ($number < 21) ? $words[$number].' '. $digits[$counter]. $plural.' '.$hundred:$words[floor($number / 10) * 10].' '.$words[$number % 10]. ' '.$digits[$counter].$plural.' '.$hundred;
        } else $str[] = null;
    }
    $Rupees = implode('', array_reverse($str));
    //$paise = ($decimal > 0) ? "." . ($words[$decimal / 10] . " " . $words[$decimal % 10]) . ' Paise' : '';
    return ($Rupees ? $Rupees . 'Rupees ' : '');

  }
}



 
if ( ! function_exists('hitgrahiDetail'))
{
 function hitgrahiDetail($hitgrahi_sampark="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; $sno=1;

   if($hitgrahi_sampark!=""){$condition=' hitgrahi_sampark="'.$hitgrahi_sampark.'"';}else{$condition=' 1=0';} 

   $query = $CI->db->query("SELECT * FROM enquiry_form WHERE ".$condition); 
   $result1= $query->result(); 
  
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {  

                    if($value->shram_vibhag !=NULL){$yojna='श्रम विभाग की योजना';}
                    else if($value->kisan_samany !=NULL){$yojna='किसान सम्मान निधि';} 
                    else if($value->rajiv_gandhi_kisan !=NULL){$yojna='राजीव गांधी किसान न्याय योजना (CG)';} 
                    else if($value->pds !=NULL){$yojna='PDS से राशन सामग्री';} 
                    else if($value->manrega_k_antargat !=NULL){'मनरेगा के अन्तर्गत काम / निजी भूमि पर कार्य'; } 
                    else if($value->pension_yojna !=NULL){$yojna='पेंशन योजना';} 
                    else if($value->pradhan_mantri_aawas !=NULL){$yojna='प्रधान मंत्री आवास योजना';} 
                    else if($value->dr_khubchand !=NULL){$yojna='डॉ. खुबचंद बघेल स्वास्थ्य सहायता योजना (CG)';} 
                    else if($value->mukhya_mantri !=NULL){$yojna='मुख्य मंत्री विशेष स्वास्थ्य सहायता योजना (CG)';} 
                    else{ $yojna=''; }
 
                        if($value->status=='1'){  $satusbtn='<a href="#" class="btn btn-warning">In Process </a>';
                         }elseif($value->status=='2'){ $satusbtn='<a href="#" class="btn btn-success">Completed </a>';
                         }elseif($value->status=='3'){ $satusbtn='<a href="#" class="btn btn-danger">Reject  </a>';
                         }else{ $satusbtn='<a href="#"  class="btn btn-primary">Filled</a>'; }  


          $result='<tr><td><label>'.$sno.'</label></td> <td>'.$value->fname.'</td> <td> '.$value->sampark_number.'</td> <td>'.$value->padh_karyalay.' </td> <td>'.$value->hitgrahi_name.'</td> <td>'. $value->hitgrahi_sampark.' </td> <td>'. district_det($value->jila)->distric_name.'</td><td>'.block_det($value->vikaskhand)->block_name.'</td> <td>'. $value->gram_panch.' <td>'. city_village_det($value->gram)->city_village_name.'<td> '.$yojna.'</td> <td>'.date("d-m-Y",strtotime($value->created_date)).'</td> <td>'.$satusbtn.'</td> <td> <a class="btn btn-primary" style="background-color: #FFF;" href="<?php echo base_url()."front/front_view/"'.$value->fid.'"> View</a></td></tr>';
                       $sno++;  }  

        }
        else{
          $result='<tr><td colspan="14" style="text-align:center;"> Data Not Found </td></tr>';
        }
           return $result;   
    }
} 


 
if ( ! function_exists('rajya_dropdown'))
{
 function rajya_dropdown($filename="",$sid="",$status="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 

   if($sid!=""){$condition=' sid='.$sid;}else{$condition=' 1=1';}
   if($status!=""){$condition.=' AND status='.$status;}

   $query = $CI->db->query("SELECT * FROM state_table WHERE ".$condition); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->sid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->sid.'"  '.$selected.'>'.$value->state_name.'  </option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
} 

if ( ! function_exists('rajyaDetail'))
{
       function rajyaDetail($filename="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
         $query = $CI->db->query("SELECT * FROM state_table WHERE sid='".$filename."'");  
         $result= $query->row(); 
         if(!empty($result)){
                 return $result;   
         }else{ 
                 return 0;
              } 
   }
}




if ( ! function_exists('city_dropdown'))
{
 function city_dropdown($filename="",$cid="",$status="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 

   if($cid!=""){$condition=' cid='.$cid;}else{$condition=' 1=1';}
   if($city_name!=""){$condition=' city_name='.$city_name;}else{$condition=' 1=1';}
   if($status!=""){$condition.=' AND status='.$status;}

   $query = $CI->db->query("SELECT * FROM city_table WHERE ".$condition); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->city_name){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->city_name.'"  '.$selected.'>'.$value->city_name.'  </option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
} 

if ( ! function_exists('cityDetail'))
{
       function cityDetail($filename="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
         $query = $CI->db->query("SELECT * FROM city_table WHERE cid='".$filename."'");  
         $result= $query->row(); 
         if(!empty($result)){
                 return $result;   
         }else{ 
                 return 0;
              } 
   }
}




 
if ( ! function_exists('distric_dropdown'))
{
 function distric_dropdown($filename="",$STCode="",$distric_code="",  $status="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 

   if($STCode!=""){$condition=' state_code='.$STCode;}else{$condition=' 1=1';}   
   if($distric_code!=""){$condition.=' AND distric_code='.$distric_code;}else{$condition.=' AND 1=1';}
   if($status!=""){$condition.=' AND status='.$status;}

                $CI->db->select('*');
                $CI->db->from('distric_table');
                $CI->db->where($condition);
                $CI->db->order_by('distric_name','ASC');
                $query=$CI->db->get();

   //$query = $CI->db->query("SELECT * FROM distric_table  WHERE ".$condition); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->distric_code){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->distric_code.'"  '.$selected.'>'.$value->distric_name.'  </option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
} 

if ( ! function_exists('districtDetail'))
{
       function districtDetail($filename="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
         $query = $CI->db->query("SELECT * FROM distric_table WHERE distric_code='".$filename."'");  
         $result= $query->row(); 
         if(!empty($result)){
                 return $result;   
         }else{ 
                 return 0;
              } 
   }
}
if ( ! function_exists('districtWiseStatusCount'))
{
       function districtWiseStatusCount($filename="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
//         $query = $CI->db->query("SELECT count(*) as cunt,status FROM `enquiry_form` WHERE jila='".$filename."' GROUP BY `status` ORDER BY status ASC");  
                  $query = $CI->db->query("SELECT status,count(*) as cunt FROM `enquiry_form` WHERE jila='".$filename."' GROUP BY `status` ORDER BY status ASC");  

         $result= $query->row(); 
         if(!empty($result)){
                 return $query->result();   
         }else{ 
                 return 0;
              } 
   }
}



if ( ! function_exists('block_dropdown'))
{
 function block_dropdown($filename="",$distric_code="",$block_code="",  $status="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 

   if($distric_code!=""){$condition=' distric_code='.$distric_code;}else{$condition=' 1=1';} 
   if($block_code!=""){$condition.=' AND block_code='.$block_code;}else{$condition.=' AND 1=1';} 
   if($status!=""){$condition.=' AND status='.$status;}

                $CI->db->select('*');
                $CI->db->from('blog_table');
                $CI->db->where($condition);
                $CI->db->order_by('block_name','ASC');
                $query=$CI->db->get();

   //$query = $CI->db->query("SELECT * FROM blog_table WHERE ".$condition); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->block_code){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->block_code.'"  '.$selected.'>'.$value->block_name.'  </option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
}   
if ( ! function_exists('village_dropdown'))
{
 function village_dropdown($filename="",$block_code="",$village_code="",  $status="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 

   if($block_code!=""){$condition=' block_code='.$block_code;}else{$condition=' 1=1';} 
   if($village_code!=""){$condition.=' AND city_village_code='.$village_code;}else{$condition.=' AND 1=1';} 
   if($status!=""){$condition.=' AND status='.$status;}

                $CI->db->select('*');
                $CI->db->from('city_village_table');
                $CI->db->where($condition);
                $CI->db->order_by('city_village_name','ASC');
                $query=$CI->db->get();

   //$query = $CI->db->query("SELECT * FROM city_village_table WHERE ".$condition); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->city_village_code){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->city_village_code.'"  '.$selected.'>'.$value->city_village_name.'  </option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
} 


if ( ! function_exists('district_det'))
{
    function district_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM distric_table WHERE distric_code='".$filename."'");  
       $result= $query->row(); 
       if(!empty($result)){
               return $result;   
       }else{
            return 0;
               } 
    }
} 
if ( ! function_exists('block_det'))
{
    function block_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM blog_table WHERE block_code='".$filename."'");  
       $result= $query->row(); 
       if(!empty($result)){
               return $result;   
       }else{
            return 0;
               } 
    }
}  
if ( ! function_exists('city_village_det'))
{
    function city_village_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM city_village_table WHERE city_village_code='".$filename."'");  
       $result= $query->row(); 
       if(!empty($result)){
               return $result;   
       }else{
            return 0;
               } 
    }
} 
    

    
    if ( ! function_exists('employee_complete_det'))
    {
       function employee_complete_det($filename="") 
       {  
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT * FROM admin_login WHERE aid='".$filename."'");  
             $result= $query->row(); 
             if(!empty($result)){
                     return $result;   
             }else{ 
                     return 0;
                  } 
       }
    }  
    if ( ! function_exists('designation_det'))
    {
           function designation_det($filename="") 
           {  
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT * FROM master_designation WHERE did='".$filename."'");  
             $result= $query->row(); 
             if(!empty($result)){
                     return $result;   
             }else{ 
                     return 0;
                  } 
       }
    } 
    if ( ! function_exists('groupDetail'))
    {
           function groupDetail($filename="") 
           {  
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT * FROM manage_group WHERE gid='".$filename."'");  
             $result= $query->row(); 
             if(!empty($result)){
                     return $result;   
             }else{ 
                     return 0;
                  } 
       }
    }
    if ( ! function_exists('vechicle_class_list'))
    {
     function vechicle_class_list($filename="") 
     {  
       $CI =& get_instance();  
       $selected=''; $result=""; 
       $query = $CI->db->query("SELECT * FROM manage_vechicle_class WHERE status='1' ORDER BY vcid DESC"); 
       $result1= $query->result(); 
       if(!empty($result1)){
            foreach ($result1 as $key => $value) {
              if($filename == $value->vcid){
                $selected=' selected';
              }else{$selected='';}
              $result.='<option value="'.$value->vcid.'"  '.$selected.' >'.$value->vechicle_class_name.'</option>';
            }
               return $result;   
       }else{ 
               return "";
            } 
      }
    }












 
if ( ! function_exists('car_heads_dropdown'))
{
 function car_heads_dropdown($filename="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 
   $query = $CI->db->query("SELECT * FROM car_heads ORDER BY chid DESC"); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->chid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->chid.'"  '.$selected.' >'.$value->heads.'</option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
}
if ( ! function_exists('car_heads_det'))
{
    function car_heads_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM car_heads WHERE chid='".$filename."'");  
       $result= $query->row(); 
       if(!empty($result)){
               return $result;   
       }else{ 
               return 0;
               } 
    }
} 




 
if ( ! function_exists('car_dropdown'))
{
 function car_dropdown($filename="",$car_heads="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; if($car_heads!=""){$condition=' car_heads='.$car_heads;}else{$condition=' 1=1';}
   $query = $CI->db->query("SELECT * FROM car_management WHERE ".$condition."  ORDER BY car_id DESC"); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->car_id){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->car_id.'"  '.$selected.'>'.$value->car_name.' / '.$value->car_model.'  </option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
} 
if ( ! function_exists('car_det'))
{
    function car_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM car_management WHERE car_id='".$filename."'");  
       $result= $query->row(); 
       if(!empty($result)){
               return $result;   
       }else{
            return 0;
               } 
    }
} 
 
 

if ( ! function_exists('supplier_dropdown'))
{
 function supplier_dropdown($filename="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 
   $query = $CI->db->query("SELECT * FROM manage_supplier ORDER BY supid DESC"); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->supid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->supid.'"  '.$selected.'>'.$value->supplier_name.' </option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
} 
if ( ! function_exists('supplier_det'))
{
    function supplier_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM manage_supplier WHERE supid='".$filename."'");  
       $result= $query->row(); 
       if(!empty($result)){
               return $result;   
       }else{
            return 0;
               } 
    }
} 




if ( ! function_exists('customer_dropdown'))
{
 function customer_dropdown($filename="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 
   $query = $CI->db->query("SELECT * FROM manage_customer WHERE status='1' ORDER BY cusid DESC");
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->cusid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->cusid.'"  '.$selected.'>'.$value->customer_name.' </option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
} 
if ( ! function_exists('customer_det'))
{
    function customer_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM manage_customer WHERE cusid='".$filename."' and status='1'");  
       $result= $query->row(); 
       if(!empty($result)){
               return $result;   
       }else{
            return 0;
               } 
    }
} 

 




if ( ! function_exists('insurance_dropdown'))
{
 function insurance_dropdown($filename="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 
   $query = $CI->db->query("SELECT * FROM master_insurance ORDER BY inid DESC"); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->inid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->inid.'"  '.$selected.' >'.$value->insurance.'</option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
}
if ( ! function_exists('car_heads_det'))
{
    function insurance_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM master_insurance WHERE inid='".$filename."'");  
       $result= $query->row(); 
       if(!empty($result)){
               return $result;   
       }else{ 
               return 0;
               } 
    }
}



if ( ! function_exists('showATCTracker')){
      function showATCTracker($site_id){ 
        $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION 
        $query = $CI->db->query("SELECT tab1.*, tab2.technicianName FROM master_atc_traker_entery_table as tab1 JOIN  managetechnician as tab2 ON tab1.Technician_Name=tab2.tech_id WHERE (tab1.Site_ID_site='".$site_id."' OR tab1.Infratel_Globel_ID='".$site_id."') and tab2.technicianType='ATC'");
         $result= $query->result(); 
         if(!empty($result)){
                 return $result;   
         }else{ return 0; } 
      }
    } 





if ( ! function_exists('finance_dropdown'))
{
 function finance_dropdown($filename="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 
   $query = $CI->db->query("SELECT * FROM manage_finance WHERE status='1' ORDER BY fcid DESC"); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->fcid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->fcid.'"  '.$selected.' >'.$value->finance.'</option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
}
if ( ! function_exists('finance_det'))
{
    function finance_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM manage_finance WHERE fcid='".$filename."'");  
       $result= $query->row(); 
       if(!empty($result)){
               return $result;   
       }else{ 
               return 0;
               } 
    }
}
 



    if ( ! function_exists('projectDetail'))
    {
           function projectDetail($filename="") 
           {  
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT * FROM project_management WHERE pid='".$filename."'");  
             $result= $query->result(); 
             if(!empty($result)){
                     return $result;   
             }else{ 
                     return 0;
                  } 
       }
    }

// JUNIOR BRANCH WISE START
if ( ! function_exists('junior_list_branch_wise')){
  function junior_list_branch_wise($branch="",$selected=""){  
    $CI =& get_instance(); $result="";  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
    $query = $CI->db->query("SELECT aid,fullname FROM admin_login WHERE branch IN (".$branch.") and status='1' order by fullname ");  
    $result1= $query->result(); 
      if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($branch == $value->aid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->aid.'"  '.$selected.' >'.$value->fullname.'</option>';
        }
           return $result;   
      }else{ 
             return "";
          } 
  }
}
if ( ! function_exists('junior_id_array_branch_wise'))
{
  function junior_id_array_branch_wise($branch=""){   
      $a=array(); 
      $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
      $query = $CI->db->query("SELECT aid FROM admin_login WHERE branch IN (".$branch.") and status='1'");  
      $result1= $query->result(); 
      if(!empty($result1)){
        foreach ($result1 as $key => $value) { 
           $a[$key]=$value->aid;// $value->aid.","; 
        } 
           return $a;      
      }else{ 
             return "";
          } 
  }
}
// JUNIOR BRANCH WISE END


       
if ( ! function_exists('junior_list')){
  function junior_list($filename="",$selected=""){  
    $CI =& get_instance(); $result="";  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
    $query = $CI->db->query("SELECT aid,fullname FROM admin_login WHERE (superior='".$filename."' || aid='".$filename."') and status='1' order by fullname ");  
    $result1= $query->result(); 
      if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename == $value->aid){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->aid.'"  '.$selected.' >'.$value->fullname.'</option>';
        }
           return $result;   
      }else{ 
             return "";
          } 
  }
}
if ( ! function_exists('junior_id_array'))
{
  function junior_id_array($filename=""){   
      $a=array(); 
      $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
      $query = $CI->db->query("SELECT aid FROM admin_login WHERE superior IN ('".$filename."') || aid='".$filename."' and status='1'");  
      $result1= $query->result(); 
      if(!empty($result1)){
        foreach ($result1 as $key => $value) { 
           $a[$key]=$value->aid;// $value->aid.","; 
        } 
           return $a;      
      }else{ 
             return "";
          } 
  }
}

     
        if ( ! function_exists('grouplist'))
    {
           function grouplist($filename="") 
           {  
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT  gid,group_name FROM manage_group WHERE status='1' ORDER BY gid DESC");  
             $result1= $query->result(); 
                if(!empty($result1)){
                  foreach ($result1 as $key => $value) {
                    if($filename == $value->gid){
                      $selected=' selected';
                    }else{$selected='';}
                    $result.='<option value="'.$value->gid.'"  '.$selected.' >'.$value->group_name.'</option>';
                  }
                     return $result;   
                }else{ 
                       return "";
                    } 
              }
    }

    
    if ( ! function_exists('projectlist'))
      {
       function projectlist($filename="",$sel="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
         $condition=" 1=1 ";
         if(!empty($sel)){$condition=" pid='".$sel."'";  }
         $query = $CI->db->query("SELECT pid,project_name FROM project_management WHERE status='1' and  ".$condition);  
         $result1= $query->result(); 
          if(!empty($result1)){
            foreach ($result1 as $key => $value) {
              if($filename == $value->pid){
                $selected=' selected';
              }else{$selected='';}
              $result.='<option value="'.$value->pid.'"  '.$selected.' >'.$value->project_name.'</option>';
            }
               return $result;   
          }else{ 
                 return "";
              } 
        }
    }
    
    if ( ! function_exists('expencelist'))
      {
       function expencelist($filename="") 
       {  
         $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
         $query = $CI->db->query("SELECT exp_id,expence_head FROM manage_expence WHERE status='1'");  
         $result1= $query->result(); 
          if(!empty($result1)){
            foreach ($result1 as $key => $value) {
              if($filename == $value->exp_id){
                $selected=' selected';
              }else{$selected='';}
              $result.='<option value="'.$value->exp_id.'"  '.$selected.' >'.$value->expence_head.'</option>';
            }
               return $result;   
          }else{ 
                 return "";
              } 
        }
    }


        if ( ! function_exists('itemlist'))
    {
           function itemlist($filename="") 
           {  
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT  item_id,item_name FROM manage_item WHERE status='1'");  
             $result1= $query->result();  $result="";
                if(!empty($result1)){
                  foreach ($result1 as $key => $value) {
                    if($filename == $value->item_id){
                      $selected=' selected';
                    }else{$selected='';}
                    $result.='<option value="'.$value->item_id.'"  '.$selected.' >'.$value->item_name.'</option>';
                  }
                     return $result;   
                }else{ 
                       return "";
                    } 
              }
    }
  
    if ( ! function_exists('employee_list'))
    {
           function employee_list($filename="",$selected="") 
           {  $result="";
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT aid,fullname FROM admin_login WHERE status='1' order by fullname  ");  
             $result1= $query->result(); 
                if(!empty($result1)){
                  foreach ($result1 as $key => $value) {
                    if($filename == $value->aid){
                      $selected=' selected';
                    }else{$selected='';}
                    $result.='<option value="'.$value->aid.'"  '.$selected.' >'.$value->fullname.'</option>';
                  }
                     return $result;   
                }else{ 
                       return "";
                    } 
              }
    }
    
  
    if ( ! function_exists('designation_list'))
    {
           function designation_list($filename="",$selected="") 
           {  $result="";
             $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
             $query = $CI->db->query("SELECT * FROM master_designation WHERE status='1' order by designation");  
             $result1= $query->result(); 
                if(!empty($result1)){
                  foreach ($result1 as $key => $value) {
                    if($filename == $value->did){
                      $selected=' selected';
                    }else{$selected='';}
                    $result.='<option value="'.$value->did.'"  '.$selected.' >'.$value->designation.'</option>';
                  }
                     return $result;   
                }else{ 
                       return "";
                    } 
              }
    }
   
 
  
if ( ! function_exists('branch_det'))
{
    function branch_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM branchoffice WHERE branch_id='".$filename."'");  
       $result= $query->result(); 
       if(!empty($result)){
               return $result;   
       }else{ 
               return 0;
               } 
    }
}


 
if ( ! function_exists('branch_office_list'))
{
 function branch_office_list($filename="") 
 {  
   $CI =& get_instance();  
   $selected=''; $result=""; 
   $query = $CI->db->query("SELECT * FROM branchoffice ORDER BY branch_id DESC"); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {  
//    if(in_array($value->branch_id, $filename)){ $selected=' selected'; } else{ $selected=''; }
 
if($filename==$value->branch_id){ $selected=' selected'; }else{$selected='';}

          $result.='<option value="'.$value->branch_id.'"'.$selected.' >'.$value->branch_name.'</option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
}




 
if ( ! function_exists('branch_office_userwise'))
{
 function branch_office_userwise($filename="") 
 {  
   $CI =& get_instance();  
$selected=''; $result=""; 
   $query = $CI->db->query("SELECT * FROM branchoffice WHERE branch_id IN (".$CI->session->userdata('branch').") "); 
   $result1= $query->result(); 
   if(!empty($result1)){
        foreach ($result1 as $key => $value) {
          if($filename==$value->branch_id){
            $selected=' selected';
          }else{$selected='';}
          $result.='<option value="'.$value->branch_id.'"'.$selected.' >'.$value->branch_name.'</option>';
        }
           return $result;   
   }else{ 
           return "";
        } 
  }
}





     
if ( ! function_exists('branch_office_det'))
{
    function branch_office_det($filename="") 
    {  
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
       $query = $CI->db->query("SELECT * FROM branchoffice WHERE branch_id='".$filename."'");  
       $result= $query->result(); 
       if(!empty($result)){
               return $result;   
       }else{ 
               return 0;
               } 
    }
}


   
  if ( ! function_exists('makeDynamicID')){
     function makeDynamicID($table,$getGeneratedId,$auto_id) 
     {    
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
      $query = $CI->db->query("SELECT $getGeneratedId as id FROM ".$table." order by ".$auto_id." desc limit 0,1");   
       $result= $query->row(); 
       if(!empty($result)){
           return $result;   
       }else{
           return 0;
           } 
      }
    }
 
   
  if ( ! function_exists('make_userid')){
     function make_userid($branch) 
     {    
       $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
      $query = $CI->db->query("SELECT login_id FROM admin_login where branch='".$branch."'  order by aid desc limit 0,1");   
       $result= $query->result(); 
       if(!empty($result)){
           return $result;   
       }else{
           return 0;
           } 
 

 
/*
    $CI->db->select('login_id', FALSE);
    $CI->db->order_by('aid', 'DESC');
    $CI->db->limit(1);
    $query = $CI->db->get('admin_login');
    if($query->num_rows() <> 0) {
        $data = $query->row();
        $kode = intval($data->login_id) + 1;
    }
    else {
        $kode = 'NH-0001';
    } 
    $kodemax = date('NH-', str_pad($kode, 5, 0, STR_PAD_LEFT); 
    //$kodejadi = "SPL". $kodemax;

    return $kodemax; 
 */
     }
  }

    
    
    
    if ( ! function_exists('newuser_notification'))
    {
           function newuser_notification($filename="") 
           {  
                   $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
                   $query = $CI->db->query("SELECT count(*) as nouser FROM user_registration WHERE notifi_status='0'");  
                   $result= $query->result(); 
                   if(!empty($result)){
                           return $result;   
                   }else{
                           return 0;
                        } 
       }
    }
    
    
    
    if ( ! function_exists('neworder_notification'))
    {
           function neworder_notification($filename="") 
           {  
                   $CI =& get_instance();  // THIS IS USE TO MAKE A OBJECT OF HELPER IN HELPER WE CANT USE $THIS VARIABLE INSTED WE USE THAT FUNCTION
                   $query = $CI->db->query("SELECT count(*) as neworder FROM order_table WHERE notifi_status='0'");  
                   $result= $query->result(); 
                   if(!empty($result)){
                           return $result;   
                   }else{
                           return 0;
                        } 
       }
    }
    
    
    
     