<?php 
$subj="chemistry";
$class="11";
$value = array("subject"=>$subj,"class"=>$class);
 
$feedchapters = apicall("getchapters",$value); ?>
 
<select onchange="filter();" class="form-control" name="chapter" id="chapter">
<option value="select" selected>Select chapters</option>
   <?php
 
   $size = $feedchapters['size']; 
   for($i=0; $i<$size; $i++)
    {
      ?>
       <option value=<?php echo $feedchapters['data'][$i]['chapter'] ?> ><?php echo $feedchapters['data'][$i]['chapter'] ?></option>
       <?php  }
       ?>
 
    </select>