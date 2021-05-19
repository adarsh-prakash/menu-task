<?php 

	require 'db.php';
	$sql='SELECT * FROM emp';

	$state=$conn->prepare($sql);
	$state->execute();

	$emp =$state->fetchAll(PDO::FETCH_OBJ);


  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>Index</title>
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>
  <body>
  	<div>
  	<button class="btn-success"><a href="create.php">CREATE</a></button>
  </div>
  <br>

  <table class="striped table" >
  	<tr>
  		<th>id</th>
  		<th>name</th>
  		<th>email</th>
  		<th>action</th>
  	</tr>
  	<?php foreach($emp as $data):?>

  	<tr>
  		<td><?= $data->id; ?></td>
  		<td><?= $data->name; ?></td>
  		<td><?= $data->email; ?></td>
  		<td>
  			<button class="btn-info"><a href="update.php?id=<?= $data->id?>">UPDATE</a> </button> &nbsp;
  			<button class="btn-danger"><a onclick="return confirm('are you sure want to delete this entry.')" href="delete.php?id=<?= $data->id?>">DELETE</a></button>

  		</td>

  	</tr>
<?php endforeach; ?>
  </table>
  </body>
  </html>
  
  