<?php 
$feedsubjects = apicall("viewsubject"); ?>

<select onchange="chapterload();filter();" class="form-control" name="subj" id="subj">
<option value="select" selected>Select subject</option>
   <?php

   $size = $feedsubjects['data']['size']; 
   for($i=0; $i<$size; $i++)
    {?>

       <option value=<?php echo $feedsubjects['data'][$i]['name'] ?> ><?php echo $feedsubjects['data'][$i]['name'] ?></option>
       <?php 
    }
       ?>
</select>
