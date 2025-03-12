<?php  include('header.php');
       include('dbconn.php');
       //add header
?>

<?php
if(isset($_GET['id'])){
    $id =$_GET['id'];

     
    $query = "SELECT * FROM `students` where id ='$id' ";
   // SELECT * FROM `students` WHERE id = 1;

    $result = mysqli_query($connect, $query);

    if(!$result){
      die("query Failed".mysqli_error());
    }
    else{
      //$row = mysqli_fetch_row($result);
      $row = mysqli_fetch_assoc($result);

     print_r($row);
       
  }
}

?>

<?php 
 if(isset($_POST['update_student'])){

    if(isset($_GET['id_new'])){
       $idnew = $_GET['id_new'];
    }
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];
    
    //print $idnew;
    //$query = "UPDATE `students` SET 'first_name' = '$fname', 'last_name' = '$lname', 'age' = '$age' WHERE 'students'.'id' = '$idnew'";
    $query = "UPDATE `students` SET `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' WHERE `students`.`id` = $idnew";
    //UPDATE `students` SET `first_name` = 'phanuphon', `last_name` = 'phasuchaisakul', `age` = '50' WHERE `students`.`id` = 1;

    $result = mysqli_query($connect, $query);

    if(!$result){
      die("query Failed". mysqli_error($result));
    }

    else {
        header('location:index.php?update_msg=you have update success');
    }

 }

?>

<form action="update_page.php?id_new=<?php echo $id ?>" method="post">
          <div class="form-group">
            <label for="f_name">First Name</label>
            <input type="text" name="f_name" class="form-control" value="<?php echo $row['first_name']; ?>"> 
          </div>

          <div class="form-group">
            <label for="l_name">Last Name</label>
            <input type="text" name="l_name" class="form-control" value="<?php echo $row['last_name']; ?>"> 
          </div>

          <div class="form-group">
            <label for="age">Age</label>
            <input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>"> 
          </div>
          
          <input type="submit" class="btn btn-success" name="update_student" value="Update">
</form>










<?php  include('footer.php'); ?>


