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
    <title>About Us</title>
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
            <a href="AboutUs.php" class="text-form-style" id="about-us-pressed">About Us</a>
            <a href="ContactInfo.php" class="text-form-style" id="contact-info">Contact Info</a>
            <a href="../../php/account/logout.php" class="text-form-style" id="log-out">Log Out</a>
        </nav>
    </header>
    <img src="../../../public/images/about_us/Logo.jpg" alt="LogoSIT" class="img-about-logo">
    <div class="menu-text">
        <p>
            This site was created solely as part of the semester project
            for the B6B39ZWA course at FEL SIT CTU faculty in 2022.<br><br>
            I was able to learn for myself what Front End programming is, how a website is created,
            and what skills are needed to implement it. ✅<br><br>
            The “iCourses” web was created so that people could find the course that most people think is the best
            and could use it to learn a particular programming language and understand for themselves
            what it is and why they need it.<br><br>
            I hope you got the most out of using this site!
            Thank you for your attention!
        </p>
    </div>

    <footer id="signed-footer">
        <p>&copy; iCourses 2022</p>
        <a href="https://www.instagram.com/sitfelcvut/?hl=cs" class="fa fa-instagram"></a>
        <a href="https://sit.fel.cvut.cz">&lt;SIT/&gt;</a>
    </footer>
</div>
</body>
</html>