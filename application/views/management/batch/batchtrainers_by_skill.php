   
<div class="col-xs-4" id="trainerDiv">
    <select id="trainer_1" name="trainer_1" class="form-control">
       <?php foreach ($trainersBySkill as $trainer) { ?>
              <option <?php echo $trainer->userid; ?> > <?php echo $trainer->userid.' - '.$trainer->skillname; ?> </option>
        <?php } ?>
    </select>
</div>