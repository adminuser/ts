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

<div class="container ">
	<div style="min-height: 400px;">
		<!-- <?php echo $content;?> -->

		<div class="row ">
			<h1 align="center" class="panel panel-info">Discussion Forum</h1>


			<div class="col-sm-3 " style="min-height: 400px;border-right: 1px;">	
				<div class="panel panel-info">
					<div class="panel-heading">
					</div>
					<div class="panel-body">
						Browse by category
						<hr>
						<?php $skillMap = getSKillMap();
						foreach($skillMap as $key=>$value){?>
						<ul>
							<li><a href="<?php echo base_url('forum/viewpostbyskill').'/';?><?php echo $key;?>" class="skill-filter" data-skill="<?php echo $key;?>"><?php echo $value;?></a></li>
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

/*	 		$(".skill-filter").click(function(){
	 			var sid = $(this).data("skill"); 
	 			alert(sid);
	 			$.post("<?php echo base_url();?>forum/viewpostbyskill",
	 					{'sid':sid},
		 				function(data){
		 					alert(data);
							$("#ts-management-contents").html(data);
		 			});
	 		});
*/
 	 		 			
    $(document).ready(function() {
        $( "#startdate" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#enddate" ).datepicker({dateFormat: "yy-mm-dd"});
        $( "#releasedate" ).datepicker({dateFormat: "yy-mm-dd"});
    });	 			 		
	 	
	 </script>

	 <!-- custom script - end -->

</body>
</html>                                		