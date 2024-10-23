<?php

class User extends Database {
    // protected string $username;
    // protected string $email;
    // protected string $pwd;


    public function signUser($username, $email, $pwd){
        $sql = "INSERT INTO users(username, email, pwd) VALUES (?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username, $email, $pwd]);
    }

    public function emailCheck($email){
        $sql = "SELECT count(username) FROM users WHERE email = ? ";
        $stmt= $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        $result = $stmt->fetchColumn();
        if($result > 0){
            return true;
        }
        return false;
    }

    public function pwdCheck($email){
        try{
            $sql = "SELECT pwd FROM users WHERE email = ?";
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$email]);
            return $stmt->fetchColumn();
        }
        catch(PDOException $e) {
            echo "Error getting user information" . $e->getMessage();
        }
    }
}