<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?php echo $title;?></title>
 <link href="<?php echo base_url('css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url('css/bootstrap-theme.min.css');?>" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url('jquery-ui/jquery-ui.css');?>" rel="stylesheet" type="text/css" />
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
		<div class="row">
		<?php $userid = $userInfo['userid']; ?>
	
			<h1 align="center">My Dashboard</h1>
			<hr>
			<div class="col-sm-3" style="min-height: 400px;">
				
				<div class="panel panel-info">
					<div class="panel-heading">
					</div>
					<div class="panel-body">
					<?php if($userInfo['user_type'] == 'candidate'){?>
						<ul>
							<li><a href="<?php echo base_url('profile');?>">My Profile</a></li>	
							<?php if($userInfo['is_profilecomplete'] == 1){?>
							<li><a href="#">Skill Syllabus</a></li>
							<li><a href="<?php echo base_url('batch');?>">Batch Selection</a></li>
							<li><a href="#">My Stage</a></li>
							<li><a href="<?php echo base_url('resume');?>">Resume </a></li>
							<?php }?>
						</ul>
					<?php ?>
					<?php }elseif($userInfo['user_type'] == 'trainer'){?>
						<ul>
							<li><a href="<?php echo base_url('profile');?>">My Profile</a></li>
							<?php if($userInfo['is_profilecomplete'] == 1){?>
							<li><a href="<?php echo base_url('batch');?>">Batch</a></li>
							<li><a href="#">Candidates</a></li>
							<?php }?>
						</ul>
					<?php ?>
					<?php }elseif($userInfo['user_type'] == 'resumewriter'){?>
						<ul>
							<li><a href="<?php echo base_url('candidateresumes');?>">Candidate resumes</a></li>
						</ul>
					<?php }?>					
					</div>
				</div>				
			</div>		
			<div class="col-sm-9" class="jumbotron" >
				<div id="ts-management-contents" >
					<?php echo $content;?>					
				</div>
			</div>
		</div>
	</div>
	<hr>

	<div class="row">
		<?php include APPPATH.'/views/templates/footer.php';?>	
	</div>
</div>

	 <script src="<?php echo base_url('js/jquery.min.js');?>"></script>
	 <script src="<?php echo base_url('js/bootstrap.min.js');?>"></script>
	 <script src="<?php echo base_url('jquery-ui/jquery-ui.min.js');?>"></script>
	 <?php echo $_scripts;?>
	 

	 <!-- custom script - start -->
	 <script type="text/javascript">

	 		$("#users-candidates").click(function(){
	 			$.post("<?php echo base_url();?>user/allcandidates",
	 					{'user_type':'candidate'},
	 					function(data){
	 						//alert(data);
	 						$("#ts-management-contents").html(data);
	 					});
	 			});

	 		$("#users-trainers").click(function(){
	 			$.post("<?php echo base_url();?>user/alltrainers",
	 					{'user_type':'trainer'},
	 					function(data){
	 						//alert(data);
	 						$("#ts-management-contents").html(data);
	 					});
	 			});
	 			
    $(document).ready(function() {
        $( "#startdate" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#enddate" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#releasedate" ).datepicker({dateFormat: "yy-mm-dd"});
    });	 			 		
	 	
	 </script>

	 <!-- custom script - end -->

</body>
</html>                                		