<?PHP
	session_start();
	// Create connection to Oracle
	$conn = oci_connect("SYSTEM", "NPhollyu", "//LOCALHOST/XE");
	if (!$conn) {
		$m = oci_error();
		echo $m['message'], "\n";
		exit;
	} 
?>
Login form
<hr>

<?PHP
$label = "w68hp";
	if(isset($_POST['submit'])) {
		$captcha = trim($_POST['captcha']);
		if(strcmp($captcha, $label) == 0)
		{
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$query = "SELECT * FROM LOGIN WHERE username='$username' and password='$password'";
		$parseRequest = oci_parse($conn, $query);
		oci_execute($parseRequest);
		// Fetch each row in an associative array
		$row = oci_fetch_array($parseRequest, OCI_RETURN_NULLS+OCI_ASSOC);
		if($row){
			$_SESSION['ID'] = $row['ID'];
			$_SESSION['NAME'] = $row['NAME'];
			$_SESSION['SURNAME'] = $row['SURNAME'];
			$_SESSION['PASSWORD'] = $row['PASSWORD'];
			echo '<script>window.location = "MemberPage.php";</script>';
		}else{
			echo "Login fail.";
		}
		}
	};
	oci_close($conn);
?>

<form action='login_.php' method='post'>
	<p>Username <br>
	<input name='username' type='input'><br>
	Password<br>
	<input name='password' type='password'><br>
    <br>
	<img src="input-black.gif" width="127" height="44"></p>
	<p>
	  <input name='captcha' type='input'>
	  <br>
	  
	  
	  <input name='submit' type='submit' value='Login'>
  </p>
</form>
