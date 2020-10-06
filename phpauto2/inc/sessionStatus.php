<?php if(isset($_SESSION['status'])) {        
         echo ($_SESSION['status']);
         unset($_SESSION['status']);
      }
?>