<?php
include 'dbconn.php';

if(isset($_POST['add_students'])){
  //echo "Yes pass";
  //add new code

  $fname = $_POST['f_name'];
  $lname = $_POST['l_name'];
  $age = $_POST['age'];

  if($fname == "" || empty($fname)){

    header('location:index.php?message=you need to fill in the first name');
  }
  else{
    $query = "INSERT INTO `students` (`first_name`, `last_name`, `age`) VALUES ('$fname', '$lname', '$age')";

    $result = mysqli_query($connect, $query);

    if(!$result){
        die("Query Fsil".mysqli_error());

    } else {
       header('location:index.php?insert_msg=Youdata has been added successfull');

    }

  }

}

?>