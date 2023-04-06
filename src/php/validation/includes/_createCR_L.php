<?php
/**
 * @param string $encodedData creating .json file
 * @result file_put_contents() saving $encodedData
 */
$userData = array();

$encodedData = json_encode($userData, JSON_PRETTY_PRINT); // Formatting input to our json file
// Creating .json file with new data

file_put_contents("../../../php/json/courses_list.json", $encodedData);
