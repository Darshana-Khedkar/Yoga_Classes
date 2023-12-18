<?php
include "connection.php";
?>
<!DOCTYPE html>
<!---Coding By CodingLab | www.codinglabweb.com--->
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Registration Form </title>
  <!---Custom CSS File--->
  <link rel="stylesheet" href="form.css" />
</head>

<body>
  <section class="container">
    <header>Registration Form</header>
    <form action="" class="form" method="post">
      <div class="input-box">
        <label>Full Name</label>
        <input type="text" placeholder="Enter full name" name="name" required />
      </div>

      <div class="input-box">
        <label>Email Address</label>
        <input type="text" placeholder="Enter email address" name="email" required />
        <label>Password</label>
        <input type="password" placeholder="Enter password" name="password" required />
      </div>

      <div class="column">
        <div class="input-box">
          <label>Phone Number</label>
          <input type="number" placeholder="Enter phone number" name="number" required />
        </div>
        <div class="input-box">
          <label>Age</label>
          <input type="number" placeholder="Enter Age" min="18" max="65" name="age" required />
        </div>
        <div class="input-box">
          <label>Start Date</label>
          <input type="date" placeholder="From When did you want to start" name="start_date" required />
        </div>
      </div>
      <div class="gender-box">
        <h3>Gender</h3>
        <div class="gender-option">
          <div class="gender">
            <input type="radio" id="check-male" name="gender" checked />
            <label for="check-male">male</label>
          </div>
          <div class="gender">
            <input type="radio" id="check-female" name="gender" />
            <label for="check-female">Female</label>
          </div>
          <div class="gender">
            <input type="radio" id="check-other" name="gender" />
            <label for="check-other">prefer not to say</label>
          </div>
        </div>
      </div>
      <div class="input-box address">
        <!-- <label>Address</label> -->
        <!-- <input type="text" placeholder="Enter street address" required />
          <input type="text" placeholder="Enter street address line 2" required /> -->
        <div class="column">
          <div class="select-box">
            <select name="batch_id">
              <option hidden>Batch Timing</option>
              <option value="1">6 - 7 AM</option>
              <option value="2">7 - 8 AM</option>
              <option value="3">8 - 9 AM</option>
              <option value="4">5 - 6 PM</option>
            </select>
          </div>
          <!-- <input type="text" placeholder="Enter your city" required /> -->
        </div>
        <!-- <div class="column">
            <input type="text" placeholder="Enter your region" required />
            <input type="number" placeholder="Enter postal code" required />
          </div> -->
      </div>

      <button name="submit">Pay 500 Now</button>
    </form>
  </section>
</body>

</html>

<?php
date_default_timezone_set('Asia/Calcutta');
$date = date('d/m/Y', time());
if (isset($_POST['submit'])) {
  session_start();
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['name'] = $_POST['name'];
  $count = 0;
  $res = mysqli_query($link, "select * from user_table where email='$_POST[email]'");
  $count = mysqli_num_rows($res);
  if ($count > 0) {
?>
    <script type="text/javascript">
      document.getElementById("error").style.display = "block";
      document.getElementById("success").style.display = "none";
    </script>
  <?php
  } else {
    mysqli_query($link, "insert into user_table values (NULL,'$_POST[name]','$_POST[email]','$_POST[password]','$_POST[number]','$_POST[age]','$_POST[start_date]','$_POST[batch_id]')");
  ?>
    <script>
      window.location.href = "gatewayp/payment.php";
    </script>
<?php
  }
}
?>