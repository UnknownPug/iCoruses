<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  if (isset($_GET['q']) && isset($_GET['type'])) {
    $input = $_GET['q'];
    $type = $_GET['type'];
    
    // Get the absolute path to the directory containing ajaxValidation.php
    $dir = __DIR__;
    $dbFilePath = $dir . '/../../php/json/users_profile.json';

    $usersData = file_get_contents($dbFilePath);
    $users = json_decode($usersData, true);

    $response = array("hint" => array());

    if ($type === "email") {
      foreach ($users as $user) {
        if ($user['email'] === $input) {
          $response['hint']['email'] = "red";
          break;
        }
      }
      if (!isset($response['hint']['email'])) {
        $response['hint']['email'] = "green";
      }
    } elseif ($type === "username") {
      foreach ($users as $user) {
        if ($user['username'] === $input) {
          $response['hint']['username'] = "red";
          break;
        }
      }
      if (!isset($response['hint']['username'])) {
        $response['hint']['username'] = "green";
      }
    }
    // Send the JSON response
    header('../../php/json/users_profile.json');
    echo json_encode($response);
  }
}
?>
