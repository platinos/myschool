<?php 
$feedsubjects = apicall("viewsubject"); ?>

 <select onchange="filterSubj();" class="form-control" name="subj" id="subj">
   <option value="select" selected>Select</option>
   <?php

   $size = $feedsubjects['data']['size']; 
   for($i=0; $i<$size; $i++)
     {?>

        <option value=<?php echo $feedsubjects['data'][$i]['name'] ?> ><?php echo $feedsubjects['data'][$i]['name'] ?></option>
        <?php  }
        ?>

     </select>
