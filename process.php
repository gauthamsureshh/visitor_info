<?php
// handles the form submission
include 'autoLoader.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    try{
        $userId = $_POST['visitorId'];
        $name =  htmlentities(trim($_POST['visitor_name'])) ;
        $contact = filter_var($_POST['contact_number'],  FILTER_VALIDATE_INT);
        $purpose = htmlspecialchars($_POST['purpose']);
        $time = htmlspecialchars($_POST['time']);

        if(empty($name) || empty($purpose) || empty($time)){
            throw new Exception('empty');
        }
        if( empty($contact)){
            throw new Exception('invalid');
        }

        $visitor = new Interaction();
        if($userId){
            $visitor->updateVisitor($userId,$name, $contact, $purpose, $time);
            header("Location: visitor_info.php?data=update_success");
        }
        else{
            $visitor->setVisitor($name, $contact, $purpose, $time);
            header("Location: index.php?data=success");
        }
        

    }
    catch(Exception $e){
        if($userId){
            $msg = $e->getMessage();
            header("Location: update.php?id=$userId data=$msg");
        }
        else{
            $msg = $e->getMessage();
            header("Location: index.php?data=$msg");
        }
    }

}

