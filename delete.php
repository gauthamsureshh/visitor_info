<?php
//handles the delete request

include 'autoLoader.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $visitorId =  $_POST['visitor_id'];
    $data =new Visitor();
    $data->deleteVisitor($visitorId);

    // after successful deletion the page is redirect to visitor info page
    header("Location: visitor_info.php?data=delete_success");
}
else{
    header("Location: index.php");
}