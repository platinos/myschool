<?php 
$subj="chemistry";
$class="11";
$value = array("subject"=>$subj,"class"=>$class);

$feedchapters = apicall("getchapters",$value); 

var_dump($feedchapters, $feedchapters['data'][$i]['chapter']);?>

<select onchange="filter();" class="form-control" name="subj" id="subj">
<option value="select" selected>Select chapters</option>
   <?php

   $size = $feedchapters['data']['size']; 
   for($i=0; $i<$size; $i++)
    {?>

       <option value=<?php echo $feedchapters['data'][$i]['chapter'] ?> ><?php echo $feedchapters['data'][$i]['chapter'] ?></option>
       <?php  }
       ?>

    </select>




 array(3) { ["error"]=> bool(false) ["data"]=> array(1) { [0]=> array(2) { ["id"]=> string(1) "7" ["chapter"]=> string(20) "Chemical Equilibrium" } } ["size"]=> int(1) }