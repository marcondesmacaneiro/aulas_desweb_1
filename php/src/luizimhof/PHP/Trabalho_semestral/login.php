

<?php
session_start();
include 'conexao.php';
	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];
		chckusername($username, $password);
	}
	function chckusername($username, $password){
		include 'conexao.php';
		$check = "SELECT * FROM usuario WHERE login='$username'";
		$check_q = mysqli_query($conn,$check) or die("<div class='loginmsg'>Username inexistente<div>");
		if (mysqli_num_rows($check_q) == 1) {
			chcklogin($username, $password);
		}
		else{
			echo "<div id='loginmsg'>Login incorreto</div>";
		}
	}
	function chcklogin($username, $password){
        include 'conexao.php';
		$login = "SELECT * FROM usuario WHERE login='$username'  and senha='$password'";
		$login_q = mysqli_query($conn,$login) or die('Usuário ou senha incorretos');
		if (mysqli_num_rows($login_q) == 1){
			echo "<div id='loginmsg'> Logado com $username </div>"; 
			$_SESSION['username'] = $username;
			header('Location: seguro.php');
		}
		else {
			echo "<div id='loginmsg'>Senha errada</div>"; 
		}
	}
?>