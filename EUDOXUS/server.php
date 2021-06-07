<?php
    session_start();
    $username = " ";
    $password_1 = " ";
    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'uni');

    // if the register button is clicked
    if (isset($_POST['register'])){
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password_1 = mysqli_real_escape_string($db,$_POST['password_1']);
      $password_2 = mysqli_real_escape_string($db,$_POST['password_2']);


        $sql = "INSERT INTO users (username,password) VALUES ('$username', '$password_1')";
        mysqli_query($db,$sql);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        if (isset($_POST['register'])){
          header('location: userchanges.php');
        }
      //  header('location: index.php'); //redirect to homepage


    }

    // LOGIN
    if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password_1']);
  $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    	$results = mysqli_query($db, $query);
    	if (mysqli_num_rows($results) == 1) {
    	  $_SESSION['username'] = $username;
    	  $_SESSION['success'] = "Ειστε συνδεδεμενος!";
    	  header('location: index.php');
        echo "You are loged in";
    	}else {
    		echo "Wrong username/password combination";
    	}
    }

    // Logout
    if (isset($GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header('location:login.php');
    }

    // if the register button is clicked
    if (isset($_POST['selectschool'])){
      $school = mysqli_real_escape_string($db,$_POST['selectschool']);
      //echo $school;
      $_SESSION['school'] = $school;
    }

    // if the register button is clicked
    if (isset($_POST['selectdepartment'])){
      $department = mysqli_real_escape_string($db,$_POST['selectdepartment']);
      //echo $department;
      $_SESSION['department'] = $department;
      $department =" " ;
      $course =" " ;
      $semester = " ";
    }

    // if the register button is clicked
    if (isset($_POST['selectcourse'])){
      $course = mysqli_real_escape_string($db,$_POST['selectcourse']);
      //echo $course;
      $_SESSION['course'] = $course;
      $course =" " ;
      $semester = " ";

    }

    // if the register button is clicked
    if (isset($_POST['selectsemester'])){
      $semester = mysqli_real_escape_string($db,$_POST['selectsemester']);
      //echo $semester;
      $_SESSION['semester'] = $semester;
      $semester = " ";
    }
    //$school = $_SESSION['school'];
    //$department = $_SESSION['department'];
    //$course = $_SESSION ['course'];
    //$semester = $_SESSION ['semester'];


 ?>
