
<div id="candidate-reg-form" class="jumbotron" >
<p align="center"><strong>Discussion Forum Log In</strong></p>
<?php
$this->load->helper('form');
$att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
echo form_open('account/login', $att);
?>
<p align="center"><?php if(isset($info)){echo $info;}?></p>
<div >
    <div class="form-group" align="center">
        <label for="inputEmail" class="control-label col-xs-offset-2 col-xs-2">Email</label>
        <div class="col-xs-offset-0 col-xs-5">
            <input type="hidden" name="forum" value="forum" />
            <input type="email" class="form-control" id="inputEmail" name="txtuname" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="control-label col-xs-offset-2 col-xs-2">Password</label>
        <div class="col-xs-offset-0 col-xs-5">
            <input type="password" class="form-control" id="inputPassword" name="txtpass" placeholder="Password">
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
            <button type="submit" class="btn btn-primary">Log In</button>
        </div>
    </div>
</div>
<?php echo form_close();?>
</div>


