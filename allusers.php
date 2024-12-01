<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<link rel="stylesheet" href="allusers.css">
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>All Users</title>
</head>
<body>
	<?php include 'navbar.php'; ?>
	<h2>All Users</h2>
	<ul>
		<?php $getAllUsers = getAllUsers($pdo);?>
		<?php foreach ($getAllUsers as $row) { ?>
			<li><?php echo $row['username']; ?></li>
		<?php } ?>
	</ul>
</body>
</html>