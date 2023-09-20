<?php
session_start();
$errors = [];
include('../core/function.php');
if (checkRequestMethod("POST") && checkPostInput('name')){
foreach($_POST as $key=>$value)
{
    $$key = sanitizeInput($value);
}

if (requiredVal($_POST['name'])) {
    $errors[] = "name is required";
}
elseif (minVal($_POST['name'],3)) {
    $errors[] = "name must be greater than 3 chars";
}
elseif (maxVal($_POST['name'],25)) {
    $errors[] = "name must be less than 25 chars";
}
if (requiredVal($_POST['password'])){
    $errors[] = "password is required";
}
elseif (minVal($_POST['password'],6)){
    $errors[] = "password must be greater than 6 chars";
}
elseif (maxVal($_POST['password'],20)) {
    $errors[] = "password must be less than 20 chars";
}
if (empty($_POST['email'])) {
    $errors[] = "email is required";

}
else if (!emailVal($_POST['email']))
{
    $errors[] = "Enter Valid Email";
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
    if ($user[1] === $email) {
        $errors[] = "email is already exsits";
    }
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    redirect("../Register.php");
    die;
}
else {
    $user_file = fopen("../data/users.csv",'a+');
    $data = [$name, $email, sha1($password)];
    fputcsv($user_file, $data);
    $_SESSION['auth'] = [$name, $email];
    redirect('../home.php');
    die;
}

// foreach($errors as $error) {
//     echo $error . "<br>";
// }
}