<?php 
require_once("Includes/config.php");
require_once("Includes/session.php");

if(isset($_SESSION['logged'])) {
    if ($_SESSION['logged'] == true) {
        if ($_SESSION['account']=="admin") {
            header("Location:admin/index.php");
        }
        elseif ($_SESSION['account']=="user") {
            header("Location:user/index.php");
        }
    }  
    else  {
        header("Location:../index.php");
    }  
}

if(isset($_POST['login_submit'])) {
                location('index.php');    
    }   
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="data:image/x-icon;base64,AAABAAEAEBAAAAEAIABoBAAAFgAAACgAAAAQAAAAIAAAAAEAIAAAAAAAAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIKKCYiWgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIgKCYiuygmIhgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJDKCYi7SgmIlIAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJzKCYi/SgmIqAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIgooJiKmKCYi/ygmIuAoJiIOAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIh8oJiLPKCYi/ygmIv4oJiI/AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIkEoJiLrKCYi/ygmIv8oJiKMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmInAoJiL8KCYi/ygmIv8oJiL/KCYiySgmIpwoJiJzKCYiKQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIhYoJiJyKCYinCgmIsIoJiL8KCYi/ygmIv8oJiL/KCYinygmIgkAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiJTKCYi/ygmIv8oJiL5KCYiaAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIeKCYi7ygmIv8oJiLjKCYiNwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAoJiIDKCYixCgmIv8oJiK+KCYiFQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYigigmIv8oJiKJKCYiAwAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYiPigmIvAoJiJSAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAKCYiEigmIrooJiInAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACgmIlooJiIMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA//8AAP/3AAD/7wAA/88AAP8fAAD+PwAA/D8AAPgfAAD4DwAA/j8AAPx/AAD4/wAA8f8AAPf/AADv/wAA//8AAA==" rel="icon" type="image/x-icon" />
    <title>E-billing System</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php"><b>E-Billing System</b></a>
            </div>
            <div class="navbar-collapse collapse" >
                <?php include("login.php"); ?>
            </div>
        </div>
    </div>

    <div id="headerwrap">
        <div class="darkhearderwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 signup">
                        <h1>Electricity Billing System</h1>
                        <p>This website at the end of its construction will act as a consumer oriented service for users for easy payment of their respective <b>Electricity Bill</b> as well as interact with their providers in case of any queries or grivances.</p>
                    </div>
                    <div class="col-lg-6">
                        <h1>Sign Up</h1>
                        <form id="loginForm" onsubmit="return validateData()">
                        <center>
    <div class="row form-group">
        <div class="col-md-12">
        <input type="name" class="form-control" name="name" id="nameInput" placeholder="Full Name" required>
                            <span id="error-name"></span> 
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
        <input type="email" class="form-control" name="email" id="emailInput" placeholder="Email" required>
                            <span id="error-email"></span> 
        </div>
    </div>
    <div class="row form-group">
        <div class="col-md-12">
        <input type="password" class="form-control" minlength="8" name="inputPassword" id="passwordInput" placeholder="Password" required>
                            <span id="error-password"></span>
        </div>
</div>


<div class="row form-group">
        <div class="col-md-12">
        <input type="password" class="form-control" minlength="8" name="confirmpassword" id="confirmpasswordInput" placeholder="Confirm Password" required>
                            <span id="error-confirmpassword"></span>
        </div>
</div>


    <div class="row form-group">
        <div class="col-md-12">
            <input type="text" class="form-control" name="address" id="addressInput" placeholder="Address" required>
                            <span id="error-address"></span> 

    </div>
</div>
<div class="row form-group">
        <div class="col-md-12">
            <input type="text" class="form-control" name="contactNo" id="contactNoInput" placeholder="contactNo" required>
                            <span id="error-contactNo"></span> 

    </div>
</div>
    <div class="form-group">
        <div class="col-my-2">
            <button type="submit" name="reg_submit" class="btn btn-primary">Sign Up</button>
            <span id="error-message"></span> 
        </div>
    </div>
    </center>

                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row mt centered">
            <div class="col-lg-6 col-lg-offset-3">
                <h1>How this Portal woks</h1>
                <h3></h3>
            </div>
        </div>

        <div class="row mt centered">
            <div class="col-lg-4">
                <img src="assets/img/ser01.png" width="180" alt="">
                <h4> Login To your Account</h4>
                <p></p>
            </div>

            <div class="col-lg-4">
                <img src="assets/img/ser02.png" width="180" alt="">
                <h4> Peruse Your
                    
                Bills</h4>
                <p></p>
            </div>

            <div class="col-lg-4">
                <img src="assets/img/ser03.png" width="180" alt="">
                <h4> Perform Transaction</h4>
                <p></p>
            </div>

        </div>
    </div>

    <?php 
    require_once("footer.php");
    ?>

    
    
    <script src="assets/js/jquery-1.11.0.js"></script>
    
    <!-- <script src="assets/js/bootstrap.min.js"></script> -->
    
    <script>
      function validateData() {
      // Get the form inputs
      var name = $('#nameInput').val();
      var email = $('#emailInput').val();
      var password = $('#passwordInput').val();
      var confirmpassword = $('#confirmpasswordInput').val();
      var address = $('#addressInput').val();
      var contactNo = $('#contactNoInput').val();

      document.querySelectorAll('[id^="error-"]').forEach(e=>{e.innerText='';});
      // Create an object with the form data
      if (password !== confirmpassword){
        document.querySelectorAll('#error-confirmpassword')[0].style.color = 'red';
        document.querySelectorAll('#confirmpasswordInput')[0].select();
        $('#error-confirmpassword').text('Passwords do not match').show();
        }
      else{
      var data = {
          name: name,
          email: email,
          password: password,
          confirmpassword: confirmpassword,
          address: address,
          contactNo: contactNo
      };
      //console.log(data)
      // Send the AJAX request
      $.ajax({
          url: 'validate.php', // Replace with the actual URL where you handle the validation on the server-side
          type: 'POST',
          dataType: 'json',
          data: data,
          success: function(response) {

          if (response.status === 'success') {
              // Validation successful, redirect or perform any desired action
              //window.location.href = response.redirectUrl;
              document.querySelectorAll('#error-message')[0].style.color = 'green';
              $('#error-message').text(response.message).show();
              
          }
          else if (response.status === 'error') {
              if (response.errortype === 'name') {
                  document.querySelectorAll('#error-name')[0].style.color = 'red';
                  document.querySelectorAll('#nameInput')[0].select();
              $('#error-name').text(response.message).show();
              }
                if (response.errortype === 'email') {
                    document.querySelectorAll('#error-email')[0].style.color = 'red';
                    document.querySelectorAll('#emailInput')[0].select();
                $('#error-email').text(response.message).show();
                }
                if (response.errortype === 'password') {
                    document.querySelectorAll('#error-password')[0].style.color = 'red';
                    document.querySelectorAll('#passwordInput')[0].select();
                $('#error-password').text(response.message).show();
                }
                
                if (response.errortype === 'confirmpassword') {
                    document.querySelectorAll('#error-confirmpassword')[0].style.color = 'red';
                    document.querySelectorAll('#confirmpasswordInput')[0].select();
                $('#error-confirmpassword').text(response.message).show();
                }

                if (response.errortype === 'address') {
                    document.querySelectorAll('#error-address')[0].style.color = 'red';
                    document.querySelectorAll('#addressInput')[0].select();
                $('#error-address').text(response.message).show();
                }
                if (response.errortype === 'contactNo') {
                    document.querySelectorAll('#error-contactNo')[0].style.color = 'red';
                    document.querySelectorAll('#contactNoInput')[0].select();
                $('#error-contactNo').text(response.message).show();
                }
            }
             
          else {
              // Validation failed, display error message or perform any desired action
              document.querySelectorAll('#error-message')[0].style.color = 'red';
              $('#error-message').text(response.message).show();
            }
          },
          error: function(xhr, status, error) {
          // Handle any error that occurs during the AJAX request
          console.log(error);
          return false;
          }
        });//ajax end
    }
      return false;
      }   
      </script>
</body>

</html>