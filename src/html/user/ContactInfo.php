<?php
    session_start();
    $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : NULL;
    if (!$uid) {
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
    <title>Contact Info</title>
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
            <a href="Menu.php" class="text-form-style" id="menu">HP</a>
            <a href="Courses.php" class="text-form-style" id="courses">Courses</a>
            <a href="AboutUs.php" class="text-form-style" id="about-us">About Us</a>
            <a href="ContactInfo.php" class="text-form-style" id="contact-info-pressed">Contact Info</a>
            <a href="../../php/account/logout.php" class="text-form-style" id="log-out">Log Out</a>
        </nav>
    </header>
    <img src="../../../public/images/contact_info/iCourses_Logo.jpg" alt="BackgroundMenuImg" class="img-sign-up">

    <div class="menu-text">
        <p>
            CEO CZ 🇨🇿<br>
            Dmitry Rastvorov<br><br>
            Contacts:<br>
            Email: admin@icourses.com<br>
            Telegram: @Unknown.java<br>
            Phone number: +420******121<br><br>
            Address:<br>
            Prague, Karlovo Náměstí
        </p>

        <img
                src="../../../public/images/contact_info/Admin_Photo.jpg"
                alt="AdminImg"
                class="img-about-us">
    </div>

    <footer id="signed-footer">
        <p>&copy; iCourses 2022</p>
        <a href="https://www.instagram.com/sitfelcvut/?hl=cs" class="fa fa-instagram"></a>
        <a href="https://sit.fel.cvut.cz">&lt;SIT/&gt;</a>
    </footer>
</div>
</body>
</html>