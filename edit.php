<?php
require 'connection.php';

if ($_POST) {
	$title = $_POST['title'];
	$description = $_POST['description'];
	// The unique identifier 
	$id = $_POST['id'];

	// Update the record
	// Here we are directly adding '$title' into title becuase we are not concerned for SQLi
	$pdostatement = $pdo->prepare("UPDATE web1 SET title='$title',description='$description' WHERE id='$id'");
	$result = $pdostatement->execute();

	if($result){
		echo "<script>alert('New record is updated.');window.location.href='index.php';</script>";
	}
} else{
	// id is in GET method because we only accessing the unique identifier ?id= from index.php
	$pdostatement = $pdo->prepare("SELECT * FROM web1 WHERE id=".$_GET['id']);
	$pdostatement->execute();
	$result = $pdostatement->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<body>

	<div class="card">
		<div class="card-body">
			<h2>Edit Record </h2>
			<form action="" class="" method="post">

				<!-- The unique identifier -->
				<input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
				<div class="form-group">
					<label for=""> Title </label>

					<!-- To understand why $result is in array, see 
						<print"<pre>";
						print_r($result);

						or

						print_r($result[0]['id']);
					-->
					<input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>" required>
				</div>

				<div class="form-group">
					<label for=""> Description </label>
					<textarea name="description" class="form-control" rows="8" cols="80"> 
						<?php echo $result[0]['description'] ?>
							
					</textarea>
				</div>

				<!-- Update or go back-->
				<div class="form-group">
					<input type="submit" class="btn btn-primary" name="" value="Update">
					<a type="button" href="index.php" class="btn btn-warning" name=""> Back </a>
				</div>

			</form>
	
</body>
</html>
