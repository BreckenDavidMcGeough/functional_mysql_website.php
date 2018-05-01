<!DOCTYPE html>
<?php
    session_start();
    $mysql = new mysqli('localhost','root','root','twitter');
    $name = $_SESSION['user_in_db'];
    $query = ("SELECT * FROM tweets WHERE username='$name'");
    $result = $mysql->query($query);
    while($row=$result->fetch_assoc()){
        echo "You said: '".$row['tweet']."': At: ".$row['timeTweeted'];
        echo "<br/>";
    }
?>
<html>
    <form action='twitter_clone.php'>
        <input type='submit' name='exit' value='Exit'>
    </form>
</html>