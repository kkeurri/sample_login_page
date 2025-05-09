<?php
$serverName = "localhost";
$connectionOptions = array(
    "Database" => "LoginDB",
    "UID" => "Claire",                 
    "PWD" => "Claire1504"
);

$conn = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}


if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO Users (Username, Password) VALUES (?, ?)";
    $params = array($username, $hashedPassword);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt === false) {
        echo "Error registering user.<br>";
        die(print_r(sqlsrv_errors(), true));
    } else {
        echo "User registered successfully!";
    }

    sqlsrv_close($conn);
} else {
    echo "Username and password required.";
}
?>
