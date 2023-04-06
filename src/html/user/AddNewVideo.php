<?php
    session_start();
    require "../../php/validation/videoValidation.php";
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
    <title>Add a Video</title>
    <link rel="stylesheet" href="../../css/MainStyle.css" media="screen">
    <link rel="stylesheet" href="../../css/PageStyle.css" media="screen">
    <link rel="stylesheet" href="../../css/PrintStyle.css" media="print">
    <link rel="icon" type="image/x-icon" href="../../../public/images/logo/iCourses_logo.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../public/images/logo/apple_iCourses_logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width">
    <script src="../../js/VideoAddScript.js"></script>
</head>
<body>
<div class="page-wrapper">
    <header>
        <p>Let's add a new video for our students 👨‍🏫</p>
    </header>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo $_SESSION['error_message'];
    }
    $videoImg = $_SESSION['image-add'] ?? '';
    $videoLink = $_SESSION['link-add'] ?? '';
    $videoTeacher = $_SESSION['teacher-add'] ?? '';
    ?>
    <div class="login-container" id="video-container">
        <div class="login-square" id="video-add">
            <form id="form-add-v" method="post" enctype='multipart/form-data'>
                <label for="v-img" class="form-label-reg">Image src (not important)</label>
                <input type="file" id="v-img" name="image-add">
                <br><br>
                <div class="row">
                    <label for="v-link" class="form-label-reg">Video link</label>
                    <input type="url"
                           id="v-link" autocomplete="on"
                           name="link-add" class="video-form-style"
                           placeholder="https://www.youtube.com/embed/"
                           value="<?= htmlspecialchars($videoLink) ?>">
                </div>
                <br>
                <div class="row">
                    <label for="v-teacher" class="form-label-reg">Figcaption</label>
                    <input type="text"
                           id="v-teacher" autocomplete="on"
                           name="teacher-add" class="video-form-style"
                           placeholder="Teacher: "
                           value="<?= htmlspecialchars($videoTeacher) ?>">
                </div>
                <br>
                <div class="row">
                    <input type="submit" class="text-form-style" name="add" id="create" value="Add"><br>
                    <a href="../user/Courses.php" class="text-form-style" id="cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <footer id="add-video-footer">
        <p>&copy; iCourses 2022</p>
        <a href="https://www.instagram.com/sitfelcvut/?hl=cs" class="fa fa-instagram"></a>
        <a href="https://sit.fel.cvut.cz">&lt;SIT/&gt;</a>
    </footer>
    <script>
        init();
    </script>
</div>
</body>
</html>