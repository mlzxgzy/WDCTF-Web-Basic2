<?php
require "config.php";

$mysqli = new mysqli("localhost", $dbuser,$dbpass, $db);

if ($mysqli->connect_errno) {
 printf("Connect failed: %s\n", $mysqli->connect_error);
 exit();
}

if (isset($_POST['name']) && (isset($_POST['pass'])))
{
	$name = $_POST['name'];
    $pass = $_POST['pass'];

    $query = "SELECT password FROM users WHERE username='$name'";
	$result = $mysqli->query($query);

    if($result)
    {
	    $row = $result->fetch_array(MYSQLI_ASSOC);
	    var_dump($row);
	    if ($row['password'] === md5($pass))
	    {
		    echo "login success";
	    }else{
            echo "login failed";
        }
    }

	$result->free();
	$mysqli->close();
}else{
	show_source(__FILE__);
}
?>
