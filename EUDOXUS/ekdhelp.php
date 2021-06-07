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
        <strong><p><h6 style="text-decoration: underline;"> Διαδικασία Εγγραφής Εκδοτών </h6></p>
        <p>Κάθε εκδοτικός οίκος ή αυτοεκδότης αρχικά θα πρέπει να εγγραφεί και να πιστοποιηθεί προκειμένου να αποκτήσει πρόσβαση στο Κεντρικό Πληροφοριακό Σύστημα (ΚΠΣ), μέσω μιας απλής διαδικασίας, από την <a href="register.php" style="color: rgb(121, 187, 255);">ιστοσελίδα εγγραφής.</a></p><br>

        <a href="" style="color: rgb(121, 187, 255);"><h6 style="text-decoration: underline;"> Οδηγίες για τη διαδικασία εγγραφής και πιστοποίησης</h6></a><br>

        <p><h6 style="text-decoration: underline;"> Διαδικασία Καταχώρισης Συγγραμμάτων από Εκδοτικούς Οίκους και Αυτοεκδότες </h6></p>

        <p>Κάθε εκδοτικός οίκος ή αυτοεκδότης ο οποίος έχει ολοκληρώσει τη διαδικασία της πιστοποίησης μπορεί να καταχωρίσει στην Κεντρική Βάση Δεδομένων (ΚΒΔ) τα συγγράμματά του, μέσω της <a href="register.php" style="color: rgb(121, 187, 255);">εφαρμογής Εκδοτών.</a></p><br>

        <h6><a href="" style="color: rgb(121, 187, 255);">Αναλυτικές οδηγίες για την επιλογή των σημείων διανομής και την αντιστοίχισή τους με τα επιλεγμένα συγγράμματα</a></h6><br>

        <h6><a href="" style="color: rgb(121, 187, 255);">Όροι και Προϋποθέσεις Συμμετοχής στο Πρόγραμμα Εύδοξος</a></h6>



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


    <div class="footer">
      <ul>
        <li><a href=""> Επικοινωνία </a></li>
        <li><a href=""> FAQ </a></li>
      </ul>
    </div>

 </div>
</body>
</html>
