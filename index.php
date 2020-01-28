<?php include 'connection.php'; ?>
<?php 

$query = "select * from shouts Order by id desc";
$results = mysqli_query($conn,$query)
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>ShoutIt</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="container">
		<header>
			<h1>SHOUTIT! Shoutbox</h1>
		</header>
		<div id="shouts">
			<ul>
				<?php while ($row = mysqli_fetch_assoc($results)): ?>
					<li class="shout"><span><?php echo $row['time'];?>-</span> <strong><?php echo $row['user']; ?>:</strong> <?php echo $row['message']; ?></li>
				<?php endwhile; ?>
				
			</ul>
		</div>
		<div id="input">
			<?php if (isset($_GET['error'])): ?>
				<div class="error">
					<?php echo $_GET['error']; ?>
				</div>
			<?php endif; ?>
			<form action="process.php" method="POST">
			<input type="text" name="user" placeholder="Enter your name">
			<input type="text" name="message" placeholder="Enter your message">
			<br>			
			<input class="shout-btn" type="submit" name="submit" value="Shout It Out!">
			</form>
		</div>
	</div>

</body>
</html>