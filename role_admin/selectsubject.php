
<div class="btn-group bootstrap-select form-control show-tick">
   <button type="button" class="btn dropdown-toggle btn-default" data-toggle="dropdown" title="-- Please select --" aria-expanded="false">
   <span class="filter-option pull-left">-- Please select --</span>&nbsp;<span class="bs-caret"><span class="caret"></span></span></button>
   <div class="dropdown-menu open" style="max-height: 390px; overflow: hidden; min-height: 92px;">
      <ul class="dropdown-menu inner" role="menu" style="max-height: 380px; overflow-y: auto; min-height: 82px;">
         <li data-original-index="0" class="selected">
            <a tabindex="0" class="" style="" data-tokens="null"><span class="text">-- Please select --</span><span class="glyphicon glyphicon-ok check-mark"></span></a>
         </li>
         <?php $subjects=apicall('viewsubect');
            $i=0;
            foreach ($subjects as $subject) {
         ?>

            <li data-original-index="<?php $i+1 ?>"><a tabindex="<?php $i ?>" class="" style="" data-tokens="null"><span class="text"><?php $subject ?></span><span class="glyphicon glyphicon-ok check-mark"></span></a></li>
            <?php } ?>
      </ul>
   </div>
   <select class="form-control show-tick" tabindex="-98">
      <option value="">-- Please select --</option>
      <?php
         $i=0;
         foreach ($subjects as $subject) {
      ?>
      <option value="<?php $subject ?>"><?php $subject ?></option>
       <?php } ?>
   </select>
</div>