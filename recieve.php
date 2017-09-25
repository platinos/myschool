<?php
// Use in the "Post-Receive URLs" section of your GitHub repo.
// if ( $_POST['payload'] ) {
//   shell_exec( 'cd /usr/share/nginx/html/mypaper && git reset --hard HEAD && git pull' );
// }

shell_exec( 'cd /usr/share/nginx/html/myschool && sudo git reset --hard HEAD && sudo git pull' );
echo "Hi";
?>