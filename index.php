<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Guests</title>
 <!-- Latest compiled and minified CSS -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
</head>
<body>
  
<div class="container">
  <div class="row">
    <div class="col-md-12"></div>
    <h1>My Guests</h1>

    <?php
   if(isset($_GET['message'])) {

      if($_GET['message'] == 'addguest') {
   echo '<div class="alert alert-success">
     <strong>Success!</strong> Guest Added.
   </div>';
   }

   if($_GET['message'] == 'deleteguest') {
    echo '<div class="alert alert-danger">
      <strong>Success!</strong> Guest Deleted.
    </div>';
    }

  }


  
    ?>

    <form action="process.php" method="POST">
      First Name: <input type="firstname" name="firstname" required><br>
      Last Name: <input type="lastname" name="lastname" required><br>
      Email: <input type="email" name="email"><br>
      <button type="submit" class="btn btn-warning" name="addguest" required>Add Guest</button>
    </form>

<br><br>
<table class="table table-striped">
  <tr>
    <th>ID</th>
    <th>First</th>
    <th>Last</th>
    <th>Email</th>
    <th>Reg Date</th>
    <th>Delete</th>

  <tr>
<?php

include 'leagueme.php';

$sql = "SELECT * FROM `MyGuests`";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   ?>

<tr>
  <td><?=$row['id']?></td>
  <td><?=$row['firstname']?></td>
  <td><?=$row['lastname']?></td>
  <td><?=$row['email']?></td>
  <td><?=$row['reg_date']?></td>
  <td>
    <form action="process.php" method="POST">
      <input type="hidden" name="id" value="<?=$row['id']?>">
      <button type="submit" class="btn btn-danger btn-xs" name="deleteguest">X</button>
    </form>
  </td>
</tr>


<?php
    


  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?> 
</table>

</div>
</div>
</div>
</body>
</html>  