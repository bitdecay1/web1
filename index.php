<?php
require 'connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


</head>
<body>
	<?php

		// start with prepare() to write data to database
		$pdostatement = $pdo->prepare("SELECT * FROM web1 ORDER BY id DESC");
		$pdostatement->execute();

		// fetch submited data from database
		$result = $pdostatement->fetchAll();
	?>
	<div class="card">
		<div class="card-body">
			<h2> Web1 Home Page </h2>
			<a href="add.php" type="button" class="btn btn-success"> Create New</a> <br>
			<table class="table table-striped">
				<thead>
					<tr>
						<th> ID </th>
						<th> Title </th>
						<th> Description </th>
						<th> Created </th>
						<th> Actions </th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					if($result) {
						foreach ($result as $value) {
					
					?>
					
					<tr>
						<td> <?php echo $i ?> </td>
						<td> <?php echo $value['title'] ?></td>
						<td> <?php echo $value['description'] ?></td>
						<!-- Display time in Y-m-d format only -->
						<td> <?php echo date('Y-m-d',strtotime($value['created_at'])) ?> </td>
						<td>
							<!-- add php to create unique identifier so that you know what # record you are editing -->
							<a href="edit.php?id=<?php echo $value['id'];?>" type="button" class="btn btn-warning"> Edit </a>
							<a href="delete.php?id=<?php echo $value['id'];?>" type="button" class="btn btn-danger"> Delete </a>
						</td>
					</tr>
					<?php
					$i++;
						}
					}
					?>

				</tbody>
			</table>
		</div>
	</div>
</body>
</html>