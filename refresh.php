<?php
$output = shell_exec('cd /usr/share/nginx/html/myschool && sudo git pull');
 
echo "<pre>$output</pre>";
?>