
<div>
<p align="center"><strong>View/Edit Batch</strong></p>
<?php
$this->load->helper('form');
$att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
echo form_open('batch/edit', $att);
?>
<p align="center"><?php if(isset($info)){echo $info;}?></p>
    <div class="form-group">
        <label for="inputbatchname" class="control-label col-xs-2">Batch Name</label>
        <div class="col-xs-10">
            <input type="hidden" class="form-control" id="batchid" name="batchid" value="<?php echo $myBatch->batchid;?>">
            <input type="text" class="form-control" id="batchname" name="batchname" value="<?php echo $myBatch->batchname;?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputstartdate" class="control-label col-xs-2">Start Date</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" id="startdate" name="startdate" value="<?php echo $myBatch->startdate;?>">
        </div>
    </div>

    <div class="form-group">
        <label for="inputskill" class="control-label col-xs-2">Skill</label>
        <div class="col-xs-4">
            <span class="form-control" readonly> <?php echo $skillMap[$myBatch->skillid]; ?> </span>
        </div>
    </div>


    <div class="form-group">
        <label for="inputenddate" class="control-label col-xs-2">End Date</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" id="enddate" name="enddate" value="<?php echo $myBatch->enddate;?>">
        </div>
    </div> 
    <div class="form-group">
        <label for="inputstarttime" class="control-label col-xs-2">Start Time</label>
        <div class="col-xs-4" >
            <select id="starttime" name="starttime" class="form-control">
                <?php 
                for($i=1;$i<=23;$i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if($myBatch->starttime == $i){echo 'selected';} ?> > <?php if($i<12){echo $i.'- AM';}else{echo $i.'- PM';} ?> </option>
               <?php  } ?>
            </select>            
        </div>
    </div> 
    <div class="form-group">
        <label for="inputendtime" class="control-label col-xs-2">End Time</label>
        <div class="col-xs-4">
            <select id="endtime" name="endtime" class="form-control">
                <?php 
                for($i=1;$i<=23;$i++){ ?>
                    <option value="<?php echo $i; ?>" <?php if($myBatch->starttime == $i){echo 'selected';} ?> ><?php if($i<12){echo $i.'- AM';}else{echo $i.'- PM';} ?> </option>
               <?php  } ?>
            </select>
        </div>
    </div>             

    <div class="form-group">
        <label for="inputreleasedate" class="control-label col-xs-2">Release Date</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" id="releasedate" name="releasedate" value="<?php echo $myBatch->releasedate;?>">
        </div>
    </div>


    <div class="form-group">
        <label for="inputtrainer_1" class="control-label col-xs-2">Batch Status</label>
        <div class="col-xs-4">
            <select id="status" name="status" class="form-control">
                <option value="adminonly" <?php if($myBatch->status == 'adminonly'){echo 'selected';} ?> >Admin Only</option>
                <option value="readytorelease" <?php if($myBatch->status == 'readytorelease'){echo 'selected';} ?> >Ready To Release</option>
                <option value="released" <?php if($myBatch->status == 'released'){echo 'selected';} ?> >Released</option>
                <option value="ongoing" <?php if($myBatch->status == 'ongoing'){echo 'selected';} ?> >On Going</option>
                <option value="completed" <?php if($myBatch->status == 'completed'){echo 'selected';} ?>>Completed</option>                
            </select>
        </div>
    </div>



    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-6" align="center">
            <button type="submit" class="btn btn-primary" >Save</button>
        </div>
    </div>
<?php echo form_close();?>
</div>
