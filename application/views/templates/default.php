<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $title;?></title>
 <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('css/bootstrap-theme.min.css');?>" rel="stylesheet" type="text/css" />
 <?php echo $_styles;?>
 <style type="text/css">
    #mainBody{
    	padding-top: 70px;
    }

</style>
</head>
<body id="mainBody">
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation" >
	<?php include APPPATH.'/views/templates/header.php';?>
</nav>
<div class="container">
	<div style="min-height: 400px;">
		<?php echo $content;?>
	</div>
	<hr>
	<div class="row">
		<?php include APPPATH.'/views/templates/footer.php';?>	
	</div>
</div>
	 <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
	 <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
	 <?php echo $_scripts;?>
</body>
</html>                                		