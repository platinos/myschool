<?php 
$subj="chemistry";
$class="11";
$value = array("subject"=>$subj,"class"=>$class);
$feedchapters = apicall("getchapters",$value); ?>

<select onchange="filter();" class="form-control" name="subj" id="subj">
<option value="select" selected>Select chapters</option>
   <?php

   $size = $feedchapters['data']['size']; 
   for($i=0; $i<$size; $i++)
    {?>

       <option value=<?php echo $feedsubjects['data'][$i]['chapter'] ?> ><?php echo $feedsubjects['data'][$i]['chapter'] ?></option>
       <?php  }
       ?>

    </select>

