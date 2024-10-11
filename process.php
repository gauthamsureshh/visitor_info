<?php

// handles the form submission
include 'autoLoader.php';
if($_SERVER['REQUEST_METHOD']=='POST'){
    try{
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
        $visitor->setVisitor($name, $contact, $purpose, $time);
        header("Location: index.php?data=success");

    }
    catch(Exception $e){
        $msg = $e->getMessage();
        header("Location: index.php?data=$msg");
    }

}
