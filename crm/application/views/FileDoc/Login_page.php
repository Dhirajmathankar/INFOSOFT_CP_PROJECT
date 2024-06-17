<img src="<?php echo base_url()."dist/"; ?>images/favicon.png" alt="">
<div style="text-align: center;" >
	<h1>User Login </h1>
</div>
<div class="container">
<form class="row g-3" class="container" action="<?php echo base_url()."dhiraj/user_data_get"; ?>" method="post">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4"
    placeholder="Enter your email ">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Enter your Frist Name </label>
    <input type="text" name="name" class="form-control" id="" placeholder="Enter your name ">
  </div>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Enter your Last name </label>
    <input type="text" class="form-control" name="last" id="" placeholder="last name ">
  </div>
  
  <div class="col-12">
    <label for="inputAddress" class="form-label">Enter your age</label>
    <input type="number" class="form-control" name="age" id="Enter your age " placeholder="23-06-2002">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">City</label>
    <input type="text" name="city" class="form-control" id="inputCity">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
</div>
