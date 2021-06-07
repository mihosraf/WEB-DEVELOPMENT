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
      <form action="kataxwrhsh.php" method = "POST">
        <div class="panel">
          <p>Παρακαλω συμπληρωστε τα παρακατω στοιχεια!</p>
          <hr>

          <label for="school"><b>Σχολη</b></label>
          <input type="text" placeholder="Εισαγετε Σχολη" name="school" required>

          <label for="department"><b>Τμημα</b></label>
          <input type="text" placeholder="Εισαγετε Τμημα" name="department" required>

          <label for="semester"><b>Εξαμηνο</b></label>
          <input type="text" placeholder="Εισαγετε Εξαμηνο" name="semester" required>

          <label for="course"><b>Μαθημα</b></label>
          <input type="text" placeholder="Εισαγετε Μαθημα" name="course" required>

          <label for="course_id"><b>Κωδικος Μαθηματος</b></label>
          <input type="text" placeholder="Εισαγετε Κωδικο Μαθηματος" name="course_id" required>

          <label for="book"><b>Τιτλος Βιβλιου</b></label>
          <input type="text" placeholder="Εισαγετε Τιτλο Βιβλιου" name="book" required>

          <label for="isdn"><b>ISDN</b></label>
          <input type="text" placeholder="Εισαγετε ISDN" name="isdn" required>

          <hr>

          <button type="submit" class="button2">Submit</button>
        </div>
      </form>

      <?php
      $school=" ";
      $department=" ";
      $semester=" ";
      $cousre=" ";
      $course_id=" ";
      $book=" ";
      $isdn=" ";
      $course=" ";
      if (isset ($_POST['school'])) {
        $school = $_POST['school'];
        }
      if (isset ($_POST['department'])) {
          $department = $_POST['department'];
          }
      if (isset ($_POST['semester'])) {
            $semester = $_POST['semester'];
            }
      if (isset ($_POST['course'])) {
              $course = $_POST['course'];
              }
      if (isset ($_POST['course_id'])) {
                $course_id = $_POST['course_id'];
              }
      if (isset ($_POST['book'])) {
                $book = $_POST['book'];
              }
      if (isset ($_POST['isdn'])) {
              $isdn = $_POST['isdn'];
              }
              $username = $_SESSION ['username'];
              $link = mysqli_connect('localhost', 'root', '', 'uni');
              mysqli_set_charset($link,"utf8");
              $sql="INSERT INTO library (school, department, semester,course, course_id, book, isdn)
              VALUES ('$school', '$department', '$semester', '$course', '$course_id', '$book', '$isdn')";
              mysqli_query($link,$sql);

              if (isset($_SESSION['success'])){
                  $username = $_SESSION ['username'];
                  //$selectedbook = $_POST['selectbook'];
                  $link = mysqli_connect('localhost', 'root', '', 'uni');
                  mysqli_set_charset($link,"utf8");
                  $res1 = mysqli_query($link, "SELECT id FROM users WHERE username='$username'");
                  $row2=mysqli_fetch_array($res1);
                  $res2 = mysqli_query($link, "SELECT isdn FROM library WHERE book='$book'");
                  $row3=mysqli_fetch_array($res2);

              $link2 = mysqli_connect('localhost', 'root', '', 'uni');
              mysqli_set_charset($link2,"utf8");
              $sql = "INSERT INTO dhlwsh (studentid,isdn) VALUES ('$row2[0]', '$row3[0]')";
              mysqli_query($link2,$sql);
            }
              ?>



</div>
</body>
</html>
