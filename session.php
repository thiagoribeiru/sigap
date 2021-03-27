<?
if (!isset($_SESSION)) {
	session_start();
}
if (!isset($_SESSION['UsuarioID']) or $_SESSION['UsuarioID']=="" or !is_int($_SESSION['UsuarioID'])) header("Location: login.php");
?>