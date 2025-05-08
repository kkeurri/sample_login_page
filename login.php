<?php
$serverName = "localhost";
$connectionOptions = array(
    "Database" => "LoginDB",
    //"Uid" => "localhost",
    "PWD" => "Claire1504"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);
 
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
 
$sql = "INSERT INTO Users (Username, Password) VALUES (?, ?)";
$params = array($username, $hashedPassword);
$stmt = sqlsrv_query($conn, $sql, $params);
 
if ($stmt) {
    echo "User registered successfully!";
} else {
    echo "Error registering user.";
}
 
sqlsrv_close($conn);
?>
