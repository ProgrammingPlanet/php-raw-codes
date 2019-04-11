<?php

$db = new PDO('mysql:host=localhost;dbname=pdo','root','');

/*insert in simple way*/

$q = "SELECT * FROM user";

$obj = $db->query($q);

$obj->setFetchMode(PDO::FETCH_ASSOC);  //optional line for filter.for numeric array, FETCH_NUM

//$row = $obj->fetch();	//for first row

$rows = $obj->fetchAll();	//for all rows in 2D array

echo '<pre>';

//print_r($rows);

/* print fetched data */

if (count($rows)) {							//count($rows) give us number of rows
 	foreach ($rows as $row) {
 		echo $row['name'].'<br>';
 	}
 } 
else{
	echo 'No record Found';
}

echo '</pre>';

/* ------------------------------------------------------ */

/* prepared statement */

/*
1)	key value pair */

$q = "INSERT INTO user(name,email) VALUES (:placeholder1,:placeholder2)";
$statement = $db->prepare($q);

$statement->execute([':placeholder1'=>'aaa',':placeholder2'=>'aaa@gmail.com']); //keys are same as $q, order not matter

/*
2)	direct array */

$q = "INSERT INTO user(name,email) VALUES (?,?)";
$statement = $db->prepare($q);

$statement->execute(['bbb','bbb@gmail.com']);	//order do matter
?>



<!-- print actual data table by old method -->

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mysql PDO</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body><br><br><br>
	<div class="container">
		<h1 class="text-center">Data for Mysql PDO</h1><br>
		<table class="table table-hover table-sm table-info table-striped">
			
			<thead class="bg-warning">
				<tr>
					<th>id</th>
					<th>Name</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>
				<tr class="bg-info"><td></td><td></td><td></td></tr>
				<?php
				$con = mysqli_connect('localhost','root','','pdo');
				$r = mysqli_query($con,"SELECT * FROM user");
				while ($row = mysqli_fetch_array($r)) {
					echo "<tr>
						<td>".$row['id']."</td>
						<td>".$row['name']."</td>
						<td>".$row['email']."</td>
					</tr>";
				}
				?>
			</tbody>
		</table>
	</div>
</body>
</html>
