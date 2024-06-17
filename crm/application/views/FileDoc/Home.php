
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.user_data{
			display:inline-block;
		}
		.display_class{
			display:none;
		}
	</style>
</head>
<body>

<div style="text-align: center;">
	 <img src="<?php echo base_url()."dist/"; ?>images/NOTES_lgo.png" style="width:60px;  height:50px;" alt="">
 </div>



<div class="container">

<div id="add_block">
  <img src="<?php echo base_url()."dist/"; ?>images/images.png" style="width:40px;  height:40px;" alt="">
</div>

<div class="container  display_class" id="user_input_block">
<form class="row g-3" class="container" action="<?php echo base_url()."dhiraj/user_data_get"; ?>" method="post">
<!-- <form class="row g-3" class="container" action="" method="post"> -->
    <div style="display:none;">
		<input type="number" name="id" value=0 id="user_Edit_number" placeholder="Enter your email ">
	</div>
	<div class="user_data mx-3 my-3">
		<h5><b>Enter Your email</b></h5>	
		<input type="email" name="email" placeholder="Enter your email ">
	</div>
	<div class="user_data mx-3 my-3">
		<h5><b>Enter Your Frist Name</b></h5>
		<input type="text" name="name"  placeholder="Enter your name ">
	</div>
	<div class="user_data mx-3 my-3">
		<h5><b>Enter Your Frist Last</b></h5>
		<input type="text"  name="last"  placeholder="last name ">
	</div>
	<div class="user_data mx-3 my-3">
		<h5><b>Enter Your Age</b></h5>
		<input type="number"  name="age" value=1 placeholder="23-06-2002">
	</div>
	<div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
</div>

 <table class="table container">
  <thead>
    <tr>
      <th scope="col">#</th>
	  <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
	  <th scope="col">Age</th>
	  <th scope="col">Update/Delete</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $image01 =  base_url()."dist/images/document_add.png" ;
  $image02 =  base_url()."dist/images/delete.png" ;
  $form01 =   base_url()."dhiraj/delete_opetaion" ;
  $form02 =   base_url()."dhiraj" ;
  $counter = 0;
  foreach ($fetch as $value) {
	// echo "User 	Id = ". $value->id ."<br> User Name ".  $value->firstname . "User last name = " . $value->lastname . "user email = ". $value->email . " user age = " . $value->age;
	$counter = $counter + 1;
	$user_id =  $value->id ;
	echo "  <tr>
	<th>$counter</th>
	<td> " .  $value->firstname . "</td>
	<td>" .$value->lastname. "</td>
	<td>" .$value->email. "</td>
	<td>" . $value->age . "</td>
	<td><div style='display: flex;'><form class='row g-3 mx-3' class='container' action='$form02' method='post'>
	<input style='display: none;' type='number' name='id' value=$user_id>
	<button type='submit' class='' style='width:40px;  height:40px;'><img src='$image01' style='width:20px;  height:20px;' alt=''></button></form>

	<form class='row g-3' class='container' action='$form01'  method='post'>
	<input type='number' style='display: none;' name='id' value=$user_id>
	<button type='submit' class='' style='width:40px;  height:40px;'><img src='$image02' style='width:20px;  height:20px;' alt=''></button></form></div>
	</td>
  </tr>";
  }
?>
<!-- <td><img src=".php echo base_url()."dist/images/document_add.png' style='width:20px;  height:20px;' alt=''>
	</td> -->
</tbody>
</table>

 </div>
	

 <!-- <div style='display: flex;'><form class='row g-3 mx-3' class='container' action='$form02' method='post'>
	<input style='display: none;' type='number' name='id' value=$user_id>
	<button type='submit' class='' style='width:40px;  height:40px;'><img src='$image01' style='width:20px;  height:20px;' alt=''></button></form>  -->


</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script type="text/javascript">
	console.log("HELLO DHIRAJ MATHANAKAR ");
	console.log($, "i am understand your jquery cdn it is work perfome")

	
	$(".addite_Data").click(function (){
		// document.getElementById("user_input_block").classList.toggle("display_class");
		// document.getElementById("user_Edit_number").value = this.id ;
	    console.log("HELLO DHIRAJ THIS IS YOUR CLICK ID NUMBER CHACK THIS  READ OR NOT ", this.id);
	})
	document.getElementById("add_block").addEventListener("click", function(){
		document.getElementById("user_input_block").classList.toggle("display_class");
	})
</script>
</html>



