<?php
include "koneksi.php";

session_start();

?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN</title>
</head>
<body>

<form method="post" action="login.php">
	<pre>
		UserName : <input type="text" name="username">
		Password : <input type="password" name="pass">
		<input type="submit" name="submit" value="LOGIN">
	</pre>
</form>
<?php
if(isset($_POST['submit'])){
	$usr  = $_POST['username'];
	$pswd = $_POST['pass'];

	$sql = "SELECT * FROM users WHERE username='$usr' AND password='$pswd'";
	$result = mysqli_query($conn, $sql);

	if($result->num_rows > 0)
	{
		$data = mysqli_fetch_array($result);
		$_SESSION['username'] = $data['username'];
		header('location:index.php');
	}else{
		echo "Maaf user/password anda salah";
	}
}

?>
</body>
</html>