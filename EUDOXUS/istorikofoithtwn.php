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

    $dbconn = mysqli_connect("localhost", "root", "") or die("Error connecting to database: ");
    /*
        localhost - it's location of the mysql server, usually localhost
        root - your username
        third is your password

        if connection fails it will stop loading the page and display an error
    */

    mysqli_select_db($dbconn, "uni");
    /* library is the name of database we've created */

    mysqli_set_charset($dbconn,"utf8");
    /* solve the Greek characters problem */
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
          <form action="search.php" method="GET">
           <input type="text" class="searchTerm" placeholder="Τί ψάχνετε?" name="searchQuery">
           <button type="submit" class="searchButton">
             <i class="fa fa-search"></i>
           </button>
          </form>
        </div>
    </ul>

    <div class="panel">
      <strong>
    <?php

    $username = $_SESSION ['username'];
    $link = mysqli_connect('localhost', 'root', '', 'uni');
    mysqli_set_charset($link,"utf8");
    $res1 = mysqli_query($link, "SELECT id FROM users WHERE username='$username'");
    $row2=mysqli_fetch_array($res1);

    $res2 = mysqli_query($link, "SELECT isdn FROM dhlwsh WHERE studentid='$row2[0]'");

    $numberofresults = mysqli_num_rows($res2);

    echo "<h2> Η αναζητηση σας για  εχει $numberofresults αποτελεσματα </h2>";


    if(mysqli_num_rows($res2) != 0){ // if one or more rows are returned do following
        $counter=0;
          while($results = mysqli_fetch_array($res2)){
          $res3 = mysqli_query($link, "SELECT * FROM library WHERE isdn='$results[0]'");
          $row4=mysqli_fetch_array($res3);


          $counter = $counter + 1 ;
        // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
        //echo ($row4['school'].$row4['department'].$row4['course'].$row4['book']);
            echo "<p>".$counter.".<br>Ίδρυμα: ".$row4['school']."<br>Τμήμα:  ".$row4['department']. "<br>Μάθημα: ".$row4['course']. "<br>Τίτλος Συγγράματος: ".$row4['book']. "<p>";
            // posts results gotten from database(title and text) you can also show id ($results['id']
          }
        }


    // $query = $_POST['searchQuery'];
    // gets value sent over search form


    // you can set minimum length of the query if you want


        // changes characters used in html to their equivalents, for example: < to &gt;

        // $query = mysqli_real_escape_string($dbconn,$query);
        // makes sure nobody uses SQL injection

        // $raw_results = mysqli_query($dbconn, "SELECT * FROM library
        //     WHERE (`course` LIKE '%".$query."%') OR (`department` LIKE '%".$query."%')");

        //$searching = "SELECT * FROM library WHERE course = '$query' ";

        //$searching = "SELECT * FROM library WHERE CONCAT(school, '', department, '', semester, '', books, '', course) LIKE '$query'";



        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table

        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'




        // else{ // if there is no matching rows do following
        //     echo "No results";
        // }



?>



      </strong>
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
    <!-- <div class="grid-container">
      <div>
        <h3><strong><i>Φοιτητές</i></strong></h3>
        <a href="#" class="myButton" >Γρήγορη Δήλωση</a> </div>

      <div>
        <h3><strong><i>Εκδότες</i></strong></h3>
        <a href="#" class="myButton" >Γρήγορη Καταχώρηση</a> </div>

      <div>
        <h3><strong><i>Σημεία Διανομής</i></strong></h3>
        <a href="#" class="myButton">Προσθήκη Σημείου</a> </div>

    </div> -->

    <div class="footer">
      <ul>
        <li><a href=""> Επικοινωνία </a></li>
        <li><a href=""> FAQ </a></li>
      </ul>
    </div>

 </div>
</body>
</html>
