	<select class="form-control">
		<option value="0"> -- None -- </option>	
		<?php foreach ($batches as $b) { 
			$time = $b->starttime < 12 ? $b->starttime.'-AM' : $b->starttime.' - PM';
		?>
		<option value="<?php echo $b->batchid;?>"><?php echo $b->batchname.' / '.$b->startdate.'/'.$time.'/'.$b->status;?></option>
		<?php }?>	
	</select>