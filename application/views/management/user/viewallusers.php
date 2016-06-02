
<div class = "table-responsive">
   <table>
      <?php 
      $this->load->helper('form');
      $att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
      echo form_open('user/filterusers', $att);
      ?>      
      <tr>
         <th>
         <p>Filter By</p>
         Skill:
         <select name="primary_skillid" id="primary_skillid" >
            <option value="0">All</option>
            <?php $skillMap = getSkillMap();
               foreach($skillMap as $key=>$value){?>
               <option value="<?php echo $key; ?>" <?php if(isset($filterKeys)){if($filterKeys['primary_skillid'] == $key)echo 'selected';}?> ><?php echo $value;?></option>
            <?php }?>
         </select>
         <?php 
         $user_typre_filtervalue = ($displayContent == 'Candidates Listing')?'candidate':'trainer';
         if($displayContent == 'Candidates Listing'){
            ?> 
         Visa Type:
         <select name="existing_visatype" id="existing_visatype">
            <option value="0">All</option>
            <?php $visaTypes = getVisaTypes();
               foreach($visaTypes as $key=>$value){?>
               <option value="<?php echo $key; ?>" <?php if(isset($filterKeys)){if($filterKeys['existing_visatype'] == $key)echo 'selected';}?> ><?php echo $value;?></option>
            <?php }?>
         </select>
         Country:
         <select name="country" id="country">
            <option value="0">All</option>
            <?php $countryList = getCountryList();
               foreach($countryList as $key=>$value){?>
               <option value="<?php echo $key; ?>" <?php if(isset($filterKeys)){if($filterKeys['country'] == $key)echo 'selected';}?> ><?php echo $value;?></option>
            <?php }?>
         </select>
         <?php }?>          
         </th>
         <input type="hidden" name="user_type" value="<?php echo $user_typre_filtervalue;?>" />
         <button type="submit" class="btn btn-primary">Filter records</button>
      </tr> 
      <?php echo form_close();?>       
   </table> 



   <table class = "table">    
      <caption><?php echo $displayContent;?></caption> 

      <thead>
         <tr>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Skill</th>
            <th>Visa Type</th>
            <th>Profile Status</th>
         </tr>
      </thead>
      
   <?php   if(count($allUsers) == 0){?>
   <h1>No records </h1>
   <?php }else{?>

      <tbody>
      <?php foreach($allUsers as $user){?>
         <tr>
           
            <td><?php echo $user->email;?></td>            
            <td><?php echo $user->firstname;?></td>
            <td><?php echo $user->lastname;?></td>
            <td>
            <?php if($user->primary_skillid == '0'){
                  echo "Not Added";
               }else{
                  echo $skillMap[$user->primary_skillid];
               }?>
            </td>
            <td><?php echo $user->existing_visatype;?></td>
            <td><?php if($user->is_profilecomplete == 1){echo 'Completed';}else{echo 'Incomplete';}?></td>
         </tr>
         <?php ?>
      <?php } ?>
      </tbody> 

      <?php }?>   
   </table>
</div>  	

