<div style="min-height: 400px;" >
	<?php if(isset($error)){echo $error;}?>

	<?php if($resumeInfo->resume_orgname != null){
		//print_r($resumeInfo);
		 $download_path = base_url().'uploads/resumes/'.$resumeInfo->resume_orgname;
	?>
	
	<div class="row col-xs-offset-4 " style="padding-top: 100px;padding-right: 300px;">
		<div class="row">
		Click here to download resume : <a href="<?php echo $download_path;?>" class="btn btn-primary"> <?php echo $resumeInfo->resume_orgname; ?></a>
		</div>

	<div>
<!--
	<div>
		<div>
		Click here to delete resume	
		<?php echo form_open_multipart('resumedelete');?>
		<input type="submit" value="Delete Resume" />
		<?php echo form_close(); ?>
		</div>		
	</div>
-->
	<?php }else{?>
	<hr>
	<?php echo form_open_multipart('resumeupload');?>
	<div class="row">
		<input type="file" name="resume" size="20" />
		<br /><br />
		<input type="submit" value="Upload Resume" class="btn btn-info" />
		</form>
	</div>

</div>

<?php
	}
?>
