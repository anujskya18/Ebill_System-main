<?php
$successPassword = '';
//CHECK IF A VALID FORM STRING
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//NAME VALIDATION
if(isset($_POST["name"])) {
    $name = test_input($_POST["name"]);
    if (empty($_POST["name"])) {
        $response = [
            'status' => 'error',
            'errortype' => 'name',
            'message' => "Name is required"
        ];
        $flag=1;
    }
    elseif (!preg_match('/^[A-Za-z\s]+$/', $name)) {
        $response = [
            'status' => 'error',
            'errortype' => 'name',
            'message' => "Only letters and white space allowed on fullname"
        ];
        $flag=1;
    }
    else{
        $successName = $_POST["name"];
        $name = true;    
    }
}
// EMAIL VALIDATION
if(isset($_POST["email"])) {
    $email = test_input($_POST["email"]);
if(empty($_POST["email"])) {
    $response = [
        'status' => 'error',
        'errortype' => 'email',
        'message' => "Email is required"
      ];
    $flag=1;
    } 
    else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = [
            'status' => 'error',
            'errortype' => 'email',
            'message' => "Invalid email format"
        ];
        $flag=1;
    }
    else{
        $sucessEmail = $_POST["email"];
        $email = true;
        
    }
}
}
// PASSWORD VALIDATION
if(isset($_POST["password"])) {
    $password = test_input($_POST["password"]);
    
    if (empty($_POST["password"]))
    {
        $response = [
            'status' => 'error',
            'errortype' => 'password',
            'message' => "PASSWORD missing"
          ];
        $flag=1;
    }
    elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
    $response = [
        'status' => 'error',
        'errortype' => 'password',
        'message' => "Password must have at least 8 characters, one lowercase letter, one uppercase letter, one number, and one special character"
        ];
    $flag=1;

    }
    else{
        $successPassword = $_POST["password"];
        $password = true;    
    }
    
}
if(isset($_POST["confirm_password"])) {
    $confirm_password = test_input($_POST["confirm_password"]);
    
    if (empty($_POST["confirm_password"]))
    {
        $response = [
            'status' => 'error',
            'errortype' => 'confirm_password',
            'message' => "Confirm Password missing"
          ];
        $flag=1;
    }
    elseif ($confirm_password !== $successPassword) {
            echo gettype($confirm_password);
        $response = [
            'status' => 'error',
            'errortype' => 'confirm_password',
            'message' => "password and confirm password doesnt match"
        ];
        $flag=1;

    }
        else{
            $successConfirmPassword = $_POST["confirm_password"];
            $confirm_password = true;    
        }
    
}

//address
if(isset($_POST["address"])) {
    $address = test_input($_POST["address"]);
    if (empty($_POST["address"])) {
        $response = [
            'status' => 'error',
            'errortype' => 'address',
            'message' => "Name is required"
        ];
        $flag=1;
    } 
    elseif (!preg_match("/^[a-zA-Z]+$/", $address)) {
        $response = [
            'status' => 'error',
            'errortype' => 'address',
            'message' => "Only letters and white space allowed on address"
        ];
        $flag=1;
    }
    else{
        $successAddress = $_POST["address"];
        $address = true;    
    }

if(isset($_POST["contactNo"])) {
    $contactNo = test_input($_POST["contactNo"]);
    if (empty($_POST["contactNo"])) {
        $response = [
            'status' => 'error',
            'errortype' => 'contactNo',
            'message' => "Please enter your Number"
        ];
        $flag=1;
    }
    elseif (!preg_match('/^[0-9]+$/', $contactNo)) {
            $response = [
                'status' => 'error',
                'errortype' => 'contactNo',
                'message' => "Digits are only allowed"
            ];
            $flag=1;
        }
    elseif (strlen( $_POST["contactNo"]) != 10 ){
            $response = [
                'status' => 'error',
                'errortype' => 'contactNo',
                'message' => "10 digit Contact No are only allowed"
            ];
            $flag=1;
        }
    
}
}

if (!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["password"])  && !empty($_POST["address"])){
    if ($name === true && $email === true && $password === true  && $confirm_password = true && $address === true  ){
    $response = [  
        'status' => 'success',
        'message' => "Your account has been created"
    ];
    
    }
}
header('Content-Type: application/json');
echo json_encode($response);
?>