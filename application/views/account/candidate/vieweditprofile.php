<?php if(isset($userInfo['is_profilecomplete'])){if($userInfo['is_profilecomplete'] == 0){?>
<h5 style="color: red;">* Please update the mandatory details of your profile to continue. </h5>
<?php }}?>
<div >
<p ><strong>View/Edit Profile</strong></p>
<hr>
<span style="color: red;"><?php echo validation_errors(); ?></span>
<?php
$this->load->helper('form');
$att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
echo form_open('profile', $att);
?>
<p align="center"><?php if(isset($info)){echo $info;}?></p>
    <div class="form-group">
        <label for="inputfirstname" class="control-label col-xs-2">First Name *</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $userProfile->firstname;?>"> 
        </div>
    </div>
    <div class="form-group">
        <label for="inputlastname" class="control-label col-xs-2">Middle Name </label>
        <div class="col-xs-4">
            <input type="text" class="form-control" id="middlename" name="middlename" value="<?php echo $userProfile->middlename;?>"> 
        </div>
    </div>

    <div class="form-group">
        <label for="inputlastname" class="control-label col-xs-2">Last Name *</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $userProfile->lastname;?>"> 
        </div>
    </div>

    <div class="form-group">
        <label for="inputgender" class="control-label col-xs-2">Gender *</label>
        <div class="col-xs-4">
            <select name="gender" class="form-control">
                <option value="">None</option>
                <option value="male" <?php if($userProfile->gender == 'male'){echo 'selected';}?> >Male</option>
                <option value="female" <?php if($userProfile->gender == 'female'){echo 'selected';}?> >Female</option>
            </select>
        </div>
    </div>    

    <div class="form-group">
        <label for="inputskillid" class="control-label col-xs-2">Primary Skill *</label>
        <div class="col-xs-4">
            <select name="primary_skillid" class="form-control">
                <option value="0">None</option>
                <?php foreach ($skillMap as $key=>$value) { ?>
                  <option value="<?php echo $key; ?>" <?php if($userProfile->primary_skillid == $key){echo 'selected';}?>> <?php echo $value;?></option>
               <?php } ?>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label for="inputskillid" class="control-label col-xs-2">Secondary Skill</label>
        <div class="col-xs-4">
            <select name="secondary_skillid" class="form-control">
                <option value="0">None</option>
                <?php foreach ($skillMap as $key=>$value) { ?>
                  <option value="<?php echo $key; ?>" <?php if($userProfile->secondary_skillid == $key){echo 'selected';}?>> <?php echo $value;?></option>
               <?php } ?>
            </select>
        </div>
    </div> 
     

    <div class="form-group">
        <label for="applying_visatype" class="control-label col-xs-2">Applying Visa Type</label>
        <div class="col-xs-4">
            <select name="applying_visatype" class="form-control">
                <option value="0">None</option>
                <?php foreach ($visaTypes as $key=>$value) { ?>
                  <option value="<?php echo $key; ?>" <?php if($userProfile->applying_visatype == $key){echo 'selected';}?>> <?php echo $value;?></option>
               <?php } ?>
            </select>
        </div>
    </div>  

    <div class="form-group">
        <label for="existing_visatype" class="control-label col-xs-2">Existing Visa Type</label>
        <div class="col-xs-4">
            <select name="existing_visatype" class="form-control">
                <option value="0">None</option>
                <?php foreach ($visaTypes as $key=>$value) { ?>
                  <option value="<?php echo $key; ?>" <?php if($userProfile->existing_visatype == $key){echo 'selected';}?>> <?php echo $value;?></option>
               <?php } ?>
            </select>
        </div>
    </div>  

    <div class="form-group">
        <label for="country" class="control-label col-xs-2">Country</label>
        <div class="col-xs-4">
            <select name="country" class="form-control">
                <option value="0">None</option>
                <?php foreach ($countryList as $key=>$value) { ?>
                  <option value="<?php echo $key; ?>" <?php if($userProfile->country == $key){echo 'selected';}?> > <?php echo $value;?></option>
               <?php } ?>
            </select>
        </div>
    </div> 

    <div class="form-group">
        <label for="zipcode" class="control-label col-xs-2">Zip Code</label>
        <div class="col-xs-4">
            <input type="text" class="form-control" id="zipcode" name="zipcode" value="<?php echo $userProfile->zipcode;?>"> 
        </div>
    </div>        

      
    <div class="form-group">
        <div class="col-xs-offset-2 col-xs-6" align="center">
            <button type="submit" class="btn btn-primary" >Update</button>
        </div>
    </div>
<?php echo form_close();?>
</div>
