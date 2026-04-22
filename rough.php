










<?php
session_start(); // Always start session first
include 'db_controller.php';

$loggedUser = isset($_SESSION['logged_user']) ? $_SESSION['logged_user'] : '';

// Re-fetch data to get the most updated data
$conn->select_db("Alumni"); // ✅ Correct database selection

// Ensure session email is set before using it
if (!isset($_SESSION['logged_account']['email'])) {
    die("Session email is not set.");
}

$email = $_SESSION['logged_account']['email']; // Store email in a variable

// Get account info
$SQLGetAccountInfo = $conn->prepare("SELECT email, type, status FROM account_table WHERE email = ?");
$SQLGetAccountInfo->bind_param("s", $email);
$SQLGetAccountInfo->execute();
$accountInfo = $SQLGetAccountInfo->get_result()->fetch_assoc();
$_SESSION['logged_account'] = $accountInfo;

// Get user info
$SQLGetUserInfo = $conn->prepare("SELECT * FROM user_table WHERE email = ?");
$SQLGetUserInfo->bind_param("s", $email);
$SQLGetUserInfo->execute();
$userInfo = $SQLGetUserInfo->get_result()->fetch_assoc();
$_SESSION['logged_user'] = $userInfo;

// If user is not logged in or is not a "user" type
if (!isset($_SESSION['logged_account']) || $_SESSION['logged_account']['type'] != 'user') {
    // Clear session and log the user out
    session_unset();
    session_destroy();

    $_SESSION['flash_mode'] = "alert-primary";
    $_SESSION['flash'] = "You must log in as a user to continue.";
    header('Location: login.php');
    exit();
}

// If user is not approved
if ($_SESSION['logged_account']['type'] == 'user' && $_SESSION['logged_account']['status'] != 'Approved') {
    if ($_SESSION['logged_account']['status'] == 'Rejected') {
        $_SESSION['flash_mode'] = "alert-danger";
        $_SESSION['flash'] = "This account is not approved. If this is an error, please contact the administrator.";
    } elseif ($_SESSION['logged_account']['status'] == 'Pending') {
        $_SESSION['flash_mode'] = "alert-warning";
        $_SESSION['flash'] = "This account is still pending approval. Please try again later.";
    }

    // Clear session and log the user out
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
