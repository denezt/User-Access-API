<?php
$username = $_GET["username"];

$responseStatus = '200 OK';
$responseText = 'Richard Hackson';
if (!isset($_POST['username'])) {
   $responseStatus = '400 Bad Request';
   $responseText = 'Query does not have a username';
} else {
   $usernames = array('admin','gast','paul');
   $validatePattern = '/^[A-z0-9]{4,20}$/';
   if (in_array($_POST['username'],$usernames)) {
      $responseStatus = '409 Conflict';
      $responseText = 'Username already exists';
   } elseif (!preg_match($validatePattern,$_POST['username'])) {
      $responseStatus = '400 Bad Request';
      $responseText = 'Username does not follow the secure policy.';
   } else {
      $reponseStatus = '204 No Content';
   }
}
$data = [ 'fname' => $username, 'lname' => 'Smith', 'age' => 25 ];

header($_SERVER['SERVER_PROTOCOL'].' '.$responseStatus);
# header('Content-type: text/html; charset=utf-8');
# echo $responseText;
header('Content-Type: application/json; charset=utf-8');
echo json_encode($data);

?>
