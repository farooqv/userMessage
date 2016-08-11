<?php
namespace postmessage\app;
require_once '../../vendor/autoload.php';
$userMessage = new UserMessage();	
$message = $userMessage->getMessage();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Post Message</title>
	<meta name="description" content="Room Registration Form">
	<!-- CSS local and CDN links-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="row">
        <div class='col-md-6 col-md-offset-3'>
			<div class="page-header">
			  <h2>Post Message</h2>
			</div>		
		</div>       
    </div>
    <div class="row">
        <div class='col-md-6 col-md-offset-3'>
			<form  role="form" id="userMessage" method="post">					
				<div class="form-group col-sm-8">
					
					<textarea name="message" id="message" maxlength="400" type="text" placeholder="Type Message"class="form-control" rows="3"></textarea>							
				</div>							
				<div class="form-group col-sm-8">
					<button type="submit" id="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
				</div>				
			</form>
        </div>		
		<div class='col-md-6 col-md-offset-3'>
		<h2>Posted Messages</h2>
			<table id="showresults" class="table table-striped">
				<?php 				
				foreach ($message as $value) {
					echo "<tr><td>";
					echo $value['message'];
					echo "</td></tr>";					
				}
				?>				
			</table>			
		</div> 
    </div>
</div><!-- End of container -->
<!-- JS CDN  and local links -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment.min.js"></script>   
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.validate.min.js"></script>
<script src="assets/js/custom.js"></script>
</body>
</html>