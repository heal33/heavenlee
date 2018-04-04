<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link   href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.min.js"></script>
</head>

<body>
   
		              <?php 
					   include 'database.php';
					   $pdo = Database::connect();
					   $sql = 'SELECT * FROM customers ORDER BY id DESC';
	 				   foreach ($pdo->query($sql) as $row) {
						   		echo '<div>';
							   	echo '<p>'. $row['name'] . $row[name] . '</p>';
							   	echo '<p>'. $row['email'] . '</p>';
							   	echo '<p>'. $row['mobile'] . '</p>';
							   	echo '<p>';
							   	echo '<a class="btn" href="read.php?id='.$row['id'].'">Read</a>';
							   	echo ' ';
							   	echo '<a class="btn btn-success" href="update.php?id='.$row['id'].'">Update</a>';
							   	echo ' ';
							   	echo '<a class="btn btn-danger" href="delete.php?id='.$row['id'].'">Delete</a>';
							   	echo '</p>';
							   	echo '</div>';
					   }
					   Database::disconnect();
					  ?>
gjhgjgsdfsdfsksfhsdjfhskjfhskjfhskhfks hskdjfhskfh skfskhfskj fks fjshh
  </body>
</html>
