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

    $query = mysqli_real_escape_string($dbconn, $_GET['searchQuery']);
    // $query = $_POST['searchQuery'];
    // gets value sent over search form

    $min_length = 3;
    // you can set minimum length of the query if you want

    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;

        // $query = mysqli_real_escape_string($dbconn,$query);
        // makes sure nobody uses SQL injection

        // $raw_results = mysqli_query($dbconn, "SELECT * FROM library
        //     WHERE (`course` LIKE '%".$query."%') OR (`department` LIKE '%".$query."%')");

        //$searching = "SELECT * FROM library WHERE course = '$query' ";

        //$searching = "SELECT * FROM library WHERE CONCAT(school, '', department, '', semester, '', books, '', course) LIKE '$query'";

        $searching = "SELECT * FROM library WHERE (school LIKE '%$query%')  or (course LIKE '%$query%') or (department LIKE '%$query%') or (book LIKE '%$query%')";



        $raw_results = mysqli_query($dbconn, $searching);

        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table

        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

        $numberofresults = mysqli_num_rows($raw_results);

        echo "<h2> Η αναζητηση σας για  <i> $query </i> εχει $numberofresults αποτελεσματα </h2>";


        if(mysqli_num_rows($raw_results) != 0){ // if one or more rows are returned do following

            $counter = 1;

            while($results = mysqli_fetch_array($raw_results)){
            // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop

                echo "<p>".$counter.".<br>Ίδρυμα: ".$results['school']."<br>Τμήμα:  ".$results['department']. "<br>Μάθημα: ".$results['course']. "<br>Τίτλος Συγγράματος: ".$results['book']. "<p>";
                // posts results gotten from database(title and text) you can also show id ($results['id'])

            $counter = $counter + 1;

            }

        }


        // else{ // if there is no matching rows do following
        //     echo "No results";
        // }

    }
    else{ // if query length is less than minimum
        echo "Minimum length is ".$min_length;
    }
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
