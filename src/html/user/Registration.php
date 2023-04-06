<?php
    require '../../php/validation/regValidation.php'; // Connecting parsing logic registration.
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="../../css/MainStyle.css" media="screen">
    <link rel="stylesheet" href="../../css/PageStyle.css" media="screen">
    <link rel="stylesheet" href="../../css/PrintStyle.css" media="print">
    <link rel="icon" type="image/x-icon" href="../../../public/images/logo/iCourses_logo.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../public/images/logo/apple_iCourses_logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width">
    <script src="../../js/RegistrationScript.js"></script>
</head>
<body>
<div class="page-wrapper">
    <header>
        <p>Are you prepared to be the best programmer in the world? Then let’s roll! 🤟</p>
    </header>

    <img src="../../../public/images/registration/Background_Image.jpg" alt="BackgroundImg" class="img-sign-up">
    <?php
    if (isset($_SESSION['error_message'])) {
        echo $_SESSION['error_message'];
    }
    $userEmail = isset($_SESSION['nw-em']) ? $_SESSION['nw-em'] : '';
    $userUsername = isset($_SESSION['nw-usr']) ? $_SESSION['nw-usr'] : '';
    $userPassword = isset($_SESSION['nw-passwd']) ? $_SESSION['nw-passwd'] : '';
    $userDate = isset($_SESSION['day']) ? $_SESSION['day'] : '';
    ?>
    <div class="login-container" id="register">
        <div class="welcome-text">Let’s write some information about you!</div>
        <div class="login-square" id="register-sq">
            <form id="form-r" method="post">
                <div class="row">
                    <label for="email" class="form-label-reg">Email</label>
                    <input type="email" id="email" name="nw-em" class="form-style"
                           value="<?= htmlspecialchars($userEmail) ?>">
                </div>
                <div class="row">
                    <label for="username" class="form-label-reg">Username</label>
                    <input type="text" id="username" name="nw-usr" class="form-style"
                           value="<?= htmlspecialchars($userUsername) ?>">
                </div>
                <div class="row">
                    <label for="psd" class="form-label-reg">Password</label>
                    <input type="password" id="psd" name="nw-passwd" class="form-style"
                           value="<?= htmlspecialchars($userPassword) ?>">
                </div>
                <div class="row">
                    <label for="dob" class="form-label-reg">Date Of Birth</label>
                    <input type="date" id="dob" name="day" class="form-style" min="1952-01-01" max="2023-01-01"
                           value="<?= htmlspecialchars($userDate) ?>">
                </div>
                <div class="row">
                    <input type="submit" class="text-form-style" name="create" id="create" value="Create">
                    <a href="index.php" class="text-form-style" id="cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>
    <footer>
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