<?php
    session_start();
    require '../../php/validation/includes/_dbController.php'; // Connecting to our courses database.
    $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : NULL;

    if ($uid) {
        $user = getUserByUid($uid); // Getting username
    } else {
        session_unset();
        session_destroy();
        /**
         * @result After logout user session is finished.
         */
        header('Location: ../../html/user/index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
    <link rel="stylesheet" href="../../css/MainStyle.css" media="screen">
    <link rel="stylesheet" href="../../css/PageStyle.css" media="screen">
    <link rel="stylesheet" href="../../css/PrintStyle.css" media="print">
    <link rel="icon" type="image/x-icon" href="../../../public/images/logo/iCourses_logo.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../public/images/logo/apple_iCourses_logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="page-wrapper">
    <header>
        <nav>
            <a href="Menu.php" class="text-form-style" id="menu-pressed">HP</a>
            <a href="Courses.php" class="text-form-style" id="courses">Courses</a>
            <a href="AboutUs.php" class="text-form-style" id="about-us">About Us</a>
            <a href="ContactInfo.php" class="text-form-style" id="contact-info">Contact Info</a>
            <a href="../../php/account/logout.php" class="text-form-style" id="log-out">Log Out</a>
        </nav>
    </header>
    <img src="../../../public/images/menu/Background.jpg" alt="BackgroundMenuImg" class="img-sign-up">

    <div class="menu-text">
        <p>
            Hi <a class="user-name"><?= $uid ? $user['username'] : '' ?></a>! 👋🏻<br>
            Good to see you on my site!<br><br>
            This site was created for those who<br>
            want to learn what programming is, what it's all<br>
            about, and understand for themselves if<br>
            this is really something they want to<br>
            dedicate their whole lives to. 🧐
        </p>
        <img src="../../../public/images/menu/Studying.jpg" alt="Studying"
             class="img-about-us">
    </div>

    <div class="menu-text">
        <img src="../../../public/images/menu/Thinking.jpg" alt="Thinking" class="img-about-us">
        <p>
            My job is to help you figure it out!<br>
            Here you can find various videos from<br>
            different experts, where they will<br>
            explain you in as simple language as<br>
            possible how programming languages<br>
            work and what they are about! 👨‍💻
        </p>
    </div>

    <img
            src="../../../public/images/menu/Apple_Hello.gif"
            alt="AppleGif"
            id="menu-gif"
            class="img-about-us">

    <footer id="signed-footer">
        <p>&copy; iCourses 2022</p>
        <a href="https://www.instagram.com/sitfelcvut/?hl=cs" class="fa fa-instagram"></a>
        <a href="https://sit.fel.cvut.cz">&lt;SIT/&gt;</a>
    </footer>
</div>
</body>
</html>