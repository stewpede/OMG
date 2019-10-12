<?php include ('server.php'); ?>
<?php if(isset($_SESSION['username'])) {
header('location: ../bmpm/menu/home.php');
 }?>

<!DOCTYPE html>
<html lang="en" >

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>TRICY-RATE REPORTS</title>

  	<link rel="stylesheet" type="text/css" href="../bmpm/css/style.css">
    <!-- MetisMenu CSS -->
    <link href="../bmpm/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="../bmpm/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
</head>

<body style="background-color: #C0C0C0">
	<form  method="post">
	  	<h2>LOGIN YOUR ACCOUNT</h2>
  		<?php include ('errors.php'); ?>
		<p>
			<label class="floatLabel"  >Username</label>
			<input  name="username" type="text" onkeyup="lettersOnly(this)" required>
		</p>
		<p>
			<label  class="floatLabel">Password</label>
			<input  name="password" type="password" required>
		</p>
		<p>
			<input type="submit" name="login" value="LOGIN">
		</p>
	</form>
	<div align="center" id="footer" style=""><h3>Copyright © 2019 OMG. All rights reserved.</h3></div>

</body>
<script>
function lettersOnly(input) {
	var regex = /[^a-z,_,0-9,@,., ,-]/gi;
	input.value = input.value.replace(regex,"");
}
</script>
</html>
