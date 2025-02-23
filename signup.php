<!-- NOTE
SINGLE PAGE FORM ALONG WITH VALIDATION
NO PHP LEAKS BACK TO THE INDEX 
 -->
<?php
require_once("Includes/session.php");
$nameErr = $phoneErr = $addrErr = $emailErr = $passwordErr = $confpasswordErr = "";
$name = $email = $password = $confpassword = $address = "";
$flag=0;

//CHECK IF A VALID FORM STRING
function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

if(isset($_POST["reg_submit"])) {
        $email = test_input($_POST['email']); 
        $password = test_input($_POST["inputPassword"]);
        $confpassword = test_input($_POST["confirmPassword"]);
        $address = test_input($_POST["address"]);
        $email = test_input($_POST['email']);

        // NAME VALIDATION
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            $flag=1;
            echo $nameErr;
        } else {
            $name = test_input($_POST["name"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed"; 
                $flag=1;
                echo $nameErr;
            }
        }

        // EMAIL VALIDATION
        if (empty($_POST["email"])) {
            $emailErr = "Email is required";
            $flag=1;
            } else {
            $email = test_input($_POST["email"]);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
                $flag=1;
                echo $emailErr;
            }
        }

        // PASSWORD VALIDATION
        if (empty($_POST["inputPassword"])) 
        {
            $passwordErr = "PASSWORD missing";
            $flag=1;
        }
      
        else{
            $password = $_POST["inputPassword"];
        }
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $passwordErr = "Password must have at least 8 characters, one lowercase letter, one uppercase letter, one number, and one special character"; 
        $flag=1;
        echo $passwordErr;
        }
        if (empty($_POST["inputPassword"])) {
            $passwordErr = "Password is required";
            $flag=1;
            echo $passwordErr;
        } else {
            $password = $_POST["inputPassword"];
          
            // check if password has at least 8 characters, one lowercase letter, one uppercase letter, one number, and one special character
            if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
                $passwordErr = "Password must have at least 8 characters, one lowercase letter, one uppercase letter, one number, and one special character"; 
                $flag=1;
                echo $passwordErr;
            }
        }
        
        // CONFIRM PASSWORD
        if (empty($_POST["confirmPassword"])) 
        {
            $confpasswordErr = "missing";
            $flag=1;
        }
        else 
        {
            if($_POST['confirmPassword'] == $password)
            {
                $confpassword = $_POST["confirmPassword"];
            }
            else
            {
                $confpasswordErr = "Not same as password!";
                $flag = 1;
            }
        }
        //CONTACT VALIDATION
        if (empty($_POST["contactNo"])) {
            $flag=1;
            $contactNo = "";
        } else {
            $contactNo = test_input($_POST["contactNo"]);
            if(strlen( $_POST["contactNo"]) != 10){
                $flag=1;
                $phoneErr="10 digit phone only allowed.\n";
    
                echo $phoneErr;
            }
        }
        
        // ADDRESS VALIDATION
        if (empty($_POST["address"])) {
            $addrErr = "Address is required";
            $flag=1;
            echo $addrErr;
        } else {
            $address = test_input($_POST["address"]);
            if (!ctype_alpha(str_replace(' ', '',$address))) {
                $addrErr = "\n Only letters, numbers and white space allowed";
                // $flag=1; 
                echo $addrErr;
            }
        }


        // Only if succeed from the validation thourough put  
        // echo $flag; 
        if($flag == 0)
        {
            require_once("Includes/config.php");
            $sql = "INSERT INTO user (`name`,`email`,`phone`,`pass`,`address`)
                    VALUES('$name','$email','$contactNo','$password','$address')";
                    echo $sql;
            if (!mysqli_query($con,$sql))
            {
                die('Error: ' . mysqli_error($con));
            }
            header("Location:index.php");
        }
    }
?>

<?php
    // if(isset($flag)) {
    //     if($flag === 0) {
    //         echo '
    //             <table class="table"> 
    //             <tr class="success">Account Created</tr>
    //             </table>
    //         ';
    //     } elseif ($flag === 1) {
    //         echo '
    //             <table class="table"> 
    //             <tr class="danger">There were errors in the form.</tr>
    //             </table>
    //         ';
    //     } 
    // }
?>
<form action="signup.php" method="post" class="form-horizontal" role="form" onsubmit="return validateForm()">
<center>
    <div class="row form-group">
        <div class="col-md-12">
            <input type="name" class="form-control" name="name" id="name" placeholder="Full Name" required>
            <!-- <label><?php echo $nameErr;?></label> -->
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
            <!-- <label><?php echo $emailErr;?></label> -->
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="password" class="form-control" minlength="8" name="inputPassword" id="inputPassword" placeholder="Password" required>
            <!-- <label><?php echo $passwordErr;?></label> -->
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="password" class="form-control" minlength="8" name="confirmPassword" placeholder="Confirm Password" required>
            <!-- <label><?php echo $confpasswordErr;?></label><label><?php echo $confpasswordErr;?></label> -->
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="tel" class="form-control" name="contactNo" placeholder="Contact No." required>
            <!-- <label><?php echo $phoneErr;?></label> -->
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-12">
            <input type="address" class="form-control" name="address" placeholder="Address" required>
            <!-- <label><?php echo $addrErr;?></label> -->
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-10">
            <button name="reg_submit" class="btn btn-primary">Sign Up</button>
        </div>
    </div>
    </center>
</form>
