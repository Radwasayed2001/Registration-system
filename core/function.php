<?php

function checkRequestMethod($method) {
    if ($_SERVER['REQUEST_METHOD'] == $method) {
        return true;
    }
    return false;
}
function checkPostInput($input) {
    if (isset($_POST[$input])) {
        return true;
    }
    return false;
}
function sanitizeInput($input) {
    return trim(htmlspecialchars(htmlentities($input)));
}
function requiredVal($input) {
    if (empty($input)) {
        return true;
    }
    return false;
}
function minVal($input, $len) {
    if (strlen($input) < $len) {
        return true;
    }
    return false;
}
function maxVal($input, $len) {
    if (strlen($input) > $len) {
        return true;
    }
    return false;
}
function redirect($path) {
    header("location:$path");
}

function emailVal($input) {
    if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else
    return false;
}