
<div>
<p align="center"><strong>Add Question</strong></p>
<?php
$this->load->helper('form');
$att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
echo form_open('forum/addpost', $att);
?>
<p align="center"><?php if(isset($info)){echo $info;}?></p>
    <div class="form-group">
        <label for="inputposttitle" class="control-label col-xs-2">Title</label>
        <div class="col-xs-10">
            <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Title">
        </div>
    </div>
   <div class="form-group">
        <label for="inputskillid" class="control-label col-xs-2">Skill</label>
        <div class="col-xs-4">
            <select name="skillid" class="form-control">
                <option value="0">Others</option>
                <?php foreach ($skillMap as $key=>$value) { ?>
                  <option value="<?php echo $key; ?>">  <?php echo $value; ?> </option>
               <?php } ?>
            </select>
        </div>
    </div>    
    <div class="form-group" >
        <label for="syllabus" class="control-label col-xs-2">Description</label>
        <div class="col-xs-10" >
            <textarea class="form-control" id="postdescription" name="postdescription" placeholder="Description" style="min-height: 200px;"> </textarea>
        </div>
    </div>

    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10" align="center">
            <button type="submit" class="btn btn-primary" >Save</button>
            <a href="<?php echo base_url('forum');?>" class="btn btn-primary">Cancel</a>
        </div>
    </div>
<?php echo form_close();?>
</div>


