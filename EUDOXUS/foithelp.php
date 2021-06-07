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
        <strong><p><h6 style="text-decoration: underline;"> Περίοδος Δηλώσεων Συγγραμμάτων </h6></p><br>
        <p>Ο φοιτητής εισέρχεται στην εφαρμογή φοιτητών του Ευδόξου όπου και γίνεται η πιστοποίηση - εξουσιοδότησή του με όνομα χρήστη και κωδικό πρόσβασης, τα οποία έχει λάβει από το οικείο του Τμήμα. Αφού <a href="login.php" style="color: rgb(121, 187, 255);">συνδεθεί</a>, μπορεί : </p><br>
        <p>- να δει όλα τα μαθήματα/θεματικές ενότητες του προγράμματος σπουδών του Τμήματός του και τα αντίστοιχα προτεινόμενα συγγράμματα/σειρές συγγραμμάτων</p><br>
        <p>- να κάνει προεπισκόπηση του εξώφυλλου, του οπισθόφυλλου, του πίνακα περιεχομένων και ενός ενδεικτικού αποσπάσματος από κάθε σύγγραμμα</p><br>
        <p>- να ενημερωθεί άμεσα για την τρέχουσα διαθεσιμότητα κάθε συγγράμματος καθώς και για τα σημεία παράδοσης στην πόλη του</p><br>
        <p>- να ενημερωθεί άμεσα για την τρέχουσα διαθεσιμότητα κάθε συγγράμματος καθώς και για τα σημεία παράδοσης στην πόλη του</p><br>
        <p>- να επιλέξει συγγράμματα/σειρές συγγραμμάτων για τα μαθήματα/θεματικές ενότητες στα οποία έχει εγγραφεί κατά το τρέχον εξάμηνο</p><br>
        <p>- να βρει τη διεύθυνση του Σημείου Διανομής</p><br>

        <p>Κατόπιν, ο φοιτητής καταχωρίζει τον αριθμό του κινητού του τηλεφώνου και το email του και λαμβάνει άμεσα από τον Εύδοξο ένα μήνυμα με τον κωδικό ΡΙΝ, με τον οποίο μπορεί να παραλαμβάνει τα επιλεγμένα συγγράμματα από τα σημεία διανομής των αντίστοιχων εκδοτών.</p><br>

        <h6><a href="" style="color: rgb(121, 187, 255);">Όροι και Προϋποθέσεις συμμετοχής φοιτητών στο πρόγραμμα "Εύδοξος"</a></h6><br>

        <h6><a href="" style="color: rgb(121, 187, 255);">Οδηγίες για τη διαδικασία επιλογής συγγραμμάτων από τους φοιτητές</a></h6>



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
