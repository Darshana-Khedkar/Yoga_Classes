<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trainee Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="form.css" />
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->

</head>

<body>

<section class="container">
    <header>Login Form</header>
    <form action="" class="form" method="post">
      <div class="input-box">
        <label>Email Address</label>
        <input type="text" placeholder="Enter email address" name="email" required />
        <label>Password</label>
        <input type="password" placeholder="Enter password" name="password" required />
      </div>
      <button name="submit">Login</button>
    </form>
</section>
   

</body>

</html>

<?php
if (isset($_POST["submit"])) {
    $username = mysqli_real_escape_string($link,$_POST["email"]);
    $password = mysqli_real_escape_string($link,$_POST["password"]);
    $count=0;
    $res = mysqli_query($link,"select * from user_table where email='$username' && password='$password'");
    $count = mysqli_num_rows($res);

    if($count==0){
        ?>
            <script type="text/javascript">
            document.getElementById("error").style.display="block";
            </script>
        <?php
    }
    else{
        $_SESSION["admin"]=$username;
        ?>
        <script type="text/javascript">
            document.getElementById("error").style.display="hidden";
        window.location="userPage.php";
        </script>
        <?php
    }
}
?>
