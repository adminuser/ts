
<div class="container">
  <h3>Candidates resumes </h3>
  <p>Candidates and their respective resume links:</p>            
  <table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Resume Link</th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($allResumeInfo as $resumeInfo) { ?>
      <tr>
        <td><?php echo $resumeInfo->firstname; ?></td>
        <td><?php echo $resumeInfo->lastname; ?></td>
        <td>
        	<?php if($resumeInfo->resume_orgname != null){ 
 				  $download_path = base_url().'uploads/resumes/'.$resumeInfo->resume_orgname;       		   
        	?>
        	<a href="<?php echo $download_path;?>"><?php echo $resumeInfo->resume_orgname;?></a>
        	<?php }else{?>
        	<b>No Resume</b>
        	<?php }?>
        </td>
      </tr>
     <?php }?>

    </tbody>
  </table>
</div>










