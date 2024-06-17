

<!DOCTYPE html>
<html lang="en">
    <!-- START: Head-->
    
<head>
        <meta charset="UTF-8">
        <title>Login | Shree Sai Industries</title>
        
        <meta name="viewport" content="width=device-width,initial-scale=1"> 

        <link rel="shortcut icon" href="<?php echo base_url()."dist/"; ?>images/favicon.png" type="image/png" />
        <!-- toggle-password start -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
        <!-- toggle-password end -->

        <!-- START: Template CSS-->
        <!-- <link href="https://fonts.googleapis.com/css2?family=Varela&display=swap" rel="stylesheet"> -->
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/jquery-ui/jquery-ui.min.css">
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/jquery-ui/jquery-ui.theme.min.css">
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/simple-line-icons/css/simple-line-icons.css">        
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/flags-icon/css/flag-icon.min.css"> 

        <!-- END Template CSS-->     

        <!-- START: Page CSS-->   
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/vendors/social-button/bootstrap-social.css"/>   
        <!-- END: Page CSS-->

        <!-- START: Custom CSS-->
        <link rel="stylesheet" href="<?php echo base_url()."dist/"; ?>/css/main.css">

        <style type="text/css">
            @media (min-width: 300px) and (max-width: 600px)
            {
                .lockscreen img{ width: 50%; 
                    margin-top: 30px!important;
                    display: initial!important;}

            }
            .toggle-password, .toggle-password1{
                margin-top: -25px;
                display: block;
                float: right;
                margin-right: 10px;
                font-size: 15px;
            }
        </style>

        <style type="text/css">
            @media (min-width: 300px) and (max-width: 600px)
            {
                .lockscreenText {
    position: absolute!important;
    text-align: center!important;
    top: -2%!important;
    right: 48%!important;
    transform: translate(46%,-50%);
    text-transform: uppercase!important;
    font-family: verdana!important;
    font-size: 1.4em!important;
    font-weight: 600!important;
    color: #1a2e52!important;
    text-shadow: 1px 1px 1px #919191, 1px 2px 1px #919191, 1px 3px 1px #919191, 1px 4px 1px #919191, 1px 5px 1px #919191, 1px 6px 1px #919191, 1px 7px 1px #919191, 1px 8px 1px #919191, 1px 9px 1px #919191, 1px 10px 1px #919191, 1px 18px 6px rgba(16,16,16,0.4), 1px 22px 10px rgba(16,16,16,0.2), 1px 25px 35px rgba(16,16,16,0.2), 1px 30px 60px rgba(16,16,16,0.4);
                }

            }
        </style>
        <!-- END: Custom CSS-->
    </head>
    <!-- END Head-->

    <!-- START: Body-->
    <body id="main-container" class="default">
        <!-- START: Main Content-->
        <div class="container">
            <div class="row vh-100 justify-content-between align-items-center">
                <div class="col-12" style="margin-top: 70px;">
                    <h1 class="lockscreenText" style="text-align: center;
    position: absolute;
    top: -2%;
    right: 48%;
    transform: translate(46%,-50%);
    text-transform: uppercase;
    font-family: verdana;
    font-size: 2.4em;
    font-weight: 700;
    color: #f3705a;">Shree Sai Industries</span> <br><span style="font-size: 16px; color: #3bb3c2; text-shadow: none;"> [LOGIN-PANEL]</span></h1>
                    <form action="<?php echo  base_url(); ?>login/signup_login_check" method="post" class="row row-eq-height lockscreen  mt-5 mb-5">
                        <!-- <div class=" col-12 col-sm-5"  style="text-align: center;">
                            <img title="Ashish Container Service" style="border-radius: 4px;margin-top: 76px; display: block; text-align: center;" src="<?php echo base_url()."dist/"; ?>images/" alt="" width="100%"> 
                        </div> -->
                        <div class="login-form col-12 col-sm-12"style="padding: 20px 20px 2px 20px;">
                            <p>Please fill in your credentials to login.</p>
                            <?php if($this->session->flashdata('msg')!="") {?>  
                                    <div class="alert alert-danger"><?php echo $this->session->flashdata('msg');?></div>
                            <?php } ?>
                            <div class="form-group mb-3 field">
                                <label for="emailaddress">Username</label>
                                <input placeholder="Username" style="text-transform: uppercase;" type="text" name="username" class="form-control " value="<?php echo $username; ?>">
                                
                            </div>

                            <div class="form-group mb-3 field">
                                <label for="password">Password</label>
                                <input id="password" placeholder="Password" type="password" name="password" class="form-control">  <span toggle="#password-field" class="fa fa-fw fa-eye field_icon toggle-password"></span>
                                
                            </div>

                            <div class="form-group mb-0 actions">
                                <button title="Log In" class="btn btn-info" type="submit" value="submit"> Log In </button>
                                <!-- <button title="Reset" class="btn btn-secondary" type="reset" name="reset" value="reset"> Reset </button> -->
                            </div>

                           <!--  <p>Don't have an account? <a href="register.php">Sign up now</a>.</p> -->

                            
                        </div>
                        <div class="login-form col-12 col-sm-12" style="padding: 2px 20px 20px 20px;">
                            
                            <div class="mt-2">&copy; 2021-<?php echo date("Y") ;?> <a title="Shree Sai Industries"  href="#" tp://ginfosoft.com/" targearget="_blank"><span style="color: #17a2b8;">Shree Sai Industries</span>. </a> All Rights Reserved. | Powered By : <a title="G-INFOSOFT TECHNOLOGIES" href="httt="_blank"><span style="color: #17a2b8;"> G-INFOSOFT TECHNOLOGIES</span>. </a></div>
                        </div>
                        
                    </form>
                </div>

            </div>
        </div>
        <!-- END: Content-->



<script type="text/javascript">
    $(document).ready(function() {
    $('.field input').keyup(function() {

        var empty = false;
        $('.field input').each(function() {
            if ($(this).val().length == 0) {
                empty = true;
            }
        });

        if (empty) {
            $('.actions button').attr('disabled', 'disabled');
            $('.actions button').attr('title', 'Please fill in your credentials to login');
        } else {
            $('.actions button').attr('disabled', false);
            $('.actions button').attr('title', 'click here to login');
        }
    });
});
</script>        

<script>
function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script type="text/javascript">
    $(document).on('click', '.toggle-password', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});

    $(document).on('click', '.toggle-password1', function() {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $("#confirm_password");
    input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});
</script>

        <!-- START: Template JS-->
        <script src="<?php echo base_url()."dist/"; ?>/vendors/jquery/jquery-3.3.1.min.js"></script>
        <script src="<?php echo base_url()."dist/"; ?>/vendors/jquery-ui/jquery-ui.min.js"></script>
        <script src="<?php echo base_url()."dist/"; ?>/vendors/moment/moment.js"></script>
        <script src="<?php echo base_url()."dist/"; ?>/vendors/bootstrap/js/bootstrap.bundle.min.js"></script>    
        <script src="<?php echo base_url()."dist/"; ?>/vendors/slimscroll/jquery.slimscroll.min.js"></script>

        <!-- END: Template JS-->  
    </body>
    <!-- END: Body-->

<!-- Mirrored from html.designstream.co.in/pick/html/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Jul 2020 20:07:21 GMT -->
</html>
