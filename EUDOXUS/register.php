<?php include('server.php'); ?>
<html>
<head>
  <meta charset= "UTF-8">
    <title>Ευδοξος</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="global">

      <a href="index.php">
        <div class="row">
          <div class="logo">
          <img src="pics/logo.png"
        </div></a>

    <ul class="main-nav">
        <li class="active"><a href="index.php"><strong> Αρχική </strong></a></li>
        <li><a href="foitites.php"><strong> Φοιτητές </strong></a></li>
        <li><a href="ekdotes.php"><strong> Εκδότες </strong></a></li>
        <li><a href=""><strong> Γραμματείες </strong></a></li>
        <li><a href=""><strong> Σημεία Διανομής </strong></a></li>
        <li><a href=""><strong> Ανακοινώσεις </strong></a></li>
      </ul>


      <form class="modal-content animate" action="register.php" method="POST">

      <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" id="user" name="username" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" id="pass" name="password_1" required>

      <label for="psw"><b>Confirm Password</b></label>
      <input type="password" id="pass" name="password_2" required>

      <button type="submit" name="register">Register Now</button>

      </div>

      <p>
        Already a member? <a href= "login.php">Sign in </a>

      <button onclick="myFunction()" class="cancelbtn">Cancel</button>

<script>
function myFunction() {
  location.href = "index.php";
}
</script>
      </form>

    </div>
  </body>
</html>
