<?php
    session_start();
    // connect to the database
    $db = mysqli_connect('localhost', 'root', '', 'uni');
    mysqli_set_charset($db,"utf8");

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
    }

    // if the register button is clicked
    if (isset($_POST['selectcourse'])){
      $course = mysqli_real_escape_string($db,$_POST['selectcourse']);
      //echo $course;
      $_SESSION['course'] = $course;
    }

    // if the register button is clicked
    if (isset($_POST['selectsemester'])){
      $semester = mysqli_real_escape_string($db,$_POST['selectsemester']);
      //echo $semester;
      $_SESSION['semester'] = $semester;
    }
    //$school = $_SESSION['school'];
    //$department = $_SESSION['department'];
    //$course = $_SESSION ['course'];
    //$semester = $_SESSION ['semester'];

?>
