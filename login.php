<?php
    include ("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="index-style.css">
    <link rel="stylesheet" type="text/css" href="login-style.css">
    <title>login</title>
</head>
<body>
    <div class="center">
        <h1>login</h1>

        <form action="#" method="POST">
        <div class="form">
            <input type="text" name="username" class="textfiled" placeholder="username">
            <input type="password" name="password" class="textfiled" placeholder="password">
            <div class="forgetpass"><a href="#" class="link" onclick="message()">
            Forget Password?</a></div>
            <input type="submit" name="login" value="login" class="btn">

            <div class="signup">New Member?<a href="signup.php" class="link">Signup Here</a></div>
        </div>
    </div>
    </form>
    <script>
        function message()
        {
            alert("to password yad kr lo yrr.")
        }
    </script>
</body>
</html>

<?php
    include("connection.php");
    if(isset($_POST['login'])){
        $username=$_POST['username'];
        $pwd=$_POST['password'];

        $query="SELECT * FROM signup WHERE email='$username' && pass='$pwd' ";
        $data=mysqli_query($con,$query);

        $total=mysqli_num_rows($data);
        //echo $total;
        if($total==1){
            $_SESSION['email']=$username;
            //echo "login success.";
            echo "<script>alert(' login success.');</script>";
            header('Location: dashboard.php');
        }
        else{
           //echo "login failed";
        }
    }
?>