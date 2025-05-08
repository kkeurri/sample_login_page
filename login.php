<?php
$serverName = "localhost";  // Or your SQL Server instance name
$connectionOptions = array(
    "Database" => "LoginDB",
    "Uid" => "localhost",
    "PWD" => "Claire1504"
);
 
$conn = sqlsrv_connect($serverName, $connectionOptions);
 
if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}
 
$username = $_POST['username'];
$password = $_POST['password'];
 
$sql = "SELECT * FROM Users WHERE Username = ? AND Password = ?";
$params = array($username, $password);
 
$stmt = sqlsrv_query($conn, $sql, $params);
 
if ($stmt && sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "Login successful!";
} else {
    echo "Invalid credentials.";
}
 
sqlsrv_close($conn);
?>