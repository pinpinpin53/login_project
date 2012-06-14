<?php

$host = "localhost";
$db_username = "steve";
$db_password = "password1";
$db_name = "web_users";
$table = "users";

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST ['email'];
$username = $_POST['username'];
$password = $_POST['password'];

$dbc = mysqli_connect($host,$db_username,$db_password,$db_name)or die("Error connecting to MySQL server." . mysqli_connect_error());
$query = "INSERT into " . $table . "(first_name,last_name,email,username,password) VALUES ('$firstname','$lastname','$email','$username','$password')";

$result = mysqli_query($dbc, $query) or die("Error querying database." . mysqli_error());

mysqli_close($dbc);

header('Location:../index.html');