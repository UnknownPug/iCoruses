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
    <title>Courses</title>
    <link rel="stylesheet" href="../../css/MainStyle.css" media="screen">
    <link rel="stylesheet" href="../../css/PageStyle.css" media="screen">
    <link rel="stylesheet" href="../../css/PrintStyle.css" media="print">
    <link rel="icon" type="image/x-icon" href="../../public/images/logo/iCourses_logo.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="../../public/images/logo/apple_iCourses_logo.jpg">
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
    $limit = 9; // Setting the maximum number of videos that can be on the page
    $courses = json_decode(file_get_contents(CR_FILE), JSON_OBJECT_AS_ARRAY);

    $courses_count = count($courses);

    $total_pages = ceil($courses_count / $limit); // Counting all videos and setting 9 videos per page.
    $pagination_courses = array_chunk($courses, $limit);
    $existed_courses = $pagination_courses[0];

    function pageAllowed($page, $total) {
        if (!is_numeric($page)) {
            return false; // Returns false if page cannot be set.
        }
        return (int)$page > -1 && (int)$page < $total;  // Returning page num.
    }

    if (isset($_GET['page']) && pageAllowed($_GET['page'], $total_pages)) {
        $existed_courses = $pagination_courses[(int)$_GET['page']]; // Getting page num on our page.
    }

    //    Alternative to the function and condition above
    //    if (isset($_GET['page']) && $_GET['page'] < $total_pages && $_GET['page'] > -1) {
    //        $existed_courses = $pagination_courses[(int)$_GET['page']];
    //    }
    if ($user['username'] == 'AdminKoko') :
    ?>
    <a href="AddNewVideo.php" class="text-form-style" id="add-video">Add Video</a>
    <?php
    endif;
    ?>
    <div class="lessons-list">
        <?php
        foreach ($existed_courses as $course) : // For each course cell setting specific video and id.
            ?>
            <a href="CoursesVideo.php?id=<?= $course["id"] ?>">
                <figure>
                    <img src="<?= $course["src"] ?>" alt="Lessons" width="310" height="195">
                    <figcaption><?= $course["figcaption"] ?></figcaption>
                </figure>
            </a>
        <?php
        endforeach;
        ?>
    </div>

    <?php
    for ($i = 0; $i < $total_pages; $i++) : // Setting page num for each course page.
    ?>
    <a href="?page=<?= $i ?>"><?= $i + 1 ?></a>
    <?php
    endfor;
    ?>
    <footer id="signed-footer" class="courses-list">
        <p>&copy; iCourses 2022</p>
        <a href="https://www.instagram.com/sitfelcvut/?hl=cs" class="fa fa-instagram"></a>
        <a href="https://sit.fel.cvut.cz">&lt;SIT/&gt;</a>
    </footer>
</div>
</body>
</html>