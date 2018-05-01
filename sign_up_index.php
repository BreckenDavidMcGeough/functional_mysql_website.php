<!DOCTYPE html>
<?php
	$mysqli = new mysqli("localhost","root","root","new_database");
	if(isset($_POST['button_two'])){
		if(!empty($_POST['usernamelog']) && !empty($_POST['passwordlog']) && $_POST['retype']== $_POST['passwordlog']){
			$username = $mysqli->escape_string($_POST['usernamelog']);
			$password = md5($_POST['passwordlog']);
			$result2 = $mysqli->query("SELECT * FROM users WHERE Username='$username'");
			if($result2->num_rows == 0){
				$result = ("INSERT INTO users(Username,Password) VALUES ('$username','$password')");
				$mysqli->query($result);
				header("Location: index.php");
			}else{
				echo 'Type in a valid username/password';
			}
		}
	}
?>
<link rel="stylesheet" type="text/css" href="sign_up_style.css">
<html>
	<body>
		<form method='post'>
			New Username:
			<input type='text' name='usernamelog' id='username'><br/>
			New Password:
			<input type='text' name='passwordlog' id='password'><br/>
            Retype Password:
            <input type='text' name='retype' id='retype'><br/>
            Email(Optional):
            <input type='text' name='email'><br/>
           <button name='button_two'>Submit</button>
		</form>
        <form method='post' action='index.php'>
            <input type='submit' name='exit' value='Exit'>
        </form>
        <script type='text/javascript'>
            var button = document.querySelector('button');
            button.addEventListener("click",function(){
                var username = document.getElementById('username').value;
                var password = document.getElementById("password").value;
                var retype = document.getElementById('retype').value
                if(username.length==0 || password.length == 0){
                    alert("Please type in a username/password");
                }else{
                    if(retype.length==0){
                        alert("Please retype your password");
                    }else{
                        if(retype != password){
                            alert("Password doesn't match retyped version");
                        }else{
                            alert("Thank you for signing up");
                        }
                    }
                }   
            });
        </script>
    </body>
</html>