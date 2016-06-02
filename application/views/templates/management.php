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
<?php $user_typre_filtervalue='';//default value?>
<body id="mainBody">
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation" >
	<?php include APPPATH.'/views/templates/header.php';?>
</nav>

<div class="container">
	<div style="min-height: 400px;">
		<!-- <?php echo $content;?> -->

		

		<div class="row">

		<?php if($userInfo['user_type'] == 'superadmin'){?>
		<!-- Admin start -->
			<h1 align="center">TS Management</h1>
			<hr>
			<div class="col-sm-3" style="min-height: 400px;">
				
				<div class="panel panel-info">
					<div class="panel-heading">
					</div>
					<div class="panel-body">
					<!-- Users -->
						User Management
						<ul>				
							<li><a href="<?php echo base_url();?>allcandidates" id="users-candidates">Candidates</a></li>  
							<li><a href="<?php echo base_url();?>alltrainers" id="users-trainers">Trainers</a></li>	
							<li><a href="">Resume Writers</a></li>						
							<li><a href="<?php echo base_url();?>user/add">Add User</a></li>
							<li><a href="">View All Users</a></li>
						</ul>
						<hr>

					<!-- Users end -->
					
					<!-- Skills -->
						Skill Management
						<ul>
							<li><a href="<?php echo base_url();?>skill/viewall" id="skills-viewall">View All Skills</a></li>
							<li><a href="<?php echo base_url();?>skill/add" id="skills-add">Add Skill</a></li>
						</ul>
						<hr>
					<!-- Skills end -->					
						
					<!-- Batch -->
						Training Management
						<ul>
							<li><a href="<?php echo base_url();?>batch/viewall" id="batch-viewall">View All Batch</a></li>
							<li><a href="<?php echo base_url();?>batch/add" id="batch-add">Add Batch</a></li>	
							<li><a href="<?php echo base_url();?>batch/allocate" id="batch-allocate">Allocation</a></li>					
						</ul>
						<hr>					
					<!-- Batch end -->	

					<!-- Forum -->	
						Forum Management
						<ul>
						 <li><a href="<?php echo base_url();?>fourm/approvalwaitlist">Approval Waitlist</a></li> 
						 <li><a href="<?php echo base_url();?>fourm/replycount">Trainer's Reply Count</a></li> 
						</ul>
					<!-- Forum -->								

					</div>
				</div>				
			</div>
			<!-- Admin end -->
			<?php } ?>

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
	 /*	
	 $(document).ready(function(){
	 	filterUserRecords(){
	 		var user_type = <?php echo $user_typre_filtervalue; ?>;
	 		var existing_visatype = $("#existing_visatype").val();
	 		var primary_skillid = $("#primary_skillid").val();
	 		var country = $("#country").val();
	 		$.post("<?php echo base_url();?>user/alltrainers",
	 				{'user_type':user_type,'existing_visatype':existing_visatype,'primary_skillid':primary_skillid,'country':country,'filter':'filter'},
	 				function(data){
	 				//alert(data);
	 				$("#ts-management-contents").html(data);
	 		});	 		
	 	}
	 });
	 */	

	 </script>

	 <!-- custom script - end -->

</body>
</html>                                		