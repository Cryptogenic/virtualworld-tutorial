<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>My Virtual World // <?php echo $page; ?></title>
    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <link rel="shortcut icon" href="img/ico/favicon.png">
  </head>

  <body>
	<div class="container">
		<div class="row">
			<div class=".col-lg-12">
				<div class="custom-site-header">
					<img src="img/header.png" class="img-responsive" alt="Header" />
				</div>
			</div>
		</div>

        <div class="row">
			<div class=".col-lg-12">
				<nav class="navbar navbar-default" style="margin-bottom: 0px; border-radius: 0px;">
				  <div class="container">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					  </button>
					  <a class="navbar-brand" href="#"><img alt="" src="..."></a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">

					  <?php
					  	// We want to determine which list item we should set the "active" class on.
					  	// We'll do that by switching on the page parameter

					  	$playActive = "";
					  	$blogActive = "";
					  	$rulesActive = "";
					  	$membershipActive = "";
					  	$supportActive = "";
					  	$registerActive = "";

					  	$activeHTML = "class=\"active\"";

					  	switch($page)
					  	{
					  		case "play":
					  			$playActive = $activeHTML;
					  			break;

					  		case "blog":
					  			$blogActive = $activeHTML;
					  			break;

					  		case "rules":
					  			$rulesActive = $activeHTML;
					  			break;

					  		case "membership":
					  			$membershipActive = $activeHTML;
					  			break;

					  		case "support":
					  			$supportActive = $activeHTML;
					  			break;

					  		case "register":
					  			$registerActive = $activeHTML;
					  			break;
					  	}
					  ?>

					  <ul class="nav navbar-nav">
						<li <?php echo $playActive; ?>><a href="index.php">Play</a></li>
						<li <?php echo $blogActive; ?>><a href="blog.php">Blog</a></li>
						<li <?php echo $rulesActive; ?>><a href="rules.php">Rules</a></li>
						<li <?php echo $membershipActive; ?>><a href="membership.php">Membership</a></li>
						<li <?php echo $supportActive; ?>><a href="ticket.php">Support</a></li>
					  </ul>
					  <ul class="nav navbar-nav navbar-right">
						<li <?php echo $registerActive;?>><a href="register.php">Register</a></li>
					  </ul>
					</div><!--/.nav-collapse -->
				  </div>
				</nav>
			</div>
		</div>
		
		<div class="row">
			<div class=".col-lg-12">