<?php
include('Connection.php');
session_start();

$id = $_SESSION['ID'];
$name = $_SESSION['NAME'];
if($name == ""){
  echo "<script>";
  echo "alert('You have to Login first!');";
  echo "window.location.replace('Login.php');";
  echo "</script>";
}

$query = "select photo from user where id = $id";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result)){
  $photo = $row['photo'];
}

$query = "select * from user where id != $id";
$result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Main Page</title>
  <style>
    .memberTable, th{
      border: 1px solid black;
    }
    .memberTable td{
      border: 1px solid black;
    }
  </style>
</head>
<body>
  <div style="display: inline-block; vertical-align: top">
    <?php
      echo "<img src='img/$photo' alt='noImageHere' width='100px' height='100px'>";
    ?>
  </div>
  <div style="display: inline-block;">
    <table>
      <tr>
        <?php
          echo "<td>";
          echo "Welcome, $name";
          echo "</td>";
        ?>
      </tr>
      <tr>
        <td><a href="EditProfilePage.php">Edit Profile</a></td>
      </tr>
      <tr>
        <td><a href="Logout.php">Logout</a></td>
      </tr>
    </table>
  </div>
  <h1>Member List</h1>
  <table class="memberTable">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Gender</th>
      <th>Photo</th>
      <th>Action</th>
    </tr>
    <?php
      while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        $v_name = $row['name'];
        $v_email= $row['email'];
        $v_gender= $row['gender'];
        $v_photo= $row['photo'];
        $v_id= $row['id'];
        echo "<td>$v_name</td>";
        echo "<td>$v_email</td>";
        echo "<td>$v_gender</td>";
        echo "<td><img src='img/$v_photo' alt='noImageHere' width='100px' height='100px'></td>";
        echo "<td><a href='DetailPage.php?id=$v_id'>View Detail</a>";
        echo "</tr>";
      }
    ?>
  </table>
</body>
</html>