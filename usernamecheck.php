<?php
$username = $_GET["username"];
$status = "pass";

$responseStatus = '200 OK';
$responseText = 'Null';
if (!isset($_GET['username'])) {
   $responseStatus = '400 Bad Request';
   $responseText = 'Query does not have a username';
   $status = "fail";
} else {
   $usernames = array('admin','gast','paul');
   $validatePattern = '/^[A-z0-9]{4,20}$/';
   if (in_array($_GET['username'],$usernames)) {
      $responseStatus = '409 Conflict';
      $responseText = 'Username already exists';
      $status = "fail";
   } elseif (!preg_match($validatePattern,$_GET['username'])) {
      $responseStatus = '400 Bad Request';
      $responseText = 'Username does not follow the secure policy.';
      $status = "fail";
   } else {
      $reponseStatus = '204 No Content';
      $status = "pass";
   }
}

$data = [ 'fname' => $username, 'lname' => 'Smith', 'age' => 25, 'Status' => $status, 'StatusCode' => $responseStatus ];

header($_SERVER['SERVER_PROTOCOL'].' '.$responseStatus);
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);

?>
