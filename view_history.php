<!DOCTYPE html>
<?php
    session_start();
    $check = false;
    $mysqlp = new mysqli('localhost','root','root','bankAccoint');
    $user = $_SESSION['user_in_db'];
    $query = ("SELECT * FROM statements WHERE user='$user'");
    $result = $mysqlp->query($query);
    while($row=$result->fetch_assoc()){
        echo "item: ".$row['item'].", Cost: ".$row['cost'].", Location: ".$row['location'];
        echo "<br/>";
    }
?>
<html>
    <form action='bank_history.php'>
        <input type='submit' value='Exit'>
    </form>
</html>