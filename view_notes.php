<!DOCTYPE html>
<?php
    session_start();
    $mysql = new mysqli('localhost','root','root','notes');
    $user = $_SESSION['user_in_db'];
    $query = ("SELECT * FROM info WHERE username='$user'");
    $result = $mysql->query($query);
    while($row=$result->fetch_assoc()){
        echo "Note: [".$row['note']."] Class: [".$row['class']."] Date: [".$row['date']."] || "."\n";
        echo "<br/>";
    }
?>
<html>
    <body>
        <form action='add_notes.php'>
            <input type='submit' value='Exit'>
        </form>
    </body>
</html>