	<select class="form-control">
		<option value="0"> -- None -- </option>	
		<?php foreach ($trainers as $t) { ?>
		<option value="<?php ?>"><?php echo $t->firstname.'['.$t->userid.']'.' - '.$skillMap[$t->primary_skillid];?></option>
		<?php }?>	
	</select>