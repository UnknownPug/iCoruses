<?php

/**
 * @param string $getCourseFromFile getting contents from file
 * @param string $existedCourse reading json file as array
 * @result There is no return but after successful validation user will be moved to Courses.php
 * and his info will be added to .json
 */

require '../../php/validation/includes/_dbController.php';

$coursesInfoFile = "../../php/json/courses_list.json";
$_SESSION['error_message'] = '';

$videoSrc = "https://www.youtube.com/embed/";
$teacherSrc = "Teacher: ";

$getCourseFromFile = file_get_contents($coursesInfoFile, FILE_USE_INCLUDE_PATH);
$existedCourse = json_decode($getCourseFromFile, JSON_OBJECT_AS_ARRAY);

if (isset($_POST['add'])) {
    $videoLink = $_POST['link-add'];
    $teacherInfo = $_POST['teacher-add'];
    // Saving info if id was not added correctly.
    $_SESSION['link-add'] = $videoLink;
    $_SESSION['teacher-add'] = $teacherInfo;

    // Parsing our new video data.
    if (empty($videoLink) && empty($teacherInfo)) {
        $_SESSION['error_message'] .=
            "<span class='error-field'>Video link and Teacher fields must be completed!</span>";
    } elseif (strpos($videoLink, $videoSrc) === false) {
        $_SESSION['error_message'] .= "<span class='error-field'>Link should contain path with video parameter!</span>";
    } elseif (strpos($teacherInfo, $teacherSrc) === false) {
        $_SESSION['error_message'] .= "<span class='error-field'>Field Teacher is incorrect!</span>";
    } elseif (is_array($existedCourse) || is_object($existedCourse)) {
        foreach ($existedCourse as $course) {
            if ($course["src"] == $_POST['link-add']) {
                $_SESSION['error_message'] .=
                "<span class='error-field'>Video has been already added!</span>";
                break;
            }
        }
    }    
    if (!empty($_SESSION['error_message'])) {
        return;
    } else {
        // Saving data to Json file       
        addCourse($cr_data, $_FILES['image-add']['name'], $_POST['link-add'], $_POST['teacher-add']);
        // After validation is complete, moving user to Courses page.
        header("Location: ../../html/user/Courses.php");
    }
    // Unsetting info from web after completed registration.
    if (isset($_SESSION['link-add']) &&
        isset($_SESSION['teacher-add'])) {

        unset($_SESSION['link-add']);
        unset($_SESSION['teacher-add']);
    }
}
