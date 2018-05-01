<!DOCTYPE html>
<?php
	session_start();
    function check_isset($username,$password){
        if(!empty($username) && !empty($password)){
            return true;
        }else{
            return false;
        }
    }
	$mysqli = new mysqli("localhost","root","root","new_database");
    if(!$mysqli){
        echo 'error';
    }
    if(isset($_POST['thisbutton'])){
        if(check_isset($_POST['username'],$_POST['password']) == true){
            $username = $_POST['username'];
            $_SESSION['user_in_db'] = $_POST['username'];
            $password = md5($_POST['password']);
            $result2 = $mysqli->query("SELECT Password FROM users WHERE Username='$username'");
            while($row=$result2->fetch_array()){
                if($password == $row['Password'] && $result2->num_rows > 0){
                    $checkpass = $row['Password'];
                    $check = true;
                    header("Location: homepage_index.php");
                }else{
                    echo 'Incorrect username/password';
                    $check = false;
                }
            }
        }else{
            echo 'Type in a username/password';
        }
    }
?>
<html>
    <link rel="stylesheet" type="text/css" href="index_style.css">
	<body>
		<form method='post' class='form1' name='inputform'>
            Email:<input id='username' type='text' name='username' id='username'><br/>
            Password:<input id='password' type='text' name='password' id='password'><br/>
            <button name='thisbutton'>Sign in</button><br/>  
		</form>
		<a href='sign_up_index.php'>Sign up</a> or 
        <a href='forgot_pword.php'>Forgot Password</a><br/>
        <a href = 'mendon_homepage.php'>Mendon Soccer Website Prototype</a><br/>
        <script type='text/javascript'>
            var phpUser = { 
                Pass : "<?php echo $checkpass; ?>",
                User : document.getElementsById("username").value;
            };
            var functions = {
                Creator : false,
                PHPcheck : "<?php echo $check; ?>",
                getUsername : function(){
                    var username = document.getElementById("username");
                    if(username.length > 0){
                        return username;
                    }
                },
                getPassword : function(){
                    var password = document.getElementById("password");
                    if(password.length > 0){
                        return password;
                    }
                },
                checkInfo : function(){
                    if(this.PHPcheck == true){
                        if(this.getUsername() == 'brecken' && this.getPassword() == 'brecken99'){
                            while(phpUser.Pass == this.getPassword() && phpUser.User == this.getUsername()){
                                this.Creator = true;
                                var checktwo = true;
                                if(this.Creator == true){
                                    break;
                                }
                            }
                        }
                    }else{
                        alert("Incorrect Username/Password");
                    }
                }
            }
            var button = document.querySelector("button");
            button.addEventListener("click",function(){
               if(functions.checkInfo().checktwo == true){
                   alert("Welcome back Brecken");
               }else{
                   alert("Welcome back")
               }
            });
        </script>
	</body>
</html>