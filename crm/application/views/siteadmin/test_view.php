            <section class="content-header">
              <h1>
                Test View  
                <small>Control panel</small>
              </h1>
              <ol class="breadcrumb">            
                <li class="active">Test View</li>
              </ol>
            </section>
 
    <?php if($this->session->flashdata('msg')!="") {?>	
	<strong><?php echo $this->session->flashdata('msg');?></strong>
	<?php }?> 
        
           <br><br>
        
        <form action="<?php echo base_url(); ?>superadmindashbord/addEmployee" method="post" class="form" id="page-form" name="page-form" enctype="multipart/form-data">
           <div class="box-body" style="">  
            










 <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
      aria-selected="false">Contact</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact1111" role="tab" aria-controls="contact"
      aria-selected="false">Contact11111</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">



  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">




  </div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">






  </div>
</div>



</div>
    </form> 
 
           <br><br>
        

<script type="text/javascript">
    

$(document).on('click', '#submit_now', function(e) {
         swal({
          title: "Are you sure want To submit..?",
        //  text: "You will not be able to recover this imaginary file!",
          type: "warning",
          showCancelButton: true,
          confirmButtonClass: 'btn-danger',
          confirmButtonText: 'Submit',
          cancelButtonText: "No, Cancel",
          closeOnConfirm: false,
          closeOnCancel: false
        },
    function(isConfirm){
          if (isConfirm){ 
                $.ajax({
                   type: "POST",
                   url: "<?php echo base_url(); ?>admindashbord/updatetest",
                   data: $('form').serialize(), // serializes the form's elements.                    
                }).done(function(response){    
                    if(response>0){
                        swal("Submited!", "Your data has Been Updated!", "success"); 
                        window.setTimeout(function(){location.reload()},1500)
                    }
                    else if(response=='Exist'){
                        swal('Oops..','Order No Already Exist.!','error');
                    }else{
                        swal('Something Wrong..','Data Not Updated.!','error');
                    }
                });
          } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
          }
    });
});


</script>