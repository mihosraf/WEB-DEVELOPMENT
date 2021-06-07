<?php include('server.php');
 // Check session_start
 if (isset($_SESSION['success'])){
  // echo $_SESSION['success'];
 }
 // Check if loged in
 if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: index.php");
   }
 ?>
<html>
<head>
  <meta charset= "UTF-8">
    <title>Ευδοξος</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
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
        <?php if (isset($_SESSION["username"])): ?>
          <i class="fas fa-user" id="usericon" onclick="myFunction()"></i>
          <script>
          function myFunction() {
            location.href = "userprofile.php";
          }
          </script>
        <!-- <span class="fas fa-shopping-cart" id="shopicon"></span> -->
        <?php else : ?>
        <li><a href="login.php"><strong> Είσοδος / Εγγραφή </strong></a></li>
        <?php endif; ?>

        <div class="search">
           <input type="text" class="searchTerm" placeholder="Τί ψάχνετε?">
           <button type="submit" class="searchButton">
             <i class="fa fa-search"></i>
           </button>
        </div>


    </ul>

    </div>
    <div class ="content">
      <?php if (isset($_SESSION['success'])): ?>
          <div class="error success">
            <h3>
              <?php
                echo $_SESSION['success'];
                //unset ($_SESSION['success']);
              ?>
            </h3>
          </div>
      <?php endif ?>
      <?php if (isset($_SESSION["username"])): ?>
        <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
      <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
      <?php endif ?>
    </div>
    <!--nested columns-->
    </ul>
      <form action="userchanges.php" method = "POST">
        <div class="container">
          <p>Παρακαλω συμπληρωστε τα παρακατω στοιχεια!</p>
          <hr>

          <label for="fullname"><b>Ονοματεπωνυμο</b></label>
          <input type="text" placeholder="Εισαγετε Ονοματεπωνυμο" name="fullname" required>

          <label for="email"><b>Email</b></label>
          <input type="text" placeholder="Εισαγετε Email" name="email" required>

          <label for="status"><b>Ιδιοτητα</b></label>
          <input type="text" placeholder="Εισαγετε Ιδιοτητα(Φ: Φοιτητης / Ε:Εκδοτης)" name="status" required>

          <label for="university"><b>Πανεπιστημιο/Εκδοτικος Οικος</b></label>
          <input type="text" placeholder="Εισαγετε Πανεπιστημιο αν ειστε φοιτητης ή Εκδοτικο Οικο αν ειστε εκδοτης" name="university" required>

          <hr>

          <button type="submit" class="button2">Submit</button>
        </div>
      </form>

      <?php
      if (isset ($_POST['fullname'])) {
        $fullname = $_POST['fullname'];
        }
      if (isset ($_POST['email'])) {
          $email = $_POST['email'];
          }
      if (isset ($_POST['university'])) {
            $university = $_POST['university'];
            }
      if (isset ($_POST['status'])) {
              $status = $_POST['status'];
              }
              $username = $_SESSION ['username'];
              $link = mysqli_connect('localhost', 'root', '', 'uni');
              mysqli_set_charset($link,"utf8");
              $res1 = mysqli_query($link, "SELECT id FROM users WHERE username='$username'");
              $row2=mysqli_fetch_array($res1);
              $sql = "UPDATE users SET fullname = '$fullname' where id='$row2[0]' ";
              mysqli_query($link,$sql);
              $sql2 = "UPDATE users SET email = '$email' where id='$row2[0]' ";
              mysqli_query($link,$sql2);
              $sql3 = "UPDATE users SET university = '$university' where id='$row2[0]' ";
              mysqli_query($link,$sql3);
              $sql4 = "UPDATE users SET status = '$status' where id='$row2[0]' ";
              mysqli_query($link,$sql4);

       ?>
  <div class="footer">
          <ul>
            <li><a href=""> Επικοινωνία </a></li>
            <li><a href=""> FAQ </a></li>
          </ul>
        </div>


</div>
</body>
</html>
