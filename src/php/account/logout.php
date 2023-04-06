<?php
session_start();
session_unset();
session_destroy();
/**
 * @result After logout user session is finished.
 */
header('Location: ../../html/user/index.php');
