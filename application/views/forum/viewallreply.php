<?php   if(count($allSkills) == 0){?>
<h1>No records found</h1>
<?php }else{?>
<div class = "table-responsive">
   <table class = "table">    
      <caption><?php echo $displayContent;?></caption>  
      <thead>
         <tr>
            <th></th>
            <th>Skill</th>
            <th>Status</th>
         </tr>
      </thead>
      
      <tbody>
      <?php foreach($allSkills as $skill){?>
         <tr>
         <?php 
         $this->load->helper('form');
         $att = array("id" => "frm", "name" => "frm", "method" => "post");
         echo form_open('skill/view', $att);
         $skillid = $skill->skillid;             
         ?>         
            <td><input type="submit" value="View/Edit" class="btn btn-primary" /></td>
            <td><?php echo $skill->skillname;?></td>  
            <td><?php echo ucfirst($skill->status);?></td> 
            <input type="hidden" name="skillid" value="<?php echo $skill->skillid;?>" />            
         </tr>
      <?php echo form_close();
         } 
      }
      ?>
      </tbody>    
   </table>
</div>  