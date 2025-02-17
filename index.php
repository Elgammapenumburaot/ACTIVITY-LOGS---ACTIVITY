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
	<title>Homepage</title>
	<link rel="stylesheet" href="index.css">
</head>
<body>
	<?php include 'navbar.php'; ?>
	<div class="searchForm">
		<form action="index.php" method="GET">
			<p>
				<input type="text" name="searchQuery" placeholder="Search here">
				<input type="submit" name="searchBtn" value="Search">
				<h3><a href="index.php">Search Again</a></h3>	
			</p>
		</form>
	</div>

	<?php  
	if (isset($_SESSION['message']) && isset($_SESSION['status'])) {

		if ($_SESSION['status'] == "200") {
			echo "<h1 style='color: green;'>{$_SESSION['message']}</h1>";
		}

		else {
			echo "<h1 style='color: red;'>{$_SESSION['message']}</h1>";	
		}

	}
	unset($_SESSION['message']);
	unset($_SESSION['status']);
	?>

	<div class="tableClass">
		<table style="width: 100%;" cellpadding="20"> 
			<tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Years of Experience</th>
                <th>Specialization</th>
                <th>Favorite Ward</th>
				<th>Date Added</th>
				<th>Added By</th>
				<th>Last Updated</th>
				<th>Last Updated By</th>
				<th>Action</th>
			</tr>
			<?php if (!isset($_GET['searchBtn'])) { ?>
				<?php $getAllApplicants = getAllApplicants($pdo); ?>
				<?php foreach ($getAllApplicants as $row) { ?>
				<tr>
					<td><?php echo $row['first_name']; ?></td>
					<td><?php echo $row['last_name']; ?></td>
					<td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['years_of_experience']; ?></td>
                    <td><?php echo $row['specialization']; ?></td>
                    <td><?php echo $row['favorite_ward']; ?></td>
					<td><?php echo $row['date_added']; ?></td>
					<td><?php echo $row['added_by']; ?></td>
					<td><?php echo $row['last_updated']; ?></td>
					<td><?php echo $row['last_updated_by']; ?></td>
					<td>
						<a href="editApplicant.php?applicants_id=<?php echo $row['applicants_id']; ?>">Update</a>
						<a href="deleteApplicant.php?applicants_id=<?php echo $row['applicants_id']; ?>">Delete</a>
					</td>
				</tr>
				<?php } ?>
			<?php } else { ?>
				<?php $getAllApplicantsBySearch = getAllApplicantsBySearch($pdo, $_GET['searchQuery']); ?>
				<?php foreach ($getAllApplicantsBySearch as $row) { ?>
				<tr>
                    <td><?php echo $row['first_name']; ?></td>
					<td><?php echo $row['last_name']; ?></td>
					<td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['years_of_experience']; ?></td>
                    <td><?php echo $row['specialization']; ?></td>
                    <td><?php echo $row['favorite_ward']; ?></td>
					<td><?php echo $row['date_added']; ?></td>
					<td><?php echo $row['added_by']; ?></td>
					<td><?php echo $row['last_updated']; ?></td>
					<td><?php echo $row['last_updated_by']; ?></td>
					<td>
						<a href="editApplicant.php?applicants_id=<?php echo $row['applicants_id']; ?>">Update</a>
						<a href="deleteApplicant.php?applicants_id=<?php echo $row['applicants_id']; ?>">Delete</a>
					</td>
				</tr>
				<?php } ?>
			<?php } ?>
		</table>
	</div>
	
</body>
</html>