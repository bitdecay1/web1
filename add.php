<?php
require 'connection.php';
if (!empty($_POST)){
	$title = $_POST['title'];
	$description = $_POST['description'];

	// Due to the potential of SQLi, variables $title and $descritpion is not directly put inside VALUES query
	$sql = "INSERT INTO web1(title,description) VALUES (:title,:description)";
	// prepare
	// we can call $pdo because of requrie 'connection.php'
	$pdostatement = $pdo->prepare($sql);
	// execute
	$result = $pdostatement->execute(
		//send tilte and description to database
		array(
			':title' => $title,
			':description' => $description
		)
	);
	if($result){
		echo "<script>alert('New record is added.');window.location.href='index.php';</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Record</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>

	<div class="card">
		<div class="card-body">
			<h2>Create New Record </h2>
			<form action="add.php" class="" method="post">
				<div class="form-group">
					<label for=""> Title </label>
					<input type="text" class="form-control" name="title" value="" required>
				</div>

				<div class="form-group">
					<label for=""> Description </label>
					<textarea name="description" class="form-control" rows="8" cols="80"></textarea>
				</div>

				<!-- submit or go back-->
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="SUBMIT">
					<a type="button" href="index.php" class="btn btn-warning" name=""> Back </a>
				</div>

			</form>
	
</body>
</html>
