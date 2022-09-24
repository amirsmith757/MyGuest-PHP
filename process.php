<?php
// Add Guest
if(isset($_POST['addguest'])) {

//echo $_POST['firstname'].'<br>';
//echo $_POST['lastname'].'<br>';
//echo $_POST['email'].'<br>';

include 'leagueme.php';

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('{$_POST['firstname']}', '{$_POST['lastname']}', '{$_POST['email']}')";




if (mysqli_query($conn, $sql)) {

header("Location: index.php?message=addguest");

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);


}

// Delete a Guest

if(isset($_POST['deleteguest'])) {
// add the code to delete from the database

include 'leagueme.php';

$sql = "DELETE FROM MyGuests WHERE id='{$_POST['id']}'";




if (mysqli_query($conn, $sql)) {
  header("Location: index.php?message=deleteguest");
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
}

?>


