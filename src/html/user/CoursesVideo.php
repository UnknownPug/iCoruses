<?php
    session_start();
    require '../../php/validation/includes/_dbController.php'; // Connecting to our courses database.
    $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : NULL;
    if ($uid == NULL) {
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
    <title>Video</title>
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
            <a href="Courses.php" class="text-form-style" id="courses-pressed">Courses</a>
            <a href="AboutUs.php" class="text-form-style" id="about-us">About Us</a>
            <a href="ContactInfo.php" class="text-form-style" id="contact-info">Contact Info</a>
            <a href="../../php/account/logout.php" class="text-form-style" id="log-out">Log Out</a>
        </nav>
    </header>
    <?php
    $courses = json_decode(file_get_contents(CR_FILE), JSON_OBJECT_AS_ARRAY);

    foreach ($courses as $course) : // Check if video id equals to page id. Setting video on a page.
        if (isset($_GET['id']) && $_GET['id'] == $course['id']):
            ?>
            <iframe width="1000" height="500" src="<?= $course["link"] ?>"></iframe>
        <?php
        endif;
    endforeach;
    ?>
    <div class="menu-text">
        <p>
            For asking a question you should click the “YouTube button” under the video on the right corner.<br>
            After this you will get to the YouTube creator channel, where you can ask him.<br>
            Also, you can contact us by clicking on the right button “Contact Us”. 📨
        </p>
        <a href="ContactInfo.php" class="text-form-style" id="contact-us">Contact Us</a>
    </div>

    <footer id="video-footer">
        <p>&copy; iCourses 2022</p>
        <a href="https://www.instagram.com/sitfelcvut/?hl=cs" class="fa fa-instagram"></a>
        <a href="https://sit.fel.cvut.cz">&lt;SIT/&gt;</a>
    </footer>
</div>
</body>
</html>