<?php
include("Connection.php");

$email = $_POST['input_email'];
$password = $_POST['input_password'];

$query = "select id, name from user where email = '$email' and password = '$password'";
$result = mysqli_query($conn, $query);

if(mysqli_num_rows($result) > 0){
  session_start();
  while($row = mysqli_fetch_assoc($result)){
    $id = $row['id'];
    $name = $row['name'];
  }
  $_SESSION['ID'] = $id;
  $_SESSION['NAME'] = $name;
  header('Location: MainPage.php');
}else{
  header('Location: LoginPage.php');
}