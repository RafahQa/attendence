<?php
    class user
    {
        private $db;


        function __construct($conn)
        {
            $this->db = $conn;
        }

        public function insertUser($userName,$password)
        {

            try 
            {
               $check = $this->getUserByUserName($userName);
               if ($check['num'] > 0)
                {
                   return false;
                }
               else 
                {
                    $newPassword = md5($password.$userName);
                    $sql = "INSERT INTO users(username, password) VALUES (:username,:password)";
                    $stmt = $this->db->prepare($sql);

                    $stmt->bindparam(':username',$userName);
                    $stmt->bindparam(':password',$newPassword);

                    $stmt->execute();
                    return true;
               }
              

            } 
            catch (PDOException $e) 
            {
                echo $e->getMessage();
                return false;
                
            }
        }

        public function getUser($userName,$password)
        {
            try 
            { 
                $sql = "SELECT * FROM `users`  where username = :username AND password = :password";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username',$userName);
                $stmt->bindparam(':password',$password);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
                return false;  
            }
        }


        public function getUserByUserName($userName)
        {
            try 
            { 
                $sql = "SELECT count(*) AS num FROM `users`  where username = :username";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username',$userName);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            }
            catch (PDOException $e) 
            {
                echo $e->getMessage();
                return false;
                
            }
        }
    }

?>