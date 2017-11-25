<div>
   <select class="form-control" >
      <option value="">-- Please select --</option>
      <?php
         $i=0;
         foreach ($subjects as $subject) {
      ?>
      <option value="<?php $subject ?>"><?php $subject ?></option>
       <?php } ?>
   </select>
</div>