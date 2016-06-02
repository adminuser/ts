
<div id="candidate-reg-form" class="jumbotron" >
<p align="center"><strong>Candidate Sign Up</strong></p>
<span style="font-color: red;"><?php echo validation_errors(); ?></span>
<?php
$this->load->helper('form');
$att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
echo form_open('account/candidatesignup', $att);
?>
<form class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail" class="control-label col-xs-offset-2 col-xs-2">Email</label>
        <div class="col-xs-4">
            <input type="email" class="form-control" id="inputEmail" name="txtuname" placeholder="Email" value="<?php echo set_value('txtuname'); ?>" >
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="control-label col-xs-offset-2 col-xs-2">Password</label>
        <div class="col-xs-4">
            <input type="password" class="form-control" id="inputPassword" name="txtpass" placeholder="Password" value="<?php echo set_value('txtpass')?>"  >
        </div>
    </div>
    <div class="form-group">
        <label for="inputConfirmPassword" class="control-label col-xs-offset-2 col-xs-2">Confirm Password</label>
        <div class="col-xs-4">
            <input type="password" class="form-control" id="inputConfirmPassword" name="txtcpass" placeholder="Confirm Password" value="<?php echo set_value('txtcpass')?>">
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-10">
           <!-- <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div> 
            -->
        </div>
    </div>
    <div class="form-group">
        <div class="col-xs-offset-5 col-xs-10">
        	<input type="hidden" name="signup-type" value="candidate" />
            <button type="submit" class="btn btn-primary">Sign Up</button>
        </div>
    </div>
<?php echo form_close();?>
</div>


