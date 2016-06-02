
<div>
<p align="center"><strong>Add Batch</strong></p>
<?php
$this->load->helper('form');
$att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
echo form_open('batch/add', $att);
?>
<p align="center"><?php if(isset($info)){echo $info;}?></p>
    <div class="form-group">
        <label for="inputbatchname" class="control-label col-xs-2">Batch Name</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" id="batchname" name="batchname" placeholder="Batch Name">
        </div>
    </div>
    <div class="form-group">
        <label for="inputskillid" class="control-label col-xs-2">Skill</label>
        <div class="col-xs-4">
            <select name="skillid" class="form-control">
                <?php foreach ($allSkills as $skill) { ?>
                  <option value="<?php echo $skill->skillid; ?>">  <?php echo $skill->skillname; ?> </option>
               <?php } ?>
            </select>
        </div>
    </div>    
    <div class="form-group">
        <label for="inputstartdate" class="control-label col-xs-2">Start Date</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" id="startdate" name="startdate" placeholder="Start Date">
        </div>
    </div>
    <div class="form-group">
        <label for="inputenddate" class="control-label col-xs-2">End Date</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" id="enddate" name="enddate" placeholder="End Date">
        </div>
    </div> 
    <div class="form-group">
        <label for="inputstarttime" class="control-label col-xs-2">Start Time</label>
        <div class="col-xs-4" >
            <select id="starttime" name="starttime" class="form-control">
                <?php 
                for($i=1;$i<=23;$i++){ ?>
                    <option value="<?php echo $i; ?>" ><?php if($i<12){echo $i.'- AM';}else{echo $i.'- PM';} ?> </option>
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
                    <option value="<?php echo $i; ?>"><?php if($i<12){echo $i.'- AM';}else{echo $i.'- PM';} ?> </option>
               <?php  } ?>
            </select>
        </div>
    </div>             

    <div class="form-group">
        <label for="inputreleasedate" class="control-label col-xs-2">Release Date</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" id="releasedate" name="releasedate" placeholder="Release Date">
        </div>
    </div>


    <div class="form-group">
        <label for="inputtrainer_1" class="control-label col-xs-2">Select Trainer</label>
        <div class="col-xs-4" id="trainerDiv">
            <select id="trainer_1" name="trainer_1" class="form-control">
               <?php foreach ($trainers as $trainer) { ?>
                      <option <?php echo $trainer->userid; ?> > <?php echo $trainer->userid.' - '.$trainer->skillname; ?> </option>
                <?php } ?>
            </select>
        </div>
    </div> 

    <div class="form-group">
        <label for="inputtrainer_1" class="control-label col-xs-2">Batch Status</label>
        <div class="col-xs-4">
            <select id="status" name="status" class="form-control">
                <option value="adminonly">Admin Only</option>
                <option value="readytorelease">Ready To Release</option>
                <option value="released">Released</option>
                <option value="ongoing">On Going</option>
                <option value="completed">Completed</option>                
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
