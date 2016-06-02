
<div class = "table-responsive">
   <table class = "table">    
      <caption></caption>  
      <thead>
      </thead>
      
      <tbody>
      <div>
         <div><a href="<?php echo base_url('forum/addpost'); ?>" class="btn btn-primary">Add Question</a> </div>

         <div class = "table-responsive">
                  <?php if(count($allPost) == 0){?>
                  <h3>No records found</h3>
                  <?php }else{
                  echo '<b >'.$displayContent.'</b>';
                  foreach($allPost as $post){ 
                  ?>

                  <table class = "table" style="border-style: groove;">
                     <tbody>
                     
                  <tr>
                  <td>
                  <?php 
                  $this->load->helper('form');
                  $att = array("id" => "frm", "name" => "frm", "method" => "post");
                  echo form_open('forum/viewpost', $att);       
                  ?>   
                  <input type="submit" value="<?php echo $post->posttitle;?>" class="btn btn-link" />
                  </td>
                  </tr>
                  <tr>
                  <td>
                  <?php echo $post->postdescription;?>            
                  <input type="hidden" name="postid" value="<?php echo $post->postid;?>" />   
                  <?php echo form_close();
                  ?>
                  </td>
                  </tr>
                  </tbody>
               </table>

                  <?php 
                     } 
                  }
                ?>

         </div>

      </div>
      </tbody>    
   </table>
</div>  