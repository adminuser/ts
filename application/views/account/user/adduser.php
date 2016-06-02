
<div id="candidate-reg-form"  >
<p class="col-xs-offset-2"><strong>Add User</strong></p>
<span style="font-color: red;"><?php echo validation_errors(); ?></span>
<?php
$this->load->helper('form');
$att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
echo form_open('user/add', $att);
?>
<form class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail" class="control-label col-xs-offset-0 col-xs-2">Email</label>
        <div class="col-xs-4">
            <input type="email" class="form-control" id="inputEmail" name="txtuname" placeholder="Email" value="<?php echo set_value('txtuname'); ?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="signup-type" class="control-label col-xs-offset-0 col-xs-2">User Type</label>
        <div class="col-xs-4">
        <?php $userTypes = getUserTypes();?>
            <select name="signup-type" class="form-control">
                <option value="">None</option>
                <?php foreach ($userTypes as $key => $value) {?>
                <option value="<?php echo $key; ?>" > <?php echo $value; ?> </option>
                <?php }?>
            </select>
        </div>
    </div>  
    <div class="form-group">
        <label for="primary_skillid" class="control-label col-xs-offset-0 col-xs-2">SKill</label>
        <div class="col-xs-4">
        <?php $skillMap = getSkillMap();?>
            <select name="primary_skillid" class="form-control">
                <option value="0">None</option>
                <?php foreach ($skillMap as $key => $value) {?>
                <option value="<?php echo $key; ?>" > <?php echo $value; ?> </option>
                <?php }?>
            </select>
        </div>
    </div>       
    <input type="hidden" name="byadmin" value="byadmin">
    <input type="hidden" name="txtpass" value="<?php echo generate_random_string(6);?>">
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
<?php echo form_close();?>
</div>


