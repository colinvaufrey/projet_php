<?php
function checkPass($username, $pass, $dao){
  $dao->prepare("SELECT password FROM Users WHERE username = $username");
  $realPass = $dao->execute();
  /*
  if empty return null
  */
  return ($realPass == NULL)?0:password_verify($pass, $realPass);
}
  echo password_verify("pass", "$2y$10\$O1LJ8YB.cKKt/Ux/lwHzeOdORv9/heCmaFStr0EIXSLMVJ4IGP5oW");
  echo "\n";
  echo password_hash("pass",PASSWORD_BCRYPT);
  echo "\n";
  echo "\n";
  echo password_hash("admin",PASSWORD_BCRYPT);
  echo "\n";
  echo "\n";

  sessions_start();
  $_sessions['login'];




 ?>
