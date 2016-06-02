
<div  >
<p align="center"><strong>Add Skill</strong></p>
<?php
$this->load->helper('form');
$att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
echo form_open('skill/add', $att);
?>
<p align="center"><?php if(isset($info)){echo $info;}?></p>
    <div class="form-group">
        <label for="inputEmail" class="control-label col-xs-2">Skill Name</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" id="skillname" name="skillname" placeholder="Skill Name">
        </div>
    </div>
    <div class="form-group" >
        <label for="syllabus" class="control-label col-xs-2">Skill Syllabus</label>
        <div class="col-xs-10" >
            <textarea class="form-control" id="syllabus" name="syllabus" placeholder="Syllabus" style="min-height: 200px;"> </textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10" align="center">
            <button type="submit" class="btn btn-primary" >Save</button>
        </div>
    </div>
<?php echo form_close();?>
</div>


