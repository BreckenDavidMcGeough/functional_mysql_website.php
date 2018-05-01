<!DOCTYPE html>
<?php
    session_start();
    $mysqli = new mysqli('localhost','root','root','twitter');
    $query = ("SELECT * FROM tweets");
    $request = $mysqli->query($query);
    while($row=$request->fetch_assoc()){
        echo "user-".$row['username']." says: '".$row['tweet']."' (".$row['timeTweeted'].")";
        echo "<br/>";
    }
    $tweet = $_POST['tweet'];
    $user = $_SESSION['user_in_db'];
    $time = time();
    if(isset($_POST['submit_tweet'])){
        while(strlen($tweet)>0){
            $tweet_e = $mysqli->escape_string($tweet);
            $result = ("INSERT INTO tweets(username,tweet,timeTweeted) VALUES ('$user','$tweet_e','$time')");
            $mysqli->query($result);
            $tweet = "";
        }
    }
?>
<html>
    <form method='post'>
        Write a tweet: <input type='text' name='tweet'><br/>
        <input type='submit' value='submit(press twice to confirm tweet)' name='submit_tweet'>
    </form>
    <form method='post'>
        Search for a user: <input type='text' name='search'><br/>
    </form>
    <form action='view_my_tweets.php'>
        <input type='submit' value='View my tweets'><br/>
    </form>
    <form action='homepage_index.php'>
        <input type='submit' value='Exit'>
    </form>
</html>