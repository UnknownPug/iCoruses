<?php

/**
 * @param string $getUserFromFile getting contents from file
 * @param string $registeredUser reading json file as array
 * @result There is no return but after successful validation user will be moved to Login.php
 * and his info will be added to .json
 */

require '../../php/validation/includes/_dbController.php';

$userInfoFile = "../../php/json/users_profile.json";

$_SESSION['error_message'] = '';

$minPassLen = 8;

$minNameLen = 2;
$maxNameLen = 20;

$minDate = "1952-01-01";
$maxDate = "2023-01-01";

$getUserFromFile = file_get_contents($userInfoFile, FILE_USE_INCLUDE_PATH);
$registeredUser = json_decode($getUserFromFile, JSON_OBJECT_AS_ARRAY);

if (isset ($_POST['create'])) {

    $email = $_POST['nw-em'];
    $name = $_POST['nw-usr'];
    $pass = $_POST['nw-passwd'];
    $date = $_POST['day'];

    $_SESSION['nw-em'] = $email;
    $_SESSION['nw-usr'] = $name;
//    $_SESSION['nw-passwd'] = $pass; // <-- Saving password after wrong information input validation.
    $_SESSION['day'] = $date;

    // Parsing our new user data.
    if (empty($email) && empty($name) && empty ($pass) && empty ($date)) {
        $_SESSION['error_message'] .= "<span class='error-field'>All fields are need to be completed!</span>";
    } elseif (
        !preg_match("/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/", $email) ||
        !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] .= "<span class='error-field'>Email does not work correctly!</span>";
    } elseif (empty($name)) {
        $_SESSION['error_message'] .= "<span class='error-field'>Username is not valid!</span>";
    } elseif (!preg_match("/^[A-Za-z0-9]*$/", $name)) {
        $_SESSION['error_message'] .=
            "<span class='error-field'>Username can contain only characters and numbers!</span>";
    } elseif (strlen($name) < $minNameLen) {
        $_SESSION['error_message'] .=
            "<span class='error-field'>Username must have minimum $minNameLen characters!</span>";
    } elseif (strlen($name) >= $maxNameLen) {
        $_SESSION['error_message'] .=
            "<span class='error-field'>Username must have maximum $maxNameLen characters!</span>";
    } elseif (strlen($pass) <= $minPassLen) {
        $_SESSION['error_message'] .=
            "<span class='error-field'>Password length must be bigger than $minPassLen characters!</span>";
    } elseif (empty($date)) {
        $_SESSION['error_message'] .= "<span class='error-field'>Date is not valid!</span>";
    } elseif (strtotime($date) <= strtotime($minDate)) {
        $_SESSION['error_message'] .=
            "<span class='error-field'>The date must be greater than $date (min $minDate)!</span>";
    } elseif (strtotime($date) >= strtotime($maxDate)) {
        $_SESSION['error_message'] .=
            "<span class='error-field'>The date must be less than $date (max $maxDate)!</span>";
    } elseif (is_array($registeredUser) || is_object($registeredUser)) {
        foreach ($registeredUser as $user) {
            if ($user["email"] == $_POST['nw-em']) {
                $_SESSION['error_message'] .=
                    "<span class='error-field'>Email $email has been already registered!</span>";
                break;
            } elseif ($user["username"] == $_POST['nw-usr']) {
                $_SESSION['error_message'] .=
                    "<span class='error-field'>Name $name has been already used!</span>";
                break;
            }
        }
    }
    if (!empty($_SESSION['error_message'])) {
        return;
    } else {
        // Saving data to Json file
        addUser($data, $_POST['nw-em'], $_POST['nw-usr'], $_POST['nw-passwd'], $_POST['day']);
        // After validation is complete, moving user to Login page.
        header("Location: ../../html/user/index.php");
    }
    // Unsetting info from web after completed registration.
    if (isset($_SESSION['nw-em']) &&
        isset($_SESSION['nw-usr']) &&
        isset($_SESSION['nw-passwd']) &&
        isset($_SESSION['day'])) {

        unset($_SESSION['nw-em']);
        unset($_SESSION['nw-usr']);
        unset($_SESSION['nw-passwd']);
        unset($_SESSION['day']);
    }
}