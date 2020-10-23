<?php

include("Connection.php");

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$dob = $_POST['date'];
$gender = $_POST['gender'];

// lokasi awal foto
$f_temp = $_FILES['photo']['tmp_name'];
$f_name = $_FILES['photo']['name'];
// lokasi tujuan
$f_folder = "abc/";

$s = move_uploaded_file($f_temp, $f_folder.$f_name);

// BLOB file untuk foto yg asli
$query = "insert into user values (NULL, '$name', '$email', '$password', '$gender', '$dob', '$f_name')";
mysqli_query($conn, $query);

header('Location: LoginPage.php');