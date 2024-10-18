<?php
// handles the form submission
include 'autoLoader.php';
if($_SERVER["REQUEST_METHOD"] == 'POST'){
    try{
        $visitor_id = $_POST['visitorId'];
        $visitor_name =  htmlentities(trim($_POST['visitor_name'])) ;
        $contact_number = filter_var($_POST['contact_number'],  FILTER_VALIDATE_INT);
        $purpose = htmlspecialchars($_POST['purpose']);
        $time = htmlspecialchars($_POST['time']);
        $vip_status = isset($_POST['vip_status']);

        if(empty($visitor_name) || empty($purpose) || empty($time)){
            throw new Exception('empty');
        }
        if( empty($contact_number)){
            throw new Exception('invalid');
        }

        $visitor = new Visitor($visitor_name, $contact_number, $purpose, $time);
        $vip_visitor = new VipVisitor($visitor_name, $contact_number, $purpose, $time, $vip_status);
        if($visitor_id){
            // if userid exists the user requested to update an existing visitor information
                $vip_visitor->updateVisitor($visitor_id);
                header("Location: visitor_info.php?data=update_success");
        }
        else{
            //if userid bot found, the user requested to create new visitor information.
            if(!$vip_status){
                $visitor->addVisitor();
            }
            else{
                // if the visitor has vip privileges, invoke VipVisitor class
                $vip_visitor->addVisitor();
            }
            header("Location: index.php?data=success");

        }
        
    }
    catch(Exception $e){
        $msg = $e->getMessage();
        if($visitor_id){
            header("Location: update.php?id=$visitor_id data=$msg");
        }
        else{
            header("Location: index.php?data=$msg");
        }
    }

}


