<?PHP
	session_start();
	if(empty($_SESSION['ID']) || empty($_SESSION['NAME']) || empty($_SESSION['SURNAME'])){
		echo '<script>window.location = "Login_.php";</script>';
	}
?>
Member page
<hr>
<?PHP
	echo "ID : ".$_SESSION['ID']."<br>";
	echo "NAME : ".$_SESSION['NAME']."<br>";
	echo "SURNAME : ".$_SESSION['SURNAME']."<br>";
	echo "<a href='Logout.php'>Logout</a>";
?>
<?PHP
	if(isset($_POST['ChangePassword'])){
		echo '<script>window.location = "changePass.php";</script>';
		
		}

?>

<form action='MemberPage.php' method='post'>
  <p>&nbsp;</p>
  <p>
    <input type="submit" name="ChangePassword" value="ChangePassword" />
    
    
  </p>
  
	
</form>