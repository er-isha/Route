<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    <link rel="stylesheet" href="../css/register.css">
    <style>
        .login {
            position: relative;
            animation: route 3s;
            animation-direction: normal;
            animation-timing-function: ease-in-out;
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
                    <form class="form" action="register.php" method="post" name="myform">
                        <h2 class="h2">REGISTRATION FORM</h2>
                        <div class="name">
                            <label>USER NAME</label>
                            <input class="input" type="text" name="name" ng-model="name" required><br>
                            <span style="color:red" ng-show="myform.name.$dirty&&myform.name.$invalid">
                                <span ng-show="myform.name.$error.required">User name is invalid</span>
                        </div>


                        <div class="name">
                            <label for="Password">PASSWORD</label>
                            <input class="input" type="password" name="password" id="password" ng-model="password"
                            minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter and one symbole, and at least 8 or more characters" required>
                            <br><span style="color:red" ng-show="myform.password.$dirty&&myform.password.$invalid">
                                <span ng-show="myform.password.$error.required">password is invalid</span>
                        </div>

                        <div class="name">
                            <label for="Password">CONFIRM PASSWORD</label>
                            <input class="input" type="password" name="cpassword" id="cpassword" ng-model="cpassword"
                            minlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and
                             lowercase letter and one, and at least 8 or more characters" required >
                            <br><span style="color:red" ng-show="myform.cpassword.$dirty&&myform.cpassword.$invalid">
                                <span ng-show="myform.cpassword.$error.required">password is invalid</span>
                        </div>

                        <div class="name">E-MAIL ID
                            <input class="input" type="email" name="email" id="email" ng-model="email" required>
                            <br><span style="color:red" ng-show="myform.email.$dirty && myform.email.$invalid">
                                <span ng-show="myform.email.$error.required">Email is required.</span>
                                <span ng-show="myform.email.$error.email">Invalid email address.</span>
                            </span>
                        </div>
                        <div class="name">
                            <label for="num">PHONE NO</label>
                            <input class="input" type="text" id="num" name="num" maxlength="10">
                        </div>
                        <div class="name">
                            <input type="radio" name="gender" value="male" />MALE
                            <input type="radio" name="gender" value="female" />FEMALE
                        </div><br>
                        <input class="button" type="submit" value="submit"><br><br>
                    </form>
                </div>
            </center>
        </div>
    </div>
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
    if (isset($_POST["cpassword"]))
    {
      $confirm_password = $_POST["cpassword"];
    } 
    else 
    {
      $confirm_password = null;
    }
        
    if (isset($_POST["email"]))
    {
    $email = $_POST["email"];
    } 
    else 
    {
    $email = null;
    }

    if (isset($_POST["num"]))
    {
    $num = $_POST["num"];
    } 
    else 
    {
    $num = null;
    }

    if (isset($_POST["gender"]))
    {
    $gender = $_POST["gender"];
    } 
    else 
    {
    $gender = null;
    }
        
        $conn = new mysqli('localhost','root','','reg');
        if($conn->connect_error){
            die("connection failed:" .$conn->connect_error);
        }
        else{
            $stmt=$conn->prepare("insert into register(name, password, confirm_password, email, num, gender) values(?,?,?,?,?,?)");
            $stmt->bind_param("ssssss",$name, $password, $confirm_password, $email, $num, $gender);
            $stmt->execute();
            echo '<script type="text/JavaScript"> 
                alert("registered sucsessfully");
                </script>'
            ;
            $stmt->close();
            $conn->close();
        }
    ?>
</body>

</html>
