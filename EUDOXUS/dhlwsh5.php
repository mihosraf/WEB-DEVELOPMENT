
<?php include('server.php');
// Check session_start
if (isset($_SESSION['success'])){
  //echo $_SESSION['success'];
}
// Check if loged in
if (isset($_GET['logout'])) {
   session_destroy();
   unset($_SESSION['username']);
   header("location: index.php");
  }
?>
<?php

    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'uni');
    mysqli_set_charset($db,"utf8");
    $school = $_SESSION['school']; //----------
    $department = $_SESSION['department']; //------
    $course = $_SESSION ['course']; //----------
    $semester = $_SESSION ['semester']; //-------------

    ?>
    <html>
    <head>
     <meta charset= "UTF-8">
       <title>Ευδοξος</title>
       <link href="css/style.css" rel="stylesheet" type="text/css">
       <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    </head>
    <body>
        <div class="global">

        <div class="row">
            <div class="logo">
            <img src="pics/logo.png"
            </div>

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
                <?php else : ?>
                <li><a href="login.php"><strong> Είσοδος / Εγγραφή </strong></a></li>
                <?php endif; ?>

                <div class="search">
                  <form action="search.php" method="GET">
                   <input type="text" class="searchTerm" placeholder="Τί ψάχνετε?" name="searchQuery">
                   <button type="submit" class="searchButton">
                     <i class="fa fa-search"></i>
                   </button>
                  </form>
                </div>


            </ul>

        </div>
        <div class ="content">
          <?php if (isset($_SESSION['success'])): ?>
              <div class="error success">
                <h3>
                  <?php
                    echo $_SESSION['success'];
                  //  unset ($_SESSION['success']);
                  ?>
                </h3>
              </div>
          <?php endif ?>
          <?php if (isset($_SESSION["username"])): ?>
            <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
          <p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
          <?php endif ?>
        </div>
        <!--dropdown for school -->
        <div style="text-align:center;">
          <form name= "book" action="dhlwsh5.php" method="post">
            <select name="selectbook" action="" >
              <?php
              $res=mysqli_query($db,"SELECT distinct book from library where school = '$school' AND department = '$department' AND course = '$course' AND semester = '$semester' ");
            //  "SELECT * FROM users WHERE username='$username' AND password='$password'"

              while($row=mysqli_fetch_array($res)){
                ?>

              <option><?php echo $row["book"]; ?></option>
              <?php

            }
            ?>

          </select>
          <input  onclick="myFunction()" class="greybutton" name = "s1" type = "button" value = "Back">

    <script>
    function myFunction() {
      location.href = "dhlwsh4.php";
    }
    </script>
          <input class="greybutton" name = "s1" type = "submit" value = "Submit">
        </form>
      </div>
      <?php
      if (isset ($_POST['selectbook'])) {
        if (isset($_SESSION['success'])){
            $username = $_SESSION ['username'];
            $selectedbook = $_POST['selectbook'];
            $link = mysqli_connect('localhost', 'root', '', 'uni');
            mysqli_set_charset($link,"utf8");
            $res1 = mysqli_query($link, "SELECT id FROM users WHERE username='$username'");
            $row2=mysqli_fetch_array($res1);
            $res2 = mysqli_query($link, "SELECT isdn FROM library WHERE book='$selectedbook'");
            $row3=mysqli_fetch_array($res2);

            $link2 = mysqli_connect('localhost', 'root', '', 'uni');
            mysqli_set_charset($link2,"utf8");
            $sql = "INSERT INTO dhlwsh (studentid,isdn) VALUES ('$row2[0]', '$row3[0]')";
            mysqli_query($link2,$sql);
        }
        else {
          echo "<p><h3>Δεν ειστε συνδεδεμενος! Για να πραγματοποιησετε αυτη την ενεργεια πρεπει να συνδεθειτε!</h3></p>";
        }
      }
       ?>
       <div class="footer">
         <ul>
           <li><a href=""> Επικοινωνία </a></li>
           <li><a href=""> FAQ </a></li>
         </ul>
       </div>


    </body>
    </html>
