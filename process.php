<?php
@session_start ();

	$mysqli = new mysqli("localhost","mybd_user","123","php_specials") or die(mysqli_error($mysqli));

	$update = false;
	$name = '';
	$comment = '';


if (isset($_POST['save'])){
	$name = $_POST['name'];
	$comment = $_POST['comment'];

	$mysqli->query("INSERT INTO comments (name,comment) VALUES('$name','$comment')") or die($mysqli->error());
			

	$_SESSION['message'] = "record has been saved!";
	$_SESSION['msg_type'] = "success";

	header("location: index.php");
}

if (isset($_GET['delete'])){
	$id = $_GET['delete'];
	$mysqli->query("DELETE FROM comments WHERE id=$id") or die($mysqli->error());

	$_SESSION['message'] = "record has been deleted!";
	$_SESSION['msg_type'] = "danger";

	header("location: index.php");
}

if (isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM comments WHERE id=$id") or die($mysqli->error());
	if (count($result)==1){
		$row = $result->fetсh_array();
		$name = $row['name'];
		$comment = $row['comment'];
    }
}

if (isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$comment = $_POST['comment'];

	$mysqli->query("UPDATE comment SET name='$name', comment='$comment' WHERE id=$id") or
			die($mysqli->error);

	$_SESSION['message'] = "record has been update!";
	$_SESSION['msg_type'] = "warning";

	header("location: index.php");

}