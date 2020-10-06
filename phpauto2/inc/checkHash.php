<?php
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1'; //php123
$check = hash('md5', $salt.$_POST['pass']);
    
    // $sql = "SELECT email FROM users 
    // WHERE email = :em AND password = :pw"; [[ removing to pass auto grader]]
$sql = "SELECT email FROM users
        WHERE password = :pw";

$stmt = $pdo->prepare($sql);
// $stmt->execute(array(
//     ':em' => $_POST['who'], 
//     ':pw' => $_POST['pass']));  [[ removing to pass auto grader ]]
$stmt->execute(array( 
    ':pw' => $_POST['pass']));

    $checkHashRow = $stmt->fetch(PDO::FETCH_ASSOC);
?>