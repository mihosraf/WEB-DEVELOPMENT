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
    <div class="grid-container">
      <div>
        <h3><strong><i>Φοιτητές</i></strong></h3>
        <a href="dhlwsh.php" class="myButton" >Γρήγορη Δήλωση</a> </div>

      <div>
        <h3><strong><i>Εκδότες</i></strong></h3>
        <a href="#" class="myButton" >Γρήγορη Καταχώρηση</a> </div>

      <div>
        <h3><strong><i>Σημεία Διανομής</i></strong></h3>
        <a href="#" class="myButton">Προσθήκη Σημείου</a> </div>

    </div>

    <div class="footer">
      <ul>
        <li><a href=""> Επικοινωνία </a></li>
        <li><a href=""> FAQ </a></li>
      </ul>
    </div>

 </div>
</body>
</html>
