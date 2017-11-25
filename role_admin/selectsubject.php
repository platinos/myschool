<?php 
$feed = apicall("viewquestion"); ?>
<div>
 <select class="form-control show-tick" name="subj" id="subj">
   <option value="select" selected>Select</option>
   <?php

   $size = $feed['data']['size']; 
   for($i=0; $i<$size; $i++)
     {?>

        <option value=<?php echo $feed['data'][$i]['name'] ?> ><?php echo $feed['data'][$i]['name'] ?></option>
        <?php  }
        ?>

     </select>
  </div>