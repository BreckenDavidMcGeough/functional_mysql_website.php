<!DOCTYPE html>
<?php
    #get locations from database
	session_start();
    $locations = $_SESSION['location_array'];
    $name = $_SESSION['user_in_db'];
    $mysql = new mysqli('localhost','root','root','new_database');
    $result = $mysql->query("SELECT * FROM users WHERE Username='$name'");
    while($row=$result->fetch_array()){
        echo "[".$row['stored_passwords1'].", ".$row['stored_locations1']."]: ";
        echo "<br/>";
    }
    $result2 = $mysql->query("SELECT * FROM users WHERE Username='$name'");
    while($row=$result2->fetch_array()){
        echo "[".$row['stored_passwords2'].", ".$row['stored_locations2']."]: ";
        echo "<br/>";
    }
    $result3 = $mysql->query("SELECT * FROM users WHERE Username='$name'");
    while($row=$result3->fetch_array()){
        echo "[".$row['stored_passwords3'].", ".$row['stored_locations3']."]: ";
        echo "<br/>";
    }
    $result4 = $mysql->query("SELECT * FROM users WHERE Username='$name'");
    while($row=$result4->fetch_array()){
        echo "[".$row['stored_passwords4'].", ".$row['stored_locations4']."]: ";
        echo "<br/>";
    }
    $result5 = $mysql->query("SELECT * FROM users WHERE Username='$name'");
    while($row=$result5->fetch_array()){
        echo "[".$row['stored_passwords5'].", ".$row['stored_locations5']."]";
        echo "<br/>";
    }

?>
<html>
	<link rel="stylesheet" type="text/css" href="veiw_style.css">
	<body>
		<form method='post' action='homepage_index.php'>
			<input type='submit' name='exit' value='Exit'>
		</form>
	</body>
</html>