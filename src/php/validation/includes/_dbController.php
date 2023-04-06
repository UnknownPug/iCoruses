<?php
/**
 * @param string $data getting contents from user_profile.json
 * @param string $data getting contents from courses_list.json
 * @function addUser() adding user to our .json file
 * @function addCourses() adding courses to our .json file
 * @function getUserByEmail() getting user by his email
 * @function getUserByUid() getting user by his id
 * @function getCourseById() getting courses by id
 */
define('DB_FILE', $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/semestralka/iCourses/src/php/json/users_profile.json');

define('CR_FILE', $_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/semestralka/iCourses/src/php/json/courses_list.json');

define('VIDEO_FILE', '../../../public/images/list_of_lessons/');

$data = file_get_contents(DB_FILE);

$cr_data = file_get_contents(CR_FILE);

if ($data == NULL) { // Can kill database. Be careful with that!
    include '_createDB.php';
}

if ($cr_data == NULL) { // Can kill database. Be careful with that!
    include "_createCR_L.php";
}

$data = json_decode($data, JSON_OBJECT_AS_ARRAY);

$cr_data = json_decode($cr_data, JSON_OBJECT_AS_ARRAY);

function addUser($data, $email, $username, $password, $date) { // Adding user to our .json file
    $user = array(
        'id' => uniqid(),
        'email' => $email,
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'date' => $date
    );

    $data[] = $user;
    file_put_contents(DB_FILE, json_encode($data, JSON_PRETTY_PRINT));
}

function addCourse($data, $name, $link, $figcaption) { // Adding courses to our .json file
    $image = $_FILES['image-add']['name'];
    $tmp = $_FILES['image-add']['tmp_name'];

    upload($image, $tmp);
    $courses = array(
        'id' => md5((new \DateTime())->format('Y-m-d H:i:s')),
        'src' => VIDEO_FILE . $name,
        'link' => $link,
        'figcaption' => $figcaption
    );

    $data[] = $courses;
    file_put_contents(CR_FILE, json_encode($data, JSON_PRETTY_PRINT));
}

function isExtensionAllowed($image): bool {
    $fileType = pathinfo($image, PATHINFO_EXTENSION);
    $allowTypes = array('jpg', 'png', 'jpeg', 'PNG', 'JPG', 'JPEG');
    if (!in_array($fileType, $allowTypes)) {
        return false;
    }
    return true;
}

function upload($image, $tmp) {
    $localImage = VIDEO_FILE;
    if (!empty($image)) {
        if (!isExtensionAllowed($image)) {
            return null;
        }
        if (!move_uploaded_file($tmp, $localImage . $image)) {
            return null;
        }

        // Open the uploaded image
        $source_image = imagecreatefromstring(file_get_contents($localImage . $image));
        $width = imagesx($source_image);
        $height = imagesy($source_image);

        // Create a new image with the desired size
        $new_image = imagecreatetruecolor(310, 195);

        // Copy and resize the uploaded image into the new image
        imagecopyresized($new_image, $source_image, 0, 0, 0, 0, 310, 195, $width, $height);

        // Save the resized image
        imagejpeg($new_image, $localImage . $image);

        // Free memory
        imagedestroy($source_image);
        imagedestroy($new_image);
    }
    return $image;
}


function getUserByEmail($email) { // Getting user by his email
    $userInfo = json_decode(file_get_contents(DB_FILE), JSON_OBJECT_AS_ARRAY);

    foreach ($userInfo as $userEmail) {
        if ($email == $userEmail['email']) {
            return $userEmail;
        }
    }
    return null;
}

function getUserByUid($uid) { // Getting user by his id
    $userInfo = json_decode(file_get_contents(DB_FILE), JSON_OBJECT_AS_ARRAY);

    foreach ($userInfo as $userId) {
        if ($uid == $userId['id']) {
            return $userId;
        }
    }
    return null;
}

function getCourseById($id) { // Getting courses by id
    $courseInfo = json_decode(file_get_contents(CR_FILE), JSON_OBJECT_AS_ARRAY);

    foreach ($courseInfo as $courseId) {
        if ($id == $courseId['id']) {
            return $courseId;
        }
    }
    return null;
}
