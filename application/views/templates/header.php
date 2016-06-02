<?php 
if(get_session_data('is_authenticated')){$userInfo = get_session_data('userinfo');}
?>
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="container pull-left">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand fixed-top" href="<?php echo base_url();?>" target="_self"></a> 
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="navbarCollapse" id="headerDivTab">
			<ul class="nav navbar-nav pull-left">
				<li class="active"><a href="<?php echo base_url();?>" target="_self">Home</a></li>				
				<li onclick="activateCurrentTab();"><a href="#" target="_self">About</a></li>				
				<li><a href="#" target="_self">Contact </a></li>			
				<li><a href="<?php echo base_url('forum');?>" target="_self">Discussion Forum</a></li>
			</ul>
			<ul class="nav navbar-nav pull-right" >
			<?php if(!get_session_data('is_authenticated')){?>
				<li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Sign Up <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo base_url('account/candidatepresignup');?>">Candidate </a></li>
                           <!-- <li><a href="<?php echo base_url('account/trainerpresignup');?>">Trainer</a></li> -->
                        </ul>
                </li>
            <?php }else{?>
            	<li></li>
            <?php }?>
            <?php if(!get_session_data('is_authenticated')){?>
				<li><a href="<?php echo base_url('account/login');?>" target="_self">Log In</a></li>
			<?php }else{?>
				<li class="dropdown" >
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <?php echo $userInfo['username'];  ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">                 
							<li><a href="<?php echo base_url('dashboard');?>">My Dashboard</a></li>	
						<?php if($userInfo['user_type'] != 'superadmin'){?>												
                            <li><a href="<?php echo base_url('profile');?>">Edit Profile </a></li>
                        <?php }?>
                            <li><a href="<?php echo base_url('account/logout');?>" target="_self">Log Out</a></li>
                        </ul>
                </li>			
			<?php }?>
			</ul>
		</div>
	</div>
