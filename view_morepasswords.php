<!DOCTYPE html>
<?php
    session_start();
    $mysql = new mysqli("localhost",'root','root','password_db');
    $user = $_SESSION['user_in_db'];
    $query = ("SELECT * FROM passwords WHERE user='$user'");
    $result = $mysql->query($query);
    while($row=$result->fetch_assoc()){
        echo "password: ".$row['password']." || location: ".$row['location'];
        echo "<br/>";
    }
?>
<html>
    <form action='store_morepasswords.php'>
        <button>Exit</button>
    </form>
</html>