<?php
$failure = ""; 
$current_page   = basename($_SERVER['PHP_SELF']);
session_start();
if($current_page == 'login.php'){
    unset($current_page);
} else  {
            if ( ! isset($_SESSION['account']) || strlen($_SESSION['account']) < 1  ) { 
                die('Name parameter missing'); 
            } else {
                $account = $_SESSION['account'] ;            
            }
        }

if(!empty($_SESSION['account']) ){
    echo ('<h4 style="padding:0em 2em 0em 6em;">Logged in as '.($_SESSION['account']).'</h4>');
}
?>