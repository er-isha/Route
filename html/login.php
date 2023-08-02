<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <style>
        .login {
            position: relative;
            animation: route 3s;
            animation-direction: normal;
            animation-timing-function:ease-in-out;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.8.3/angular.min.js"></script>
</head>

<body ng-app="">
    <div class="header">
        <div class="icon"></div>
        <div class="links">
            <div class="linkwrapper">
                <a href="../index.html">HOME</a>

                <span class="seperator">
                    <a href="../html/login.php">LOGIN</a>
                </span>

                <span class="seperator">
                    <a href="../html/ticketbooking.html">TICKET BOOKING</a>
                </span>

                <span class="seperator">
                    <a href="../html/map.html">MAP</a>
                </span>

                <span class="separator">
                    <a href="../html/all.html">ATTRACTION</a>
                </span>
            </div>
        </div>
    </div>
    <div>
        <div class="image">
        <center>
        <div class="login">
    
            <form class="form" method="post" action="login.php" name="myform">
                <h2 class="h2">HAVE AN ACCOUNT?</h2>
                <div class="name">
                    <label>USER NAME</label>
                    <input class="input" type="text" name="name" ng-model="name" required><br>
                    <span style="color:red" ng-show="myform.name.$dirty&&myform.name.$invalid">
                    <span ng-show="myform.name.$error.required">User name is invalid</span>
                </div><br>

                <div class="name" >
                    <label for="Password">PASSWORD</label>
                    <input class="input" type="password" name="password" id="password" ng-model="password" minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                    title="Must contain at least one number and one uppercase and lowercase letter and one symbole, and at least 8 or more characters" required> 
                    <br><span style="color:red" ng-show="myform.password.$dirty&&myform.password.$invalid">
                        <span ng-show="myform.password.$error.required">password is invalid</span>
                </div>
                <br>
                <button class="button">LOGIN</button><br><br>
                <div class="txt">
                    Not Registered?
                    <a class="a" href="register.php" style="text-decoration:none;">
                        <b style="color:darkblue">Create an account</b>
                    </a>
                </div>
            </form>
        </div>
    </center>
    </div>
    </div>
</body>
</html>

<?php
 if (isset($_POST["name"]))
 {
   $name = $_POST["name"];
 } 
 else 
 {
   $name = null;
 } 
 
 if (isset($_POST["password"]))
{
  $password = $_POST["password"];
} 
else 
{
  $password = null;
}
$conn = new mysqli('localhost','root','','demo');
if($conn->connect_error){
    die("connection failed:" .$conn->connect_error);
}
else{
    $stmt=$conn->prepare("insert into demos(name,password) values(?,?)");
    $stmt->bind_param("ss",$name,$password);
    $stmt->execute();
    echo '<script type="text/JavaScript"> 
    alert("login sucsessfully");
    </script>';
    $stmt->close();
    $conn->close();
}

?>
