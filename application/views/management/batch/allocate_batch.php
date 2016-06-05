<?php $baseUrl = base_url(); ?>
<div>
	<p align="left"><strong>Allocate Batch</strong></p>
<?php
$this->load->helper('form');
$att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
echo form_open('batch/allocate', $att);
?>	

<div>
<span class="label label-primary">Select Skill :</span>
	<?php // Skill selection - start ?>
	<select id="selectedSkill" class="form-control" onchange="getReleasedBatchesBySkill(this.value,'<?php echo $baseUrl ?>')">
		<option value="0"> -- None -- </option>
		<?php foreach($skillMap as $key => $value){ ?>
		<option value="<?php echo $key;?>" ><?php echo $value;?></option>
		<?php }?>		
	</select>
	<br><br>
	<?php // Skill selection - end ?>
</div>	
<hr>

<div>
<span class="label label-primary">Select Batch :</span>
	<?php // Skill selection - start ?>
	<select id="batchesBySkill" class="form-control" onchange="getBatchCandBySkill(this.value,'<?php echo $baseUrl ?>')">
		<option value="0"> -- None -- </option>		
	</select>
	<br><br>
	<?php // Skill selection - end ?>
</div>	
<hr>

<span class="label label-primary">Select Candidates :</span><br><br>
	<?php // Candidate selection - start ?>
	    <select multiple size="10" id="from" >    	
	    </select>
	    <div class="controls"> 
	        <a href="javascript:moveAll('from', 'to')">&gt;&gt;</a> 
	        <a href="javascript:moveSelected('from', 'to')">&gt;</a> 
	        <a href="javascript:moveSelected('to', 'from')">&lt;</a> 
	        <a href="javascript:moveAll('to', 'from')" href="#">&lt;&lt;</a> </div>
	    <select multiple id="to" size="10" name="candidates[]" ></select>
	<?php // Candidate selection - end ?>



<?php echo form_close();?>
</div>

