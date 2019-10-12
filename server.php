<?php 
	session_start();
	$errors = array();
	$alert = 'danger';
	$page = "";
	$db = mysqli_connect('localhost', 'root', '', 'ucdb');
	
	if(isset($_POST['login'])) {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($db, $query);
			if(mysqli_num_rows($result) == 1 && $row = mysqli_fetch_array($result)) {
				$_SESSION['username'] = $username;
				header('location: ../bmpm/menu/home.php');
			} else {
				$alert = 'danger';
				array_push($errors, "Incorrect username or password.");
			}
			unset($_SESSION['alert']);
	}

	if(isset($_POST['logout'])) {
		unset($_SESSION['username']);
		session_destroy();
		header('location: ../bmpm/index.php');
	}

	if(isset($_POST['home'])) {
		header('location: ../menu/home.php');
	}	

	/* VIEW PENDING ---> */
	if(isset($_POST['view_pending'])) {
		header('location: ../menu/pending_reports.php');
	}

	/* <--- VIEW PENDING */

	/* UNVERIFY REPORTS ----> */
	if(isset($_POST['unverify_view'])) {
		header('location: ../menu/unverified_reports.php');
	}
	
	/* <----UNVERIFY REPORTS*/

	/* VERIFIED REPORTS ---> */
	if(isset($_POST['verified_view'])) {
		header('location: ../menu/verified_reports.php');
	}
	if(isset($_GET['unverify_id'])) {
		$id = $_GET['unverify_id'];
		$query_get = "UPDATE reports SET verification = 'UNVERIFY', date_time = NOW() WHERE id = $id";
		$result_get = mysqli_query($db,$query_get);
	} 
	if(isset($_GET['verify_id'])) {
		$id = $_GET['verify_id'];
		$query_get = "UPDATE reports SET verification = 'VERIFIED', date_time = NOW() WHERE id = $id";
		$result_get = mysqli_query($db,$query_get);
	} 
	
	 /* <--- VERIFIED REPORTS */

	/* LIST OF DRIVERS --->*/
	if(isset($_POST['list_drivers']) || isset($_POST['cancel_entry'])) {
		header('location: ../menu/list_drivers.php');
	}
	/*<--- LIST OF DRIVERS */

                                                  

 ?>