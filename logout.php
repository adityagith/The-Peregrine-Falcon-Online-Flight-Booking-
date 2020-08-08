<?php
   session_start();
   $_SESSION = array();
   session_unset();
   session_destroy();
   echo "<script>

   alert('You have been logout Successfully');
   window.location  = 'login.php';
   </script>";
   //window.location  = 'http://localhost/The%20Peregrine%20Falcon/login.php';
?>