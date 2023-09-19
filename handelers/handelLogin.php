<?php
session_start();
$errors = [];
include('../core/function.php');
if (checkRequestMethod("POST") && checkPostInput('useremail')){
foreach($_POST as $key=>$value)
{
    $$key = sanitizeInput($value);
    echo "$key $value <br>";
}
}
$csvFilePath = '../data/users.csv';
$data = [];

if (($handle = fopen($csvFilePath, 'r')) !== false) {
    while (($row = fgetcsv($handle)) !== false) {
        $data[] = $row;
    }
    fclose($handle);
}
foreach ($data as $user){
    if ($user[1] === $useremail) {
        $flag = false;
        if($user[2] === sha1($userpassword))
        {
            $_SESSION['auth'] = [$user[0], $user[1]];
            redirect('../home.php');
            die;
        }
        else
        {
            $errors[] = "uncorrect password";
             $_SESSION['errors'] = $errors;

            redirect('../login.php');
            die;
        }
    }
}

$errors[] = "email is wrong";
$_SESSION['errors'] = $errors;
redirect('../login.php');
die;