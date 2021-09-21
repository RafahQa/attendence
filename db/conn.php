<?php
   //local database
   //  $host = '127.0.0.1';
   //  $db = 'attendence_db';
   //  $user = 'root';
   //  $pass = '';
   //  $charset = 'utf8mb4';

   //Remote Database
    $host = 'sql4.freemysqlhosting.net';
    $db = 'sql4438302';
    $user = 'sql4438302';
    $pass = 'rteeUW7EQy';
    $charset = 'utf8mb4';
     
   
   //data source name 
   $dsn = "mysql:host=$host; dbname=$db; charset=$charset";

   try {
       $pdo = new PDO($dsn, $user, $pass);
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      // echo 'Hello Database';
   } catch (PDOException $e) {
       throw new PDOException($e->getMessage());
      //echo "<h1 class='text-danger'>No Database Found!!</h1>";
   }

   require_once 'crud.php';
   require_once 'user.php';
   $crud = new crud($pdo);
   $user = new user($pdo);

   $user->insertUser("admin","password");
?>