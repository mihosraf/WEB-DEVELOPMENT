
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
    $school = " ";
    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'uni');
    mysqli_set_charset($db,"utf8");
    // if the register button is clicked
    if (isset($_POST['selectschool'])){
      $school = mysqli_real_escape_string($db,$_POST['selectschool']);
    }
    $school = $_SESSION['school']; // ---------------------------

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
        <!--dropdown for school -->
        <div style="text-align:center;">
          <form name= "department" action="dhlwsh3.php" method="post">
            <select name="selectdepartment" action="" >
              <?php
              $res=mysqli_query($db,"SELECT distinct department from library where school='$school' ");
            //  "SELECT * FROM users WHERE username='$username' AND password='$password'"

              while($row=mysqli_fetch_array($res)){
                ?>

              <option><?php echo $row["department"]; ?></option>
              <?php

            }
            ?>
          </select>
          <input  onclick="myFunction()" class="greybutton" name = "s1" type = "button" value = "Back">

    <script>
    function myFunction() {
      location.href = "dhlwsh.php";
    }
    </script>
          <input class="greybutton" name = "s1" type = "submit" value = "Next">
        </form>
      </div>
      <div class="footer">
        <ul>
          <li><a href=""> Επικοινωνία </a></li>
          <li><a href=""> FAQ </a></li>
        </ul>
      </div>


    </body>
    </html>
