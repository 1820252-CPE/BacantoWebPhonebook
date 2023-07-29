<?php
// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'id21003525_dominique';
$DATABASE_PASS = 'CDominique_826';
$DATABASE_NAME = 'id21003525_credentials';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data was submitted, isset() function will check if the data exists.
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// Could not get the data that should have been sent.
	exit('Please complete the registration form!');
}
// Make sure the submitted registration values are not empty.
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty.
	exit('Please complete the registration form');
}
// We need to check if the account with that username exists.
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	 header('Location: evalid.html'); 
    exit(); 
}
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
     header('Location: uvalid.html'); 
    exit(); 
    
}
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
   header('Location: pass.html'); 
    exit(); 
}

if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	// Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		// Username already exists
		header('Location: uexist.html');
	} else {
		// Username doesn't exists, insert new account
 if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email, activation_code) VALUES (?, ?, ?, ?)')) {
	// We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $uniqid = uniqid();
    $stmt->bind_param('ssss', $_POST['username'], $password, $_POST['email'], $uniqid);	$stmt->execute();
    header('Location: login.html');
} else {
	// Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
	}
	$stmt->close();
} else {
	// Something is wrong with the SQL statement, so you must check to make sure your accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>