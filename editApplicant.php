<?php  
require_once 'core/models.php'; 
require_once 'core/handleForms.php'; 

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Update Applicant</title>
	<link rel="stylesheet" href="editApplicant.css">
</head>
<body>
	<?php include 'navbar.php'; ?>

	<?php $getApplicantByID = getApplicantByID($pdo, $_GET['applicants_id']); ?>
	<form action="core/handleForms.php?applicants_id=<?php echo $_GET['applicants_id']; ?>" method="POST">
		<p>
			<label for="first_name">First Name</label>
			<input type="text" name="first_name" value="<?php echo $getApplicantByID['first_name']; ?>"></p>
		<p>
			<label for="last">Last Name</label>
			<input type="text" name="last_name" value="<?php echo $getApplicantByID['last_name']; ?>">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $getApplicantByID['email']; ?>">
		</p>
		<p>
			<label for="years_of_experience">Years of Experience</label>
			<input type="number" name="years_of_experience" value="<?php echo $getApplicantByID['years_of_experience']; ?>">
		</p>
		<p>
			<label for="specialization">Specialization</label>
			<input type="text" name="specialization" value="<?php echo $getApplicantByID['specialization']; ?>">
		</p>
		<p>
			<label for="favorite_ward">Favorite Ward</label>
			<input type="text" name="favorite_ward" value="<?php echo $getApplicantByID['favorite_ward']; ?>">
		</p>
			<input type="submit" name="updateApplicantBtn" value="Update">
		</p>
	</form>
</body>
</html>

