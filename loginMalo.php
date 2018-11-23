<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php 
echo "<h2>LOGIN</h2>";
echo "<form action='loginMalo.php' method='POST' >";
echo "Usuario<br>";
echo "<input type='text' name='nom'><br>";
echo "password<br>";
echo "<input type='password' name='password'><br>";
echo "<input type='submit' value='Enviar' name='submit'><br>";
echo "</form>";
$nombre=$_POST["nom"];
$pass=$_POST["password"];

$conn = mysqli_connect('localhost','marcos','marcos123');
mysqli_select_db($conn, 'login');
$consulta = "SELECT * FROM USERS WHERE USER='$nombre' and PASSWD=SHA2('$pass',512) ;";
$resultat = mysqli_query($conn, $consulta);
$registre = mysqli_fetch_assoc($resultat);
if ($registre!=null) {
	echo $registre["USER"]." el usuario existe"; 
}else{
	echo "El Usuario no existe";
}

?>
</body>
</html>