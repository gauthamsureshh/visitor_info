<?php
// handles the form submission
include 'autoLoader.php';
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    try{
        $userId = $_POST['visitorId'];
        $name =  htmlentities(trim($_POST['visitor_name'])) ;
        $contact = filter_var($_POST['contact_number'],  FILTER_VALIDATE_INT);
        $purpose = htmlspecialchars($_POST['purpose']);
        $time = htmlspecialchars($_POST['time']);
        $vip_status = $_POST['vip'];

        if(empty($name) || empty($purpose) || empty($time)){
            throw new Exception('empty');
        }
        if( empty($contact)){
            throw new Exception('invalid');
        }

        $visitor = new Interaction();
        if($userId){
            // if userid exists the user requested to update an existing visitor information
            $visitor->updateVisitor($userId,$name, $contact, $purpose, $time, $vip_status);
            header("Location: visitor_info.php?data=update_success");
        }
        else{
            //if userid bot found, the user requested to create new visitor information.
            $visitor->setVisitor($name, $contact, $purpose, $time,$vip_status);
            header("Location: index.php?data=success");
        }
        

    }
    catch(Exception $e){
        $msg = $e->getMessage();
        if($userId){
            header("Location: update.php?id=$userId data=$msg");
        }
        else{
            header("Location: index.php?data=$msg");
        }
    }

}


