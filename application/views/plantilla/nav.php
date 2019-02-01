	<title>SAC ADM</title>
</head>
<body class="welcome white-fore text-center">

	<nav class="navbar navbar-fixed-top navbar-custom">
		<div class="container-fluid">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo base_url();?>index.php/adm">SAC</a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
				<ul class="nav navbar-nav">
					<li><a href="<?php echo base_url();?>index.php/adm/lista">List</a></li>
					<li><a href="<?php echo base_url();?>index.php/adm/buscar">Search</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					<li>
						<a href="<?php echo base_url();?>index.php/access/exit">
						Logout <i class="glyphicon glyphicon-log-out"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<hr><hr>