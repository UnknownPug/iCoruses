<?php
/**
 * @param string $email getting email info from user profile
 * @param string $password getting password info from user profile
 * @result There is no return but after successful login user will be moved to Menu.php
 */
session_start();
require '../../php/validation/includes/_dbController.php'; // Connecting with db controller.

$_SESSION['error_message'] = '';

$minPassLen = 8;

if (isset($_POST['login-acc'])) {

    // Check CSRF token on form submission
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        // Invalid CSRF token
        die("CSRF validation failed. Please try again.");
        exit;
    }
    
    $email = $_POST['acc-email'];
    $password = $_POST['acc-psd'];

    $_SESSION['acc-email'] = $email;
    // $_SESSION['acc-psd'] = $password; // <-- Saving password after wrong information input validation.
        
    // Parsing our user data.
    if (empty($email) && empty($password)) {
        $_SESSION['error_message'] .= "<span class='error-field'>All fields need to be completed!</span>";
    } elseif (
        !preg_match("/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/", $email) ||
        !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] .= "<span class='error-field'>Email or password is incorrect. Try again</span>";
    } elseif (strlen($password) <= $minPassLen) {
        $_SESSION['error_message'] .= "<span class='error-field'>Email or password is incorrect. Try again</span>";
    } else {
        $user = getUserByEmail($email);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['uid'] = $user['id'];
                // After validation is complete, moving user to Menu page.
                header("Location: ../../html/user/Menu.php");
                exit;
            } else {
                $_SESSION['error_message'] .= "<span class='error-field'>Password is incorrect!</span>";
            }
        } else {
            $_SESSION['error_message'] .= "<span class='error-field'>User info is incorrect or user does not exist!</span>";
        }
    }
    if (!empty($_SESSION['error_message'])) {
        return;
    }
    // Unsetting info from web after completed logging.
    if (isset($_SESSION['acc-email']) && isset($_SESSION['acc-psd'])) {
        unset($_SESSION['acc-email']);
        unset($_SESSION['acc-psd']);
    }
}
