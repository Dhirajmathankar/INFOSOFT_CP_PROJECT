<?php
 
//Autocomplete AJAx Correct start
if($employeeSearchList==1){ $opt='';
	foreach ($data as $key => $value) {
		  json_encode(array("fullname"=>$value->fullname,"aid"=>$value->aid));
	} 
}
//Autocomplete AJAx Correct END


if(!empty($showtest)){
	$opt='';
	foreach ($data as $key => $value) {
		 $opt.= '<option value="'.$value->tid.'">'.$value->testname.'</option>';
	}
	echo $opt;
}
 

if(!empty($test_detail)){ 
	echo json_encode($test_det);
}


?>
