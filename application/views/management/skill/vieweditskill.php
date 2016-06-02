
<div  >
<p align="center"><strong><?php echo $displayContent ?></strong></p>
<?php
$this->load->helper('form');
$att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
echo form_open('skill/edit', $att);
?>
<p align="center"><?php if(isset($info)){echo $info;}?></p>
    <div class="form-group">
        <label for="inputEmail" class="control-label col-xs-2">Skill Name</label>
        <div class="col-xs-10">
            <input type="hidden" name="skillid" value="<?php echo $skill->skillid;?>">
            <input type="text" class="form-control" id="skillname" name="skillname" placeholder="Skill Name" value="<?php echo $skill->skillname;?>">
        </div>
    </div>
    <div class="form-group" >
        <label for="syllabus" class="control-label col-xs-2">Skill Syllabus</label>
        <div class="col-xs-10" >
            <textarea class="form-control" id="syllabus" name="syllabus" placeholder="Syllabus" style="min-height: 200px;"> 
                <?php echo trim($skill->skillsyllabus);?>
            </textarea>
        </div>
    </div>
    <div class="form-group" >
        <label for="syllabus" class="control-label col-xs-2">Status</label>
        <div class="col-xs-10" >
            <div><?php echo $skill->status;?></div>
        </div>
    </div>    

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10" align="center">
            <button type="submit" class="btn btn-primary" >Save</button>
        </div>
    </div>
<?php echo form_close();?>
</div>


