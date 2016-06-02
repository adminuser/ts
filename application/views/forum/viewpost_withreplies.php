
<div>
<div>
    <a href="<?php echo base_url('forum'); ?>" class="btn btn-primary">Back</a>  
</div>
<div class="row">
<p ><strong><?php echo $displayContent ?></strong></p>
<p align="center"><?php if(isset($info)){echo $info;}?></p>
<div >
    <div class="form-group" style="border-style: groove;">
        <div class="col-xs-10" style="font-size: large;">
            <?php echo $post[0]->posttitle;?> 
        </div>
    </div>
    
    <div class="form-group"  >
        <div class="col-xs-10" >
            <?php echo $post[0]->postdescription;?>
        </div>
    </div> 
</div>  
</div>

<hr>

<div class = "table-responsive">
   <table class = "table">
      <thead>
      </thead>
      
      <tbody>
 
         <div class = "table-responsive" class="row">
            <?php if(count($postReplies) == 0){?>
            <h3></h3>
            <?php }else{
            echo '<p><strong>Answers</strong></p>';
            foreach($postReplies as $reply){ 
            ?>

            <table class = "table" style="border-style: groove;">
                <tbody>    
                    <tr>
                     <div class="col-xs-10">
                      <td>
                      <?php echo $reply->replydescription; ?>             
                      </td>
                      </div>
                    </tr>
                </tbody>
            </table>

                <?php 
                    }
                }         
                ?>
         </div>
   

   
        <div class="row">
                <h4 align="left" style="font-style: normal;padding-left: 20px;">Add Answer</h4>
                <?php
                $this->load->helper('form');
                $att = array("id" => "frm", "name" => "frm", "method" => "post", "class"=>"form-horizontal");
                echo form_open('forum/reply', $att);
                ?>
                <p align="center"><?php if(isset($info)){echo $info;}?></p>   
                    <div class="form-group" >
                        <div class="col-xs-10" >
                            <input type="hidden" name="postid" value="<?php echo $post[0]->postid;?>" />
                            <textarea class="form-control" id="replydescription" name="replydescription" placeholder="Description" style="min-height: 200px;"> </textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-xs-offset-0 col-xs-10" align="center">
                            <button type="submit" class="btn btn-primary" >Add Answer</button>
                        </div>
                    </div>
                <?php echo form_close();?>
        </div>
 

      </tbody>    
   </table>
</div> 





</div>