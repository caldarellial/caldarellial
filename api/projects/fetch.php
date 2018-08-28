<?php
// Create connection
$conn = new mysqli(AC_SERVERNAME, AC_USERNAME, AC_PASSWORD, AC_DBNAME);
// Check connection
if ($conn->connect_error) {
    Errored("0002",("Connection failed: " . $conn->connect_error));
}

$projects = getObjectInfo("project",0,false);

Success($projects)
?>