<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Comments</title>

	<script src="js/jquery.js"></script>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/vendor/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
 

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light   bg-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Envert™</a>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>

        </div>
    </div>
</nav>

<section>
	<div class="container">
		<div class="row margin-top-25">
			<div class="col-md-6 ">
						<img src="img/1.png">					
			</div>
			<div class="col-md-6">	
				<h1>Description</h1>
<br>In warm climates the ECO 8 can provide hot water for one shower and a sink simultaneously. Use the EcoSmart sizing guide to find out if this model is ideal for you.</br>

<br>IInstant, consistent and endless hot water</br>
<br>The most advanced, self-modulating technology available, meaning the ECO 8 will adjust how much energy needs to be input based on how much hot water is needed</br>
<br>Digital temperature control in 1-degree increments allows control of hot water</br>
<br>Heating elements are durable and are threaded for easy replacement</br>
<br>Compact size saves valuable storage space</br>
				</div>				
			</div>
		</div>
	</div>
		<div class="container">
		<div class="row margin-top-25">
			<div class="col-md-6 ">
			 <h3>Price:<?php include ('price.php');?>"UAH"</h3>
			</div>
		</div>
	</div>	
</section>


	<div class="container">
	 <p>&nbsp;</p>
	 <div class="comment_listing"></div>
	 <h1>Post yor comment below</h1>
	 <div class="col-md-12">
		<input type="text" class="name form-control" placeholder="Name"><br>
		<input type="text" class="email form-control" placeholder="Email"><br>
		<textarea class="comment form-control"></textarea>
		<p>&nbsp;</p>
		<a href="javascript:void(0)" class="btn btn-secondary submit">Submit</a>
	</div>
	<div class="clearfix"></div>
 </div>
</body>		 
</html>

<script type="text/javascript">
	$(function(){
	setInterval(function(){
		$.ajax({
			url:'comment_list.php',
			success:function(res){
				$('.comment_listing').html(res);

			}
		})
},5000);
$('.submit').click(function(){
	var name = $('.name').val();
	var email = $('.email').val();
	var comment = $('.comment').val();
	$.ajax({
		url:'save_comment.php',
		data:'name='+name+'&email='+email+'&comment='+comment,
		type:'post',
		success:function()
		{
			alert('Your comment has been posted successfuly!')
		}
	})
  })
})
</script>



