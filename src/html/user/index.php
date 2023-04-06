<?php
    require '../../php/validation/logValidation.php'; // Connecting parsing logic validation.
    $userEmail =  isset($_SESSION['acc-email']) ? $_SESSION['acc-email'] : '';
    $userPassword = isset($_SESSION['acc-psd']) ? $_SESSION['acc-psd'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" href="../../css/MainStyle.css" media="screen">
    <link rel="stylesheet" href="../../css/PageStyle.css" media="screen">
    <link rel="stylesheet" href="../../css/PrintStyle.css" media="print">
    <link rel="icon" type="image/x-icon" href="../../../public/images/logo/iCourses_logo.jpg">
    <link rel="apple-touch-icon" sizes="180x180" href="../../../public/images/logo/apple_iCourses_logo.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width">
    <script src="../../js/LoginScript.js"></script>
</head>
<body class="login-body">
<div class="page-wrapper">
    <header>
        <p>“Great things are never done by one person. They&apos;re done by a team of
            people!”</p>
    </header>
    <?php
    if (isset($_SESSION['error_message'])) {
        echo $_SESSION['error_message'];
    }
    ?>
        <div class="login-container">
        <img src="../../../public/images/login/Logo.jpg" alt="Logo" class="img-logo">
        <div class="welcome-text">Welcome&nbsp;to&nbsp;iCourses&nbsp;🚀</div>
        <div class="login-square">
            <form class="input-form" id="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
                <div class="row">
                    <label for="login" class="form-label">Email</label>
                    <input type="email" id="login" name="acc-email" class="form-style"
                           value="<?= htmlspecialchars($userEmail);?>">
                </div>
                <div class="row">
                    <label for="pass" class="form-label">Password</label>
                    <input type="password" id="pass" name="acc-psd" class="form-style"
                           value="<?= htmlspecialchars($userPassword) ?>">
                </div>
                <div class="row">
                    <input type="submit" class="text-form-style" id="sign-in" name="login-acc" value="Sign In">
                    <a href="Registration.php" class="text-form-style" id="sign-up">Sign Up</a>
                </div>
            </form>
        </div>
    </div>
    <footer id="video-footer">
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