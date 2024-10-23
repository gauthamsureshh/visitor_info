<?php

include 'autoloader.php';
$user = new User();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['signup'])){
        try{
            $username = $_POST['username'];
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $pwd = $_POST['pwd'];
            $confirmPwd = $_POST['confirmPwd'];
    
            if(empty($username) || empty($pwd) || empty($confirmPwd)){
                throw new Exception('empty');
            }
    
            if(empty($email)){
                throw new Exception('invalidemail');
            }
    
            if($pwd !== $confirmPwd) {
                throw new Exception('nomatch');
            }
    
            if($user->emailCheck($email)){
                throw new Exception('emailexists');
            }
    
            $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
            $user->signUser($username, $email, $hashpwd);
            header("Location: login.php?message=success");
        }
        catch(Exception $e){
            $message = $e->getMessage();
            header("Location: signup.php?message=$message");
        }
    }

    if(isset($_POST['login'])){
        try{
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $pwd = $_POST['pwd'];
    
            if(empty($email) || empty($pwd)){
                throw new Exception('empty');
            }

            if($user->emailCheck($email) && password_verify( $pwd, $user->pwdCheck($email))){
                    header("Location: index.php?data=logged");
                    $_SESSION['loggedstatus'] = true;    
            }
            else{
                throw new Exception('invalidcred');
            }   
        } catch (Exception $e) {
            $message = $e->getMessage();
            header("Location: login.php?message=$message");
        }
    }
}