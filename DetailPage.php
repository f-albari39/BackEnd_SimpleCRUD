<?php
include('Connection.php');
$id = $_GET['id'];

$query = "select * from user where id = $id";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
  $name = $row['name'];
  $email = $row['email'];
  $gender = $row['gender'];
  $dob = $row['dob'];
  $photo = $row['photo'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>View Detail</title>
</head>
<body>
  <?php 
  echo "<img src='img/$photo' alt='' width='200px' height ='200px'>";
  ?>
  <table>
    <tr>
      <td></td>
    </tr>
  </table>
</body>
</html>