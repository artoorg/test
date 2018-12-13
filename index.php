<!DOCTYPE html>
<html>
	<head>	
	<title>CRUD</title>
		<script src="js/jquery.js"></script>
		<link rel="stylesheet" href="css/vendor/bootstrap.min.css">
		<script src="js/bootstrap.min.js"></script> 
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light   bg-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Envert™</a>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                
                <li class="nav-item">
                    <a class="nav-link" href="register.php"> </a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<?require_once'process.php';
?>
<?php
	 
	 if (isset($_SESSION['message'])): ?>

	 <div class="alert alert-<?=$_SESSION['msg_type']?>">
	
		<?php
		        echo $_SESSION['message'];
	 			unset($_SESSION['message']);
		?>

	 </div>
	<?php endif ?>
	 <div class="container">
	<?php
		$mysqli = new mysqli("localhost","mybd_user","123","php_specials");
		$result = $mysqli->query("SELECT * FROM comments") or die($mysqli-error);
		//pre_r($result);
	?>

	<div class="row justify-content-center">
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Comment</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
		<?php
			while ($row = $result->fetch_assoc()): ?>
				<tr>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['comment']; ?></td>
					<td>
						<a href="index.php?edit=<?php echo $row['id']; ?>"
							class= "btn btn-info">Edit</a>
						<a href="process.php?delete=<?php echo $row['id']; ?>"
							class= "btn btn-danger">Delete</a>	
					</td>					
				</tr>
			<?php endwhile; ?>
	</table>

	 
	 	<div class="container">
			<div class="row5">
				<div class="col-md-8 ">
	 <form action="process.php" method="POST">
		<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control"
			   value="<?php echo $name;?>" placeholder="Enter name"> 
	    </div>
		<div class="form-group">
		<label>Comment</label>
		<input type="text" name="comment" class="form-control" 
				value="<?php echo $comment;?>" placeholder="Enter comment"><br>
	    </div>
	    <div class="form-grpup">
		<?php
		if ($update == true):
		?>	
			<button type="submit" class="btn btn-info" name="update">Update</button>
		<?php else: ?>
		    <button type="submit" class="btn btn-primary" name="save">Save</button>
		 <?php endif; ?>
		</div>

<?php include('server.php'); ?>	
		<div class="content">
			<?php if (isset($_SESSION['success'])): ?>
				<div class="error success">
					<h3>
						<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>
			
			<?php if (isset($_SESSION["username"])): ?>
				<p>Welcome,<strong><?php echo $_SESSION['username']; ?></strong></p>
				<p><a href="comment.php?logout='1'" style="color:red;">logout</a></p>
			<?php endif ?>
		</div>


	</form>
	</div>
	</div>
</div>
</div>
</body>		 


