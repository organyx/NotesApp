<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	    <meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />

		<title>NotesApp</title>

		<link rel="stylesheet" type="text/css" href="/application/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="/application/assets/css/jumbotron-narrow.css" />

		<script src="/application/assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	</head>
	<body>
		<div class="container">
		  <div class="header clearfix">
		        <div id="panel">
			        <div>
			        	<ul class="nav nav-pills pull-right">
			        		<?php if(!isset($_SESSION['Username'])) {?>
					        <li>
			        			<a href="/login/">Login</a>
			        		</li>
			        		<li><a href="/register/">Register</a></li> 
			        		<?php } else {?>
			        		<li>
				        		<a href="/main/"><?php echo escape($_SESSION['Username'])?></a>
				        	</li>
			        		<li>
			        			<a href="/main/logout/">Logout</a>
			        		</li>
			        		<?php }?>
			        	</ul>
			        </div>
		        </div>
		    </div>
		  
		  <div class="Content">
		  <?php include 'application/views/'.$content_view; ?>
		  </div>

		  <div class="footer"></div>
		</div>
	</body>
</html>