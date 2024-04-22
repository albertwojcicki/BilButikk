<?php
include_once ("db.connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $env = parse_ini_file('.env');
    $ENVUSER = $env["USERNAME"];
    $ENVPASS = $env["PASSWORD"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $checkGuidQuery = "SELECT guid FROM cockie";
    $cookie_name = "guid";
    if ($username == "$ENVUSER" and $password == "$ENVPASS") {
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn->query($checkGuidQuery);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $guid = $row['guid'];
            }
        } else {
            echo "Internal Error.\nContact System Administrator. ";
        }
        $cookie_value = "$guid";
        setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/"); // 86400 = 1 day
        header("Location: admin.php");
    } else {
        echo "feil brukernavn eller passord";
        setcookie($cookie_name, 0, time() + (86400 * 7), "/"); // 86400 = 1 day
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="#" method="POST">
        <input type="text" name="username" autofocus>
        <input type="password" name="password">
        <input type="submit">
    </form>
</body>

</html>