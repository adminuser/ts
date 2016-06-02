<?php   if(count($allBatch) == 0){?>
<h4>No records</h4>
<?php }else{?>
<div class = "table-responsive">
   <table class = "table">    
      <caption><?php echo $displayContent;?></caption>  
      <thead>
         <tr>
            <!-- <th></th> -->
            <th>Batch Name</th>
            <th>Skill</th>
            <th>Start Date</th>
            <th>Release Date</th>
            <th>Status</th>
         </tr>
      </thead>
      
      <tbody>
      <?php foreach($allBatch as $batch){?>
         <tr>
         <?php 
         $this->load->helper('form');
         $att = array("id" => "frm", "name" => "frm", "method" => "post");
         echo form_open('batch/view', $att);
         $batchid = $batch->batchid;             
         ?>         
            <!-- <td><input type="checkbox" name="batchforselection" disabled="disabled" /></td> -->
            <td><?=  $batch->batchname;?></td>
            <td><?= $skillMap[$batch->skillid];?></td>
            <td><?=  $batch->startdate;?></td> 
            <td><?=  $batch->releasedate;?></td>  
            <td><?php echo $batchStatusMap[$batch->status];?>
            </td> 
            <input type="hidden" name="batchid" value="<?php echo $batch->batchid;?>" />            
         </tr>
      <?php echo form_close();
         } 
      }
      ?>
      </tbody>    
   </table>
</div>  