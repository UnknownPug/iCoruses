<?php
/**
 * @param string $encodedData creating .json file
 * @result file_put_contents() saving $encodedData
 */
$userData = array();

$encodedData = json_encode($userData, JSON_PRETTY_PRINT); // Formatting input to our json file

file_put_contents("../../../php/json/users_profile.json", $encodedData);